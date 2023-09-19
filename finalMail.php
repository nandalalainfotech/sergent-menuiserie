<?php
ob_start();
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$MaterialOne = $_POST['textOne'];
$MaterialTwo = $_POST['textTwo'];
$MaterialThree = $_POST['textThree'];
$MaterialFour = $_POST['textFour'];
$MaterialFive = $_POST['textFive'];
$MaterialSix = $_POST['textSix'];
$MaterialSeven = $_POST['textSeven'];
$MaterialEight = $_POST['textEight'];
$gender = $_POST['textNine'];
$name = $_POST['textTen'];
$initial = $_POST['textEleven'];
$mobile = $_POST['textTwelve'];
$email = $_POST['textThirteen'];
$text_box = $_POST['textFourteen'];
$appointment = $_POST['textFifteen'];
$date = $_POST['textSixteen'];
$session = $_POST['textSeventeen'];


$mail = new PHPMailer();
$mail->IsSMTP();  
$mail->SMTPDebug = 0;
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true; 
$mail->SMTPKeepAlive = true;

$mail->Username = "noreply.nandalalainfotech@gmail.com";
$mail->Password = "yuntjikzkpxmhdoj";
// $mail->AddAddress("sergentmenuiserie40@gmail.com","sm");
$mail->AddAddress("contact@sergentmenuiserie.com","sm");
$mail->AddAddress("karthiad05@gmail.com","");
// $mail->AddAddress("karthikeyan16599@gmail.com","");
// $mail->AddAddress("nitheeshkumarmurugesan281199@gmail.com","");
// $mail->AddAddress('abinayaselvaraj26.04@gmail.com',"");
// $mail->AddAddress('priyadarshini@nandalalainfotech.com',"");


$mail->SetFrom($meetingAt);
$mail->SetFrom($date);
$mail->SetFrom($session);
$mail->SetFrom($mob);

$mail->isHTML(true);  
$mail->Subject = 'Courrier reçu de Meeting Place in SERGENT MENUISERIE';
$mail->AddEmbeddedImage('images/sm2x.jpg','SM_LOGO');
$mail->Body .='<img src="cid:SM_LOGO" alt="sm_logo" /> <br/>';

$mail->Body .= '<h3>'. strtoupper($MaterialOne) . '</h3>';
$mail->Body .= '<h3>'. strtoupper($MaterialTwo) . '</h3>';
$mail->Body .= '<h3>'. strtoupper($MaterialThree) . '</h3>';
$mail->Body .= '<h3>'. strtoupper($MaterialFour) . '</h3>';
$mail->Body .= '<h3>'. strtoupper($MaterialFive) . '</h3>';
$mail->Body .= '<h3>'. strtoupper($MaterialSix) . '</h3>';
$mail->Body .= '<h3>'. strtoupper($MaterialSeven) . '</h3>';
$mail->Body .= '<h3>'. strtoupper($MaterialEight) . '</h3>';
$mail->Body .= '<h3> Civilité : '. strtoupper($gender) . '</h3>';
$mail->Body .= '<h3> Nom : '. strtoupper($name) . '</h3>';
$mail->Body .= '<h3> Prénom : '. strtoupper($initial) . '</h3>';
$mail->Body .= '<h3> Numéro de téléphone : '. strtoupper($mobile) . '</h3>';
$mail->Body .= '<h3> Courriel : '. strtoupper($email) . '</h3>';
$mail->Body .= '<h3> Description de votre projet : '. strtoupper($text_box) . '</h3>';
$mail->Body .= '<h3> Rendez-vous : '. strtoupper($appointment) . '</h3>';
$mail->Body .= '<h3> Date de rendez-vous : '. strtoupper($date) . '</h3>';
$mail->Body .= '<h3> Session : '. strtoupper($session) . '</h3>';

$mail->WordWrap = 50;
if(!$mail->Send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
    echo 'Message has been sent.';
    // echo '<script>alert("Your message sent successfully!!")</script>';
    }
    header("Location:thankyou.html");
    ?>