<?php
ob_start();
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$textOne = $_POST['textOne'];
$textTwo = $_POST['textTwo'];
$textThree = $_POST['textThree'];
$textFour = $_POST['textFour'];
$textFive = $_POST['textFive'];
$textSix = $_POST['textSix'];
$textSeven = $_POST['textSeven'];
$textEight = $_POST['textEight'];

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
// $mail->AddAddress("karthiad05@gmail.com","");
// $mail->AddAddress("karthikeyan16599@gmail.com","");
// $mail->addBCC('abinayaselvaraj26.04@gmail.com','');

$mail->SetFrom($textOne);
$mail->SetFrom($textTwo);
$mail->SetFrom($textThree);
$mail->SetFrom($textFour);
$mail->SetFrom($textFive);
$mail->SetFrom($textSix);
$mail->SetFrom($textSeven);
$mail->SetFrom($textEight);

$mail->isHTML(true); 
$mail->Subject = 'Mail received from SERGENT MENUISERIE Site';
$mail->AddEmbeddedImage('images/sm2x.jpg','SM_LOGO');
$mail->Body .='<img src="cid:SM_LOGO" alt="sm_logo" /> <br/>';
$mail->Body .= '<h3> ' .strtoupper($textOne) . "</h3>";
$mail->Body .= '<h3> ' .strtoupper($textTwo)  . '</h3>';
$mail->Body .= '<h3> ' .strtoupper($textThree)  . '</h3>';
$mail->Body .= '<h3>'  .strtoupper($textFour)  . '</h3>';
$mail->Body .= '<h3>'  .strtoupper($textFive)  . '</h3>';
$mail->Body .= '<h3>'  .strtoupper($textSix)  . '</h3>';
$mail->Body .= '<h3>'  .strtoupper($textSeven)  . '</h3>';
$mail->Body .= '<h3>' . strtoupper($textEight)  . '</h3>';


$mail->WordWrap = 50;
if(!$mail->Send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
    echo 'Message has been sent.';
    }
 ?>


