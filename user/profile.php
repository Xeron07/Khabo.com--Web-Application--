<?php 
session_start();
error_reporting(0);
require "dbConnection.php";
$db=new DBConn();
$unm=$email=$gendr=$phnnum="";

if (isset($_SESSION['uid'])) {

 $sql="select * from user where name='".$_SESSION['uid']."'";
 
 if($db->connect()==1){
 $data=$db->conn->query($sql);
 if ($data->num_rows> 0) {
  while ($row = $data->fetch_assoc()){
    $id=$row["id"];
    $email=$row["email"];
    $sql="select * from other where id=".$id;
    $data=$db->conn->query($sql);
    if ($data->num_rows> 0)
        {
          $row=$data->fetch_assoc();
          $uname=$row['name'];
          $=$row['name'];
          
        }
     }

   }
 }

}else{
  header("location:index.php");
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profile</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	 <link rel="stylesheet" href="css/style.css" alt="text/css">
   
</head>
<body>
     <div class="container">
  <a href="index.php" class="btn btn-primary btn-block col-md-4"><strong>HOME</strong></a>
  <div class="card" style="width:350px">
    <!-- <img class="card-img-top" src="img/women.jpg" alt="Card image" style="width:100%"> -->
     <!-- profile img start -->
     <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <!--  <a href="#" class="btn btn-dark">Upload new picture</a> -->
          <div class="col-md-12">
          	<br>
            <div class="custom-file mb-2">
            	<a href="#"class="btn btn-dark">
      <input type="file" class="col-md-1 custom-file-input" id="customFile" name="filename">
       Upload Picture</a>
      <!-- <label class="custom-file-label text-left" for="customFile">Choose file</label> -->
    </div>
   </div>
  </div>

      <!-- profile img end -->
    <div class="card-body">
      <h4 class="card-title"><?php  echo $_SESSION["user"];  ?></h4>
      <a href="editProfile.php" class="btn btn-primary">Edit Profile</a>

      <!-- change password start -->
      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Change Password</a>
         <div class="container">
         <!-- Button to Open the Modal -->
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Password</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		  <div class="modal-body">
		 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		    <div class="form-group">
		      <label for="email">Current Password</label>
		      <input type="password" class="form-control" id="pass" placeholder="current password" name="pswd">
		    </div>
		    <div class="form-group">
		      <label for="pwd">New Password:</label>
		      <input type="password" class="form-control" id="pwd" placeholder="new password" name="npswd">
		    </div>
		     <div class="form-group">
		      <label for="pwd">Confirm New Password:</label>
		      <input type="password" class="form-control" id="cpwd" placeholder="Confirm new password" name="cpswd">
		    </div>
		    
       <input class="btn btn-primary btn-block" type="button" name="save" value="SAVE" onclick="changePassword()">
		  </form>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

       <!-- Change password end -->
    </div>
  </div>
  <!-- edit profile -->
  <fieldset data-role="controlgroup">
     <div class="tab-content col-md-6">
            <div class="tab-pane active" id="home">
                <hr>
                  <div class="row">
		                <div class="col-md-12">
		                    <form>
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">User Name</label> 
                                <div class="col-8">
                                  <input id="username" name="username" class="form-control here" type="text" value="<?php echo $_SESSION['user'];?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Full Name</label> 
                                <div class="col-8">
                                  <input id="name" name="name" class="form-control here" type="text" value="<?php echo $unm;?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Gender</label> 
                                <div class="col-8">
                                  <input id="name" name="gender" class="form-control here" type="text" value="<?php echo $gendr;?>" readonly>
                                </div>
                              </div>
                          
                              <div class="form-group row">
                                <label for="website" class="col-4 col-form-label">Mobile Number</label> 
                                <div class="col-8">
                                  <input id="website" name="website" class="form-control here" type="text" value="<?php echo $phnnum;?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email</label> 
                                <div class="col-8">
                                  <input id="email" name="email" class="form-control here" type="text" value="<?php echo $email;?>" readonly>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
                      
              </div>
          </div>
      </fieldset>
      </div>
      <hr>

	<!-- js CDN -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

	<!-- fontawesome -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
</body>

<script type="text/javascript">
  
  function changePassword()
  {
    var cpass=$("#pass").val();
    var npass=$("#pwd").val();
    var ncpass=$("#cpwd").val();

    $.ajax({
       url:"changePassword.php",
       data:{oldPass:cpass,newPass:npass},
       success:function(result)
       {
        if(result==1)
        {
          alert("password changed");
        }
        else{
          alert(result);
        }
       }
    });
  }

</script>



</html>

?>
