
<?php

// First we start a session which allow for us to store information as SESSION variables.
session_start();
if(!(isset($_SESSION['utd']) && $_SESSION['utd']==2)){

   echo "You are not authorized to view this page.";
     exit;
} 
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
<style>
.logo_pic {
 /* Frame */

  position: absolute;
  height: 55px;
  left: 35px;
  top: 33px;

  }

  </style>

  

<div id="headerlogo">
            <table>
                <tr>
                    <td id="logo"><a  href="admindashboard.php">
            <img class="logo_pic" src="images\logo.png"></td>
         </table></tr>
        </div>
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
<h3>Manage a Booking</h3>
<p>by user phone number</p>
</div>

<div class="team-back">
<span>
<br><a href="providerbooking.php">Click here</a></span>
</div>

</div>
</div>
<!--team-2-->

<!--team-3-->
<div class="col-lg-6">
<div class="our-team-main">

<div class="team-front">
<img src="images/dogs2.jpg" class="img-fluid" />
<h3>List of Bookings</h3>
</div>

<div class="team-back">
<span> 
<br><a href="providerbookinglist.php">Click here</a></span>
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