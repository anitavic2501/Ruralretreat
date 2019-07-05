<?php

include_once 'database.php';
include "includes/dbh.inc.php";

session_start();

?>

<!DOCTYPE html>
<html lang="en">

	<head>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="jQuery/js/jquery.multiselect.js"></script>
	
	<link rel="stylesheet" href="css/main.css">	
		<?php
		 include_once './partials/head.php';
		 
	   ?> 
	   
	   </head> 
	   
		 <nav>
		 <?php
			include_once './partials/header.php';
		 ?>
		 
	   </nav>

          



<body>				
	<div id="booking">
	
<h1 style="color: black;">Book Now</h1>	
	<div class="bookingpage">
	<br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="container col-4" >
					<div class="booking-form">
					<?php 
						if (isset ($_GET['status'] )) {
                             if($_GET['status'] == 'success'){
						?>

							<div class="alert alert-warning alert-dismissible fade show" role="alert">	
  							<strong>Your Booking Was Successful!</strong>
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  							</button>
							</div>
                          
                         <?php 
						}  else  {
							
							  $errorMessage = $_GET['message'];
							
							?>
						<div class="alert alert-warning2 alert-dismissible fade show" role="alert">	
  							<strong><?php echo  $errorMessage; ?></strong>
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  							</button>
							</div>
					
					
					<?php }
				 } ?>
				 
						<form action = "bookser.php" method = "POST">
						<?php
						
						// $conn = mysqli_connect("localhost", "root", "","ruralretreat");
 
						$userid ="";
						if(isset($_SESSION['userinfo'])){
							$userid=$_SESSION['userinfo']['user_id'];
						} else {
						$userid=$_SESSION['id']; }


						$sql2 = "SELECT * FROM dogs WHERE user_id = $userid";
       
						$result2 = mysqli_query($conn, $sql2);
							?>
							
							<div class="form-group">
								<span class="form-label" >Name of the dog:</span>
								<select class="form-control" name = "dogsname">
								<?php				
								while ($rows = mysqli_fetch_assoc($result2)) 
								{
								?>
													<option value=<?php echo $rows['dog_id'] ?>><?php echo $rows['dogname']?></option>
													
													<?php }?>
								</select>
							</div>
							
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label" >Booking Period starts:</span>
										<input class="form-control" type="date" name = "startdate" required>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label" >Booking Period ends:</span>
										<input class="form-control" type="date" name ="enddate" required>
									</div>
								</div>
							</div>

						<?php
						
						// $conn = mysqli_connect("localhost", "root", "","ruralretreat");
						$sql = "SELECT * FROM services WHERE service_type ='addon'";
       
						$result = mysqli_query($conn, $sql);

						$sqlMainServices = "SELECT * FROM services WHERE service_type ='main'";
       
						$resultMain = mysqli_query($conn, $sqlMainServices);
						?>


                      <div class="form-group">
							
							<span class="form-label">Main Services:</span>
						<select class="form-control" name="mainService">
							<?php				
							while ($rows = mysqli_fetch_assoc($resultMain)) 
							{
							?>
							<option value=<?php echo $rows['service_id'] ?>><?php echo $rows['services']?></option>
											
										
						<?php }?>		
						
						</select>
						</div>
						

						
					<div class="row">
							<div class="col-6  multiselect">
								<span class="form-label">Additional Services:</span>
									<div class="selectBox" onclick="showCheckboxes()">
								
								<select id = 'services' >
									<option>Select services</option>
								</select>
								<div class="overSelect" style = "line-height 1,5;"></div>
							        </div>
							<div id="checkboxes">
							<div class="form-group">
								<?php				
								while ($rows = mysqli_fetch_assoc($result)) 
								{
								?>
								<label id = "label" >
									<input type="checkbox" value=<?php echo $rows['service_id'] ?>  name="service[]"/><?php echo $rows['services']?></label>
									<?php }?>
							</div>
							</div>
						</div>
							
										
									
								
								<div class="col-6 form-btn" >
									<button class="btn btn-primary" type = "submit" name = "book" >Submit</button>
								</div>
					</div>
							
						</form>
						<br>
						 

                        
					</div>
					
				</div>
			</div>
		
	</div>
	

	

	<script>
 
	// $('select[multiple]').multiselect({
 
	// 	columns: 4,
 
	// 	placeholder: 'Select options'
 
	// });

$(document).ready(function() {
$('#services').multiselect({
nonSelectedText: 'Select services'
});
});
	
	
	var expanded = false;

	function showCheckboxes() {
	var checkboxes = document.getElementById("checkboxes");
	if (!expanded) {
		checkboxes.style.display = "block";
		expanded = true;
	} else {
		checkboxes.style.display = "none";
		expanded = false;
	}
	}
	</script>
</body>

<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>

</html>