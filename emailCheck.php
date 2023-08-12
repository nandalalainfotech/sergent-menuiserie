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
$mail->AddAddress("nitheeshkumarmurugesan281199@gmail.com","");

$mail->SetFrom($email);
    // $email = isset($_POST['news-letter']) ? preg_match("/^([a-z0-9\+_\-]+)(\. [a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[ a-z]{2,6}$/ix", "", $_POST['news-letter']) : "";    
   
$mail->isHTML(true);  
$mail->Subject = 'User E-mail received from SERGENT MENUISERIE';
$mail->Body .='<h2>User e-mail is :' . $email . "</h2>";


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
