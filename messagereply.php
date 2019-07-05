<?php 

include 'mailer.php';
include 'manage_contactus.php';
include "includes/dbh.inc.php";
// $conn = mysqli_connect("localhost","root","","ruralretreat");

// $status = $_GET['status'];
// $id= $_GET['id'];

// $sql = "UPDATE bookings  SET status ='$status' WHERE booking_id = $id";
// $sql2 = "SELECT * FROM bookings JOIN users ON bookings.user_id=users.user_id WHERE bookings.booking_id=$id";
// $result = mysqli_query($conn, $sql2);
// $row = mysqli_fetch_assoc($result);
 
// $_SESSION['email'] = $row['email'];
// $_SESSION['username'] = $row['userfname'] . " ". $row['userlname'];
// $booking =  new Booking($conn);

// $totalsum = $booking -> gettotalsum ( $id );

$messagebody = $_POST['reply'];
$username = $_POST['name'];
$emailid = $_POST['email'];


var_dump($emailid); 





    Sendemail::replytomail($username, $emailid , $messagebody);

  


  header("Location:  manage_contactus.php" );





?>