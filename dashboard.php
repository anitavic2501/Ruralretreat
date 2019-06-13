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
  
 <link rel="stylesheet" href="bootstrap2.min.css">
  </head> 

  <header>
  <?php
     include_once './partials/header.php';
  ?>
  </header>



    <body>
     <h1 class="text-center">Rural Retreat Dashboard</h1>

	
	<div class="container">
	<div class="row">
	
	<!--team-1-->
	<div class="col-lg-6">
	<div class="our-team-main">
	
	<div class="team-front">
	<img src="images/owner.jpg" class="img-fluid" />
	<h3>Account Settings</h3>
	<p>Change Account Profile</p>
	</div>
	
	<div class="team-back">
	<span>
	<?php echo 'Welcome,' .$_SESSION['uid'].  '! You can change your profile like name, address and contact number necessary to know better as a dog owner!';?> 
	<br>
	<a href="edit_customer.php">Click here</a>
	</span>
	</div>
	
	</div>
	</div>
	<!--team-1-->
	
	<!--team-2-->
	<div class="col-lg-6">
	<div class="our-team-main">
	
	<div class="team-front">
	<img src="images/dogs1.jpg" class="img-fluid" />
	<h3>Manage Dogs</h3>
	<p>Add-Edit-Delete</p>
	</div>
	
	<div class="team-back">
	<span>
	Complete details of your lovable pet dogs, and we'll take it from there. You can add upto 5 dogs!! Cheers (warf)
	<br><a href="doglist.php">Click here</a></span>
	</div>
	
	</div>
	</div>
	<!--team-2-->
	
	<!--team-3-->
	<div class="col-lg-6">
	<div class="our-team-main">
	
	<div class="team-front">
	<img src="images/dogs2.jpg" class="img-fluid" />
	<h3>Manage Bookings</h3>
	<p>Create/Delete Bookings</p>
	</div>
	
	<div class="team-back">
	<span>
	Allows you to create bookings for an overnight stays on Rural Retreat, plus other services from our loving petcare provider partners.
	<br><a href="booking.php">Click here</a></span>
	</div>
	
	</div>
	</div>
	<!--team-3-->
	
	<!--team-4-->
	<!-- <div class="col-lg-4">
	<div class="our-team-main">
	
	<div class="team-front">
	<img src="images/dogs4.jpg" class="img-fluid" />
	<h3>Articles</h3>
	<p>RR Post Articles</p>
	</div>
	
	<div class="team-back">
	<span>
	Keep up to date with the latest trending news about what else.. of course dogs and everything under the sun..
	<br><a href="article2.php">Click here</a></span>
	</div>
	
	</div>
	</div> -->
	<!--team-4-->
	
	<!--team-5-->
	<div class="col-lg-6">
	<div class="our-team-main">
	
	<div class="team-front">
	<img src="images/dogs5.jpg" class="img-fluid" />
	<h3>Services</h3>
	<p>Pampering Time</p>
	</div>
	
	<div class="team-back">
	<span>
	Choose from different types of services that will make your dog's day complete.
	<br><a href="services.php">Click here</a></span>
	</div>
	
	</div>
	</div>
	<!--team-5-->

	</div>
	
	</div>
	</div>
	<!--team-6-->
	
	
	
	</div>
	</div>
	</body>
</html>