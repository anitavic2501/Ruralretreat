
<?php
session_start();
include 'dog.php';
include_once 'database.php';
   $con = mysqli_connect("localhost","root","","ruralretreat");
   $dogs = "SELECT * FROM dogs ";

   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$dog_id = $_POST['dog_id'];

$sql= "DELETE from dogs where dog_id = $dog_id";

if (mysqli_query($con, $sql)) {
    header("Location: doglist.php?status=success");
    
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($con);
    header("Location: doglist.php?status=error");
}
mysqli_close($con);