<?php
$email = null;
require './configs/dbConfig.php';
if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verify data
    $email = mysqli_escape_string($conn, $_GET['email']);
    $resethash = mysqli_escape_string($conn, $_GET['hash']);
    $search = mysqli_query($conn, "SELECT email, resethash, active FROM users WHERE email='$email' AND resethash='$resethash'") or die(mysqli_error());
    if (mysqli_num_rows($search) > 0) {
        echo '
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width,initial-scale=1">
                    <title>Khabo! &mdash; Find Nearest Restaurants</title>
                    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
                    <link rel="stylesheet" type="text/css" href="css/my-login.css">
                    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
                    <link href="css/modal-style.css" rel="stylesheet"> 
                    <link href="css/jelly.css" rel="stylesheet">
                    <link href="css/style.css" rel="stylesheet">
                </head>
                <body class="my-login-page">
                <section class="h-100">
                    <div class="container h-100">
                        <div class="row justify-content-md-center align-items-center h-100">
                            <div class="card-wrapper">
                                <div class="brand">
                                    <div class="modal-header text-center jello">
                                    <img src="images/logo3.png"  style="border-radius: 50%;background-color: white">
                                </div>
                                </div>
                                <div class="card fat">
                                    <div class="card-body">
                                        <h4 class="card-title">Reset Password</h4>
                                        <form method="POST" action="./handlers/resetHandler.php?hash='.$resethash.'">
                
                                            <div class="form-group">
                                                <label for="email">E-Mail Address</label>
                                                <input id="email" type="email" class="form-control" name="email" value="'.$email.'" readonly="readonly"><br>
                                                <div class="form-group">
                
                                                    <label for="new-password">New Password</label>
                                                    <input id="new-password" type="password" class="form-control" name="password"
                                                           required autofocus data-eye><br>
                                                    <div class="form-text text-muted">
                                                        Make sure your password is strong and easy to remember
                                                    </div>
                                                </div>
                                                <div class="form-group no-margin">
                                                    <button type="submit" class="btn btn-primary btn-block">
                                                        Reset Password
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="footer">
                                    Copyright &copy; 2018 &mdash; Khabo.com
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <script src="js/jquery.min.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>
                <script src="js/my-login.js"></script>
                </body>
                </html>
        ';
    } else {
        echo 'Invalid Login';
    }
}
?>

