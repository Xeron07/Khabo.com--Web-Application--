



<!DOCTYPE html>

<html lang="">
<head>
    <title>Khabo! &mdash; Find Nearest Restaurants</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/modal-style.css" rel="stylesheet">
    <link href="css/jelly.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <?php
    include "include/header.php";
    ?>
<?php
    if(isset($_GET['val']))
    {
    if($_GET['val']==0)
    {
    echo"<script>swal('Oops!!','YOU HAVE TO LOGIN FIRST','error');</script>";
    }

    }
    ?>

    <style>
        .container_new {
            width: 80%;
            margin: auto;
            padding: 10px;
        }

        .left {
            width: 15%;
            margin-left: 10%;
            float: left;
        }

        .right {
            margin-left: 70%;
            text-align: left;
        }
    </style>
</head>
<?php
if (isset($_GET['reg']) && $_GET['reg'] == true) {
    echo "<script type='text/javascript'>alert('Registration Success! Check Your Email To Continue.');</script>";
} else if (isset($_GET['reset']) && $_GET['reset'] == true) {
    echo "<script type='text/javascript'>alert('Reset Success! Please Login Again.');</script>";
}
?>
<!-- jquery to check seesion -->
<script>
    var modal;
    var loginModal;
    var span;
    var closeButton;
    var body;

    window.onload = function () {
        modal = document.getElementById("myModal");
        loginModal = document.getElementById("login");
        span = document.getElementsByClassName("close")[0];
        closeButton = document.getElementById("closeButton");
        body = document.getElementById("top");
    }


    $(document).ready(function () {
        $("#map").click(function () {
            $.ajax({
                url: "sessionData.php?val=uname", success: function (result) {
                    if (result != 1) {
                        swal("Sorry!!", "You have to login first", "warning", {
                            buttons: {

                                cancel: "Not Now",
                                catch: {
                                    text: "Login Now!",
                                    value: "catch",
                                }
                            },
                        })
                            .then((value) => {
                                switch (value) {

                                    case "catch":
                                        jQuery.noConflict();
                                        $('#logine').modal('show');
                                        break;

                                    default:
                                }
                            });
                    }else{
                        location.replace('user.php');
                    }

                }
            });
        });
    });

    function restaurant(x) {
        $.ajax({
            //   console.log(x);
            url: "restaurantData.php?res=" + x, success: function (result) {
                if (result == 1) {
                    swal("Sorry!!", "You have to login first", "warning");
                }
                else {

                    modal.style.display = "block";

                    span.onclick = function () {
                        modal.style.display = "none";

                    }
                    closeButton.onclick = function () {
                        modal.style.display = "none";

                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function (event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                    $("#res_name").html(x);
                    $("#res_table").html(result);
                }
            }
        });
    }

    function openLogin() {
        loginModal.style.display = "block";
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == loginModal) {
                loginModal.style.display = "none";
            }
        }
    }

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }


    function loginCheck() {
        var email = $("#email").val();
        var pass = $("#password").val();
        if (email != null && email != "" && pass != null && pass != "") {
            $.ajax({
                url: "./handlers/loginHandler.php",
                data: {Email: email, Pass: pass},
                success: function (result) {
                    if (result == 0) {
                        swal("Oops!!", "Wrong Email Or Password", "error");
                    }
                    else if (result == 1) {
                        swal("Yahooooo!!", "Login Successful", "success")
                            .then((value) => {
                                location.replace("user.php");
                            });

                    }
                    else if (result == 2) {
                        swal("Yahooooo!!", "Login Successful", "success")
                            .then((value) => {
                                location.replace("user.php");
                            });
                    }
                    else {
                        swal(result);
                    }
                }
            });
        } else {
            swal("Oops!!", "Wrong Email Or Password", "error");
        }
    }


    function forgetPassword() {
        var email = $("#emailReset").val();
        if (email != null && email != "" && validateEmail(email) == true) {
            $.ajax({
                url: "./handlers/forgetHandler.php",
                data: {Email: email},
                success: function (result) {
                    if (result == 0) {
                        swal("Oops!", "Email doesn't exist", "error");
                    }
                    else if (result == 1) {
                        swal("Success!", "We have send you email about the details", "success")
                            .then((value) => {
                                location.replace("user.php");
                            });

                    }
                    else {
                        swal(result);
                    }
                }
            });
        } else {
            swal("Error", "Invalid Email", "error");
        }
    }


    function setView() {
        location.replace('user.php');

    }

</script>


<body id="top">

