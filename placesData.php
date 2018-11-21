<?php
 include("dbConnection.php");
 $db=new DBConn();

 if(isset($_GET['place']))
 {
 	if($db->connect()==1)
 	{
 		$x=$_GET['place'];

 		$sql="select * from places where areaName like '%".$x."%'";

 		$result=$db->getResult($sql);

 		if($result->num_rows >0)
 		{
 			while($row=$result->fetch_assoc())
 			{
 				echo "<a onclick='setFrom(".$row['lati'].",".$row['longi'].",\"".$row['areaName']."\")'><i class='fas fa-map-marker-alt'></i>".$row['areaName']."</a><br/>";
 			}
 		}
 		else{
 			echo "no places found";
 		}

 	}
 }
?>