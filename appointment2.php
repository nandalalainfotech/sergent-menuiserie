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
$name = htmlentities($_POST['name']);
$fullname = htmlentities($_POST['initial']);
$city = htmlentities($_POST['city']);
$mobile = htmlentities($_POST['mobile']);
$email = htmlentities($_POST['email']);
$text = htmlentities($_POST['text']);
// $location = htmlentities($_POST['session']);

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
$mail->SetFrom($name);
$mail->SetFrom($fullname);
$mail->SetFrom($city);
$mail->SetFrom($mobile);
$mail->SetFrom($email);
$mail->SetFrom($text);
    // $gender = isset($_POST['place']) ? preg_replace("/[^\.\-\' a-zA-Z]/", "", $_POST['place']) : "";    
    // $name = isset($_POST['date']) ? preg_replace("/[^\.\-\' a-zA-Z]/", "", $_POST['date']) : "";  
    // $fullname = isset($_POST['session']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['session']) : "";
    // $city = isset($_POST['location']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['location']) : "";
    // $mobile = isset($_POST['place']) ? preg_replace("/[^\.\-\' 0-9]/", "", $_POST['place']) : "";    
    // $text = isset($_POST['date']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['date']) : "";  


$mail->Subject = 'Call Back enquiry received from SERGENT MENUISERIE';
$mail->Body .='Civility :' . $gender . "\n";
$mail->Body .='Nom :' . $name . "\n";
$mail->Body .='Prenom :' . $fullname . "\n";
$mail->Body .='Phone no.:' . $mobile . "\n";
$mail->Body .='Email.:' . $email . "\n";
$mail->Body .='Ville :' . $city . "\n";
$mail->Body .='Description :' . $text . "\n";
// $mail->Body .='LOCATION :' . $location . "\n";

$mail->WordWrap = 50;
if(!$mail->Send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
    echo 'Message has been sent.';
    echo '<script>alert("Your message sent successfully!!")</script>';
    }
    header("Location:make-an-appointment.html");
    ?>