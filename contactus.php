<?php
session_start();
include "includes/dbh.inc.php";
//    $conn = mysqli_connect("localhost","root","","ruralretreat");
  

   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$username = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];



$insertsql= "INSERT INTO contactus (name, email, message) VALUES ('$username', '$email', '$message')";

if (mysqli_query($conn, $insertsql)) {
  header("Location: index.php?status=success");
 
} else {
   
    
//  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 header("Location: index.php?status=error");
}
mysqli_close($conn);

?>