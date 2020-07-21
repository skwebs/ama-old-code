<?php
$errors = array(); // array to hold validation errors
$data = array(); // array to pass back data
// validate the variables ======================================================
// if any of these variables don't exist, add an error to our $errors array
if (empty($_POST['name'])) $errors['name'] = 'Name is required.';
if (empty($_POST['mob'])) $errors['mob'] = 'Mobile is required.';
if (empty($_POST['email'])) $errors['email'] = 'Email is required.';
if (empty($_POST['sub'])) $errors['sub'] = 'Subject is required.';
if (empty($_POST['msg'])) $errors['msg'] = 'Message is required.';
// return a response ===========================================================
// if there are any errors in our errors array, return a success boolean of false
if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    // show a message of success and provide a true success variable
    $data['success'] = true;
    $data['message'] = 'Success!';
}
// return all our data to an AJAX call
echo json_encode($data);
