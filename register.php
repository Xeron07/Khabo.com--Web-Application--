<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Khabo! &mdash; Find Nearest Restaurants</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
    <?php
    include "include/header.php";
    ?>
    <script type="text/javascript">

        function checkname() {
            var name = document.getElementById("username").value;
            if (name) {
                $.ajax(
                    {
                        type: 'post',
                        url: './handlers/regHandler.php',
                        data: {user_name: name},
                        success: function (response) {
                            $('#name_status').html(response);
                            if (response === "User Name Available") {
                                return true;
                            }
                            else {
                                return false;
                            }
                        }
                    }
                );
            }
            else {
                $('#name_status').html("");
                return false;
            }
        }

        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        function checkemail() {
            var email = document.getElementById("email").value;
            if (email) {
                $.ajax(
                    {
                        type: 'post',
                        url: './handlers/regHandler.php',
                        data: {user_email: email},
                        success: function (response) {
                            $('#email_status').html(response);
                            if (response === "Email Available") {
                                return true;
                            }
                            else {
                                return false;
                            }
                        }
                    }
                );
            }
            else {
                $('#email_status').html("");
                return false;
            }
        }

        function checkall() {
            var namehtml = document.getElementById("name_status").innerHTML;
            var emailhtml = document.getElementById("email_status").innerHTML;
            if (!validateEmail(document.getElementById("email").value)) {
                swal("Error", "Invalid email", 'error');
                return false;
            }
            else {
                if ((namehtml === "User Name Available") && (emailhtml === "Email Available")) {
                    return true;
                }
                else {
                    return false;
                }
            }

        }
    </script>
</head>
<body class="my-login-page">
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <img src="images/logo3.png" style="margin-left: auto;margin-right: auto;display: block;">
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Register</h4>
                        <form method="POST" action="handlers/regHandler.php" onsubmit="return checkall();">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" class="form-control" name="username" required
                                       autofocus onkeyup="checkname()">
                                <span id="name_status" style="color: #ff4452"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="text" class="form-control" name="email" required
                                       onkeyup="checkemail()">
                                <span id="email_status" style="color: #ff4452"></span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                       data-eye>
                            </div>

                            <div class="form-inline">
                                <label for="user_status">Status:&nbsp;&nbsp;&nbsp;</label>
                                <select name="user_status" id="user_status">
                                    <option value="user">User</option>
                                    <option value="owner">Shop Owner</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-inline">
                                <label>
                                    <input type="checkbox" name="agree" value="1" required>&nbsp; I agree to the Terms and
                                    Conditions
                                </label>
                            </div>

                            <div class="form-group no-margin">
                                <input type="submit" name="submit" value="submit" class="btn btn-primary btn-block"/>
                            </div>
                            <div class="margin-top20 text-center">
                                Already have an account? <a href="index.php">Go Home First</a>
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