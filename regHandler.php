<?php
require '../configs/dbConfig.php';

use PHPMailer\PHPMailer\PHPMailer;

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['user_name'])) {
    $name = $_POST['user_name'];
    $query = "select username from `users` where username='$name'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "User Name Already Exists";
    } else {
        echo "OK";
    }
    exit();
}

if (isset($_POST['user_email'])) {
    $emailid = $_POST['user_email'];
    $query = "select email from `users` where email='$emailid'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Email Already Exists";
    } else {
        echo "OK";
    }
    exit();
}


if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    echo "im submit";
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $email = mysqli_escape_string($conn, filter_var(sanitize($_POST['email']), FILTER_SANITIZE_EMAIL));
    $hash = mysqli_escape_string($conn, md5(rand(0, 1000)));
    $statement = "INSERT INTO `users`(`username`, `password`, `email`,`hash`) VALUES ('$username','$password','$email','$hash')";
    $result = mysqli_query($conn, $statement);

    require '../vendor/autoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->Username = "khaboofficial@gmail.com";
    $mail->Password = "huehuehue";
    $mail->SetFrom("no-reply@khabo.com", "no-reply");
    $mail->Subject = 'Signup | Verification| Welcome to Khabo!';
    $mail->Body = '
Hi ' . $username . ', thanks for signing up to khabo!<br>
Your account has been created, you can login with your credentials after you have activated your account by pressing the url below.<br>
------------------------<br>
Username: ' . $username . '<br>
Password: ' . $password . '<br>
------------------------<br>

Please click this link to activate your account:<br>
https://127.0.0.1/verify.php?email=' . $email . '&hash=' . $hash . '<br>';
    $mail->AddAddress($email);

    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        header('location:../index.php?reg=true');
    }
}