
<?php
session_start();
include_once 'database.php';
   $con = mysqli_connect("localhost","root","","ruralretreat");
   $users = "SELECT * FROM users ";

   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_GET['user_id'];

$sql= "DELETE from users where user_id = $user_id";

if (mysqli_query($con, $sql)) {

    
    if (isset($_SESSION['utd'])  && $_SESSION['utd']== 2) {
        header("Location: provideruser.php?status=success");
        
    } else{
        
        header("Location: provideruser.php?status=error");
    } if (isset($_SESSION['utd']) && $_SESSION['utd']== 1) {

    header("Location: manage_users.php?status=success");
    
}} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($con);
    header("Location: manage_users.php?status=error");
}
mysqli_close($con);


?>