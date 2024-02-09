function getCallBackMail(e){
  let fname = document.getElementById("fname").value;
 let lname = document.getElementById("lname").value;
 let mobile = document.getElementById("mobile").value;
 let locations = document.getElementById("location").value;

if(fname.trim() == "" || lname.trim() == '' || mobile.trim() == '' || locations.trim() == ''){
  e.preventDefault();
  alert('Veuillez remplir les détails');
}
else{
    $.ajax({
            method: "POST",
            url: 'callBackMail.php',
            data: { 
                    textOne: fname,
                    textTwo: lname,
                    textThree: mobile,
                    textFour: locations,
                  },
          }).done(function (response) {
            $("p.broken").html(response);
          });
}

//  console.log("methodCall",fname);
       
 }