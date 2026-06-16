/**
 * dast_runner.js — ReWear_Web DAST main runner
 * Usage: node dast_runner.js
 * Reads config from input_dast.json, runs all test modules, writes report.json
 */
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));

// ── Load config ──────────────────────────────────────────────────────────────
const configPath = path.join(__dirname, 'input_dast.json');
if (!fs.existsSync(configPath)) {
    console.error('❌ input_dast.json not found. Copy input_dast.example.json and fill in your values.');
    process.exit(1);
}
const config = JSON.parse(fs.readFileSync(configPath, 'utf8'));
const BASE_URL = config.baseUrl;
if (!BASE_URL) { console.error('❌ baseUrl missing in input_dast.json'); process.exit(1); }

console.log(`\n🔍 DAST target: ${BASE_URL}\n${'─'.repeat(55)}`);

// ── Shared results store ──────────────────────────────────────────────────────
export const results = [];
export function addResult(r) { results.push({ ...r, timestamp: new Date().toISOString() }); }
export { BASE_URL, config };

// ── Import & run each module ──────────────────────────────────────────────────
import './test_authn.js';
import './test_authz.js';
import './test_injection.js';
import './test_ratelimit.js';
import './test_hardcoded.js';
import './test_cors.js';
import './test_methods.js';

// Wait for all async modules then write report
setTimeout(() => {
    const reportPath = path.join(__dirname, 'report.json');
    fs.writeFileSync(reportPath, JSON.stringify(results, null, 2));

    // ── Summary ──────────────────────────────────────────────────────────────
    const findings = results.filter(r => r.finding);
    const bySeverity = { CRITICAL: [], HIGH: [], MEDIUM: [], LOW: [], INFO: [] };
    findings.forEach(r => (bySeverity[r.severity] || (bySeverity['INFO'] = bySeverity['INFO'] || [])).push(r));

    console.log(`\n${'═'.repeat(55)}`);
    console.log(`📋 DAST SUMMARY`);
    console.log(`${'═'.repeat(55)}`);
    console.log(`  Endpoints tested : ${[...new Set(results.map(r => r.endpoint))].length}`);
    console.log(`  Total tests run  : ${results.length}`);
    console.log(`  Findings         : ${findings.length}`);
    Object.entries(bySeverity).forEach(([sev, arr]) => {
        if (arr.length) console.log(`    ${sev.padEnd(10)}: ${arr.length}`);
    });
    console.log(`\n  Report written to: automated-test/report.json\n`);

    findings.slice(0, 10).forEach(f => {
        const icon = f.severity === 'CRITICAL' ? '✗' : f.severity === 'HIGH' ? '⚠' : '·';
        console.log(`  ${icon} [${f.severity}] ${f.test_category} — ${f.method} ${f.endpoint} — ${f.note}`);
    });
    console.log();
}, 12000);
