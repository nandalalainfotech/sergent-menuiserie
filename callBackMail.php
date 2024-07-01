<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Start output buffering
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['textOne'];
    $lname = $_POST['textTwo'];
    $mobile = $_POST['textThree'];
    $location = $_POST['textFour'];
    $captcha = $_POST['textFive'];

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 2;  // Set to 4 for full debug output
    $mail->Mailer = "smtp";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = "noreply.nandalalainfotech@gmail.com";
    $mail->Password = "yuntjikzkpxmhdoj";
    $mail->SMTPSecure = 'tls';  // Use 'tls' instead of 'ssl'
    // $mail->AddAddress("invoicefree.in@gmail.com");
    $mail->AddAddress("contact@sergentmenuiserie.com", "");
// $mail->AddAddress("sergentmenuiserie40@gmail.com","");

    $mail->SetFrom('noreply.nandalalainfotech@gmail.com', 'Sergent Menuiserie');

    $mail->isHTML(true);
    $mail->Subject = 'Mail reçu de RAPPELEZ-MOI dans SERGENT MENUISERIE';
    $mail->AddEmbeddedImage('images/sm2x.jpg', 'SM_LOGO');
    $mail->Body = '<img src="cid:SM_LOGO" alt="sm_logo" /><br/>';
    $mail->Body .= '<h3>PRÉNOM : ' . strtoupper($fname) . '</h3>';
    $mail->Body .= '<h3>NOM : ' . strtoupper($lname) . '</h3>';
    $mail->Body .= '<h3>NUMÉRO DE CONTACT : ' . $mobile . '</h3>';
    $mail->Body .= '<h3>LIEU : ' . strtoupper($location) . '</h3>';
  

    $mail->WordWrap = 50;
    if (!$mail->Send()) {
        echo 'Message was not sent.';
        echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent.';
        echo '<script>alert("Your message sent successfully!!")</script>';

        // Redirect to thankyou.html
        header("Location: thankyou.html");
        
        // End output buffering and flush output
        ob_end_flush();
        
        // Stop script execution
        exit();
    }

    $mail->clearAllRecipients();
    $mail->clearAttachments();
}
?>