document.addEventListener("DOMContentLoaded", function() {
    let contactForm = document.getElementById('make_Appoinment');

    let contactMale = document.getElementById('male');
    let contactFemale = document.getElementById('female');
    let contactName = document.getElementById('name1');
    let contactInitial = document.getElementById('initial');
    let contactMobile = document.getElementById('mobile1');
    let contactEmail = document.getElementById('email1');
    let contactText_box = document.getElementById('text_box');
    let contactChckBox1 = document.getElementById('sub1');
    let contactChckBox2 = document.getElementById('sub2');
    let userCaptchaInput = document.getElementById('userCaptchaInput');
    let currentCaptcha = document.getElementById('captcha')?.innerHTML;

    if (!contactForm) {
        console.error("Form element not found!");
        return;
    }

    contactForm.addEventListener('submit', function (e) {
        currentCaptcha = document.getElementById('captcha').innerHTML;

        if (currentCaptcha !== userCaptchaInput.value) {
            const messageElement = document.getElementById('message');
            messageElement.innerText = 'Invalid CAPTCHA. Please try again.';
            messageElement.style.color = 'red';
            e.preventDefault();
        } else {
            const messageElement = document.getElementById('message');
            messageElement.innerText = '';

            if (!mobValidator(contactMobile.value)) {
                e.preventDefault();
                alert("Numéro de portable invalide");
            } else {
                // Form will be submitted if both validations pass
            }
        }
    });

    function mobValidator(value) {
        let validRegex = /^[0-9]{10}$/;
        return validRegex.test(value);
    }

    function resetFormFields() {
        contactName.value = '';
        contactInitial.value = '';
        contactMobile.value = '';
        contactEmail.value = '';
        contactText_box.value = '';
        userCaptchaInput.value = '';
        if (contactChckBox1) contactChckBox1.checked = false;
        if (contactChckBox2) contactChckBox2.checked = false;

        if (contactMale.checked) contactMale.checked = false;
        if (contactFemale.checked) contactFemale.checked = false;
    }
});