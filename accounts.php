<?php
session_start();
  require "includes/dbh.inc.php"; 

 $sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
 $results = mysqli_query($conn,$sql);
 $resultsCheck = mysqli_num_rows($results);

  if ($resultsCheck > 0){
	  while ($row = mysqli_fetch_assoc($results)){
		       $LN = $row['userlname'];
           $FN = $row['userfname'];
           $MN = $row['contact_number'];
           $CN = $row['emrgcontactname_1'];
           $ECN =$row['emrgcontactnumber_1'];
		   
		    
 }
 
if (!empty($LN)){
			header ("location:dashboard.php");
		}
else {
			echo "<h1 style='color:blue'> Before continue,you need to complete your details!</h1>";
}
  }
  ?>
  <head>
   <style>
     .col-md-4 {
    margin: auto;
     }
  body { 
    text-align: center;
  }
  
  </style>
   </head>
<form class="form-horizontal" action="includes/accounts.inc.php" method="post">
<fieldset>

<!-- Form Name -->

<legend>Account Information</legend>

<!-- Text input-->
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="FN">First Name</label>  
  <div class="col-md-4">
  <input id="FN" name="FN" type="text" placeholder=<?php echo $FN; ?>; class="form-control input-md" required="">
    
  </div>
</div>

  </div>
<div class="form-group">
  <label class="col-md-4 control-label" for="LN">Last Name</label>  
  <div class="col-md-4">
  <input id="LN" name="LN" type="text" placeholder=<?php echo $LN; ?>; class="form-control input-md" required="">
    
  </div>
</div>



<!-- Text input -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ADD">Address</label>  
  <div class="col-md-4">
  <input id="ADD" name="ADD" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="MN">PN/Mobile Number</label>  
  <div class="col-md-4">
  <input id="MN" name="MN" type="text" placeholder=<?php echo $MN; ?>; class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="CN">Person to contact in case of emergency</label>  
  <div class="col-md-4">
  <input id="CN" name="CN" type="text" placeholder=<?php echo $ECN; ?>; class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ECN">Emergency No.</label>  
  <div class="col-md-4">
  <input id="ECN" name="ECN" type="text" placeholder=<?php echo $CN; ?>; class="form-control input-md" required="">
    
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

<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>