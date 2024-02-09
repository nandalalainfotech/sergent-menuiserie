<?php
ob_start();
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$email = htmlentities($_POST['news-letter']);


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

$mail->SetFrom($email);
    // $email = isset($_POST['news-letter']) ? preg_match("/^([a-z0-9\+_\-]+)(\. [a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[ a-z]{2,6}$/ix", "", $_POST['news-letter']) : "";    
   
$mail->isHTML(true);  
$mail->Subject = "Courrier reçu de l'E-mail de l'utilisateur dans SERGENT MENUISERIE";
$mail->AddEmbeddedImage('images/sm2x.jpg','SM_LOGO');
$mail->Body .='<img src="cid:SM_LOGO" alt="sm_logo" /> <br/>';
$mail->Body .="<h2>L'e-mail de l'utilisateur est : " .strtolower($email ) . "</h2>";


$mail->WordWrap = 50;
if(!$mail->Send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
    echo 'Message has been sent.';
    echo '<script>alert("Your message sent successfully!!")</script>';
    }
    header("Location:thankyou.html");
    ?>
