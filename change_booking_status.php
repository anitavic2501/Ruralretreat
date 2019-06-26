<?php 

$con = mysqli_connect("localhost","root","","ruralretreat");

$status = $_GET['status'];
$id= $_GET['id'];

$sql = "UPDATE bookings  SET status ='$status' WHERE booking_id = $id";


if(mysqli_query($con, $sql)){

    header("Location: manage_bookings.php?status=success");
}
else{

    header("Location:  manage_booking.php?status=error" );
}




?>