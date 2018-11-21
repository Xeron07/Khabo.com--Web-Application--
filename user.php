<?php
 include("dbConnection.php");


session_start();

$s=& $_SESSION;
if(isset($s['uname']))
{

 $res_data=array();
 $db=new DBConn();
 $db->dbname="khabo";
 $sql="select * from restaurant";

 if($db->connect()==1)
 {
   $result=$db->conn->query($sql);
   if($result->num_rows > 0)
   {
   
    while($row=$result->fetch_assoc())
    {
      $a=array($row['name'],$row['address'],$row['lat'],$row['lng'],$row['type']);
      array_push($res_data,$a);
    }

   }
  
 }
}
else{
  header("Location:index.php?val=0");
}

?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="viewport" content="width=device-width, initial-scale=1">

<html>
<head>
	<title>user</title>
</head>
<link rel="stylesheet" type="text/css" href="css/user-style.css">
<link rel="stylesheet" type="text/css" href="css/menu-style.css">

<?php
 include "include/user-stylemaker.php";
?>
<script src="js/menu.js"></script>
<script src="map/map.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="css/user-style.css"> -->



<!-- javascript -->
<script>
  var x;
  var resData;
  var resId;
  var count=1;



window.onload=function()
{
   
   resData=<?php echo json_encode($res_data, JSON_PRETTY_PRINT) ?>;
   
   load();

   document.getElementById('from').value="";
   document.getElementById('to').value="";
   
   /*window.setTimeout(Map,3000);*/

    $.ajax({
             //   console.log(x);
                url: "resturant.php?cal="+count, success: function (result) {
                    if (result == 1) {
                        swal("Sorry!!", "You have to login first", "warning");
                    }
                    else{
                    
                      $("#showCards").html(result);
                      count=count+1;
                    }
                  }
              });
   
     

}


function restaurants(){
        $.ajax({
             //   console.log(x);
                url: "resturant.php?cal="+count, success: function (result) {
                    if (result == 1) {
                        swal("Sorry!!", "You have to login first", "warning");
                    }
                    else{
                    
                      $("#showCards").html(result);
                      count=count+1;
                    }
                  }
              });
     }


function openNav() {
    document.getElementById("cssmenu").style.width = "100px";
}

function closeNav() {
    document.getElementById("cssmenu").style.width = "0";
}
function Open(){
     $("#menuButton").animate({
      width:'255px'
     });
     $("#menuContent").animate({
      width:'256px'
     });
     $("#map").animate({
      left:'58px',
      width:'70%'
     });

     $("#mennu").attr('class','');
     $("#mennu2").attr('class','fas fa-times-circle');
    $("#cssmenu").delay(500).slideDown("slow");
     $("#menuButton").attr('onclick','Close()');
}
function Close(){
  
   $("#cssmenu").slideUp("slow");
    $("#mennu").attr('class','fas fa-bars');
     $("#mennu2").attr('class','');
     $("#menuButton").attr('onclick','Open()');
   $("#menuButton").delay(600).animate({
      width:'95px'
     });
   $("#menuContent").delay(600).animate({
      width:'100px'
     });
   $("#map").delay(600).animate({
      left:'5px',
      width:'90vw'
     });
    
}


function showRestaurant(x)
{
   if(x.length!=0 && x!==null && x!==""){
  $.ajax({
             //   console.log(x);
                url: "onlyRestaurant.php?res="+x, success: function (result) {
                    if (result == 1) {
                        swal("Sorry!!", "You have to login first", "warning");
                    }
                    else{
                       
                       $("#showSuggestion").css({"display":"block"});
                      $("#showSuggestion").html(result);
                    }
                  }
              });
}else{
  
 $("#showSuggestion").css("display","none");
  }
}

function showRestaurant1(x)
{
  if(x!=""){
  $.ajax({
             //   console.log(x);
                url: "onlyRestaurant2.php?res="+x, success: function (result) {
                    if (result == 1) {
                        swal("Sorry!!", "You have to login first", "warning");
                    }
                    else{
                         $("#showSuggestion1").css({"display":"block","border":"1px solid black","padding":"5px"});
                      $("#showSuggestion1").html(result);
                    }
                  }
              });
}
else{
  
 $("#showSuggestion1").css("display","none");
  }
}

