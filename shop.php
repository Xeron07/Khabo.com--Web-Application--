<?php
session_start();
$s =& $_SESSION;
if (isset($s['uname'])) {
    if (isset($_GET['res'])) {
        if (!empty($_GET['res'])) {
            $res = $_GET['res'];
            $resid = ltrim($res, "rid");
        } else {
            header('index.php');
        }
    } else {
        header('index.php');
    }
} else {
    header("Location:index.php");
}



?>

<!DOCTYPE html>

<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
    <title>Khabo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/shop-layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/shop-style.css">
    <link href="css/comment.css" rel="stylesheet">
    <?php
    include "include/header.php";
    ?>
    <!--  <link rel="stylesheet" type="text/css" href="include/bootstrap4/css/bootstrap.min.css">
      -->
    <!-- jQuery library -->
    <script src="include/jquery/dist/jquery.min.js"></script>

    <!-- sweetalert alert js -->

    <script type="text/javascript">
        function giveRating() {
            var rating;
            var id = "<?php echo $resid?>";
            var x = document.getElementsByName('star');
            for (var i = 0; i < x.length; i++) {
                if (x[i].checked == true) {
                    rating = x[i].value;
                } else {
                    swal("No rating!", "Please select rating", "error");
                }
            }
            $.ajax({
                url: "./handlers/ratingHandler.php",
                data: {rating: rating, id: id},
                success: function (result) {
                    if (result == 0) {
                        swal("Oops!!", "Something is wrong", "error");
                    }
                    else {
                        swal("OK!!", "Rating added", "success");
                        $("#addReview").hide();
                        document.getElementById('ratingNew').innerHTML = '<h3>Current Rating</h3>';
                        var x = document.getElementsByName('star');
                        for (var i = 0; i < x.length; i++) {
                            if (x[i].value == result) {
                                x[i].checked = true;
                            }
                        }
                    }
                }
            });
        }
    </script>

</head>
<body id="top">

<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url(<?php echo "resturantImg/" . $res . "/" . $res . ".jpg" ?>);">

    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <!-- ################################################################################################ -->
            <div id="logo" class="fl_left">
                <h1><a href="index.php">Khabo</a></h1>
            </div>
            <!-- ################################################################################################ -->
            <nav id="mainav" class="fl_right">
                <ul class="clear">
                    <li class="active"><a href="index.php">Home</a></li>

                    <li class="active"><a href="logout.php">Log out</a></li>


                </ul>
            </nav>
            <!-- ################################################################################################ -->
        </header>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div id="pageintro" class="hoc clear">
        <!-- ################################################################################################ -->
        <article>
            <h3 class="heading">Dear guest you are welcomed to Dine with us</h3>
            <p>we will serve you with the mouth watering dishes</p>
        </article>
        <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
    <section id="references" class="hoc container clear">
        <!-- ################################################################################################ -->
        <div class="sectiontitle">

            <p></p>
        </div>
</div>


<div style="text-align:right; font-size:18px; width:95%; margin-top:1%"></div>
<br/>


<div class="cont">
    <div id="ratingNew"></div>
    <div class="stars">
        <input class="star star-5" id="star-5-2" type="radio" name="star" value="5"/>
        <label class="star star-5" for="star-5-2"></label>
        <input class="star star-4" id="star-4-2" type="radio" name="star" value="4"/>
        <label class="star star-4" for="star-4-2"></label>
        <input class="star star-3" id="star-3-2" type="radio" name="star" value="3"/>
        <label class="star star-3" for="star-3-2"></label>
        <input class="star star-2" id="star-2-2" type="radio" name="star" value="2"/>
        <label class="star star-2" for="star-2-2"></label>
        <input class="star star-1" id="star-1-2" type="radio" name="star" value="1"/>
        <label class="star star-1" for="star-1-2"></label>
        <div class="rev-box">

            <div class="button">
                <button onclick="giveRating()" id="addReview"><label class="review" for="review">Submit Rating</label>
                </button>
            </div>
        </div>

    </div>
</div>
<div class="wrapper row3">
    <section class="hoc container clear">
        <!-- ################################################################################################ -->
        <div class="sectiontitle">
            <h6 class="heading">Food Menu</h6>
            <p>We provide most of the special dishes of home and abraod</p>
            <div class="">

            </div>
        </div>

        <!-- ################################################################################################ -->
    </section>
</div>


<div class="wrapper row2">
    <section id="references" class="hoc container clear">
        <!-- ################################################################################################ -->
        <div class="sectiontitle">


           <table class="table table-striped table-bordered table-condensed">
                <tr>
                    <th>Items</th>
                    <th>Prizes</th>
               
                </tr>
                
                    <?php
                          $xml=simplexml_load_file("./xml/menus/menu".$resid.".xml") or die("Error: Cannot create object");

                            echo "<tr>";
                               echo "<td>".$xml->items0."</td>";
                               echo "<td>".$xml->prizes0."</td>";
                            echo"</tr>";

                    echo "<tr>";
                    echo "<td>".$xml->items1."</td>";
                    echo "<td>".$xml->prizes1."</td>";
                    echo"</tr>";

                    echo "<tr>";
                    echo "<td>".$xml->items2."</td>";
                    echo "<td>".$xml->prizes2."</td>";
                    echo"</tr>";

                    echo "<tr>";
                    echo "<td>".$xml->items3."</td>";
                    echo "<td>".$xml->prizes3."</td>";
                    echo"</tr>";

                    echo "<tr>";
                    echo "<td>".$xml->items4."</td>";
                    echo "<td>".$xml->prizes4."</td>";
                    echo"</tr>";

                    echo "<tr>";
                    echo "<td>".$xml->items5."</td>";
                    echo "<td>".$xml->prizes5."</td>";
                    echo"</tr>";

                     ?> 
                
            </table>


            <p></p>
        </div>
</div>

</div>
<div class="wrapper row2">
    <section id="references" class="hoc container clear">
        <!-- ################################################################################################ -->
        <div class="sectiontitle">
            <h6 class="heading">Some of our Dishes!</h6>
            <p></p>
        </div>
        <nav class="ref-sort">
            <ul>

                <li><a href="#">delicious</a></li>
                <li><a href="#">Divine</a></li>
                <li><a href="#">Tasty</a></li>
            </ul>
        </nav>
        <ul class="nospace group ref-img">
            <li class="one_third"><a href="#"><img src='<?php echo "resturantImg/" . $res . "/1.jpg" ?>' alt=""></a>
            </li>
            <li class="one_third"><a href="#"><img src='<?php echo "resturantImg/" . $res . "/2.jpg" ?>' alt=""></a>
            </li>
            <li class="one_third"><a href="#"><img src='<?php echo "resturantImg/" . $res . "/3.jpg" ?>' alt=""></a>
            </li>
            <li class="one_third"><a href="#"><img src='<?php echo "resturantImg/" . $res . "/4.jpg" ?>' alt=""></a>
            </li>
            <li class="one_third"><a href="#"><img src='<?php echo "resturantImg/" . $res . "/5.jpg" ?>' alt=""></a>
            </li>
            <li class="one_third"><a href="#"><img src='<?php echo "resturantImg/" . $res . "/6.jpg" ?>' alt=""></a>
            </li>
        </ul>

        <!-- ################################################################################################ -->
    </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


<div class="wrapper row3">

</div>





<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>

<!--  <li><a href="#">Link Text</a></li>
          <li><a href="#">Link Text</a></li>
          <li><a href="#">Link Text</a></li>
          <li><a href="#">Long Link Text</a></li> -->