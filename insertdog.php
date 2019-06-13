
<?php
session_start();
include 'dog.php';
include_once 'database.php';
   $con = mysqli_connect("localhost","root","","ruralretreat");
   $dogs = "SELECT dogname, breed, age, user_id FROM dogs ";

   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
//    if( isset($_POST["insertdog"]))
//    {    if ( insertdog($_POST)>0){
//        echo "<script> 
//        alert('Dog has been added');
//        </script>";
//    } else {
//        echo mysqli_error($con);
//    }
//    }
   $dog_name = $_POST['dogname'];
   $dog_breed = $_POST['breed'];
   $dog_age = (int)$_POST['age'];
   $dog_gender = $_POST['gender'];
   $user_id = $_SESSION['id'];
//    $vaccination = $_POST['vaccination'];
//    $datereceived= $_POST['datereceived'];

$sql= "INSERT INTO dogs (dogname, user_id, breed, gender, age) VALUES ('$dog_name','$user_id','$dog_breed', '$dog_gender','$dog_age')";

if (mysqli_query($con, $sql)) {
    header("Location: doglist.php?status=success");
    
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($con);
    header("Location: doglist.php?status=error");
}
mysqli_close($con);

// return mysqli_affected_rows($con);
//                 if($result === true){
//                     echo "Records inserted successfully.";
//                 } 
//                 else{
//                     echo "ERROR: Could not insert data";
//                 }

                           
?> 

