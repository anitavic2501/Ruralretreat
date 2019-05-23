<?php
  require "includes/dbh.inc.php"; 
  require "header.php";
	?> 

<form class="form-horizontal" action="includes/accounts.inc.php" method="post">
<fieldset>

<!-- Form Name -->
<head>
<style>
body { 
  background: lightblue url("img/backdogs.jpg") no-repeat center; 
  background-size: 2000px 750px;
}
</style>
</head>
<h1> We need to complete your details</h1>
<legend>Account Info</legend>

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

<!-- Text input
<div class="form-group">
  <label class="col-md-4 control-label" for="ADD">Address</label>  
  <div class="col-md-6">
  <input id="ADD" name="ADD" type="text" placeholder="House No., Street, City" class="form-control input-md" required="">
    
  </div>
</div> -->

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
  </div>
</div>

</fieldset>
</form>

    