// let form1 = document.getElementById('appointment2Form');

// let male = document.getElementById('male');
// let female = document.getElementById('female');
// let name1 = document.getElementById('name1');
// let initial = document.getElementById('initial');
// let mobile = document.getElementById('mobile1');
// let email = document.getElementById('email1');
// let text_box = document.getElementById('text_box');
// let chckBox = document.getElementById('sub');

// form1.addEventListener('submit', function (e) {
//     console.log("called");
//     if (!mobValidator(mobile.value)) {
//         e.preventDefault();
//         alert("Numéro de portable invalide");
//     }

//     setTimeout(() => {
//         if (mobValidator(mobile.value)) {
//             $("#myModal2").modal("hide");
//             name1.value = '';
//             initial.value = '';
//             mobile.value = '';
//             email.value = '';
//             text_box.value = '';
//             chckBox.checked = false

//             if (male.checked == true)
//                 male.checked = false;
//             else
//                 female.checked = false;
//         }

//     }, 3000);
//     let gender = document.getElementsByName('civility');
//     sessionStorage.setItem('gender',gender[0].checked ? gender[0].value : gender[1].value);
//     sessionStorage.setItem('name',name1.value);
//     sessionStorage.setItem('initial',initial.value);
//     sessionStorage.setItem('mobile',mobile.value);
//     sessionStorage.setItem('email',email.value);
//     sessionStorage.setItem('text_box',text_box.value);

// });
// function mobValidator(value) {
//     let validRegex = /^[0-9]{10}$/;
//     return String(value).match(validRegex);
// }