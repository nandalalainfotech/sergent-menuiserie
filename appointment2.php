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
// $mail->AddAddress("sergentmenuiserie40@gmail.com","");
$mail->AddAddress("contact@sergentmenuiserie.com","sm");
// $mail->AddAddress("karthiad05@gmail.com","");
// $mail->AddAddress("karthikeyan16599@gmail.com","");
// $mail->addBCC('abinayaselvaraj26.04@gmail.com','');


$mail->SetFrom($gender);
$mail->SetFrom($name);
$mail->SetFrom($fullname);
$mail->SetFrom($city);
$mail->SetFrom($mobile);
$mail->SetFrom($email);
$mail->SetFrom($text);

   
$mail->isHTML(true);  
$mail->Subject = 'Courrier reçu des détails de l&#39;utilisateur dans SERGENT MENUISERIE';
$mail->AddEmbeddedImage('images/sm2x.jpg','SM_LOGO');
$mail->Body .='<img src="cid:SM_LOGO" alt="sm_logo" /> <br/>';
$mail->Body .='<h3>CIVILITE : ' .strtoupper($gender)  . "</h3>";
$mail->Body .='<h3>NOM :' . strtoupper($name) .  "</h3>";
$mail->Body .='<h3>PRENOM : ' . strtoupper($fullname) .  "</h3>";
$mail->Body .='<h3>NUMERO DE CONTACT : ' . $mobile .  "</h3>";
$mail->Body .='<h3>COURRRIEL : ' . strtolower($email) .  "</h3>";
// $mail->Body .='Ville :' . $city . "\n";
$mail->Body .='<h3>DESCRIPTION : ' . strtoupper($text) .  "</h3>";


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