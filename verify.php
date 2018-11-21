<?php
require './configs/dbConfig.php';
if (isset($_GET['owner']) && $_GET['owner'] == true) {
    if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
        // Verify data
        $email = mysqli_escape_string($conn, $_GET['email']);
        $hash = mysqli_escape_string($conn, $_GET['hash']);
        $search = mysqli_query($conn, "SELECT email, hash, active FROM users WHERE email='" . $email . "' AND hash='" . $hash . "' AND active='0' AND status='owner'") or die(mysqli_error());
        if (mysqli_num_rows($search) > 0) {
            mysqli_query($conn, "UPDATE users SET active='1' WHERE email='" . $email . "' AND hash='" . $hash . "' AND active='0'") or die(mysqli_error());
            header('location:addRestaurant.php');
        } else {
            echo 'Invalid Login';
        }
    }
}else{
    if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
        // Verify data
        $email = mysqli_escape_string($conn, $_GET['email']);
        $hash = mysqli_escape_string($conn, $_GET['hash']);
        $search = mysqli_query($conn, "SELECT email, hash, active FROM users WHERE email='" . $email . "' AND hash='" . $hash . "' AND active='0'") or die(mysqli_error());
        if (mysqli_num_rows($search) > 0) {
            mysqli_query($conn, "UPDATE users SET active='1' WHERE email='" . $email . "' AND hash='" . $hash . "' AND active='0'") or die(mysqli_error());
            header('location:index.php?verify=true');
        } else {
            echo 'Invalid Login';
        }
    }
}

?>