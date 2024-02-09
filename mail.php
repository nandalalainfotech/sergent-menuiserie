
<?php
ob_start();
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$fname = htmlentities($_POST['fname']);
$lname = htmlentities($_POST['lname']);
$mobile = htmlentities($_POST['mobile']);
$location = htmlentities($_POST['location']);

$mail = new PHPMailer();
$mail->IsSMTP();  
$mail->SMTPDebug = 2;
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true; 
$mail->Username = "noreply.nandalalainfotech@gmail.com";
$mail->Password = "yuntjikzkpxmhdoj";
// $mail->AddAddress("sergentmenuiserie40@gmail.com","");
$mail->AddAddress("contact@sergentmenuiserie.com","sm");
// $mail->AddAddress("nitheeshkumarmurugesan281199@gmail.com","");
// $mail->AddAddress("karthiad05@gmail.com","");
// $mail->AddAddress("karthikeyan16599@gmail.com","");
// $mail->addBCC('abinayaselvaraj26.04@gmail.com','');

$mail->SetFrom($fname);
   
$mail->isHTML(true);
$mail->Subject ='Mail reçu de RAPPELEZ-MOI dans SERGENT MENUISERIE';
$mail->AddEmbeddedImage('images/sm2x.jpg','SM_LOGO');
$mail->Body .='<img src="cid:SM_LOGO" alt="sm_logo" /> <br/>';

$mail->Body .='<h3>PRÉNOM : ' . strtoupper($fname) . "</h3>";
$mail->Body .='<h3>NOM : ' .  strtoupper($lname) . "</h3>";
$mail->Body .='<h3>NUMÉRO DE CONTACT : ' . $mobile . "</h3>";
$mail->Body .='<h3>LIEU : ' .  strtoupper($location) . "</h3>";

$mail->WordWrap = 50;
if(!$mail->Send()) {
   // echo 'Message was not sent.';
  //  echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
   // echo 'Message has been sent.';
    // echo '<script>alert("Your message sent successfully!!")</script>';
    echo '<script>window.location = "https://sergentmenuiserie.com/thankyou.html"</script>';
    }
  //  header("Location:https://sergentmenuiserie.com/thankyou.html");
    ?>