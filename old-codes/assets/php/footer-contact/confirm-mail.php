<?php
$data = array(); // array to pass back data
//print_r($_POST);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    foreach ($_POST as $key => $value) {
        if ($value == "") {
            exit("All fields are required.");
        }
    }
    extract($_POST);
}

$from = 'mail@anshumemorial.in';
$from_name = 'Anshu Memorial Academy';
$to = $email;
$to_name = $name;

include "htmlMsg.php";

$plainMsg = 'If you unable to see full email please reload this mail again.';
$rootDir = $_SERVER["DOCUMENT_ROOT"];
$smtpProvider = "self";
// authentication
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
    $smtp = 'mail.anshumemorial.in'; // Set the SMTP server to send through
    $user = 'contact@anshumemorial.in'; // SMTP username
    $pw = 'S@tish555@sk'; // SMTP password
    
}
//
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
// Instantiation and passing `true` enables exceptions
$mail2user = new PHPMailer(true);
try {
    //Server settings
    //$mail2user->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail2user->isSMTP(); // Send using SMTP
    $mail2user->Host = $smtp; // Set the SMTP server to send through
    $mail2user->SMTPAuth = true; // Enable SMTP authentication
    $mail2user->Username = $user; // SMTP username
    $mail2user->Password = $pw; // SMTP password
    $mail2user->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail2user->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail2user->setFrom($from, $from_name);
    $mail2user->addAddress($email, $name); // Add a recipient
    //$mail2user->addAddress('ellen@example.com');               // Name is optional
    $mail2user->addReplyTo("contact@anshumemorial.in", $from_name);
    //$mail2user->addCC('cc@example.com');
    //$mail2user->addBCC('bcc@example.com');
    // Attachments
    //$mail2user->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail2user->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // Content
    $mail2user->isHTML(true); // Set email format to HTML
    $mail2user->Subject = $sub;
    $mail2user->Body = $userHTML;
    $mail2user->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail2user->send();
    $data['user']['success'] = true;
    $data['user']['message'] = 'Success!';
    //echo '<div class="alert alert-success" >Message for <strong>user</strong> has been sent.</div>';
    //echo '<script>alert("Message for user has been sent.");</script>';
    
}
catch(Exception $e) {
    $data['user']['success'] = false;
    $data['user']['message'] = $mail2user->ErrorInfo;
    //echo '<div class="alert alert-danger" >Message for <strong>user</strong> could not be sent. Mailer Error: '.$mail2user->ErrorInfo.'.</div>';
    //echo '<script>alert("Message for user could not be sent. Mailer Error: '.$mail2user->ErrorInfo.'.");</script>';
    
}
$mail2admin = new PHPMailer(true);
try {
    //Server settings
    //$mail2user->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail2admin->isSMTP(); // Send using SMTP
    $mail2admin->Host = 'mail.anshumemorial.in'; // Set the SMTP server to send through
    $mail2admin->SMTPAuth = true; // Enable SMTP authentication
    $mail2admin->Username = 'contact@anshumemorial.in'; // SMTP username
    $mail2admin->Password = 'S@tish555@sk'; // SMTP password
    $mail2admin->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail2admin->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail2admin->setFrom($from, $from_name);
    $mail2admin->addAddress($email, $name); // Add a recipient
    //$mail2admin->addAddress($from, $from_name);
    //$mail2admin->setFrom($to, $to_name);     // Add a recipient
    //$mail2admin->addAddress('ellen@example.com');               // Name is optional
    $mail2admin->addReplyTo("contact@anshumemorial.in", $from_name);
    //$mail2admin->addCC('cc@example.com');
    //$mail2admin->addBCC('bcc@example.com');
    // Attachments
    //$mail2admin->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail2admin->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // Content
    $mail2admin->isHTML(true); // Set email format to HTML
    $mail2admin->Subject = 'Mail from ' . $email;
    $mail2admin->Body = $adminHTML;
    $mail2admin->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail2admin->send();
    $data['admin']['success'] = true;
    $data['admin']['message'] = 'Success!';
    //echo '<div class="alert alert-success" >Message for <strong>owner</strong> has been sent.';
    //echo '<script>alert("Message for owner has been sent.");</script>';
    
}
catch(Exception $e) {
    $data['admin']['success'] = false;
    $data['admin']['message'] = $mail2admin->ErrorInfo;
    //echo '<div class="alert alert-danger" >Message for <strong>owner</strong> could not be sent. Mailer Error: '.$mail2admin->ErrorInfo.'.</div>';
    //echo '<script>alert("Message for owner could not be sent. Mailer Error: '.$mail2admin->ErrorInfo.'.");</script>';
    
}
echo json_encode($data);
?>
