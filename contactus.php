<?php
session_start();
include_once 'database.php';
   $con = mysqli_connect("localhost","root","","ruralretreat");
  

   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// $user_id = $_POST['user_id'];
$username = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

//    $vaccination = $_POST['vaccination'];
//    $datereceived= $_POST['datereceived'];

$insertsql= "INSERT INTO contactus (name, email, message) VALUES ('$username', '$email', '$message')";

if (mysqli_query($con, $insertsql)) {
  header("Location: index.php?status=success");
 
} else {
    var_dump($con);
    
//  echo "Error: " . $sql . "<br>" . mysqli_error($con);
 header("Location: index.php?status=error");
}
mysqli_close($con);

?>