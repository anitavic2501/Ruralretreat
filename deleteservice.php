
<?php
session_start();
include_once 'database.php';
include "includes/dbh.inc.php";
//    $conn= mysqli_connect("localhost","root","","ruralretreat");
   $users = "SELECT * FROM services ";

   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$service_id = $_GET['service_id'];

$sql= "DELETE from services where service_id = $service_id";

if (mysqli_query($conn, $sql)) {
    header("Location: add_services.php?status=success");
    
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("Location: add_services.php?status=error");
}
mysqli_close($conn);


?>