function places(x)
{
  if(x!=""){
  $.ajax({
             //   console.log(x);
                url: "placesData.php?place="+x, success: function (result) {
                    if (result == 1) {
                        swal("Sorry!!", "You have to login first", "warning");
                    }
                    else{
                           
                         $("#placeSuggest").css({"display":"block","border":"1px solid black","padding":"5px"});
                      $("#placeSuggest").html(result);
                    }
                  }
              });
}
else{
  
 $("#placeSuggest").css("display","none");
  }
}
function toRes(x)
{
  if(x.length!=0 && x!==null && x!==""){
  $.ajax({
             //   console.log(x);
                url: "restaurantNames.php?name="+x, success: function (result) {
                    if (result == 1) {
                        swal("Sorry!!", "You have to login first", "warning");
                    }
                    else{
                       
                       $("#resSuggest").css({"display":"block"});
                      $("#resSuggest").html(result);
                    }
                  }
              });
}else{
  
 $("#resSuggest").css("display","none");
  }
}

var from=null;
var to=null;

function setFrom(x,y,z)
{
 
  from=new Microsoft.Maps.Location(x,y);
  document.getElementById('from').value=z;
   $("#placeSuggest").css({"display":"none"});

}

function setTo(x,y,z)
{
  to=new Microsoft.Maps.Location(x,y);
  document.getElementById('to').value=z;
   $("#resSuggest").css({"display":"none"});
}

//setDirection function without parameter
function showDirection()
{
   swal("From: "+from+" To: "+to);
   //setDirection function with parameter
   initMap();
   setDirection(from,to);
}




function mapLoad()
{
  window.setTimeout(initMap,3000);
  //initMap();
}

function setValue(x,y)
{
  document.getElementById('search1').value=x;
   $("#showSuggestion").css({"display":"none"});
   searchRestaurant(y);


}

function setValue2(x,y)
{
  document.getElementById('search2').value=x;
   $("#showSuggestion1").css({"display":"none"});
   resId=y;
}


function home()
{
    location.replace("index.php");
}


function ResFromDropDown(x)
{
  if(x!=""){
  $.ajax({
             //   console.log(x);
                url: "resDataforDd.php?place="+x, success: function (result) {
                    if (result == 1) {
                        swal("Sorry!!", "no Res Found");
                    }
                    else{
                           
                         $("#placeSuggest").css({"display":"block","border":"1px solid black","padding":"5px"});
                      $("#placeSuggest").html(result);
                    }
                  }
              });
}
else{
  
 $("#placeSuggest").css("display","none");
  }
}
 
</script>
<!-- javascript end -->

<body style="background:url('images/a.jpg')">

<!---- New navbar start------>
<div class=".container">
<nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-fixed-top">
  <a class="text-white navbar-brand" href="#" style="width:60%">
  <p onclick="home()">
   <img src="images/logo3.png"  width="60px;" class="img-fluid" alt="Responsive image" >Khabo
  </p>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon bg-secondary"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="margin-left:50%">
	  <li></li><li></li>
      <li class="nav-item active">
        <a class="text-white nav-link page-scroll" href="#" >Welcome, <?php echo $s['uname']; ?><span class="sr-only">(current)</span></a>
      </li>  
	  <li class="nav-item">
        <a class="text-white nav-link active" href="#">LOGOUT </a>
      </li>
    </ul>
    <!--
    <form class="form-inline my-2 my-lg-4">
      <input class="form-control mr-sm-6" type="search" placeholder="Search here . . .">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Go</button> &nbsp &nbsp &nbsp
    </form>
	--->
  </div>
</nav>
</div>

	


