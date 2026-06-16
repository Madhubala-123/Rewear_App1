/**
 * test_cors.js — CORS misconfiguration detection
 * Tests if the API reflects arbitrary Origins or allows credentials with wildcard.
 */
import axios from 'axios';
import { BASE_URL, addResult } from './dast_runner.js';

const delay = ms => new Promise(r => setTimeout(r, ms));

const EVIL_ORIGINS = [
    'https://evil.com',
    'https://attacker.rewear.evil.com',
    'null',
    'http://localhost.evil.com',
];

const ENDPOINTS = [
    { method: 'POST', path: '/api/auth/login' },
    { method: 'GET',  path: '/api/requests' },
];

(async () => {
    console.log('\n[CORS] CORS Misconfiguration Tests');
    for (const ep of ENDPOINTS) {
        for (const origin of EVIL_ORIGINS) {
            await delay(200);
            const t0 = Date.now();
            let acao = '', acac = '', status = 0;
            try {
                const res = await axios({
                    method: ep.method, url: BASE_URL + ep.path,
                    headers: { 'Origin': origin, 'Content-Type': 'application/json' },
                    data: {}, validateStatus: () => true, timeout: 10000
                });
                status = res.status;
                acao = res.headers['access-control-allow-origin'] || '';
                acac = res.headers['access-control-allow-credentials'] || '';
            } catch (e) { status = 0; }

            // Findings:
            // 1. ACAO reflects the evil origin
            // 2. ACAO is wildcard AND ACAC is true (browsers block this, but flag it)
            const reflectsOrigin = acao === origin;
            const wildcardWithCreds = acao === '*' && acac === 'true';
            const finding = reflectsOrigin || wildcardWithCreds;
            const severity = finding ? 'HIGH' : 'INFO';
            const icon = finding ? '✗' : '✓';
            const note = reflectsOrigin
                ? `Origin "${origin}" reflected in ACAO header — allows cross-origin reads`
                : wildcardWithCreds
                    ? 'Wildcard ACAO with credentials=true'
                    : `ACAO: "${acao}"`;
            console.log(`  ${icon} CORS | ${ep.method} ${ep.path} | Origin: ${origin} → ACAO: ${acao || '(none)'}`);
            addResult({ endpoint: ep.path, method: ep.method, role: 'anonymous', status, expected_status: 0, finding, severity, response_time_ms: Date.now() - t0, test_category: 'cors', note });
        }
    }
})();