<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('images/piz.jpg');height: 78vh;">
    <div class="wrapper row0">
        <div id="topbar" class="hoc clear">
            <div class="fl_left">
                <ul class="nospace">
                    <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
                    <li data-toggle="modal" data-target="#logine"><a>Login</a></li>
                    <li><a href="register.php">register</a></li>
                </ul>
            </div>
            <div class="fl_right">
                <ul class="nospace">
                    <li><i class="fa fa-phone"></i> +12345678</li>
                    <li><i class="fa fa-envelope-o"></i> khaboofficial@gmail.com</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <div id="logo" class="fl_left">
                <h1><a href="index.php">Khabo</a></h1>
            </div>
            <nav id="mainav" class="fl_right">
                <ul class="clear">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li id="map" value="How r u?"><a class="active" href="#" id="map" value="turn">Map</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="wrapper container_new">
        <div id="pageintro" class="">
            <article>
                <div class="heading" style="margin-top:-70px;">
                    <h1>Hungry?</h1><br>
                    <p style="font-size:125%;">Well, Look no more!</p>
                </div>
            </article>
        </div>
<!--        <div class="right" style="margin-top: 60px">-->
<!--            <form method="POST" action="handlers/regHandler.php" onsubmit="return checkall();">-->
<!--                <div class="form-group">-->
<!--                    <label for="username">Username</label>-->
<!--                    <input id="username" type="text" class="form-control" name="username" required-->
<!--                           autofocus onkeyup="checkname()">-->
<!--                    <span id="name_status" style="color: #ff4452"></span>-->
<!--                </div>-->
<!---->
<!--                <div class="form-group">-->
<!--                    <label for="email">E-Mail Address</label>-->
<!--                    <input id="email" type="email" class="form-control" name="email" required-->
<!--                           onkeyup="checkemail()">-->
<!--                    <span id="email_status" style="color: #ff4452"></span>-->
<!--                </div>-->
<!---->
<!--                <div class="form-group">-->
<!--                    <label for="password">Password</label>-->
<!--                    <input id="password" type="password" class="form-control" name="password" required-->
<!--                           data-eye>-->
<!--                </div>-->
<!---->
<!--                <div class="form-inline">-->
<!--                    <label for="user_status">Are you a owner:&nbsp;&nbsp;&nbsp;</label>-->
<!--                    <select name="user_status" id="user_status" style="color: initial">-->
<!--                        <option value="owner">Yes</option>-->
<!--                        <option value="user" selected>No</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--                <br>-->
<!---->
<!--                <div class="form-inline">-->
<!--                    <label>-->
<!--                        <input type="checkbox" name="agree" value="1" required> &nbsp; I agree to the Terms and-->
<!--                        Conditions-->
<!--                    </label>-->
<!--                </div>-->
<!--                <br>-->
<!--                <div class="form-group no-margin">-->
<!--                    <input type="submit" name="submit" value="submit" class="btn btn-primary btn-block"-->
<!--                           style="background-color: red!important;"/>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
    </div>
</div>
<!-- End Top Background Image Wrapper -->


<div class="wrapper row2">
    <div class="hoc container clear">
        <ul class="nospace group cta">
            <li class="one_third first">
                <article><i class="fa fa-search"></i>
                    <h6 class="heading font-x1"><a href="#">Search</a></h6>
                    <p>Search nearby restaurants!</p>
                </article>
            </li>
            <li class="one_third">
                <article><i class="fa fa-star"></i>
                    <h6 class="heading font-x1"><a href="#">Ratings</a></h6>
                    <p>Give ratings!</p>
                </article>
            </li>
            <li class="one_third">
                <article><i class="fa fa-map-signs"></i>
                    <h6 class="heading font-x1"><a href="#">Waypoints</a></h6>
                    <p>See warpaint of restaurants!</p>
                </article>
            </li>
        </ul>
    </div>
</div>

<div class="wrapper row3">
    <div class="hoc container clear">
        <div class="sectiontitle">
            <h6 class="heading">Top Places</h6>
            <p>These places are in high ratings for restaurants</p>
        </div>
        <ul class="nospace group services">
            <li class="one_third first btmspace-30" onclick="restaurant('khilgaon')">
                <article class="bgded overlay" style="background-image:url('images/khil.jpg');">
                    <h6 class="heading font-x1" id="area">Khilgaon</h6>

                </article>
            </li>
            <li class="one_third btmspace-30" onclick="restaurant('dhanmondi')">
                <article class="bgded overlay" style="background-image:url('images/dhan.jpg');">
                    <h6 class="heading font-x1" id="area">dhanmondi</h6>

                </article>
            </li>
            <li class="one_third btmspace-30" onclick="restaurant('kuratoli')">
                <article class="bgded overlay" style="background-image:url('images/baily.jpg'); ">
                    <h6 class="heading font-x1" id="area">kuratoli</h6>

                </article>
            </li>
            <li class="one_third first" onclick="restaurant('banani')">
                <article class="bgded overlay" style="background-image:url('images/bana.jpg');">
                    <h6 class="heading font-x1" id="area">banani</h6>

                </article>
            </li>
            <li class="one_third" onclick="restaurant('uttara')">
                <article class="bgded overlay" style="background-image:url('images/utt.jpg');">
                    <h6 class="heading font-x1" id="area">Uttara</h6>

                </article>
            </li>
            <li class="one_third" onclick="restaurant('gulshan')">
                <article class="bgded overlay" style="background-image:url('images/gul.jpg');">
                    <h6 class="heading font-x1" id="area">Gulshan</h6>

                </article>
            </li>
        </ul>
    </div>
