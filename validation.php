<?php
require('config.php');
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
$mail = new PHPMailer();
//Set mailer to use smtp
$mail->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";
//Port to connect smtp
$mail->Port = "587";
$mail->Username = "businessexpence@gmail.com";
//Set gmail password
$mail->Password = "vffitvwyacuaorgn";
//Set sender email
$mail->setFrom('businessexpence@gmail.com');
//Enable HTML
$mail->isHTML(true);
//Attachment
session_start();
$errors = array();

if (isset($_POST['signup'])) {
    unset($errors);
    // Check that all required fields have been filled out
    $e = $_POST['email'];
    // Check that the email address is valid
    $query = "SELECT * FROM user WHERE email = '$e'";
    $r = mysqli_query($con, $query);
    if (mysqli_num_rows($r) > 0) {
        // Email is in the database
        $errors['email'] = "Email that you have entered already exist!";
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Please enter a valid email address.";
        }
    }
    // Check that the password meets the minimum length requirement
    if (strlen($_POST['password']) < 8) {
        $errors['password'] = "Password must be at least 8 characters long.";
    }

    // Check that the password and confirm password fields match
    if ($_POST['password'] != $_POST['confirm_password']) {
        $errors['confermPassword'] = "Password dosnt match Confirm Password.";
    }

    // If no errors have occurred, proceed with registration
    if (!isset($errors)) {
        // Sanitize form input
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $business = filter_var($_POST['bname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password =  password_hash($_POST['password'], PASSWORD_BCRYPT);
        $query = "INSERT into `user` (firstname, lastname, password, email,businessname) VALUES ('$firstname','$lastname', '$password ', '$email','$business')";
        $result = mysqli_query($con, $query);

        if ($result) {
            header("Location: login.php");
        }
    }
}

if (isset($_POST['login'])) {
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $query = "SELECT * FROM user WHERE email= '$email'";
    //AND password= '$password'
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $query = "SELECT * FROM user WHERE email= '$email' AND password= '$password'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        if($result){
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
        }else{
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }

}if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM user WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE user SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: businessexpence@gmail.com";
                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->setFrom($sender);
                $mail->addAddress($email);
                if($mail->send()){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                $mail->smtpClose();

                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }
    
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM user WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    if ($password !== $cpassword ) {
        $errors['password'] = "Confirm password not matched!";
    } 
    elseif(strlen($password)<8){
        $errors['password'] = "Password should be longer";
    }
    else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE user SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

