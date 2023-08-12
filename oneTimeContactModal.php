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
$mail->AddAddress("nitheeshkumarmurugesan281199@gmail.com","");

$mail->SetFrom($gender);
$mail->SetFrom($firstName);
$mail->SetFrom($lastName);
$mail->SetFrom($mobile);
$mail->SetFrom($email);
$mail->SetFrom($text_box);


$mail->Subject = 'Call Back enquiry received from SERGENT MENUISERIE';
$mail->Body .='Civility :' . $gender . "\n";
$mail->Body .='Nom :' . $firstName . "\n";
$mail->Body .='Prenom :' . $lastName . "\n";
$mail->Body .='Phone no.:' . $mobile . "\n";
$mail->Body .='Email.:' . $email . "\n";
$mail->Body .='Description :' . $text_box . "\n";

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