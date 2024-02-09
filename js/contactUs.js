let contactForm = document.getElementById('contact_form');

let contactMale = document.getElementById('male');
let contactFemale = document.getElementById('female');
let contactName = document.getElementById('name1');
let contactInitial = document.getElementById('initial');
let contactMobile = document.getElementById('mobile1');
let contactEmail = document.getElementById('email1');
let contactText_box = document.getElementById('text_box');
let contactChckBox1 = document.getElementById('sub1');
let contactChckBox2 = document.getElementById('sub2');

contactForm.addEventListener('submit', function (e) {
    // console.log("called");
    if (!mobValidator(contactMobile.value)) {
        e.preventDefault();
        alert("Numéro de portable invalide");
        contactName.value = '';
        contactInitial.value = '';
        contactMobile.value = '';
        contactEmail.value = '';
        contactText_box.value = '';
        contactChckBox1.checked = false;
        contactChckBox2.checked = false;

        if (contactMale.checked == true)
            contactMale.checked = false;
        else
            contactFemale.checked = false;
    }

    setTimeout(() => {
        if (mobValidator(contactMobile.value)) {
            $("#myModal2").modal("hide");
            contactName.value = '';
            contactInitial.value = '';
            contactMobile.value = '';
            contactEmail.value = '';
            contactText_box.value = '';
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