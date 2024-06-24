let contactForm = document.getElementById('contact_form');

let contactMale = document.getElementById('male');
let contactFemale = document.getElementById('female');
let contactName = document.getElementById('name');
let contactInitial = document.getElementById('initial');
let contactMobile = document.getElementById('mobiles');
let contactEmail = document.getElementById('email');
let contactText_box = document.getElementById('text_box');
let contactChckBox1 = document.getElementById('sub1');
let contactChckBox2 = document.getElementById('sub2');
let userCaptchaInput = document.getElementById('userCaptchaInput');
let currentCaptcha = document.getElementById('captcha').innerHTML;

console.log("currentCaptcha===>", currentCaptcha);
contactForm.addEventListener('submit', function (e) {
    // console.log("called");
    currentCaptcha = document.getElementById('captcha').innerHTML;
    console.log("currentCaptcha====>", currentCaptcha);

    if (currentCaptcha != userCaptchaInput.value) {
        const messageElement = document.getElementById('message');
        messageElement.innerText = 'Invalid CAPTCHA. Please try again.';
        messageElement.style.color = 'red';
        e.preventDefault();
    }
    // console.log("contactName===>", contactName.value);
    // console.log("contactInitial===>", contactInitial.value);
    // console.log("contactMobile===>", contactMobile.value);
    // console.log("contactEmail===>", contactEmail.value);
    console.log("userCaptchaInput===>", userCaptchaInput.value);
    if (!mobValidator(contactMobile.value)) {
        e.preventDefault();
        alert("Numéro de portable invalide www");
        // contactName.value = '';
        // contactInitial.value = '';
        // contactMobile.value = '';
        // contactEmail.value = '';
        // contactText_box.value = '';
        // contactChckBox1.checked = false;
        // contactChckBox2.checked = false;

        // if (contactMale.checked == true)
        //     contactMale.checked = false;
        // else
        //     contactFemale.checked = false;
    }

    setTimeout(() => {
        if (mobValidator(contactMobile.value) && currentCaptcha === userCaptchaInput.value) {
              window.location.href = "thankyou.html";
            $("#myModal2").modal("hide");
            contactName.value = '';
            contactInitial.value = '';
            contactMobile.value = '';
            contactEmail.value = '';
            contactText_box.value = '';
            userCaptchaInput.value = '';
            contactChckBox1.checked = false;
            contactChckBox2.checked = false;

            if (contactMale.checked == true)
                contactMale.checked = false;
            else
                contactFemale.checked = false;
        }
      

    }, 3000);
});
function mobValidator(value) {
    let validRegex = /^[0-9]{10}$/;
    return String(value).match(validRegex);
}