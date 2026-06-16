/**
 * dast_standalone.js — Self-contained DAST runner (no module chaining)
 * Runs all test categories sequentially and writes report.json
 * Usage: node dast_standalone.js
 */
import axios from 'axios';
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const BASE_URL = 'http://localhost:5000';
const results = [];
const delay = ms => new Promise(r => setTimeout(r, ms));

function addResult(r) {
    results.push({ ...r, timestamp: new Date().toISOString() });
}

// ─────────────────────────────────────────────────────────────────────────────
// ENDPOINT DISCOVERY (from static code analysis of server.js)
// ─────────────────────────────────────────────────────────────────────────────
const ENDPOINTS = [
    { method: 'POST', path: '/api/auth/send-otp', public: true,  desc: 'Send OTP to phone' },
    { method: 'POST', path: '/api/auth/login',    public: true,  desc: 'Login with phone+OTP' },
    { method: 'GET',  path: '/api/requests',      public: false, desc: 'List all pickup requests' },
    { method: 'POST', path: '/api/requests',      public: false, desc: 'Create pickup request' },
];

console.log('\n' + '═'.repeat(60));
console.log('  ReWear_Web DAST — Dynamic Application Security Testing');
console.log('═'.repeat(60));
console.log(`  Target : ${BASE_URL}`);
console.log(`  Time   : ${new Date().toISOString()}`);

// ─────────────────────────────────────────────────────────────────────────────
// STEP 1 — ENDPOINT LIST
// ─────────────────────────────────────────────────────────────────────────────
console.log('\n┌─ STEP 1: Discovered Endpoints (' + ENDPOINTS.length + ' total) ─────────────');
ENDPOINTS.forEach(e => console.log(`│  [${e.public ? 'PUBLIC  ' : 'PROTECTED'}] ${e.method.padEnd(6)} ${e.path.padEnd(30)} — ${e.desc}`));
console.log('└' + '─'.repeat(59));

// ─────────────────────────────────────────────────────────────────────────────
// STEP 2 — EXPECTATION MODEL (noted inline above)
// ─────────────────────────────────────────────────────────────────────────────

// ─────────────────────────────────────────────────────────────────────────────
// STEP 3 — RUN TESTS
// ─────────────────────────────────────────────────────────────────────────────

