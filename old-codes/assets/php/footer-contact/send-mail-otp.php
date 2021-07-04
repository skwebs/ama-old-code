<?php
session_start();
$_SESSION["otpTime"] = time();
$_SESSION["otp"] = rand(100000, 999999);
$data = array();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    foreach ($_POST as $key => $value) {
        if ($value == "") {
            exit("All fields are required.");
        }
    }
    extract($_POST);
}
$senderEmail = 'otp@anshumemorial.in';
$senderName = 'Anshu Memorial Academy';
$plainMsg = 'If you unable to see full email please reload this mail again.';
$rootDir = $_SERVER["DOCUMENT_ROOT"];
$smtpProvider = "self";
if ($smtpProvider == "smtp2go") {
    $smtp = 'mail.smtp2go.com';
    $user = 'contact@anshumemorial.in';
    $pw = 'S@tish555@sk';
}
if ($smtpProvider == "sendgrid") {
    $smtp = 'smtp.sendgrid.net';
    $user = 'apikey';
    $pw = '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';
}
if ($smtpProvider == "mailjet") {
    $smtp = 'in-v3.mailjet.com';
    $user = '04ba3417d7b8332b915271fc7eedc4d0';
    $pw = '82e7964edb06b0702db5628740e3c087';
}
if ($smtpProvider == "self") {
    $smtp = 'mail.anshumemorial.in';
    $user = 'contact@anshumemorial.in';
    $pw = 'S@tish555@sk';
}
if ($smtpProvider == "sendinblue") {
    $smtp = 'smtp-relay.sendinblue.com';
    $user = 'anshumemorial@gmail.com';
    $pw = 'hBGI4UNcpbJKYxMV';
}
if ($smtpProvider == "gmail") {
    $smtp = 'smtp.gmail.com';
    $user = 'sk99737579@gmail.com';
    $pw = 'S@tish555@sk';
}
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// require $rootDir.'/assets/php-lib/PHPMailer/src/Exception.php';
// require $rootDir.'/assets/php-lib/PHPMailer/src/PHPMailer.php';
// require $rootDir.'/assets/php-lib/PHPMailer/src/SMTP.php';

// Load Composer's autoloader
// require $rootDir.'/assets/php-lib/phpmailer-6.1/vendor/autoload.php';
require '../../php-lib/phpmailer-6.1/vendor/autoload.php';
$mail4otp = new PHPMailer(true);
try {
    $mail4otp->isSMTP();
    // Enable SMTP debugging
    // SMTP::DEBUG_OFF = off (for production use)
    // SMTP::DEBUG_CLIENT = client messages
    // SMTP::DEBUG_SERVER = client and server messages
    // $mail4otp->SMTPDebug = SMTP::DEBUG_CLIENT;
    $mail4otp->Host = $smtp;
    $mail4otp->SMTPAuth = true;
    $mail4otp->Username = $user;
    $mail4otp->Password = $pw;
    $mail4otp->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail4otp->Port = 587;
    $mail4otp->setFrom($senderEmail, $senderName);
    $mail4otp->addAddress($email, $name);
    $mail4otp->addReplyTo("contact@anshumemorial.in", $senderName);
    $mail4otp->isHTML(true);
    $mail4otp->Subject = "AMA verification code.";
    $mail4otp->Body = '<h2>Hi ' . $name . ', Your mail OTP is ' . $_SESSION['otp'];
    $mail4otp->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail4otp->send();
    $data['mail_otp']['success'] = true;
    $data['mail_otp']['time'] = $_SESSION["otpTime"];
    $data['mail_otp']['message'] = 'OTP sent by mail!';
}
catch(Exception $e) {
    $data['mail_otp']['success'] = false;
    $data['mail_otp']['message'] = $mail4otp->ErrorInfo;
}
echo json_encode($data);
