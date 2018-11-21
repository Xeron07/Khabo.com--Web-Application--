<?php
require '../configs/dbConfig.php';
$rating = $_GET['rating'];
$id=$_GET['id'];
$result1=mysqli_query($conn,"UPDATE `res_rating` SET `rating`=floor((`rating`+'$rating')/2) WHERE id='$id'");
if($result1==false){
    echo 0;
}else{
    $result=mysqli_query($conn,"select `rating` from `res_rating` where id='$id'");
    while($row=mysqli_fetch_assoc($result)){
        echo (int)$row["rating"];
    }
}