<?php
 session_start();
?>

<!doctype html>

 <html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

 

</head>
<body>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
	 background-image: url("b.jpg");
}

.sidenav {
    height: 100%;
    width: 350px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #0d1a26;
    overflow-x: hidden;
}


.sidenav a {
    color: white;
    padding: 16px;
    text-decoration: none;
    display: block;
}

.sidenav a:hover {
    background-color: #ddd;
    color: black;
}

.content {
    margin-left: 200px;
    padding-left: 20px;
}


form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
}

form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}
form.ex button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #0d1a26;
    color: red;
	top:900;
	left:100;
    font-size: 17px;
    border-left: none;
    cursor: pointer;
}

form.example button:hover {
    background: #0b7dda;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}
</style>

    <aside id="left-panel" class="left-panel">
      
      <div>
      <img src="avatar.png" align="middle "width="70%" class="img-fluid" alt="Responsive image">
      <a style="color:white;font-size:26px;width:100%;margin-top:50px>"><?php echo $_SESSION['uname'];?></a>
      </div>
      </br>
       </br>
        </br>
    
       <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search.." name="search2">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
      
    <!-- <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default btn-block" id="a" style="border-color: #47d147;background-color: #47d147;height:40px;font-size:18px;color:white;margin-top:50px;width:100%;">Change Email</button> -->
    
 <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default btn-block" id="a" style="border-color:#ff4d4d;background-color:#ff4d4d;height:40px;font-size:18px;color:white;margin-top:50px;width:100%;">Change Password</button>
    
    </aside>

  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Changing</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!--Modal Body -->
         <div class="modal-body">
          <input type="text" name="email" placeholder="Email Address" /><br/><br/>
          <input type="password" name="oldpass" placeholder="Old Password" /><br/><br/><br/>
          <input type="password" name="npass" placeholder="New Password" />
          <input type="password" name="rnpass" placeholder="Re-Type New Password" />
          
            </div>
       
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Change</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
        
<img src="logo3.png" width="7%" class="img-fluid" alt="Responsive image">
            
        </header>

        
        <div class="content mt-3">

            <div class="col-sm-12"> </div>


           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="dropdown-menu-content">
                                   
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                       <i class="fa fa-user"; style="font-size:26px"></i>
                       
                       <p class="text-light">Users</p>
                           <span class="count" >5</span> 
                        </h4>
                         

                        <div class="chart-wrapper px-0" style="height:70px;" height="70"> </div>

                    </div>

                </div>
            </div>
            

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
<h4 class="mb-0">
</br>

<p class="text-light">Restaurants</p>
              <span class="count">10</span>
               
            </h4>
                       

                        <div class="chart-wrapper px-3" style="height:70px;" height="70"> </div>

                    </div>
                </div>
            </div>
<div class="col-xl-3 col-lg-6"> </div>
</div> 
    </div>

</body>
</html>
