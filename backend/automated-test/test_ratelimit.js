/**
 * test_ratelimit.js — Rate limiting detection
 * Sends a bounded burst (~30 req) to auth endpoints and checks for 429.
 */
import axios from 'axios';
import { BASE_URL, addResult } from './dast_runner.js';

const BURST = 30;
const ENDPOINTS = [
    { method: 'POST', path: '/api/auth/send-otp', data: { phone: '9999999999' } },
    { method: 'POST', path: '/api/auth/login',    data: { phone: '9999999999', otp: '0000' } },
];

(async () => {
    console.log('\n[7] Rate Limiting Tests');
    for (const ep of ENDPOINTS) {
        const statuses = [];
        for (let i = 0; i < BURST; i++) {
            try {
                const res = await axios({ method: ep.method, url: BASE_URL + ep.path, data: ep.data, validateStatus: () => true, timeout: 10000 });
                statuses.push(res.status);
            } catch (e) { statuses.push(0); }
        }
        const has429 = statuses.includes(429);
        const finding = !has429; // No rate limit = finding
        const severity = finding ? 'MEDIUM' : 'INFO';
        const icon = finding ? '⚠' : '✓';
        const dist = statuses.reduce((a, s) => { a[s] = (a[s]||0)+1; return a; }, {});
        console.log(`  ${icon} RateLimit | ${ep.method} ${ep.path} | 30 reqs → statuses: ${JSON.stringify(dist)} | 429 seen: ${has429}`);
        addResult({ endpoint: ep.path, method: ep.method, role: 'anonymous', status: has429 ? 429 : statuses[statuses.length - 1], expected_status: 429, finding, severity, response_time_ms: 0, test_category: 'rate_limiting', note: has429 ? 'Rate limit enforced (429 detected)' : `No rate limit — ${BURST} requests all succeeded. Implement throttling on auth endpoints.` });
    }
})();
