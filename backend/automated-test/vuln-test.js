import fs from 'fs';
import axios from 'axios';
import ExcelJS from 'exceljs';

const inputFilePath = './automated-test/input.json';
const BASE_URL = 'http://localhost:5000';

async function runVulnerabilityTests() {
    console.log("Starting Backend Vulnerability Tests...");

    // 1. Read input.json
    let payloads = [];
    try {
        const data = fs.readFileSync(inputFilePath, 'utf8');
        payloads = JSON.parse(data);
    } catch (err) {
        console.error("Failed to read input.json:", err.message);
        return;
    }

    // 2. Initialize Excel Report
    const workbook = new ExcelJS.Workbook();
    const sheet = workbook.addWorksheet('Vulnerability Report');
    sheet.columns = [
        { header: 'Test Type', key: 'testType', width: 40 },
        { header: 'Endpoint', key: 'endpoint', width: 25 },
        { header: 'Method', key: 'method', width: 10 },
        { header: 'HTTP Status', key: 'status', width: 15 },
        { header: 'Vulnerability Detected?', key: 'isVulnerable', width: 25 },
        { header: 'Response Summary', key: 'response', width: 50 },
    ];

    // 3. Execute Tests
    for (const test of payloads) {
        console.log(`Testing: ${test.testType} on ${test.endpoint}`);
        let statusCode = 'N/A';
        let responseData = '';
        let isVulnerable = 'Unknown';

        try {
            const res = await axios({
                method: test.method,
                url: `${BASE_URL}${test.endpoint}`,
                data: test.payload,
                validateStatus: () => true // Don't throw on 4xx/5xx errors
            });

            statusCode = res.status;
            responseData = JSON.stringify(res.data).substring(0, 100); // Truncate long responses

            // Basic Vulnerability Logic
            // A 500 status code often means the backend crashed (e.g. unhandled SQL syntax error) -> Vulnerable
            // A 200 status on an SQLi payload without rejecting it -> Potentially Vulnerable
            if (statusCode >= 500) {
                isVulnerable = 'Yes (Server Crashed/Error)';
            } else if (statusCode === 200 && test.method !== 'GET') {
                 // For auth routes, a 200 on an invalid payload usually implies auth bypass
                isVulnerable = 'Yes (Bypass/Accepted)';
            } else {
                isVulnerable = 'No (Rejected Gracefully)';
            }

        } catch (error) {
            statusCode = 'ERROR';
            responseData = error.message;
            isVulnerable = 'Error executing test';
        }

        // Add row to Excel
        sheet.addRow({
            testType: test.testType,
            endpoint: test.endpoint,
            method: test.method,
            status: statusCode,
            isVulnerable: isVulnerable,
            response: responseData
        });
    }

    // 4. Save Excel Report
    const reportPath = 'Backend_Vuln_Report.xlsx';
    await workbook.xlsx.writeFile(reportPath);
    console.log(`\n✅ Vulnerability tests complete! Report saved to: backend/automated-test/${reportPath}`);
}

runVulnerabilityTests();
