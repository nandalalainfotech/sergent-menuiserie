// function getValues() {
//     console.log("hai");
// }
let form1 = document.getElementById('form_modal');

let male = document.getElementById('male');
let female = document.getElementById('female');
let name1 = document.getElementById('name1');
let initial = document.getElementById('initial');
let mobile = document.getElementById('mobile1');
let email = document.getElementById('email1');
let text_box = document.getElementById('text_box');
let chckBox = document.getElementById('sub');

form1.addEventListener('submit', function (e) {

    if (!mobValidator(mobile.value)) {
        e.preventDefault();
        alert("Numéro de portable invalide");
    }

    setTimeout(() => {
        if (mobValidator(mobile.value)) {
            $("#myModal2").modal("hide");
            name1.value = '';
            initial.value = '';
            mobile.value = '';
            email.value = '';
            text_box.value = '';
            chckBox.checked = false

            if (male.checked == true)
                male.checked = false;
            else
                female.checked = false;
        }

    }, 3000);
});
function mobValidator(value) {
    let validRegex = /^[0-9]{10}$/;
    return String(value).match(validRegex);
}