// ── [1] AuthN Bypass ─────────────────────────────────────────────────────────
console.log('\n[1] AuthN Bypass — no/malformed/expired token on protected endpoints');
const AUTH_TOKENS = [
    { label: 'no_token',   header: null },
    { label: 'malformed',  header: 'Bearer BADTOKEN123' },
    { label: 'expired',    header: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ0ZXN0IiwiZXhwIjoxfQ.INVALIDSIG' },
];

for (const ep of ENDPOINTS) {
    if (ep.public) continue;
    for (const tok of AUTH_TOKENS) {
        await delay(150);
        const hdrs = { 'Content-Type': 'application/json' };
        if (tok.header) hdrs['Authorization'] = tok.header;
        const t0 = Date.now();
        let status = 0;
        try {
            const res = await axios({ method: ep.method, url: BASE_URL + ep.path, headers: hdrs, data: {}, validateStatus: () => true, timeout: 10000 });
            status = res.status;
        } catch (e) { status = 0; }
        const finding = status >= 200 && status < 300;
        const sev = finding ? 'CRITICAL' : 'INFO';
        console.log(`  ${finding ? '✗' : '✓'} ${ep.method} ${ep.path} [${tok.label}] → ${status} ${finding ? '← BYPASS!' : ''}`);
        addResult({ endpoint: ep.path, method: ep.method, role: tok.label, status, expected_status: 401, finding, severity: sev, response_time_ms: Date.now() - t0, test_category: 'authn_bypass', note: finding ? `Endpoint returned ${status} without valid auth — auth not enforced` : `Correctly rejected with ${status}` });
    }
}

// ── [2] AuthZ / RBAC ─────────────────────────────────────────────────────────
console.log('\n[2] AuthZ / RBAC — wrong-role access (no role tokens configured, checking open access)');
// Since no role tokens are configured, we test anonymous access on all endpoints
for (const ep of ENDPOINTS) {
    await delay(150);
    const t0 = Date.now();
    let status = 0;
    try {
        const res = await axios({ method: ep.method, url: BASE_URL + ep.path, headers: { 'Content-Type': 'application/json' }, data: {}, validateStatus: () => true, timeout: 10000 });
        status = res.status;
    } catch (e) { status = 0; }
    const finding = !ep.public && status >= 200 && status < 300;
    const sev = finding ? 'CRITICAL' : 'INFO';
    console.log(`  ${finding ? '✗' : '✓'} ${ep.method} ${ep.path} [anonymous] → ${status} ${finding ? '← UNPROTECTED!' : ''}`);
    addResult({ endpoint: ep.path, method: ep.method, role: 'anonymous', status, expected_status: ep.public ? 200 : 401, finding, severity: sev, response_time_ms: Date.now() - t0, test_category: 'authz_rbac', note: finding ? 'Protected endpoint accessible anonymously — no auth middleware' : '' });
}

// ── [3] IDOR ──────────────────────────────────────────────────────────────────
console.log('\n[3] IDOR — id enumeration on /api/requests/:id');
const idorIds = ['1', '2', '0', '99999', '-1', 'abc', '../etc/passwd'];
for (const id of idorIds) {
    await delay(150);
    const url = `${BASE_URL}/api/requests/${id}`;
    const t0 = Date.now();
    let status = 0, body = '';
    try {
        const res = await axios({ method: 'GET', url, headers: { 'Content-Type': 'application/json' }, validateStatus: () => true, timeout: 10000 });
        status = res.status;
        body = JSON.stringify(res.data).substring(0, 100);
    } catch (e) { status = 0; body = e.message; }
    const finding = status === 200 && body !== '{}' && body !== 'null' && body.length > 3;
    const sev = finding ? 'HIGH' : 'INFO';
    console.log(`  ${finding ? '⚠' : '✓'} GET /api/requests/${id} → ${status} ${finding ? '← DATA RETURNED' : ''}`);
    addResult({ endpoint: `/api/requests/${id}`, method: 'GET', role: 'anonymous', status, expected_status: 404, finding, severity: sev, response_time_ms: Date.now() - t0, test_category: 'idor', note: finding ? `Object data returned without ownership check: ${body}` : '' });
}

// ── [4] Token Tampering (JWT) ─────────────────────────────────────────────────
console.log('\n[4] Token Tampering — forged/unsigned JWT claims');
const FORGED_TOKENS = [
    { label: 'role=admin forged',   token: 'eyJhbGciOiJub25lIiwidHlwIjoiSldUIn0.eyJzdWIiOiIxIiwicm9sZSI6ImFkbWluIn0.' },
    { label: 'alg=none',            token: 'eyJhbGciOiJub25lIn0.eyJzdWIiOiIxIiwicm9sZSI6ImN1c3RvbWVyIn0.' },
    { label: 'modified+badsig',     token: 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiI5OTkiLCJyb2xlIjoiYWRtaW4ifQ.BADSIGNATURE' },
];
for (const tok of FORGED_TOKENS) {
    for (const ep of ENDPOINTS.filter(e => !e.public)) {
        await delay(150);
        const t0 = Date.now();
        let status = 0;
        try {
            const res = await axios({ method: ep.method, url: BASE_URL + ep.path, headers: { 'Content-Type': 'application/json', 'Authorization': `Bearer ${tok.token}` }, data: {}, validateStatus: () => true, timeout: 10000 });
            status = res.status;
        } catch (e) { status = 0; }
        const finding = status >= 200 && status < 300;
        const sev = finding ? 'CRITICAL' : 'INFO';
        console.log(`  ${finding ? '✗' : '✓'} ${ep.method} ${ep.path} [${tok.label}] → ${status} ${finding ? '← ACCEPTS FORGED TOKEN!' : ''}`);
        addResult({ endpoint: ep.path, method: ep.method, role: tok.label, status, expected_status: 401, finding, severity: sev, response_time_ms: Date.now() - t0, test_category: 'token_tampering', note: finding ? `Server accepted forged/unsigned JWT: ${tok.label}` : '' });
    }
}

// ── [5] CORS ──────────────────────────────────────────────────────────────────
console.log('\n[5] CORS Misconfiguration');
const EVIL_ORIGINS = ['https://evil.com', 'null', 'https://attacker.rewear.evil.com'];
for (const origin of EVIL_ORIGINS) {
    await delay(150);
    const t0 = Date.now();
    let acao = '', status = 0;
    try {
        const res = await axios({ method: 'POST', url: `${BASE_URL}/api/auth/login`, headers: { 'Origin': origin, 'Content-Type': 'application/json' }, data: { phone: 'test', otp: '0000' }, validateStatus: () => true, timeout: 10000 });
        status = res.status;
        acao = res.headers['access-control-allow-origin'] || '(none)';
    } catch (e) { status = 0; }
    const finding = acao === origin || acao === '*';
    const sev = finding ? 'HIGH' : 'INFO';
    console.log(`  ${finding ? '✗' : '✓'} CORS origin="${origin}" → ACAO: ${acao} ${finding ? '← REFLECTED/WILDCARD!' : ''}`);
    addResult({ endpoint: '/api/auth/login', method: 'POST', role: 'anonymous', status, expected_status: 0, finding, severity: sev, response_time_ms: Date.now() - t0, test_category: 'cors', note: acao === origin ? `Origin reflected — allows cross-origin reads from attacker domain` : acao === '*' ? 'Wildcard ACAO set' : `ACAO: ${acao}` });
}

// ── [6] Injection Probes ──────────────────────────────────────────────────────
console.log('\n[6] Injection Probes (SQLi/NoSQLi/XSS detection only)');
// Baseline
let baseline = 200;
try {
    const t0 = Date.now();
    await axios({ method: 'POST', url: `${BASE_URL}/api/auth/login`, data: { phone: '0000000000', otp: '1234' }, validateStatus: () => true, timeout: 10000 });
    baseline = Date.now() - t0;
} catch(e) {}
console.log(`  Baseline: ${baseline}ms`);

const INJ_PAYLOADS = [
    { label: "SQLi OR 1=1",         phone: "' OR 1=1 --",           otp: "0000" },
    { label: "SQLi OTP bypass",     phone: "1234567890",             otp: "' OR '1'='1" },
    { label: "SQLi UNION",          phone: "' UNION SELECT 1,2 --",  otp: "0000" },
    { label: "SQLi SLEEP(3)",       phone: "' OR SLEEP(3)--",        otp: "0000" },
    { label: "NoSQLi \$gt",        phone: { "$gt": "" },             otp: { "$gt": "" } },
    { label: "NoSQLi \$ne",        phone: { "$ne": null },           otp: { "$ne": null } },
    { label: "XSS script tag",      phone: "<script>alert(1)</script>", otp: "1234" },
    { label: "Empty body",          phone: "",                        otp: "" },
    { label: "Oversized input 5k",  phone: "A".repeat(5000),         otp: "0000" },
    { label: "Null byte",           phone: "test\x00admin",          otp: "0000" },
    { label: "Path traversal",      phone: "../../etc/passwd",       otp: "0000" },
];

for (const pl of INJ_PAYLOADS) {
    await delay(300);
    const t0 = Date.now();
    let status = 0, body = '';
    try {
        const res = await axios({ method: 'POST', url: `${BASE_URL}/api/auth/login`, data: { phone: pl.phone, otp: pl.otp }, validateStatus: () => true, timeout: 15000 });
        status = res.status;
        body = JSON.stringify(res.data).substring(0, 200);
    } catch (e) { status = 0; body = e.message; }
    const elapsed = Date.now() - t0;
    const timingAnomaly = elapsed > baseline + 2500;
    const xssReflected = body.includes('<script>') || body.includes('onerror');
    const serverCrash = status >= 500;
    const finding = serverCrash || timingAnomaly || xssReflected;
    const sev = serverCrash ? 'CRITICAL' : timingAnomaly ? 'HIGH' : xssReflected ? 'MEDIUM' : 'INFO';
    const flags = [serverCrash ? '500 CRASH' : '', timingAnomaly ? `SLOW(${elapsed}ms)` : '', xssReflected ? 'XSS REFLECTED' : ''].filter(Boolean).join(' ');
    console.log(`  ${finding ? '✗' : '✓'} ${pl.label} → ${status} ${elapsed}ms ${flags}`);
    addResult({ endpoint: '/api/auth/login', method: 'POST', role: 'anonymous', status, expected_status: 400, finding, severity: sev, response_time_ms: elapsed, test_category: 'injection', note: `${pl.label}: ${flags || 'no anomaly detected'}` });
}

// ── [7] Rate Limiting ─────────────────────────────────────────────────────────
console.log('\n[7] Rate Limiting — 30-request burst');
for (const ep of [{ method: 'POST', path: '/api/auth/send-otp', data: { phone: '9999999999' } },
                  { method: 'POST', path: '/api/auth/login',    data: { phone: '9999999999', otp: '0000' } }]) {
    const statuses = [];
    for (let i = 0; i < 30; i++) {
        try {
            const res = await axios({ method: ep.method, url: BASE_URL + ep.path, data: ep.data, validateStatus: () => true, timeout: 10000 });
            statuses.push(res.status);
        } catch(e) { statuses.push(0); }
    }
    const has429 = statuses.includes(429);
    const finding = !has429;
    const sev = finding ? 'MEDIUM' : 'INFO';
    const dist = statuses.reduce((a,s) => { a[s]=(a[s]||0)+1; return a; }, {});
    console.log(`  ${finding ? '⚠' : '✓'} ${ep.method} ${ep.path} | 30 reqs → ${JSON.stringify(dist)} | 429: ${has429} ${finding ? '← NO RATE LIMIT' : ''}`);
    addResult({ endpoint: ep.path, method: ep.method, role: 'anonymous', status: has429 ? 429 : 200, expected_status: 429, finding, severity: sev, response_time_ms: 0, test_category: 'rate_limiting', note: has429 ? 'Rate limit enforced' : `No rate limiting — all ${30} requests succeeded. Add express-rate-limit.` });
}

// ── [8] Hardcoded Credentials (Static Scan) ───────────────────────────────────
console.log('\n[8] Hardcoded Credentials — static codebase scan');
const ROOT = path.resolve(__dirname, '../../');
const PATTERNS = [
    { label: 'Hardcoded password',   re: /password\s*[:=]\s*["'][^"']{3,}/i },
    { label: 'Hardcoded secret',     re: /secret\s*[:=]\s*["'][^"']{3,}/i },
    { label: 'Hardcoded API key',    re: /api[_-]?key\s*[:=]\s*["'][^"']{6,}/i },
    { label: 'JWT secret literal',   re: /jwt[_-]?secret\s*[:=]\s*["'][^"']{3,}/i },
    { label: 'Bearer token literal', re: /Bearer\s+[A-Za-z0-9\-_.]{30,}/i },
    { label: 'PEM private key',      re: /-----BEGIN (RSA |EC )?PRIVATE KEY-----/ },
    { label: 'Razorpay key',         re: /rzp_(test|live)_[A-Za-z0-9]{14,}/i },
    { label: 'Stripe secret key',    re: /sk_(test|live)_[A-Za-z0-9]{24,}/i },
    { label: 'OTP hardcoded',        re: /\botp\s*[=:]\s*['"]?\d{4,6}['"]?/i },
    { label: 'DB connection string', re: /mysql:\/\/\S{6,}|mongodb\+srv:\/\/\S{6,}/i },
];
const INCLUDE_EXTS = ['.js', '.php', '.ts', '.jsx', '.tsx', '.env'];
const EXCLUDE = ['node_modules', '.git', 'dist', 'build', 'automated-test'];

function* walk(dir) {
    for (const e of fs.readdirSync(dir, { withFileTypes: true })) {
        if (EXCLUDE.some(x => e.name === x)) continue;
        const full = path.join(dir, e.name);
        if (e.isDirectory()) yield* walk(full);
        else if (INCLUDE_EXTS.includes(path.extname(e.name))) yield full;
    }
}

let scannedFiles = 0, staticFindings = 0;
for (const fp of walk(ROOT)) {
    scannedFiles++;
    const rel = path.relative(ROOT, fp);
    const lines = fs.readFileSync(fp, 'utf8').split('\n');
    lines.forEach((line, i) => {
        for (const p of PATTERNS) {
            if (p.re.test(line)) {
                staticFindings++;
                const snippet = line.trim().substring(0, 70);
                console.log(`  ✗ ${p.label} → ${rel}:${i+1} | ${snippet}`);
                addResult({ endpoint: rel, method: 'STATIC', role: 'n/a', status: 0, expected_status: 0, finding: true, severity: 'HIGH', response_time_ms: 0, test_category: 'hardcoded_creds', note: `${p.label} at line ${i+1} (value redacted)` });
            }
        }
    });
}
console.log(`  Scanned ${scannedFiles} files. ${staticFindings === 0 ? '✓ No hardcoded credentials found.' : `✗ ${staticFindings} finding(s).`}`);

// ── [9] HTTP Method Abuse + Security Headers ──────────────────────────────────
console.log('\n[9] HTTP Method Abuse & Missing Security Headers');
const METHOD_PROBES = [
    { method: 'GET',    path: '/api/auth/login',    shouldReject: true },
    { method: 'GET',    path: '/api/auth/send-otp', shouldReject: true },
    { method: 'DELETE', path: '/api/auth/login',    shouldReject: true },
    { method: 'PUT',    path: '/api/requests',      shouldReject: true },
    { method: 'TRACE',  path: '/api/auth/login',    shouldReject: true },
];
const SEC_HEADERS = ['x-content-type-options','x-frame-options','strict-transport-security','content-security-policy'];
let headerChecked = false;
for (const probe of METHOD_PROBES) {
    await delay(150);
    const t0 = Date.now();
    let status = 0, resHeaders = {};
    try {
        const res = await axios({ method: probe.method, url: BASE_URL + probe.path, data: {}, validateStatus: () => true, timeout: 10000 });
        status = res.status;
        resHeaders = res.headers;
    } catch(e) { status = 0; }
    const accepted = status >= 200 && status < 300;
    const finding = probe.shouldReject && accepted;
    const sev = finding ? 'MEDIUM' : 'INFO';
    console.log(`  ${finding ? '⚠' : '✓'} ${probe.method} ${probe.path} → ${status} ${finding ? '← SHOULD BE 405' : ''}`);
    addResult({ endpoint: probe.path, method: probe.method, role: 'anonymous', status, expected_status: probe.shouldReject ? 405 : 200, finding, severity: sev, response_time_ms: Date.now() - t0, test_category: 'http_method_abuse', note: finding ? `${probe.method} accepted — should return 405 Method Not Allowed` : '' });

    // Check security headers once
    if (!headerChecked && status > 0) {
        headerChecked = true;
        for (const h of SEC_HEADERS) {
            const missing = !resHeaders[h];
            if (missing) {
                console.log(`  ⚠ Missing security header: ${h}`);
                addResult({ endpoint: probe.path, method: probe.method, role: 'n/a', status, expected_status: 0, finding: true, severity: 'LOW', response_time_ms: 0, test_category: 'security_headers', note: `Missing HTTP security header: ${h}` });
            }
        }
    }
}

// ─────────────────────────────────────────────────────────────────────────────
// STEP 4 — WRITE REPORT
// ─────────────────────────────────────────────────────────────────────────────
const reportPath = path.join(__dirname, 'report.json');
fs.writeFileSync(reportPath, JSON.stringify(results, null, 2));

const findings = results.filter(r => r.finding);
const bySev = { CRITICAL: [], HIGH: [], MEDIUM: [], LOW: [], INFO: [] };
findings.forEach(r => { (bySev[r.severity] = bySev[r.severity] || []).push(r); });

console.log('\n' + '═'.repeat(60));
console.log('  DAST REPORT SUMMARY');
console.log('═'.repeat(60));
console.log(`  Endpoints discovered : ${ENDPOINTS.length}`);
console.log(`  Total tests run      : ${results.length}`);
console.log(`  Total findings       : ${findings.length}`);
console.log();
Object.entries(bySev).forEach(([s, arr]) => {
    if (arr.length) {
        const icon = s === 'CRITICAL' ? '✗' : s === 'HIGH' ? '⚠' : s === 'MEDIUM' ? '⚠' : '·';
        console.log(`  ${icon} ${s.padEnd(10)} : ${arr.length}`);
    }
});
console.log();
console.log('  Top Issues to Fix:');
['CRITICAL','HIGH','MEDIUM'].forEach(s => {
    (bySev[s]||[]).slice(0, 5).forEach(f => {
        console.log(`    [${s}] ${f.test_category} | ${f.method} ${f.endpoint} — ${f.note.substring(0,80)}`);
    });
});
console.log(`\n  Report written → automated-test/report.json\n`);
