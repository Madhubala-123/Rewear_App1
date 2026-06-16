/**
 * test_injection.js — SQLi / NoSQLi / XSS detection probes
 * Detection only: flags anomalous status codes, error messages, and timing deltas.
 * Does NOT extract or dump data.
 */
import axios from 'axios';
import { BASE_URL, addResult } from './dast_runner.js';

const delay = ms => new Promise(r => setTimeout(r, ms));

const PAYLOADS = [
    // SQLi classic
    { label: "SQLi OR 1=1",        phone: "' OR 1=1 --",          otp: "0000" },
    { label: "SQLi OTP bypass",    phone: "1234567890",            otp: "' OR '1'='1" },
    { label: "SQLi UNION",         phone: "' UNION SELECT 1,2 --", otp: "0000" },
    { label: "SQLi time-based",    phone: "'; WAITFOR DELAY '0:0:3'--", otp: "0000" },
    { label: "SQLi sleep MySQL",   phone: "' OR SLEEP(3)--",       otp: "0000" },
    // NoSQLi
    { label: "NoSQLi $gt",         phone: { "$gt": "" },           otp: { "$gt": "" } },
    { label: "NoSQLi $ne",         phone: { "$ne": null },         otp: { "$ne": null } },
    // XSS in API param (reflected in JSON response = finding)
    { label: "XSS script tag",     phone: "<script>alert(1)</script>", otp: "1234" },
    { label: "XSS img onerror",    phone: "<img src=x onerror=alert(1)>", otp: "1234" },
    // Null / boundary
    { label: "Empty body",         phone: "",                      otp: "" },
    { label: "Very long input",    phone: "A".repeat(5000),        otp: "0000" },
    { label: "Null bytes",         phone: "test\x00user",          otp: "0000" },
];

const SEND_OTP_PAYLOADS = [
    { label: "SQLi phone param",   phone: "' OR 1=1 --" },
    { label: "NoSQLi phone $gt",   phone: { "$gt": "" } },
    { label: "Empty phone",        phone: "" },
    { label: "Null phone",         phone: null },
    { label: "XSS phone",         phone: "<script>x</script>" },
];

// Baseline timing for /api/auth/login
async function getBaseline() {
    const t0 = Date.now();
    try { await axios({ method: 'POST', url: `${BASE_URL}/api/auth/login`, data: { phone: '0000000000', otp: '1234' }, validateStatus: () => true, timeout: 15000 }); }
    catch(e) {}
    return Date.now() - t0;
}

const TIMING_THRESHOLD_MS = 2500; // flag if > 2.5s above baseline

(async () => {
    console.log('\n[6] Injection Probe Tests');
    const baseline = await getBaseline();
    console.log(`  Baseline response time: ${baseline}ms`);

    // /api/auth/login probes
    for (const pl of PAYLOADS) {
        await delay(300);
        const t0 = Date.now();
        let status = 0, body = '', timingAnomaly = false;
        try {
            const res = await axios({ method: 'POST', url: `${BASE_URL}/api/auth/login`, data: { phone: pl.phone, otp: pl.otp }, validateStatus: () => true, timeout: 15000 });
            status = res.status;
            body = JSON.stringify(res.data).substring(0, 200);
        } catch (e) { status = 0; body = e.message; }
        const elapsed = Date.now() - t0;
        timingAnomaly = elapsed > baseline + TIMING_THRESHOLD_MS;

        // Findings: 500 = server crashed, timing anomaly = blind injection, XSS reflected
        const xssReflected = body.includes('<script>') || body.includes('onerror');
        const finding = status >= 500 || timingAnomaly || xssReflected;
        const severity = status >= 500 ? 'CRITICAL' : timingAnomaly ? 'HIGH' : xssReflected ? 'MEDIUM' : 'INFO';
        const icon = finding ? '✗' : '✓';
        const note = [
            status >= 500 ? 'Server error — possible injection crash' : '',
            timingAnomaly ? `Timing anomaly: ${elapsed}ms vs baseline ${baseline}ms` : '',
            xssReflected ? 'XSS payload reflected in response' : '',
        ].filter(Boolean).join('; ') || `Status ${status}, ${elapsed}ms`;
        console.log(`  ${icon} Inject | POST /api/auth/login | ${pl.label} → ${status} ${timingAnomaly ? '⏱️ SLOW' : ''}`);
        addResult({ endpoint: '/api/auth/login', method: 'POST', role: 'anonymous', status, expected_status: 400, finding, severity, response_time_ms: elapsed, test_category: 'injection', note: `${pl.label}: ${note}` });
    }

    // /api/auth/send-otp probes
    for (const pl of SEND_OTP_PAYLOADS) {
        await delay(250);
        const t0 = Date.now();
        let status = 0, body = '';
        try {
            const res = await axios({ method: 'POST', url: `${BASE_URL}/api/auth/send-otp`, data: { phone: pl.phone }, validateStatus: () => true, timeout: 15000 });
            status = res.status;
            body = JSON.stringify(res.data).substring(0, 200);
        } catch (e) { status = 0; body = e.message; }
        const elapsed = Date.now() - t0;
        const xssReflected = body.includes('<script>');
        const finding = status >= 500 || xssReflected;
        const severity = status >= 500 ? 'CRITICAL' : xssReflected ? 'MEDIUM' : 'INFO';
        const icon = finding ? '✗' : '✓';
        console.log(`  ${icon} Inject | POST /api/auth/send-otp | ${pl.label} → ${status}`);
        addResult({ endpoint: '/api/auth/send-otp', method: 'POST', role: 'anonymous', status, expected_status: 400, finding, severity, response_time_ms: elapsed, test_category: 'injection', note: `${pl.label}: status ${status}${xssReflected ? ', XSS reflected' : ''}` });
    }
})();
