
<?php
session_start();
include_once 'database.php';
   $con = mysqli_connect("localhost","root","","ruralretreat");
   $dogs = "SELECT * FROM users ";

   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_POST['user_id'];

$sql= "DELETE from users where user_id = $user_id";

if (mysqli_query($con, $sql)) {
    header("Location: manage_users.php?status=success");
    
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($con);
    header("Location: manage_users.php?status=error");
}
mysqli_close($con);