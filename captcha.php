<?php
session_start();

function generateCaptcha() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $captcha = '';
    for ($i = 0; $i < 6; $i++) {
        $captcha .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $captcha;
}

$_SESSION['captcha'] = generateCaptcha();
header('Content-Type: image/png');

$image = imagecreatetruecolor(200, 50);
$bgColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 0, 0, 200, 50, $bgColor);

imagettftext($image, 30, 0, 10, 40, $textColor, 'path/to/font.ttf', $_SESSION['captcha']);

// Add some random lines to the CAPTCHA
for ($i = 0; $i < 5; $i++) {
    imageline($image, rand(0, 200), rand(0, 50), rand(0, 200), rand(0, 50), $textColor);
}

imagepng($image);
imagedestroy($image);
?>