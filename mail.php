<?php
ob_start();
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$fname = htmlentities($_POST['fname']);
$lname = htmlentities($_POST['lname']);
$mobile = htmlentities($_POST['mobile']);
$location = htmlentities($_POST['location']);

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

$mail->SetFrom($fname);
    $fname = isset($_POST['fname']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['fname']) : "";    
    $lname = isset($_POST['lname']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['lname']) : "";  
    $mobile = isset($_POST['mobile']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['mobile']) : "";
    $location = isset($_POST['location']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['location']) : "";

$mail->Subject = 'Call Back enquiry received from SERGENT MENUISERIE';
$mail->Body .='FIRST NAME :' . $fname . "\n";
$mail->Body .='LAST NAME :' . $lname . "\n";
$mail->Body .='CONTACT NO :' . $mobile . "\n";
$mail->Body .='LOCATION :' . $location . "\n";

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