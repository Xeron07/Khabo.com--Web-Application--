<?php 
 include("dbConnection.php");

$db=new DBConn();

if(isset($_GET['name']))
 {
 	if($db->connect()==1)
 	{
 		$x=$_GET['name'];

 		$sql="select * from restaurant where name like '%".$x."%'";

 		if($db->connect()==1)
 		{
 			$result=$db->getResult($sql);
 			if($result->num_rows >0)
 			{
 				while($row=$result->fetch_assoc())
 				{
 					echo "<a onclick='setTo(".$row['lat'].",".$row['lng'].",\"".$row['name']."\")'><i class='fas fa-utensils'></i>".$row['name']."</a><br/>";
 				}
 			}
 		}
     }
 }
?>