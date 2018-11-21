<?php

use PHPMailer\PHPMailer\PHPMailer;

require '../configs/dbConfig.php';
$email = null;
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = $_GET['Email'];
$resethash = mysqli_escape_string($conn, md5(rand(0, 1000)));
$result1 = mysqli_query($conn, "select `email` from `users` where `email`='$email' and `active`=1");

if (mysqli_num_rows($result1) > 0) {
    $hash = mysqli_escape_string($conn, md5(rand(0, 1000)));
    $statement = "update `users` set `resethash`='$resethash' where `email`='$email'";
    $result = mysqli_query($conn, $statement);
    if (!$result) {
        die("Query failed " . mysqli_error($conn));
    } else {

        require '../vendor/autoload.php';
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->IsHTML(true);
        $mail->Username = "khaboofficial@gmail.com";
        $mail->Password = "huehuehue";
        $mail->SetFrom("no-reply@khabo.com", "no-reply");
        $mail->Subject = 'Khabo!-Reset Password';
        $mail->Body = '

Hi ' . $username . ', we have recieved a request to reset your password!<br>
If you have not requested to reset password, please ignore this mail.<br>
Click this link to continue:<br>
------------------------<br>
http://127.0.0.1/khabov2/reset.php?email=' . $email . '&hash=' . $resethash . '<br>
------------------------<br>

-Khabo! 

';
        $mail->AddAddress($email);
        $mail->Send();
        echo 1;
    }
} else {
    echo 0;
}