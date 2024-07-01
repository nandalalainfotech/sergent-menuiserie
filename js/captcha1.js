
function generateCaptcha() {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let captcha = '';
    for (let i = 0; i < 6; i++) {
        captcha += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    sessionStorage.setItem('captcha', captcha);
    return captcha;
}

// Function to display the CAPTCHA code
function displayCaptcha() {
    const captchaCode = generateCaptcha();
    document.getElementById('captcha').innerText = captchaCode;
    console.log("Generated CAPTCHA:", captchaCode);
}

// Function to refresh the CAPTCHA code
function refreshCaptcha() {
    displayCaptcha();
    document.getElementById('message').innerText = '';
    document.getElementById('userCaptchaInput').value = '';
    reset();
}

// Function to validate the CAPTCHA input by the user
function validateCaptcha() {
    const userInput = document.getElementById('userCaptchaInput').value;
    const storedCaptcha = sessionStorage.getItem('captcha');
    const messageElement = document.getElementById('message');

    if (userInput === storedCaptcha) {
        messageElement.innerText = "";
        return true;
    } else {
        messageElement.innerText = "CAPTCHA incorrect. Veuillez réessayer.";
        return false;
    }
}

// Ensure the script runs after the DOM is fully loaded
document.addEventListener('DOMContentLoaded', (event) => {
    displayCaptcha();
    displayCaptcha1();
});
