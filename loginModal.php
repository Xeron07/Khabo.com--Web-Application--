<?php
 include "include/header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<style type="text/css">
	#logine{
		display: none;
	}

</style>

<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
      <div class="loginbox" id="login">
      	<img src="images/login.png" class="avatar">
        <h1>Khabo</h1>
        <form>
            <p>Username</p>
            <input type="text" name="" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="" placeholder="Enter Password">
            <input type="button" name="" value="Login" onclick="openLogin()" data-toggle="modal" data-target="#logine">
            <a href="#">Lost your password?</a><br>
            <a href="#">Don't have an account?</a>
        </form>
    </div>
<div class="modal fade" id="logine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                  <img src="images/logo3.png"  style="border-radius: 50%;background-color: white">
            </div>
            <div class="modal-body mx-3">
            	<h2 style="margin-left: 38%;padding-bottom: 5%">Log In</h2>
                <div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="email" id="inputPlaceholderEx" class="form-control validate" placeholder="Your Email">
                   
                </div>

                <div class="md-form mb-4">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="inputPlaceholderEx" class="form-control validate" placeholder="Password">
                   
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-outline-success">Login<i class="fa fa-sign-in"></button> 
                <button class="btn btn-outline-danger" data-dismiss="modal">Close<i class="fa fa-times-circle"></button>
            </div>
        </div>
    </div>
</div>
</body>
</html>