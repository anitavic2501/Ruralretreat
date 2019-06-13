
<?php
  // First we start a session which allow for us to store information as SESSION variables.
  session_start();
  // "require" creates an error message and stops the script. "include" creates an error and continues the script.
  require "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

 <head>
 <?php
  include_once './partials/head.php';
?> 

</head> 

  <nav>
  <?php
     include_once './partials/header.php';
  ?>
  
</nav>

<form class="form-horizontal" action="includes/accounts.inc.php" method="post">
<fieldset>

<!-- Form Name -->

<h1> We need to complete your details</h1>
<legend>Account Information</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="LN">Last Name</label>  
  <div class="col-md-4">
  <input id="LN" name="LN" type="text" placeholder="your surname" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="FN">First Name</label>  
  <div class="col-md-4">
  <input id="FN" name="FN" type="text" placeholder="Ex. Carlo" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ADD">Address</label>  
  <div class="col-md-4">
  <input id="ADD" name="ADD" type="text" placeholder="House No., Street, City" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="MN">PN/Mobile Number</label>  
  <div class="col-md-4">
  <input id="MN" name="MN" type="text" placeholder="valid number" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="CN">Person to contact in case of emergency</label>  
  <div class="col-md-4">
  <input id="CN" name="CN" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ECN">Emergency No.</label>  
  <div class="col-md-4">
  <input id="ECN" name="ECN" type="text" placeholder="valid number" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit-acciunt_info"></label>
  <div class="col-md-4"><br>
    <button id="submit-account_info" name="submit-account_info" class="btn btn-info">Submit</button>
    <button id="edit-account_info" name="edit-account_info" class="btn btn-info">Edit</button>
  </div>
</div>

</fieldset>
</form>

    