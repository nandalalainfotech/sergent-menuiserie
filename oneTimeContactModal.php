<?php
ob_start();
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$gender = htmlentities($_POST['civility']);    
$firstName = htmlentities($_POST['name']);
$lastName = htmlentities($_POST['initial']);
$mobile = htmlentities($_POST['mobile']);
$email = htmlentities($_POST['email']);
$text_box = htmlentities($_POST['text']);



$mail = new PHPMailer();
$mail->IsSMTP();  
$mail->SMTPDebug = 2;
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true; 
$mail->Username = "noreply.nandalalainfotech@gmail.com";
$mail->Password = "yuntjikzkpxmhdoj";
$mail->AddAddress("sergentmenuiserie40@gmail.com","");
// $mail->AddAddress("karthiad05@gmail.com","");
$mail->AddAddress("contact@sergentmenuiserie.com","sm");
// $mail->AddAddress("karthikeyan16599@gmail.com","");
// $mail->addBCC('abinayaselvaraj26.04@gmail.com','');


$mail->SetFrom($gender);
$mail->SetFrom($firstName);
$mail->SetFrom($lastName);
$mail->SetFrom($mobile);
$mail->SetFrom($email);
$mail->SetFrom($text_box);

$mail->isHTML(true);
$mail->Subject = 'Courrier reçu du modèle de contact unique de SERGENT MENUISERIE';
$mail->Body .='<h3>Civilité : ' .strtoupper($gender)  . "</h3>";
$mail->Body .='<h3>Nom : ' .strtoupper($firstName)  . "</h3>";
$mail->Body .='<h3>Prénom : ' .strtoupper($lastName ) . "</h3>";
$mail->Body .='<h3>Numéro de téléphone: ' . $mobile . "</h3>";
$mail->Body .='<h3>Courriel: ' .strtolower( $email ). "</h3>";
$mail->Body .='<h3>Description : ' .strtoupper($text_box)  . "</h3>";

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