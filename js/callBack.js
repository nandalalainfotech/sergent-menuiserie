// function reDirect(){
//     let fname = document.getElementById("fname");
//     let lname = document.getElementById("lname");
//     let mobile = document.getElementById("mobile");
//     let location = document.getElementById("location");
//     console.log("fname==>",fname.value);
//     if(fname.value.trim() == '' || lname.value.trim() == '' 
//        || mobile.value.trim() == '' || location.value.trim() == ''){
//             alert('Veuillez remplir tous les détails');
//        }
//     else {
//         location.href = 'https://sergentmenuiserie.com/thankyou.html';
//         $.ajax({
//             method: "POST",
//             url: 'mail.php',
//             data: { 
//                     textOne: fname,
//                     textTwo: lname,
//                     textThree: mobile,
//                     textFour: location,
//                   },
//           }).done(function (response) {
//             $("p.broken").html(response);
//           });
//     }
      
//   }

 let callBackForm = document.getElementById("callBackForm");
 let fname = document.getElementById("fname");
 let lname = document.getElementById("lname");
 let mobile = document.getElementById("mobile");
 let location = document.getElementById("location");
  
 callBackForm.addEventListener('submit', (e)=>{
    if(fname.value.trim() == '' || lname.value.trim() == '' 
       || mobile.value.trim() == '' || location.value.trim() == ''){
            e.preventDefault();
            alert('Veuillez remplir tous les détails');
       }
       else{
        $.ajax({
            method: "POST",
            url: 'callBackMail.php',
            data: { 
                    textOne: fname.value,
                    textTwo: lname.value,
                    textThree: mobile.value,
                    textFour: location.value,
                  },
          }).done(function (response) {
            $("p.broken").html(response);
          });
       }
 })