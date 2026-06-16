const { remote } = require('webdriverio');

const capabilities = {
    platformName: 'Android',
    'appium:automationName': 'UiAutomator2',
    'appium:deviceName': 'Android Emulator', // Change to your device name
    browserName: 'Chrome', // We are testing the web app inside the mobile browser
};

const wdOpts = {
    hostname: '127.0.0.1',
    port: 4723, // Default Appium server port
    logLevel: 'info',
    capabilities,
};

async function runFullAppiumE2E() {
    let driver;
    try {
        console.log("Connecting to Appium Server...");
        driver = await remote(wdOpts);
        console.log("Connected Successfully. Starting E2E Test...");

        // Note: For Android emulators connecting to localhost of the host machine,
        // use 10.0.2.2 instead of localhost.
        const baseUrl = 'http://10.0.2.2:5173';

        // ==========================================
        // FLOW 1: Customer Login & Dashboard
        // ==========================================
        console.log("\n--- Starting Customer Flow ---");
        await driver.url(baseUrl + '/');
        console.log("Navigated to Splash Screen.");

        let startBtn = await driver.$('.start-btn');
        await startBtn.waitForDisplayed({ timeout: 5000 });
        await startBtn.click();
        
        let continueBtn = await driver.$('.continue-btn');
        await continueBtn.waitForDisplayed({ timeout: 5000 });
        await continueBtn.click();
        
        let cards = await driver.$$('.card');
        await cards[0].waitForDisplayed({ timeout: 5000 });
        await cards[0].click(); // Customer Card
        
        let inputs = await driver.$$('input');
        await inputs[0].waitForDisplayed({ timeout: 5000 });
        await inputs[0].setValue('1234567890');
        
        let otpBtn = await driver.$('.otp-btn');
        await otpBtn.click();
        await driver.pause(1500); // Wait for mock backend OTP
        
        let demoOtpElement = await driver.$('.demo');
        let demoText = await demoOtpElement.getText();
        let demoOtp = demoText.replace('Demo OTP: ', '').trim();
        
        await inputs[1].setValue(demoOtp);
        
        let loginBtn = await driver.$('.login-btn');
        await loginBtn.click();

        // Wait for dashboard
        await driver.waitUntil(
            async () => (await driver.getUrl()).includes('/customer/dashboard'),
            { timeout: 5000, timeoutMsg: 'Expected to reach Customer Dashboard' }
        );
        console.log("✅ Reached Customer Dashboard.");

        // Simulate creating a pickup request
        let requestPickupBtn = await driver.$('.request-pickup-btn');
        await requestPickupBtn.waitForDisplayed({ timeout: 5000 });
        await requestPickupBtn.click();
        
        let requestSubmitBtn = await driver.$('.submit-request-btn');
        await requestSubmitBtn.waitForDisplayed({ timeout: 5000 });
        await requestSubmitBtn.click();
        
        // Handle JS alert
        try {
            await driver.acceptAlert();
        } catch (e) {
            // ignore if no alert
        }
        
        console.log("✅ Requested a Pickup.");

        // ==========================================
        // FLOW 2: Pickup Agent Login & Dashboard
        // ==========================================
        console.log("\n--- Starting Pickup Agent Flow ---");
        await driver.url(baseUrl + '/select-role');
        
        cards = await driver.$$('.card');
        await cards[1].waitForDisplayed({ timeout: 5000 });
        await cards[1].click(); // Agent Card
        
        inputs = await driver.$$('input');
        await inputs[0].waitForDisplayed({ timeout: 5000 });
        await inputs[0].setValue('0987654321');
        
        otpBtn = await driver.$('.otp-btn');
        await otpBtn.click();
        await driver.pause(1500);
        
        demoOtpElement = await driver.$('.demo');
        demoText = await demoOtpElement.getText();
        demoOtp = demoText.replace('Demo OTP: ', '').trim();
        
        await inputs[1].setValue(demoOtp);
        
        loginBtn = await driver.$('.login-btn');
        await loginBtn.click();

        // Will fail here if /agent/dashboard is not migrated yet
        await driver.waitUntil(
            async () => (await driver.getUrl()).includes('/agent/dashboard'),
            { timeout: 5000, timeoutMsg: 'Expected to reach Agent Dashboard' }
        );
        console.log("✅ Reached Agent Dashboard.");

        let acceptPickupBtn = await driver.$('.accept-pickup-btn');
        await acceptPickupBtn.waitForDisplayed({ timeout: 5000 });
        await acceptPickupBtn.click();
        
        // Handle JS alert
        try {
            await driver.acceptAlert();
        } catch (e) {
            // ignore if no alert
        }
        
        console.log("✅ Accepted a Pickup.");

        // ==========================================
        // FLOW 3: Vendor Login & Dashboard
        // ==========================================
        console.log("\n--- Starting Vendor Flow ---");
        await driver.url(baseUrl + '/select-role');
        
        cards = await driver.$$('.card');
        await cards[2].waitForDisplayed({ timeout: 5000 });
        await cards[2].click(); // Vendor Card
        
        inputs = await driver.$$('input');
        await inputs[0].waitForDisplayed({ timeout: 5000 });
        await inputs[0].setValue('1122334455');
        
        otpBtn = await driver.$('.otp-btn');
        await otpBtn.click();
        await driver.pause(1500);
        
        demoOtpElement = await driver.$('.demo');
        demoText = await demoOtpElement.getText();
        demoOtp = demoText.replace('Demo OTP: ', '').trim();
        
        await inputs[1].setValue(demoOtp);
        
        loginBtn = await driver.$('.login-btn');
        await loginBtn.click();

        // Will fail here if /vendor/dashboard is not migrated yet
        await driver.waitUntil(
            async () => (await driver.getUrl()).includes('/vendor/dashboard'),
            { timeout: 5000, timeoutMsg: 'Expected to reach Vendor Dashboard' }
        );
        console.log("✅ Reached Vendor Dashboard.");

        let viewStockBtn = await driver.$('.view-stock-btn');
        await viewStockBtn.waitForDisplayed({ timeout: 5000 });
        await viewStockBtn.click();
        console.log("✅ Viewed Vendor Stock.");

        console.log("\n🎉 All Appium E2E Flows Completed Successfully!");

    } catch (err) {
        console.error("\n❌ E2E Test Failed:\n", err.message);
    } finally {
        if (driver) {
            await driver.deleteSession();
            console.log("Appium Session closed.");
        }
    }
}

runFullAppiumE2E();
