/**
 * test_authn.js — AuthN Bypass & No-Auth detection
 * Tests: protected endpoints with no token, malformed token, expired token.
 * 2xx on a protected endpoint = CRITICAL finding.
 */
import axios from 'axios';
import { BASE_URL, config, addResult } from './dast_runner.js';

const ENDPOINTS = [
    { method: 'GET',  path: '/api/requests',      expectAuth: true },
    { method: 'POST', path: '/api/requests',      expectAuth: true },
    { method: 'POST', path: '/api/auth/send-otp', expectAuth: false },
    { method: 'POST', path: '/api/auth/login',    expectAuth: false },
];

const TOKENS = [
    { role: 'no_token',       header: null },
    { role: 'malformed',      header: 'Bearer BADTOKEN123' },
    { role: 'expired',        header: 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwicm9sZSI6ImN1c3RvbWVyIiwiaWF0IjoxNTE2MjM5MDIyLCJleHAiOjE1MTYyMzkwMjN9.INVALIDSIG' },
];

const delay = ms => new Promise(r => setTimeout(r, ms));

(async () => {
    console.log('\n[1] AuthN Bypass Tests');
    for (const ep of ENDPOINTS) {
        if (!ep.expectAuth) continue; // Only probe protected endpoints
        for (const tok of TOKENS) {
            await delay(200);
            const headers = { 'Content-Type': 'application/json' };
            if (tok.header) headers['Authorization'] = tok.header;
            const t0 = Date.now();
            let status = 0, note = '';
            try {
                const res = await axios({ method: ep.method, url: BASE_URL + ep.path, headers, data: {}, validateStatus: () => true, timeout: 10000 });
                status = res.status;
                note = `Got ${status} with ${tok.role}`;
            } catch (e) { status = 0; note = e.message; }
            const finding = status >= 200 && status < 300;
            const severity = finding ? 'CRITICAL' : 'INFO';
            const icon = finding ? '✗' : '✓';
            console.log(`  ${icon} AuthN | ${ep.method} ${ep.path} | ${tok.role} → ${status}`);
            addResult({ endpoint: ep.path, method: ep.method, role: tok.role, status, expected_status: 401, finding, severity, response_time_ms: Date.now() - t0, test_category: 'authn_bypass', note });
        }
    }

    // Also test: endpoint with NO auth enforcement detection
    console.log('\n  [!] Checking if ANY endpoint enforces auth at all...');
    for (const ep of ENDPOINTS) {
        await delay(150);
        const t0 = Date.now();
        let status = 0;
        try {
            const res = await axios({ method: ep.method, url: BASE_URL + ep.path, headers: { 'Content-Type': 'application/json' }, data: {}, validateStatus: () => true, timeout: 10000 });
            status = res.status;
        } catch (e) { status = 0; }
        const finding = ep.expectAuth && status >= 200 && status < 300;
        if (finding) {
            console.log(`  ✗ NO AUTH ENFORCED: ${ep.method} ${ep.path} returned ${status} without any token`);
            addResult({ endpoint: ep.path, method: ep.method, role: 'anonymous', status, expected_status: 401, finding: true, severity: 'CRITICAL', response_time_ms: Date.now() - t0, test_category: 'no_auth_enforcement', note: 'Endpoint returns 2xx with no authentication token present. Implement JWT middleware.' });
        }
    }
})();
