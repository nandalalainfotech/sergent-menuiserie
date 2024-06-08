<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$captcha = htmlentities($_POST['captcha']);
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
$mail->SMTPDebug = 2;
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "noreply.nandalalainfotech@gmail.com";
$mail->Password = "yuntjikzkpxmhdoj";
// $mail->AddAddress("kalaimathikarthik2225@gmail.com", "");
$mail->AddAddress("contact@sergentmenuiserie.com", "");


// Set email content for the main recipient
$mail->SetFrom($email, $name);
$mail->isHTML(true);
$mail->Subject = 'Courrier reçu des détails de l\'utilisateur dans SERGENT MENUISERIE';
$mail->Body = '<img src="cid:SM_LOGO" alt="sm_logo" /> <br/>';
$mail->Body .= '<h3>CIVILITE : ' . strtoupper($gender) . "</h3>";
$mail->Body .= '<h3>NOM :' . strtoupper($name) . "</h3>";
$mail->Body .= '<h3>PRENOM : ' . strtoupper($fullname) . "</h3>";
$mail->Body .= '<h3>NUMERO DE CONTACT : ' . $mobile . "</h3>";
$mail->Body .= '<h3>COURRRIEL : ' . strtolower($email) . "</h3>";
$mail->Body .= '<h3>DESCRIPTION : ' . strtoupper($text) . "</h3>";

$mail->WordWrap = 50;

if (!$mail->Send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
    // Send confirmation email to the user
    $userMail = new PHPMailer();
    $userMail->IsSMTP();
    $userMail->SMTPDebug = 2;
    $userMail->Mailer = "smtp";
    $userMail->Host = "smtp.gmail.com";
    $userMail->Port = 587;
    $userMail->SMTPAuth = true;
    $userMail->Username = "noreply.nandalalainfotech@gmail.com";
    $userMail->Password = "yuntjikzkpxmhdoj";
    $userMail->AddAddress($email, $name);

    // Set email content for the user
    $userMail->SetFrom("noreply.nandalalainfotech@gmail.com", "Sergent Menuiserie");
    $userMail->isHTML(true);
    $userMail->Subject = 'Confirmation de réception de votre message';
    $userMail->Body = '<p>Bonjour ' . htmlspecialchars($name) . ',</p>';
    $userMail->Body .= '<p>Nous avons bien reçu votre message et vous remercions de nous avoir contactés.</p>';
    $userMail->Body .= '<p>Voici les détails de votre message :</p>';
    $userMail->Body .= '<p><strong>CIVILITE :</strong> ' . strtoupper($gender) . '<br/>';
    $userMail->Body .= '<strong>NOM :</strong> ' . strtoupper($name) . '<br/>';
    $userMail->Body .= '<strong>PRENOM :</strong> ' . strtoupper($fullname) . '<br/>';
    $userMail->Body .= '<strong>NUMERO DE CONTACT :</strong> ' . $mobile . '<br/>';
    $userMail->Body .= '<strong>COURRIEL :</strong> ' . strtolower($email) . '<br/>';
    $userMail->Body .= '<strong>DESCRIPTION :</strong> ' . strtoupper($text) . '</p>';
    $userMail->Body .= '<p>Nous reviendrons vers vous dès que possible.</p>';
    $userMail->Body .= '<p>Cordialement,</p>';
    $userMail->Body .= '<p>L\'équipe de Sergent Menuiserie</p>';

    if (!$userMail->Send()) {
        echo 'Confirmation email was not sent.';
        echo 'Mailer error: ' . $userMail->ErrorInfo;
    } else {
        echo 'Message has been sent.';
        header("Location: thankyou.html");
    }
}
?>