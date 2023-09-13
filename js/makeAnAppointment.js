let appointmentForm = document.getElementById('makeAnAppointmentForm');
let appointment = document.getElementsByName('place');
let date = document.getElementById('myDate');
let sessionArr = document.getElementsByName('session');

appointmentForm.addEventListener('submit',()=>{
    console.log("called");
    let session = '';
   for(let i of sessionArr){
    if(i.checked){
        session = i.value;
    }
   }
  
    $.ajax({
        method: "POST",
        url: "appointment.php",
        data: { textOne: sessionStorage.getItem('materialOne'),
                textTwo: sessionStorage.getItem('materialTwo'),
                textThree: sessionStorage.getItem('materialThree'),
                textFour: sessionStorage.getItem('materialFour'),
                textFive: sessionStorage.getItem('materialFive'),
                textSix:  sessionStorage.getItem('materialSix'),
                textSeven: sessionStorage.getItem('materialSeven'),
                textEight: sessionStorage.getItem('materialEight'),
                textNine:  sessionStorage.getItem('gender'),
                textTen:  sessionStorage.getItem('name'),
                textEleven:  sessionStorage.getItem('initial'),
                textTwelve:   sessionStorage.getItem('mobile'),
                textThirteen:  sessionStorage.getItem('email'),
                textFourteen:  sessionStorage.getItem('text_box'),
                textFifteen:  appointment[0].checked ? appointment[0].value : appointment[1].value,
                textSixteen:  date.value,
                textSeventeen: session
              },
      }).done(function (response) {
        $("p.broken").html(response);
      });
})
