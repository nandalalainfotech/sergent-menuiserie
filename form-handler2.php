<?php
ob_start();
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$civility = htmlentities($_POST['civility']);    
$name = htmlentities($_POST['username']);
$firstname = htmlentities($_POST['firstname']);
$city = htmlentities($_POST['city']);
$phone = htmlentities($_POST['phone']);
$check1 = htmlentities($_POST['check1']);
$check2 = htmlentities($_POST['check2']);
$message = htmlentities($_POST['message']);

$mail = new PHPMailer();
$mail->IsSMTP();  
$mail->SMTPDebug = 2;
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true; 
$mail->Username = "noreply.nandalalainfotech@gmail.com";
$mail->Password = "yuntjikzkpxmhdoj";
$mail->AddAddress("abinayaselvaraj26.04@gmail.com","");

$mail->SetFrom($fname);
    $firstname = isset($_POST['firstname']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['firstname']) : "";    
    $lname = isset($_POST['lname']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['lname']) : "";  
    $mobile = isset($_POST['phone']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone']) : "";
    $location = isset($_POST['message']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['message']) : "";

$mail->Subject = 'Call Back enquiry received from SERGENT MENUISERIE';
$mail->Body .='CIVILITY :' . $civility . "\n";
$mail->Body .=' NAME :' . $name . "\n";
$mail->Body .='FIRST NAME :' . $firstname . "\n";
$mail->Body .='CITY :' . $city . "\n";
$mail->Body .='PHONE NUMBER :' . $phone . "\n";
$mail->Body .='MESSAGE :' . $message . "\n";


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