/**
 * test_methods.js — Improper HTTP Method handling
 * Probes endpoints with wrong HTTP verbs (GET on POST-only, etc.)
 * Also checks for missing security headers.
 */
import axios from 'axios';
import { BASE_URL, addResult } from './dast_runner.js';

const delay = ms => new Promise(r => setTimeout(r, ms));

const PROBES = [
    { method: 'GET',    path: '/api/auth/login',    expectedReject: true },
    { method: 'GET',    path: '/api/auth/send-otp', expectedReject: true },
    { method: 'DELETE', path: '/api/auth/login',    expectedReject: true },
    { method: 'PUT',    path: '/api/auth/login',    expectedReject: true },
    { method: 'PATCH',  path: '/api/auth/login',    expectedReject: true },
    { method: 'HEAD',   path: '/api/auth/login',    expectedReject: false }, // HEAD should be allowed
    { method: 'GET',    path: '/api/requests',      expectedReject: false },
    { method: 'DELETE', path: '/api/requests',      expectedReject: true },
];

const SECURITY_HEADERS = [
    'x-content-type-options',
    'x-frame-options',
    'strict-transport-security',
    'content-security-policy',
    'x-xss-protection',
    'referrer-policy',
];

(async () => {
    console.log('\n[Methods/Headers] HTTP Method & Security Header Tests');

    // Method probes
    for (const probe of PROBES) {
        await delay(200);
        const t0 = Date.now();
        let status = 0, headers = {};
        try {
            const res = await axios({ method: probe.method, url: BASE_URL + probe.path, data: {}, validateStatus: () => true, timeout: 10000 });
            status = res.status;
            headers = res.headers;
        } catch (e) { status = 0; }
        const accepted = status >= 200 && status < 300;
        const finding = probe.expectedReject && accepted;
        const severity = finding ? 'MEDIUM' : 'INFO';
        const icon = finding ? '⚠' : '✓';
        console.log(`  ${icon} Method | ${probe.method} ${probe.path} → ${status} (should ${probe.expectedReject ? 'reject' : 'allow'})`);
        addResult({ endpoint: probe.path, method: probe.method, role: 'anonymous', status, expected_status: probe.expectedReject ? 405 : 200, finding, severity, response_time_ms: Date.now() - t0, test_category: 'http_methods', note: finding ? `${probe.method} should be rejected with 405 but got ${status}` : '' });

        // Check security headers on first successful response
        if (probe.method === 'POST' || probe.method === 'GET') {
            for (const h of SECURITY_HEADERS) {
                if (!headers[h]) {
                    const icon2 = '⚠';
                    console.log(`  ${icon2} SecHdr | Missing "${h}" on ${probe.method} ${probe.path}`);
                    addResult({ endpoint: probe.path, method: probe.method, role: 'anonymous', status, expected_status: 0, finding: true, severity: 'LOW', response_time_ms: 0, test_category: 'security_headers', note: `Missing HTTP security header: ${h}` });
                }
            }
        }
    }
})();
