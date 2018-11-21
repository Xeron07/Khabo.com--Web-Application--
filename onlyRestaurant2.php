<?php
  include("dbConnection.php");
  $db=new DBConn();

  if(isset($_GET['res']))
  {
  	$r=$_GET['res'];
  	$sql="select * from restaurant where name  like \"".$r."%\"";
  	if($db->connect()==1)
  	{
  		
  		$result=$db->conn->query($sql);
  		if($result->num_rows > 0)
  		{
           while($row=$result->fetch_assoc())
           {
           	 echo "<a onclick='setValue2(\"".$row['name']."\",".$row['id'].")'>".$row['name']."</a><br/>";
           }
  		}
  		else echo "no restaurant found";
  	}
  }
?>