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

<body style="margin-bottom: 10px">
    <header>
        <?php
        include_once './partials/header.php';
    ?>
    </header>

    <h1> List of Bookings </h1>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Booking ID</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Dog Name</th>
      <th scope="col">Service Type</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php

        $user_id=$_SESSION['id'];
       $con = mysqli_connect("localhost","root","","ruralretreat");
      $users = "SELECT bookings.booking_id, 
      bookings.startdate, 
      bookings.enddate, 
      bookings.status,
      dogs.dogname,
      services.services 
      FROM bookings 
        JOIN dogs ON dogs.dog_id=bookings.dog_id
        JOIN service_booking ON bookings.booking_id=service_booking.booking_id 
        JOIN services ON services.service_id=service_booking.service_id
      WHERE bookings.user_id=$user_id";
      $res = mysqli_query($con, $users);
      while($r = mysqli_fetch_assoc($res)): ?>
            <tr>
            <td><?php echo $r['booking_id']; ?></th>
            <td><?php echo $r['startdate']; ?></td>
            <td><?php echo $r['enddate']; ?></td>
            <td><?php echo $r['dogname']; ?></td>
            <td><?php echo $r['services']; ?></td>
            <td><?php echo $r['status']; ?></td>
            </tr>

<?php endwhile ?>
</tbody>
</table>
</body>
</html>