<?php 
session_start();
include 'mailer.php';
include 'bookfuncs.php';
$con = mysqli_connect("localhost","root","","ruralretreat");

$status = $_GET['status'];
$id= $_GET['id'];

$sql = "UPDATE bookings  SET status ='$status' WHERE booking_id = $id";
$sql2 = "SELECT * FROM bookings JOIN users ON bookings.user_id=users.user_id WHERE bookings.booking_id=$id";
$result = mysqli_query($con, $sql2);
$row = mysqli_fetch_assoc($result);
 
$_SESSION['email'] = $row['email'];
$_SESSION['username'] = $row['userfname'] . " ". $row['userlname'];
$booking =  new Booking($con);

$totalsum = $booking -> gettotalsum ( $id );

$message = "";
if($status == 'approve'){
    $message = "Your booking has been <strong>approved</strong>  <br> Your total price for the booking will be $ ". number_format ((float) $totalsum ,2,'.', '' )." <br>  Bank Account Information ...";
}
else{
    
    $message = 'Your booking has been <strong>rejected</strong> <br> Contact our managers in case of any questions';


}




if(mysqli_query($con, $sql)){

    Sendemail::sendmessage($message);

  header("Location: manage_bookings.php?status=success");
}
else{

  header("Location:  manage_booking.php?status=error" );
}




?>