function getCallBackMail(){
  let fname = document.getElementById("fname").value;
 let lname = document.getElementById("lname").value;
 let mobile = document.getElementById("mobile").value;
 let locations = document.getElementById("location").value;
 console.log("methodCall",fname);
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