</div>

</section>

<div class="wrapper row4">
    <footer id="footer" class="hoc clear">
        <div class="one_half first">
            <h6 class="heading">About us</h6>

            <ul class="nospace linklist contact">
                <li><i class="fa fa-map-marker"></i>
                    <address>
                        American International University -Bangladesh
                    </address>
                </li>
                <li><i class="fa fa-phone"></i> +12345678</li>
                <li><i class="fa fa-envelope-o"></i> khaboofficial@gmail.com</li>
            </ul>
        </div>
        <div class="one_quarter">
            <h6 class="heading">Admins</h6>
            <ul class="nospace linklist">
                <li><a href="#" style="color: white;">Minhaz Nihal</a></li>
                <li><a href="#" style="color: white;">Sakibul Alam</a></li>
                <li><a href="#" style="color: white;">Utsha Saha</a></li>
                <li><a href="#" style="color: white;">Farhan Hamim</a></li>
            </ul>
        </div>
    </footer>
</div>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>

</body>

<!-- Modal -->

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" id="myModal-content">
        <div class="modal-header" id="myModal-header">
            <h2 style="float: left">Restaurant in<font color="teal"> <i id="res_name"></i></font></h2>
            <span class="close" style="float: right;color:red">&times;</span>
        </div>
        <div class="modal-body" id="myModal-body" style="top:0px">
            <table class="table table-condensed" style="width: 100%;top:0px;padding-top: 0px">
                <thead class="sticky-top" style="margin-top: -2px">
                <tr>
                    <th>Restaurant Name</th>
                    <th>Address</th>
                    <th>Rating</th>
                    <th>Map</th>
                </tr>
                </thead>
                <tbody id="res_table" class="tableBody">

                </tbody>
            </table>

        </div>
        <div class="modal-footer" id="myModal-footer">
            <button class="btn-danger" id="closeButton" style="float: right">Close</button>
        </div>
    </div>
</div>


<!--login modal-->
<div class="modal fade " id="logine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar" role="document">
        <div class="modal-content">
            <div class="modal-header text-center jello">
                <img src="images/logo3.png" style="border-radius: 50%;background-color: white">
            </div>
            <div class="modal-body mx-3">
                <h2 style="margin-left: 38%;padding-bottom: 5%">Log In</h2>
                <div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="email" id="email" class="form-control validate" placeholder="Your Email" required>

                </div>

                <div class="md-form mb-4">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="password" class="form-control validate" placeholder="Password" required>

                    <a href data-toggle="modal" data-target="#reset" data-dismiss="modal">Forget Password? </a><br/>

                </div>

                <p>Not have an account?<a href="register.php"> Sign Up Now</a></p>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-outline-success" onclick="loginCheck()">Login&nbsp;&nbsp;&nbsp;&nbsp;<i
                            class="fa fa-sign-in"></i></button>
                <button class="btn btn-outline-danger" data-dismiss="modal" id="loginReset">Close&nbsp;&nbsp;&nbsp;&nbsp;<i
                            class="fa fa-times-circle"></i></button>
            </div>
        </div>
    </div>
</div>
<!--end-->
<!--reset modoal-->
<div class="modal fade " id="reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar" role="document">
        <div class="modal-content">
            <div class="modal-header text-center jello">
                <img src="images/logo3.png" style="border-radius: 50%;background-color: white">
            </div>
            <div class="modal-body mx-3">
                <h2 style="margin-left: 22%;padding-bottom: 5%">Reset Password</h2>
                <div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="email" id="emailReset" class="form-control validate" placeholder="Your Email" required>

                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-outline-success" onclick="forgetPassword()">Reset&nbsp;&nbsp;&nbsp;&nbsp;<i
                            class="fa fa-sign-in"></i></button>
                <button class="btn btn-outline-danger" data-dismiss="modal" data-toggle="modal" data-target="#logine">
                    Close&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-times-circle"></i></button>
            </div>
        </div>
    </div>
</div>

</html>