<?php
/**
 * Created by PhpStorm.
 * User: xeron
 * Date: 8/7/18
 * Time: 10:40 PM
 */


include("dbConnection.php");

$dbname="khabo";
$db=new DBConn();
$db->dbname=$dbname;



if(isset($_GET['res'])) {
    if ($db->connect() == 1) {
        $sql = "select * from restaurant where id in(select id from res_rating where area='" . $_GET['res'] . "')";
        
        $result= $db->conn->query($sql);


        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // output data of each row
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                 $sql2="select rating from res_rating where id=".$row['id'];
                  $r= $db->conn->query($sql2);
                  $rr=$r->fetch_assoc();

                 echo "<td>" . $rr['rating'] . "</td>";
                echo "<td><button class='btn btn-outline-success' onclick='setView()'>View on map</button></td>";
                echo "</tr>";
            }
        }
        else{
            echo 1;
        }
    } else{
        echo 1;
    }
} else{
    echo 1;
}


?>