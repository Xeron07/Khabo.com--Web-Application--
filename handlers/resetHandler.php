<?php
require '../configs/dbConfig.php';
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$password = sanitize(mysqli_escape_string($conn, $_POST['password']));
$email = sanitize(mysqli_escape_string($conn, $_POST['email']));
$hash = sanitize(mysqli_escape_string($conn, $_GET['hash']));
$result = mysqli_query($conn, "UPDATE users SET `password`='$password' WHERE email='$email' AND resethash='$hash'");
mysqli_query($conn, "UPDATE users SET `resethash`=NULL WHERE email='$email' AND `password`='$password'");

if (!$result) {
    die("Query failed" . mysqli_error($conn));
} else {
    header('location:../index.php?reset=true');
}

?>