
<?php
session_start();
include_once 'database.php';
   $con = mysqli_connect("localhost","root","","ruralretreat");
   $dogs = "SELECT * FROM users ";

   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_POST['user_id'];
$user_fname = $_POST['userfname'];
$user_lname = $_POST['userlname'];
$user_email = $_POST['email'];
$cnumber = $_POST['contact_number'];
$user_type = $_POST['user_type'];

//    $vaccination = $_POST['vaccination'];
//    $datereceived= $_POST['datereceived'];

$updatesql= "UPDATE users SET userfname = '$user_fname', userlname = '$user_lname', email = '$user_email',contact_number=$cnumber, user_type_id =$user_type WHERE user_id = $user_id";

if (mysqli_query($con, $updatesql)) {
 header("Location: manage_users.php?status=success");
 
} else {
    var_dump($con);
    
 // echo "Error: " . $sql . "<br>" . mysqli_error($con);
// header("Location: doglist.php?status=error");
}
mysqli_close($con);

?>