function getMaterials(event){
  var city = $("#city_field").val();
  var postal = $("#postal_code").val();

  // console.log("event====>",event);
  if(city.trim()=='' || postal.trim()==''){
    event.preventDefault();
    alert('Veuillez remplir les détails');
  }
    // $.ajax({
    //     method: "POST",
    //     url: "getMaterialsMail.php",
    //     data: { textOne: $("p.unbroken0").text(),
    //            textTwo:  $("p.unbroken1").text(),
    //            textThree:  $("p.unbroken2").text(),
    //            textFour:  $("p.unbroken3").text(),
    //            textFive:  $("p.unbroken4").text(),
    //            textSix:  $("p.unbroken5").text(),
    //            textSeven: 'Commune : ' + city,
    //            textEight:  $("p.unbroken7").text(),
    //           },
    //   }).done(function (response) {
    //     $("p.broken").html(response);
    //   });

      sessionStorage.setItem('materialOne',$("p.unbroken0").text());
      sessionStorage.setItem('materialTwo',$("p.unbroken1").text());
      sessionStorage.setItem('materialThree',$("p.unbroken2").text());
      sessionStorage.setItem('materialFour',$("p.unbroken3").text());
      sessionStorage.setItem('materialFive',$("p.unbroken4").text());
      sessionStorage.setItem('materialSix',$("p.unbroken5").text());
      sessionStorage.setItem('materialSeven','Commune : ' + city);
      sessionStorage.setItem('materialEight','Code Postal : ' + postal);
}