<!------navbar End-------->

  
  
  <div class="container-fluid" style="width:100%; margin-left:3%;border-color:red" border="1" >
       <div style="width:30%;height:80vh;background-color: white" id="menuContent">
        <button  type="button" class="btn btn-outline-light" style="margin-top: 2%;color: black;border-color: black" id="menuButton" onclick="Open()"><i id="mennu" class="fas fa-bars"></i>Menu<i id='mennu2'></i></button>
        <!-- side nav -->
        <div id="cssmenu" style="margin-left: px">     
              <ul>
                <li><a><span><input type="text" placeholder="Search" id="search1"  onkeyup="showRestaurant(this.value)"><br/>
                             </span><div id="showSuggestion" style="border:1px solid white;border-radius: 5px; background-color: transparent;margin-top:2%;width: 90%;display: none"></div></a>
                </li>
                <li class='has-sub'><a><span><i class="fas fa-directions">Directions</i></span></a>
                    <ul style="max-height:20%;overflow: scroll;">

                      <li><a href="#"><input type="text" name="from" id="from" placeholder="From" onkeyup="places(this.value)">
                          <div id="placeSuggest" style="border:1px solid white;border-radius: 5px; background-color: transparent;margin-top:2%;width: 90%;display: none;max-height: 120px;overflow: auto"></div></a></li>

                      <li><a href="#"><input type="text" name="to" id="to" placeholder="To (Restaurant)" onkeyup="toRes(this.value)">
                         <div id="resSuggest" style="border:1px solid white;border-radius: 5px; background-color: transparent;margin-top:2%;width: 90%;display: none;max-height: 120px;overflow: auto"></div>
                       </a></li>

                      <li><a href="#"><button class="btn btn-outline-success" onclick="showDirection()"><i class="fas fa-directions">GO</i></button></a></li> 
                      
                    </ul>
                </li>
                <li class='last' onclick="setLoc()"><a><span><i class="fas fa-location-arrow"></i>My Location</span></a></li>
              </ul>
        </div>
         </div>
         <!-- map div -->
         <div class="container" style="width:100vw; height: 80vh;margin-top: -80vh;background-color: #1c212b" id="map">
          <img id="loading" src="images/infinity-loader.gif" height="90%" width="103%" ><br/>
          <h2 style="color: White;margin-left: 35%">Map Will Load Here</h2>
         </div>  
         <!-- end of map div -->
  </div>
 

  <!-- side nav end -->
  <br/>
  <br>
  <!--- New 2nd navbar------------->
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-fixed-top">
  <a class="text-white navbar-brand" href="#" style="width:"><h4><i>Restaurants</i></h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon bg-secondary"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="text-white nav-link page-scroll" href="#">Nearby restaurant<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="text-white nav-link" href="#">Top rated restaurant</a>
      </li>
	   <li class="nav-item dropdown ">
              <span class="dropdown-toggle nav-link text-white nav-link active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort By</span>
              <div class="dropdown-menu bg-danger">
                <i class="dropdown-item">Rating 5</i>
                <i class="dropdown-item">Rating 4</i>
                <i class="dropdown-item">Rating 3</i>
                <i class="dropdown-item">Rating 2</i>
                <i class="dropdown-item">Rating 1</i>
                <i class="dropdown-item">Restaurants in Gulshan</i>
                <i class="dropdown-item">Restaurants in Banani</i>
                <i class="dropdown-item">Restaurants in Uttara</i>
                <i class="dropdown-item">Restaurants in Dhanmondi</i>
              </div>
            </li>
    </ul>
    
    <form class="form-inline my-2 my-lg-4">
      <input class="form-control mr-sm-6" type="search" placeholder="Search here . . .">
	  <button class="btn btn-outline-success my-2 my-sm-0" type="button"><i class="fa fa-search"></i></button>
	  &nbsp &nbsp &nbsp
  
    </form>
  </div>
    

</nav>
</div>
 <br>
<!----2nd navabr End ------------->
  <!-- second nav -->

  <!--
  <div class="container" style="width:130%;" >
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
      <a class="navbar-brand" style="color:white;margin-top: -2%"><b>Restaurants</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#resturentContent" aria-controls="resturentContent" aria-expanded="false" aria-label="toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="resturantContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link ">Nearby resturant</a>
                </li>
            <li class="nav-item " >
              <a class="nav-link">Top rated Restaurant</a>&nbsp;
            </li>
            <li class="nav-item dropdown ">
              <span class="dropdown-toggle nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort By</span>
              <div class="dropdown-menu bg-danger">
                <i class="dropdown-item">Rating 5</i>
                <i class="dropdown-item">Rating 4</i>
                <i class="dropdown-item">Rating 3</i>
                <i class="dropdown-item">Rating 2</i>
                <i class="dropdown-item">Rating 1</i>
                <i class="dropdown-item">Restaurants in Gulshan</i>
                <i class="dropdown-item">Restaurants in Banani</i>
                <i class="dropdown-item">Restaurants in Uttara</i>
                <i class="dropdown-item">Restaurants in Dhanmondi</i>
              </div>
            </li>
            <li class="nav-item " >
                 <form class="form-inline my-2 my-lg-0" >
                <input class="form-control mr-sm-2" type="text" placeholder="Search" id="search2" onkeyup="showRestaurant1(this.value)">
                <button class="btn btn-outline-success my-2 my-sm-0" type="button"><i class="fa fa-search"></i></button>
            </form>  
            <div id="showSuggestion1" style="background-color: gray;width:100%"></div>
            </li>
        
            </ul>
        </div>
    </nav> 
	</div>
	-->
    <!-- end of nav bar -->
  


 <!-- card view -->
  <div class="container" id="showCards" style="width:90%">
   <!--  <div class="card" style="width:300px">
    <img class="card-img-top text-center" src="images/a.JPG" alt="Card image" width="300px">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text.</p>
      <a href="#" class="btn btn-primary">Show Details</a>
    </div> -->
  </div>

  </div>
  <!-- end of card view -->

  <!-- end body-->


</body>
 <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=Alg9ztna0BT15fyYsvYpYMOT9Rz3TB8t06jN2oWBwXMaSKJuq47a2kpI9ISBHC_9&callback=mapLoad' async defer></script>
</html>