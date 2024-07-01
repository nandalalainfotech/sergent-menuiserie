<?php
session_start();
ob_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$captcha = htmlentities($_POST['captcha1']);
$gender = htmlentities($_POST['civility']);
$name = htmlentities($_POST['name']);
$fullname = htmlentities($_POST['initial']);
$city = htmlentities($_POST['city']);
$mobile = htmlentities($_POST['mobile']);
$email = htmlentities($_POST['email']);
$text = htmlentities($_POST['text']);

// Initialize PHPMailer
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0; // Suppress debug output
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "noreply.nandalalainfotech@gmail.com";
$mail->Password = "yuntjikzkpxmhdoj";
$mail->AddAddress("contact@sergentmenuiserie.com", "");
// $mail->AddAddress("sergentmenuiserie40@gmail.com","");
// $mail->AddAddress("kalaimathi@nandalalainfotech.com","");
// $mail->AddAddress("invoicefree.in@gmail.com","");

// Set email content
$mail->SetFrom($email, $name);
$mail->isHTML(true);
$mail->Subject = 'Courrier reçu des détails de l\'utilisateur dans SERGENT MENUISERIE';
$mail->Body = '<img src="cid:SM_LOGO" alt="sm_logo" /> <br/>';
$mail->Body .= '<h3>CIVILITE : ' . strtoupper($gender) . "</h3>";
$mail->Body .= '<h3>NOM :' . strtoupper($name) . "</h3>";
$mail->Body .= '<h3>PRENOM : ' . strtoupper($fullname) . "</h3>";
$mail->Body .= '<h3>NUMERO DE CONTACT : ' . $mobile . "</h3>";
$mail->Body .= '<h3>COURRIEL : ' . strtolower($email) . "</h3>";
$mail->Body .= '<h3>DESCRIPTION : ' . strtoupper($text) . "</h3>";

$mail->WordWrap = 50;

if (!$mail->Send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
    header("Location: thankyou.html");
    exit(); // Ensure the script stops execution
}

ob_end_flush();
?>