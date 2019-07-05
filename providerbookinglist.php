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
<?php
   include_once './partials/providerheader.php';
?>
</header>

<body>


<div class="content">
<h1> List of Bookings </h1>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Booking ID</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">User First Name</th>
      <th scope="col">Dog Name</th>
      <th scope="col">Service Type</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php

        $provider_id=$_SESSION['id'];
      //  $conn = mysqli_connect("localhost","root","","ruralretreat");
      $users = "SELECT bookings.booking_id, 
      bookings.startdate, 
      bookings.enddate, 
      bookings.status,
      users.username,
      dogs.dogname,
      services.services 
      FROM bookings JOIN users ON
        users.user_id=bookings.user_id
        JOIN dogs ON dogs.dog_id=bookings.dog_id
        JOIN service_booking ON bookings.booking_id=service_booking.booking_id 
        JOIN services ON services.service_id=service_booking.service_id
      WHERE bookings.provider_id=$provider_id";
      $res = mysqli_query($conn, $users);
      while($r = mysqli_fetch_assoc($res)): ?>
            <tr>
            <td><?php echo $r['booking_id']; ?></th>
            <td><?php echo $r['startdate']; ?></td>
            <td><?php echo $r['enddate']; ?></td>
            <td><?php echo $r['username']; ?></td>
            <td><?php echo $r['dogname']; ?></td>
            <td><?php echo $r['services']; ?></td>
            <td><?php echo $r['status']; ?></td>
            </tr>

<?php endwhile ?>
</tbody>
</table>