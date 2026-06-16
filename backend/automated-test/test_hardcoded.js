/**
 * test_hardcoded.js — Static codebase scan for hardcoded secrets & credentials
 * Scans JS, PHP, JSON files (excluding node_modules) for patterns.
 */
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';
import { addResult } from './dast_runner.js';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const ROOT = path.resolve(__dirname, '../../');

const PATTERNS = [
    { label: 'Hardcoded password',    re: /password\s*[:=]\s*["'][^"']{3,}/i },
    { label: 'Hardcoded secret',      re: /secret\s*[:=]\s*["'][^"']{3,}/i },
    { label: 'Hardcoded API key',     re: /api[_-]?key\s*[:=]\s*["'][^"']{6,}/i },
    { label: 'JWT secret in code',    re: /jwt[_-]?secret\s*[:=]\s*["'][^"']{3,}/i },
    { label: 'Bearer token literal',  re: /Bearer\s+[A-Za-z0-9\-_.]{20,}/i },
    { label: 'Private key PEM block', re: /-----BEGIN (RSA |EC )?PRIVATE KEY-----/ },
    { label: 'DB connection string',  re: /mysql:\/\/[^"'\s]{6,}|mongodb\+srv:\/\/[^"'\s]{6,}/i },
    { label: 'Razorpay key',          re: /rzp_(test|live)_[A-Za-z0-9]{14,}/i },
    { label: 'Google API key',        re: /AIza[0-9A-Za-z\-_]{35}/i },
    { label: 'Stripe key',            re: /sk_(test|live)_[A-Za-z0-9]{24,}/i },
    { label: 'Hardcoded OTP/pin',     re: /otp\s*[:=]\s*['"]?\d{4,6}['"]?/i },
];

const INCLUDE_EXTS = ['.js', '.php', '.json', '.env', '.ts', '.jsx', '.tsx'];
const EXCLUDE_DIRS = ['node_modules', '.git', 'dist', 'build'];

function* walkFiles(dir) {
    for (const entry of fs.readdirSync(dir, { withFileTypes: true })) {
        if (EXCLUDE_DIRS.includes(entry.name)) continue;
        const full = path.join(dir, entry.name);
        if (entry.isDirectory()) yield* walkFiles(full);
        else if (INCLUDE_EXTS.includes(path.extname(entry.name))) yield full;
    }
}

console.log('\n[8] Hardcoded Credential Scan');
let fileCount = 0, findingCount = 0;
for (const filePath of walkFiles(ROOT)) {
    fileCount++;
    const rel = path.relative(ROOT, filePath);
    const lines = fs.readFileSync(filePath, 'utf8').split('\n');
    lines.forEach((line, i) => {
        for (const p of PATTERNS) {
            if (p.re.test(line)) {
                findingCount++;
                // Redact the matched value before logging
                const redacted = line.replace(p.re, (m) => m.substring(0, 8) + '***REDACTED***');
                console.log(`  ✗ ${p.label} in ${rel}:${i + 1} → ${redacted.trim().substring(0, 80)}`);
                addResult({ endpoint: rel, method: 'STATIC', role: 'n/a', status: 0, expected_status: 0, finding: true, severity: 'HIGH', response_time_ms: 0, test_category: 'hardcoded_creds', note: `${p.label} at line ${i + 1} — value redacted` });
            }
        }
    });
}
if (findingCount === 0) console.log(`  ✓ No hardcoded credentials found in ${fileCount} files scanned.`);
