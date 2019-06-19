<?php
session_start();
include 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<?php
         include_once './partials/head.php';
  
		 
	   ?> 
	   <style>
        input#textinput.form-control.input-md {
            text-align: center;
       }
        div.bookingpage {
            text-align: center;
       }   
        </style>
	   </head> 
	   
		 <nav>
		 <?php
			include_once './partials/header.php';
		 ?>
		 
	   </nav>

          



<body>				
	<div id="booking">
	
<h1 style="color: black;">Add Services</h1>	
	<div class="bookingpage">
	<br><br><br><br><br><br><br><br><br>
		
<!-- Form Name -->
<form method ="POST" action="includes/add_services.inc.php">

<!-- Text input-->
<br>
<br>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Service Name</label>  
  <div class="col-md-5">
  <input id="textinput" name="service" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Service description</label>  
  <div class="col-md-8">
  <input id="description" name="description" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button Drop Down -->
<div class="form-group">
  <label class="col-md-4 control-label" for="service-provider">Service Agency Provider</label>
 <br>
     <?php
     
     $sql= "Select agency_id,agency_name From agency";
     $result = mysqli_query($conn,$sql);

     echo "<select name='sub1'>";
     while ($row = mysqli_fetch_array($result)){
         echo" <option value='". $row['agency_id'] ."'>". $row['agency_name'] ."</options>";
     }
     echo "</select>";
     ?>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price</label>  
  <div class="col-md-2">
  <input id="price" name="price" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Add, Edit &amp; Delete</label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="edit_services"></label>
  <div class="col-md-4">
    <button id="edit_services" name="edit_services" class="btn btn-primary">Edit</button>
  </div>
</div>

</fieldset>
</form>


<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>

</html>