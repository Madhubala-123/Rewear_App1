import { Builder, By, until } from 'selenium-webdriver';
import ExcelJS from 'exceljs';

(async function fullWebE2ETest() {
    let driver = await new Builder().forBrowser('chrome').build();
    
    // Initialize Excel Workbook
    const workbook = new ExcelJS.Workbook();
    const sheet = workbook.addWorksheet('Selenium Test Report');
    sheet.columns = [
        { header: 'Step', key: 'step', width: 40 },
        { header: 'Status', key: 'status', width: 15 },
        { header: 'Message', key: 'message', width: 50 },
        { header: 'Timestamp', key: 'timestamp', width: 25 },
    ];

    const logStep = (step, status, message = '') => {
        sheet.addRow({
            step,
            status,
            message,
            timestamp: new Date().toISOString()
        });
        console.log(`[${status}] ${step} ${message ? '- ' + message : ''}`);
    };

    try {
        logStep("Test Initialization", "PASS");

        // ==========================================
        // FLOW 1: Customer Login & Dashboard
        // ==========================================
        logStep("Starting Customer Flow", "INFO");
        await driver.get('http://localhost:5173/');
        logStep("Navigated to Splash Screen", "PASS");

        let startBtn = await driver.wait(until.elementLocated(By.className('start-btn')), 5000);
        await startBtn.click();
        
        let continueBtn = await driver.wait(until.elementLocated(By.className('continue-btn')), 5000);
        await continueBtn.click();
        
        let cards = await driver.wait(until.elementsLocated(By.className('card')), 5000);
        await cards[0].click(); // Customer Card
        
        let inputs = await driver.wait(until.elementsLocated(By.css('input')), 5000);
        await inputs[0].sendKeys('1234567890');
        
        let otpBtn = await driver.findElement(By.className('otp-btn'));
        await otpBtn.click();
        await driver.sleep(1000);
        
        let demoOtpElement = await driver.findElement(By.className('demo'));
        let demoOtp = (await demoOtpElement.getText()).replace('Demo OTP: ', '').trim();
        
        await inputs[1].sendKeys(demoOtp);
        await driver.findElement(By.className('login-btn')).click();

        await driver.wait(until.urlContains('/customer/dashboard'), 5000);
        logStep("Reached Customer Dashboard", "PASS");

        let requestPickupBtn = await driver.wait(until.elementLocated(By.className('request-pickup-btn')), 5000);
        await requestPickupBtn.click();
        
        let requestSubmitBtn = await driver.wait(until.elementLocated(By.className('submit-request-btn')), 5000);
        await requestSubmitBtn.click();
        
        // Accept the JS alert
        await driver.wait(until.alertIsPresent(), 5000);
        let alert = await driver.switchTo().alert();
        await alert.accept();

        logStep("Requested a Pickup", "PASS");

        // ==========================================
        // FLOW 2: Pickup Agent Login & Dashboard
        // ==========================================
        logStep("Starting Pickup Agent Flow", "INFO");
        await driver.get('http://localhost:5173/select-role');
        
        cards = await driver.wait(until.elementsLocated(By.className('card')), 5000);
        await cards[1].click(); // Agent Card
        
        inputs = await driver.wait(until.elementsLocated(By.css('input')), 5000);
        await inputs[0].sendKeys('0987654321');
        
        otpBtn = await driver.findElement(By.className('otp-btn'));
        await otpBtn.click();
        await driver.sleep(1000);
        
        demoOtpElement = await driver.findElement(By.className('demo'));
        demoOtp = (await demoOtpElement.getText()).replace('Demo OTP: ', '').trim();
        
        await inputs[1].sendKeys(demoOtp);
        await driver.findElement(By.className('login-btn')).click();

        await driver.wait(until.urlContains('/agent/dashboard'), 5000);
        logStep("Reached Agent Dashboard", "PASS");

        let acceptPickupBtn = await driver.wait(until.elementLocated(By.className('accept-pickup-btn')), 5000);
        await acceptPickupBtn.click();

        // Accept the JS alert
        await driver.wait(until.alertIsPresent(), 5000);
        alert = await driver.switchTo().alert();
        await alert.accept();

        logStep("Accepted a Pickup", "PASS");

        // ==========================================
        // FLOW 3: Vendor Login & Dashboard
        // ==========================================
        logStep("Starting Vendor Flow", "INFO");
        await driver.get('http://localhost:5173/select-role');
        
        cards = await driver.wait(until.elementsLocated(By.className('card')), 5000);
        await cards[2].click(); // Vendor Card
        
        inputs = await driver.wait(until.elementsLocated(By.css('input')), 5000);
        await inputs[0].sendKeys('1122334455');
        
        otpBtn = await driver.findElement(By.className('otp-btn'));
        await otpBtn.click();
        await driver.sleep(1000);
        
        demoOtpElement = await driver.findElement(By.className('demo'));
        demoOtp = (await demoOtpElement.getText()).replace('Demo OTP: ', '').trim();
        
        await inputs[1].sendKeys(demoOtp);
        await driver.findElement(By.className('login-btn')).click();

        await driver.wait(until.urlContains('/vendor/dashboard'), 5000);
        logStep("Reached Vendor Dashboard", "PASS");

        let viewStockBtn = await driver.wait(until.elementLocated(By.className('view-stock-btn')), 5000);
        await viewStockBtn.click();
        logStep("Viewed Vendor Stock", "PASS");

        logStep("All E2E Flows Completed", "PASS");

    } catch (err) {
        logStep("Test Failed", "FAIL", err.message);
        console.error("\n❌ E2E Test Failed:\n", err.message);
    } finally {
        await driver.quit();
        logStep("Browser closed", "INFO");

        // Save Excel Report
        const filePath = 'Selenium_E2E_Report.xlsx';
        await workbook.xlsx.writeFile(filePath);
        console.log(`\n📊 Excel Report generated at: ${filePath}`);
    }
})();
