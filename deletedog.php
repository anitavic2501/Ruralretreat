
<?php
session_start();
include_once 'database.php';
   $con = mysqli_connect("localhost","root","","ruralretreat");
   $dogs = "SELECT * FROM dogs ";

   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$dog_id = $_POST['dog_id'];

$sql= "DELETE from dogs where dog_id = $dog_id";

if (mysqli_query($con, $sql)) {

    if (isset($_SESSION['utd'])  && $_SESSION['utd']== 3) {
    header("Location: doglist.php?status=success");
    
} else{
    
    header("Location: doglist.php?status=error");
} if (isset($_SESSION['utd']) && $_SESSION['utd']== 1) {
    header("Location: managedog.php?status=success");
}} else{
    
   header("Location: managedog.php?status=error");
    }
mysqli_close($con);
?>