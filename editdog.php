
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
$dog_name = $_POST['dogname'];
$dog_breed = $_POST['breed'];
$dog_age = $_POST['age'];
$dog_gender = $_POST['gender'];

//    $vaccination = $_POST['vaccination'];
//    $datereceived= $_POST['datereceived'];

$updatesql= "UPDATE dogs SET dogname = '$dog_name',breed = '$dog_breed',age=$dog_age, gender = '$dog_gender' WHERE dog_id = $dog_id";

if (mysqli_query($con, $updatesql)) {
 header("Location: doglist.php?status=success");
 
} else {
    var_dump($con);
    
 // echo "Error: " . $sql . "<br>" . mysqli_error($con);
// header("Location: doglist.php?status=error");
}
mysqli_close($con);

?>