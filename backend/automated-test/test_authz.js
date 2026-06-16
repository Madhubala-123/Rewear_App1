/**
 * test_authz.js — AuthZ / Privilege Escalation & IDOR
 * Calls role-restricted endpoints using lower-privilege role tokens.
 * Also varies id params to detect IDOR.
 */
import axios from 'axios';
import { BASE_URL, config, addResult } from './dast_runner.js';

const delay = ms => new Promise(r => setTimeout(r, ms));

// Role tokens from config (empty string = anonymous)
const roles = config.roles || {};

const PROTECTED = [
    { method: 'GET',  path: '/api/requests',  allowedRoles: ['admin', 'agent'] },
    { method: 'POST', path: '/api/requests',  allowedRoles: ['customer'] },
];

// IDOR probe: try swapping numeric IDs in paths
const IDOR_PATHS = [
    '/api/requests/1',
    '/api/requests/2',
    '/api/requests/0',
    '/api/requests/99999',
    '/api/requests/-1',
];

(async () => {
    console.log('\n[2] AuthZ / IDOR Tests');

    // AuthZ matrix
    for (const ep of PROTECTED) {
        for (const [role, token] of Object.entries(roles)) {
            await delay(200);
            const headers = { 'Content-Type': 'application/json' };
            if (token) headers['Authorization'] = `Bearer ${token}`;
            const t0 = Date.now();
            let status = 0;
            try {
                const res = await axios({ method: ep.method, url: BASE_URL + ep.path, headers, data: {}, validateStatus: () => true, timeout: 10000 });
                status = res.status;
            } catch (e) { status = 0; }
            const isAllowed = ep.allowedRoles.includes(role);
            const finding = !isAllowed && status >= 200 && status < 300;
            const expectedStatus = isAllowed ? 200 : 403;
            const severity = finding ? 'HIGH' : 'INFO';
            const icon = finding ? '✗' : '✓';
            console.log(`  ${icon} AuthZ | ${ep.method} ${ep.path} | role=${role} → ${status} (expected ${expectedStatus})`);
            addResult({ endpoint: ep.path, method: ep.method, role, status, expected_status: expectedStatus, finding, severity, response_time_ms: Date.now() - t0, test_category: 'authz_privesc', note: finding ? `Role "${role}" accessed endpoint reserved for ${ep.allowedRoles.join(',')}` : '' });
        }
    }

    // IDOR probes
    console.log('\n  IDOR id-enumeration probes...');
    for (const idorPath of IDOR_PATHS) {
        await delay(200);
        const t0 = Date.now();
        let status = 0, body = '';
        try {
            const res = await axios({ method: 'GET', url: BASE_URL + idorPath, headers: { 'Content-Type': 'application/json' }, validateStatus: () => true, timeout: 10000 });
            status = res.status;
            body = JSON.stringify(res.data).substring(0, 120);
        } catch (e) { status = 0; body = e.message; }
        // Finding: 200 with data returned for cross-user ID
        const finding = status === 200 && body.length > 5;
        const severity = finding ? 'HIGH' : 'INFO';
        const icon = finding ? '⚠' : '✓';
        console.log(`  ${icon} IDOR  | GET ${idorPath} → ${status}`);
        addResult({ endpoint: idorPath, method: 'GET', role: 'anonymous', status, expected_status: 404, finding, severity, response_time_ms: Date.now() - t0, test_category: 'idor', note: finding ? `Object returned without ownership check: ${body}` : '' });
    }
})();
