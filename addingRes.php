<?php
 include("dbConnection.php");

 $p=& $_POST;
 $err=0;


  $db=new DBConn();
  $sql="select id from restaurant order by id desc";

  if($db->connect()==1)
  {
  	$result=$db->conn->query($sql);
  	$row=$result->fetch_assoc();
  	$id=$row['id'];
  	$target_dir="./resturantImg/rid".($id+1)."/";
    mkdir("./resturantImg/rid".($id+1),0777);
  }




 if(isset($p['submit']))
 {
   
   $str = $target_dir . "rid".($id+1);
   $f1 = $target_dir . "1.jpg";
   $f2 = $target_dir . "2.jpg";
   $f3 = $target_dir . "3.jpg";
   $f4 = $target_dir . "4.jpg";
   $f5 = $target_dir . "5.jpg";
   $f6 = $target_dir . "6.jpg";









   	 if (move_uploaded_file($_FILES["str_pic"]["tmp_name"], $str)) {

    } else {
    	$err=1;
    }



     if (move_uploaded_file($_FILES["f1"]["tmp_name"], $f1)) {

    } else {
    	$err=1;
    }



    if (move_uploaded_file($_FILES["f2"]["tmp_name"], $f2)) {

    } else {
        $err=1;
    }



     if (move_uploaded_file($_FILES["f3"]["tmp_name"], $f3)) {

    } else {
        $err=1;
    }


     if (move_uploaded_file($_FILES["f4"]["tmp_name"], $f4)) {

    } else {
        $err=1;
    }



     if (move_uploaded_file($_FILES["f5"]["tmp_name"], $f5)) {

    } else {
        $err=1;
    }


    if (move_uploaded_file($_FILES["f6"]["tmp_name"], $f6)) {

    } else {
        $err=1;
    }


    
    $filename="menu".($id+1).".xml";

    $xml = new XMLWriter();
    $xml->openMemory();
    //$xml->openURI("php://output");  //print on screen no file output
    $xml->setIndent(true);
    $xml->startDocument('1.0', 'UTF-8');
   
    


      $xml->startElement("menu");
      $xml->writeElement("id", ($id+1));
   
     for($i=0;$i<6;$i++)
     {
        $xml->writeElement("items".$i, $p['item'.($i+1)]);
        $xml->writeElement("prizes".$i, $p['p'.($i+1)]);
     }


      $xml->endElement();

       $xml->endElement();
    $xml->endDocument();

    
    $file = $xml->outputMemory();
    file_put_contents($filename,$file);

    $latlong    =   get_lat_long($p['address']); // create a function with the name "get_lat_long" given as below
        $map        =   explode(',' ,$latlong);
        $mapLat         =   $map[0];
        $mapLong    =   $map[1];

  if($err==0){

  	if($db->connect()==1)
  {
      $sql="insert into restaurant (id,name,address,lat,lng,type) values (".($id+1).",\"".$p['rname']."\",\"".$p['address']."\",'$mapLat','$mapLong',\"".$p['type']."\")";
      $sql2="insert into menutable (items)values(6)";
      $sql3="insert into res_rating (id,area,rating) values(".($id+1).",\"".$p['area']."\",1)";
      $sql4="INSERT INTO `details`(`id`, `description`, `store_pic`, `food_pic1`, `food_pic2`, `food_pic3`, `food_pic4`, `food_pic5`, `food_pic6`, `menuId`) VALUES (".($id+1).",\"".$p['description']."\",'$str','$f1','$f2','$f3','$f4','$f5','$f6',".($id+1).")";
      if(isset($_COOKIE['email']))
      {
          $s="select * from users where email=\"".$_COOKIE['email']."\"";
          $result=$db->conn->query($s);
          $row=$result->fetch_assoc();
          $uid=$row['id'];
          echo $_COOKIE['email'];
          $sql0="insert into owners (id,s_id)values('$uid',".($id+1).")";
          $r1=$db->conn->query($sql0);
          if($r1===TRUE)
              setcookie("email", "", time() - 3600);
      }

      $result=$db->conn->query($sql);
      $res=$db->conn->query($sql2);
      $r=$db->conn->query($sql3);
      $ri=$db->conn->query($sql4);

      header("Location:index.php");
      
      if($result == true && $res==true && $r==true && $ri==true)
      {
      	echo "success";

      }
  }
}

  

 }

function get_lat_long($address){

    $address = str_replace(" ", "+", $address);

    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=bd");
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    return $lat.','.$long;
}




?>