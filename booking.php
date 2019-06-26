<?php

include_once 'database.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

	<head>
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
						
						$con = mysqli_connect("localhost", "root", "","ruralretreat");
 
						$userid ="";
						if(isset($_SESSION['userinfo'])){
							$userid=$_SESSION['userinfo']['user_id'];
						} else {
						$userid=$_SESSION['id']; }


						$sql2 = "SELECT * FROM dogs WHERE user_id = $userid";
       
						$result2 = mysqli_query($con, $sql2);
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
						
						$con = mysqli_connect("localhost", "root", "","ruralretreat");
						$sql = "SELECT * FROM services";
       
						$result = mysqli_query($con, $sql);
						?>
						
							<div class="form-group">
							
								<span class="form-label">Additional Services:</span>
								<select class="form-control" name="service">
								<?php				
								while ($rows = mysqli_fetch_assoc($result)) 
								{
								?>
								<option value=<?php echo $rows['service_id'] ?>><?php echo $rows['services']?></option>
												
											
							<?php }?>		
							
							</select>
							</div>
					
										
									
								
							<div class="form-btn">
								<button class="btn btn-primary" type = "submit" name = "book">Submit</button>
							</div>
						</form>
						<br>
						 

                        
					</div>
					
				</div>
			</div>
		
	</div>
</body>

<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>

</html>