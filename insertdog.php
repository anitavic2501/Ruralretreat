
<?php
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
   $user_id = $_POST['user_id'];
//    $vaccination = $_POST['vaccination'];
//    $datereceived= $_POST['datereceived'];

$sql= "INSERT INTO dogs (dogname, user_id, breed, age) VALUES ('$dog_name','$user_id','$dog_breed','$dog_age')";

if (mysqli_query($con, $sql)) {
    echo 'Congratulations! your dog is registered! <br> <a href="index.php"> back </a>';
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
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

