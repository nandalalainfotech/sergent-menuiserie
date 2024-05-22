// Generate a random CAPTCHA code
function generateCaptcha() {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let captcha = '';
    for (let i = 0; i < 6; i++) {
        captcha += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return captcha;
}

// Display CAPTCHA code
const captchaCode = generateCaptcha();
document.getElementById('captcha').innerText = captchaCode;

// Validate CAPTCHA input
function validateCaptcha() {
    const userInput = document.getElementById('userInput').value;
    const messageElement = document.getElementById('message');
    
    if (userInput === captchaCode) {
        messageElement.innerText = 'CAPTCHA validated successfully!';
        messageElement.style.color = 'green';
    } else {
        messageElement.innerText = 'Invalid CAPTCHA. Please try again.';
        messageElement.style.color = 'red';
    }
}