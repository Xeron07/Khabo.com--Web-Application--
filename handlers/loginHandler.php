<?php

include("../dbConnection.php");
global $db;
$db = new DBConn();


//function to get  user name
function fetchData($db, $sql)
{
    if ($db->connect() == 1) {
        $result = $db->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['uname'] = $row['username'];

        }
    }
}


if (isset($_GET['Email'])) {
    $email = $_GET['Email'];
    $pass = $_GET['Pass'];
     //echo $email;
	 //echo $pass;
    $sql = "select * from user where email='$email' and password='$pass' ";
    if ($db->connect() == 1) {
		//echo $pass;
        $result = $db->getResult($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            session_start();

            $_SESSION['status'] = $row['status'];
            $_SESSION['uid'] = $row['id'];
            

            if ($row['status'] == "owner") {
                $sql = "select * from shop_owner where id=" . $row['id'];
                
                //fetchData($db, $sql);
                echo 2;
            } else if ($row['status'] == "admin") {
                $sql = "select * from admin where id=" . $row['id'];

                //fetchData($db, $sql);
                echo 1;
            }
             else if ($row['status'] == "other") {
                $sql = "select * from other where id=". $row['id'];

                //fetchData($db, $sql);
                echo 3;
            }

            $result= $db->conn->query($sql);


        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            $_SESSION['uname']=$row['name'];
            
        }
       } else {
            echo 0;
        }
    }
    else
    {
        echo 100;
    }
}


?>