function getMaterials(){
    $.ajax({
        method: "POST",
        url: "getMaterialsMail.php",
        data: { textOne: $("p.unbroken0").text(),
               textTwo:  $("p.unbroken1").text(),
               textThree:  $("p.unbroken2").text(),
               textFour:  $("p.unbroken3").text(),
               textFive:  $("p.unbroken4").text(),
               textSix:  $("p.unbroken5").text(),
               textSeven:  $("p.unbroken6").text(),
               textEight:  $("p.unbroken7").text(),
              },
      }).done(function (response) {
        $("p.broken").html(response);
      });
}