
<?php
session_start();
include_once 'database.php';
include "includes/dbh.inc.php";
//    $conn = mysqli_connect("localhost","root","","ruralretreat");
   $users = "SELECT * FROM contactus ";

   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message_id = $_GET['message_id'];

$sql= "DELETE from contactus where message_id = $message_id";

if (mysqli_query($conn, $sql)) {
    header("Location: manage_contactus.php?status=success");
    
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("Location: manage_contactus.php?status=error");
}
mysqli_close($conn);


?>