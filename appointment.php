<?php
ob_start();
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$meetingAt = htmlentities($_POST['place']);
$date = htmlentities($_POST['date']);
$session = htmlentities($_POST['session']);
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

$mail->SetFrom($meetingAt);
$mail->SetFrom($date);
$mail->SetFrom($session);
    // $meetingAt = isset($_POST['place']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['place']) : "";    
    // $date = isset($_POST['date']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['date']) : "";  
    // $session = isset($_POST['session']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['session']) : "";
    // $location = isset($_POST['location']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['location']) : "";

$mail->Subject = 'Call Back enquiry received from SERGENT MENUISERIE';
$mail->Body .='Meeting at :' . $meetingAt . "\n";
$mail->Body .='Appointment Date :' . $date . "\n";
$mail->Body .='Your Session :' . $session . "\n";
// $mail->Body .='LOCATION :' . $location . "\n";

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