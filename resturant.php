<?php
include("dbConnection.php");
$i=0;
$dbname="khabo";
$db=new DBConn();
$db->dbname=$dbname;
if(isset($_GET['cal'])) {
    $count = $_GET['cal'];
    $count = $count * 3;

    if ($db->connect() == 1) {
        $sql = "select * from details order by id limit " . $count;
        $result = $db->conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $id = $row['id'];
                if ($i % 3 == 0) {
                    echo '<div class="row">';
                }
                $i = $i + 1;
                echo ' <div class="card col-sm-4" style="width:200px">';
                echo ' <img class="card-img-top text-center" src="' . $row['store_pic'] . ' " alt="Card image">';
                echo '    <div class="card-body">';
                $sql = "select name from restaurant where id =" . $id;
                $res = $db->conn->query($sql);
                if (!empty($res)) {
                    // output data of each row
                    while ($r = $res->fetch_assoc()) {
                        echo '<h4 class="card-title">' . $r['name'] . '</h4>';
                    }
                }
                echo '      <p class="card-text">' . $row['description'] . '</p>';
                echo '      <a href="shop.php?res=rid' . $id . '" class="btn btn-primary">Show Details</a>';
                echo '    </div></div>';

                if ($i % 3 == 0) {
                    echo "</div><br/>";
                }

            }

            echo '<button type="button" class="btn btn-outline-info btn-sm btn-block" onclick="restaurants()">Show More</button><br/><br/>';
        } else {
            echo "no data";
        }
    } else {
        echo "db connection error";
    }
}
?>