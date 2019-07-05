
<?php
session_start();
include_once 'database.php';
include "includes/dbh.inc.php";
//    $conn = mysqli_connect("localhost","root","","ruralretreat");
   $dogs = "SELECT * FROM dogs ";

   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$dog_id = $_POST['dog_id'];
$dog_name = $_POST['dogname'];
$dog_breed = $_POST['breed'];
$dog_age = $_POST['age'];
$dog_gender = $_POST['gender'];


//    $vaccination = $_POST['vaccination'];
//    $datereceived= $_POST['datereceived'];


if(isset($_SESSION['utd'])) {
    if (($_SESSION['utd']== 3 || $_SESSION['utd']== 2)) {
        $updatesql= "UPDATE dogs SET dogname = '$dog_name',breed = '$dog_breed',age=$dog_age, gender = '$dog_gender' WHERE dog_id = $dog_id";
        if(mysqli_query($conn,$updatesql)){
        header("Location: doglist.php?status=success");
        } else {
            header("Location: doglist.php?status=error");
        }
    } else{
        $doglabel = $_POST['label'];
        $updatesql1= "UPDATE dogs SET dogname = '$dog_name',breed = '$dog_breed',age=$dog_age, gender = '$dog_gender', label = '$doglabel' WHERE dog_id = $dog_id";
        if(mysqli_query($conn,$updatesql1)){
            header("Location: managedog.php?status=success");
        }
        else {
        
            header("Location: managedog.php?status=error");
            }
    } 
    mysqli_close($conn);
}
?>