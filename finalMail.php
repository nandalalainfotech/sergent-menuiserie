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
$mail->SMTPDebug = 2;
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true; 
$mail->Username = "noreply.nandalalainfotech@gmail.com";
$mail->Password = "yuntjikzkpxmhdoj";
// $mail->AddAddress("sergentmenuiserie40@gmail.com","");
$mail->AddAddress("contact@sergentmenuiserie.com","sm");
$mail->AddAddress("karthiad05@gmail.com","");
// $mail->AddAddress("karthikeyan16599@gmail.com","");
// $mail->addBCC('nitheeshkumarmurugesan281199@gmail.com','');


$mail->SetFrom($MaterialOne);
$mail->SetFrom($MaterialTwo);
$mail->SetFrom($MaterialThree);
$mail->SetFrom($MaterialFour);
$mail->SetFrom($MaterialFive);
$mail->SetFrom($MaterialSix);
$mail->SetFrom($MaterialSeven);
$mail->SetFrom($MaterialEight);
$mail->SetFrom($gender);
$mail->SetFrom($name);
$mail->SetFrom($initial);
$mail->SetFrom($mobile);
$mail->SetFrom($email);
$mail->SetFrom($text_box);
$mail->SetFrom($appointment);
$mail->SetFrom($date);
$mail->SetFrom($session);

$mail->isHTML(true);  
$mail->Subject = 'Mail reçu de demande de RDV  de SERGENT MENUISERIE';
$mail->AddEmbeddedImage('images/sm2x.jpg','SM_LOGO');
$mail->Body .='<img src="cid:SM_LOGO" alt="sm_logo" /> <br/>';

$mail->Body .= '<h3> VOUS ETES :'. strtoupper($MaterialOne) . '</h3>';
$mail->Body .= '<h3> VOTRE PRODUIT :' . strtoupper($MaterialTwo) . '</h3>';
$mail->Body .= '<h3> TYPE DE PRODUIT :'. strtoupper($MaterialThree) . '</h3>';
$mail->Body .= '<h3> COMBIEN :'. strtoupper($MaterialFour) . '</h3>';
$mail->Body .= '<h3> TYPE DE MATERIEL :'. strtoupper($MaterialFive) . '</h3>';
$mail->Body .= '<h3> TRAVAUX :'. strtoupper($MaterialSix) . '</h3>';
$mail->Body .= '<h3> ADRESSE :'. strtoupper($MaterialSeven) . '</h3>';
$mail->Body .= '<h3> CODE POSTAL ET COMMUNE :'. strtoupper($MaterialEight) . '</h3>';
$mail->Body .= '<h3> CIVILITE : '. strtoupper($gender) . '</h3>';
$mail->Body .= '<h3> NOM : '. strtoupper($name) . '</h3>';
$mail->Body .= '<h3> PRENOM : '. strtoupper($initial) . '</h3>';
$mail->Body .= '<h3> NUMERO DE CONTACT : '. strtoupper($mobile) . '</h3>';
$mail->Body .= '<h3> COURRIEL : '. strtoupper($email) . '</h3>';
$mail->Body .= '<h3> DESCRIPTION DE VOTRE PROJET : '. strtoupper($text_box) . '</h3>';
$mail->Body .= '<h3> RENDEZ-VOUS : '. strtoupper($appointment) . '</h3>';
$mail->Body .= '<h3> DATE DE RDV : '. strtoupper($date) . '</h3>';
$mail->Body .= '<h3> QUAND : '. strtoupper($session) . '</h3>';

$mail->WordWrap = 50;
if(!$mail->Send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
    echo 'Message has been sent.';
    // echo '<script>console.log("Your message sent successfully!!")</script>';
    }
    // header("Location:thankyou.html");
    ?>