
<!DOCTYPE html>
<html >

<head>
 
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

  <?php
 include "include/header.php";
  ?>

  <!-- //Meta-Tags -->
  <!-- Stylesheets -->
  <link href="add/web/css/style.css" rel='stylesheet' type='text/css' />
  <!--// Stylesheets -->
  <!--fonts-->
  <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
  <!--//fonts-->
</head>
<script type="text/javascript">
  var i=0;
  function another()
  {
     i=i+1;
    $("#add"+i).html('<div class="field"><label>Menu :</label></div><div class="field-right"><input type="text" name="name" placeholder=" " required=""><label>Name</label></div><div class="field-right"><input type="text" name="name" placeholder=" " required=""><label>Price</label></div><div class="admin" id="add'+(i+1)+'"><div><br/>');
  }
</script>
<body>
  <header>
    <h1 style="color: white">Add Restaurant</h1>
  </header>
  <div class="reg">
    <form action="addingRes.php" method="post" enctype="multipart/form-data">
     <div class="admin">
        <div class="field">
          <label>
            Resturant Name :</label>
        </div>
        <div class="field-right">
          <input type="text" name="rname" placeholder=" " required>
        </div>
      </div>
      <div class="admin">
        <div class="field">
          <label>
            Address :</label>
        </div>
        <div class="field-right">
          <input type="text" name="address" placeholder=" " required>
        </div>
      </div>
      <div class="admin">
        <div class="field">
          <label>
            Area :</label>
        </div>
		
        <div class="field-right">
          <input type="text" name="area" placeholder=" " required>
        </div>
      </div>

      <div class="admin">
        <div class="field">
          <label>
            Description :</label>
        </div>
    
        <div class="field-right">
          <input type="text" name="description" placeholder=" " required>
        </div>
      </div>

      <div class="admin">
        <div class="field">
          <label>
            Shop type :</label>
        </div>
    
        <div class="field-right">
          <select name="type">
            <option value="Restaurant">Restaurant</option>
            <option value="Cafe">Cafe</option>
          </select>
        </div>
      </div>
      <div class="admin">
        <div class="field">
          <label>
            Store picture :</label>
        </div>
		
        <div class="field-right">
          <input type="file" name="str_pic" placeholder=" " required>
        </div>
      </div>

     <div class="admin">
        <div class="field">
          <label>
            Food picture1 :</label>
        </div>
		
        <div class="field-right">
          <input type="file" name="f1" placeholder=" " required>
        </div>
      </div>
	  
	  <div class="admin">
        <div class="field">
          <label>
            Food picture2 :</label>
        </div>
		
        <div class="field-right">
          <input type="file" name="f2" placeholder=" " required>
        </div>
      </div>
	  
	  <div class="admin">
        <div class="field">
          <label>
            Food picture3 :</label>
        </div>
		
        <div class="field-right">
          <input type="file" name="f3" placeholder=" " required>
        </div>
      </div>
	  
	  <div class="admin">
        <div class="field">
          <label>
            Food picture4 :</label>
        </div>
		
        <div class="field-right">
          <input type="file" name="f4" placeholder=" " required>
        </div>
      </div>
	  
	  <div class="admin">
        <div class="field">
          <label>
            Food picture5 :</label>
        </div>
		
        <div class="field-right">
          <input type="file" name="f5" placeholder=" " required>
        </div>
      </div>

       <div class="admin">
        <div class="field">
          <label>
            Food picture6 :</label>
        </div>
    
        <div class="field-right">
          <input type="file" name="f6" placeholder=" " required>
        </div>
      </div>
	  
	  <div class="admin">
        <div class="field">
          <label>
            Menu :</label>
        </div>
        <div class="field-right">
          <input type="text" name="item1" placeholder=" " required>
          <label>
             Name</label>
        </div>
        <div class="field-right">
          <input type="text" name="p1" placeholder=" " required>
          <label>
            Price</label>
        </div>
      </div><br/>

       <div class="admin">
        <div class="field">
          <label>
            Menu :</label>
         </div>
        <div class="field-right">
          <input type="text" name="item2" placeholder=" " required>
          <label>
             Name</label>
        </div>
        <div class="field-right">
          <input type="text" name="p2" placeholder=" " required>
          <label>
            Price</label>
        </div>
      </div><br/>

       <div class="admin">
        <div class="field">
          <label>
            Menu :</label>
         </div>
        <div class="field-right">
          <input type="text" name="item3" placeholder=" " required>
          <label>
             Name</label>
        </div>
        <div class="field-right">
          <input type="text" name="p3" placeholder=" " required>
          <label>
            Price</label>
        </div>
      </div><br/>

       <div class="admin">
        <div class="field">
          <label>
            Menu :</label>
         </div>
        <div class="field-right">
          <input type="text" name="item4" placeholder=" " required>
          <label>
             Name</label>
        </div>
        <div class="field-right">
          <input type="text" name="p4" placeholder=" " required>
          <label>
            Price</label>
        </div>
      </div><br/>

       <div class="admin">
        <div class="field">
          <label>
            Menu :</label>
        </div>
        <div class="field-right">
          <input type="text" name="item5" placeholder=" " required>
          <label>
             Name</label>
        </div>
        <div class="field-right">
          <input type="text" name="p5" placeholder=" " required>
          <label>
            Price</label>
        </div>
      </div><br/>

       <div class="admin">
        <div class="field">
          <label>
            Menu :</label>
        </div>
        <div class="field-right">
          <input type="text" name="item6" placeholder=" " required>
          <label>
             Name</label>
        </div>
        <div class="field-right">
          <input type="text" name="p6" placeholder=" " required>
          <label>
            Price</label>
        </div>
      </div><br/>




	    
	    
      <div class="contact mr_ag sub">
        <input type="submit" name="submit" value="Submit">
      </div>
    </form>
  </div>
  
</body>
<!-- //Body -->

</html>