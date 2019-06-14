
<?php

// First we start a session which allow for us to store information as SESSION variables.
//session_start();
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
   include_once './partials/adminheader.php';
?>
</header>

  <body>
   <h1 class="text-center">Provider Dashboard</h1>


<div class="container">
<div class="row">

<!--team-1-->
<div class="col-lg-6">
<div class="our-team-main">

<div class="team-front">
<img src="images/owner.jpg" class="img-fluid" />
<h3>Manage User</h3>
<p>add/edit/delete user</p>
</div>

<div class="team-back">
<span>
<a href="provideruser.php">Click here</a>
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
<br><a href="managedog.php">Click here</a></span>
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
</div>

<div class="team-back">
<span> 
<br><a href="providerbooking.php">Click here</a></span>
</div>

</div>
</div>

<div class="col-lg-6">
<div class="our-team-main">

<div class="team-front">
    <br>
<i class="fas fa-power-off fa-3x">LOGOUT</i> 
<br>

</div>

<div class="team-back">
<span> 
<br><a href="logout.php">Click here</a></span>
</div>

</div>
</div>

</div>
</div>
</body>
</html>