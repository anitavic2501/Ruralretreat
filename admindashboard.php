
<?php

// First we start a session which allow for us to store information as SESSION variables.
session_start();
if(!(isset($_SESSION['utd']) && $_SESSION['utd']==1)){

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
   <h1 class="text-center">Admin Dashboard</h1>


<div class="container">
<div class="row">

<!--team-1-->
<div class="col-lg-4">
<div class="our-team-main">

<div class="team-front">
<img src="images/owner.jpg" class="img-fluid" />
<h3>Manage User</h3>
<p>add/edit/delete user</p>
</div>

<div class="team-back">
<span>
<a href="manage_users.php">Click here</a>
</span>
</div>

</div>
</div>
<!--team-1-->

<!--team-2-->
<div class="col-lg-4">
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
<div class="col-lg-4">
<div class="our-team-main">

<div class="team-front">
<img src="images/dogs2.jpg" class="img-fluid" />
<h3>Manage Bookings</h3>
<p>Bookings approval and scheduling</p>
</div>

<div class="team-back">
<span> 
<br><a href="manage_bookings.php">Click here</a></span>
</div>

</div>
</div>

<div class="col-lg-4">
<div class="our-team-main">

<div class="team-front">
<img src="images/dogs5.jpg" class="img-fluid" />
<h3>Services</h3>
<p>Add, edit or delete service that will be provided</p>
</div>

<div class="team-back">
<span><br><a href="add_services.php">Click here</a></span>
</div>

</div>
</div>
<!--team-5-->


<div class="col-lg-4">
<div class="our-team-main">

<div class="team-front">
<img src="images/reports.jpg" class="img-fluid" />
<h3>Reports</h3>
<p></p>
</div>

<div class="team-back">
<span><br><a href="reports.php">Click here</a></span>
</div>

</div>
</div>



<div class="col-lg-4">
<div class="our-team-main">

<div class="team-front">
    <br>
<img src="images/dogs4.jpg" class="img-fluid" />
<h3>Manage Articles</h3>
<p></p>

</div>

<div class="team-back">
<span> 
<br><a href="manage_articles.php">Click here</a></span>
</div>

</div>
</div>

<div class="col-lg-4">
<div class="our-team-main">

<div class="team-front">
    <br>
    <i class="fas fa-envelope fa-3x"></i>
    <br><br><h3>Messages</h3>
<br>

</div>

<div class="team-back">
<span> 
<br><a href="messages.php">Click here</a></span>
</div>

</div>
</div>


<div class="col-lg-4">
<div class="our-team-main">

<div class="team-front">
    <br>
<i class="fas fa-power-off fa-3x"></i> 
<br> <br> <h3>LOGOUT</h3>

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