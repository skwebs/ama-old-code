<?php
session_start();
$time = $_SESSION["otpTime"];
$otp = $_SESSION["otp"];
$data = array(); // array to pass back data
// validate the variables ======================================================
// if any of these variables don't exist, add an error to our $errors array
if ($_POST['otp'] == "") {
    $data['otp']['error'] = true;
    $data['otp']['msg'] = 'OTP is required.';
} else if (is_numeric($_POST['otp']) != 1) {
    $data['otp']['error'] = true;
    $data['otp']['msg'] = 'OTP must be numeric.';
} else if (strlen($_POST['otp']) != 6) {
    $data['otp']['error'] = true;
    $data['otp']['msg'] = 'OTP must be six digits.';
} else
// return a response ===========================================================
// if there are any errors in our errors array, return a success boolean of false
{
    // show a message of success and provide a true success variable
    if ((time() - $time) < 90) {
        if ($_POST['otp'] == $otp) {
            $data['otp']['msg'] = "OTP Verified.";
            $data['otp']['error'] = false;
        } else {
            $data['otp']['msg'] = "Invalid OTP.";
            $data['otp']['error'] = true;
        }
    } else {
        $data['otp']['msg'] = "OTP Expired.";
        $data['otp']['error'] = true;
    };
}
// return all our data to an AJAX call
echo json_encode($data);
