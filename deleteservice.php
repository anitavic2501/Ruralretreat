
<?php
session_start();
include_once 'database.php';
   $con = mysqli_connect("localhost","root","","ruralretreat");
   $users = "SELECT * FROM services ";

   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$service_id = $_GET['service_id'];

$sql= "DELETE from services where service_id = $service_id";

if (mysqli_query($con, $sql)) {
    header("Location: add_services.php?status=success");
    
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($con);
    header("Location: add_services.php?status=error");
}
mysqli_close($con);


?>