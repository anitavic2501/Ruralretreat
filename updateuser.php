
<?php
session_start();
include_once 'database.php';
   $con = mysqli_connect("localhost","root","","ruralretreat");
   $user = "SELECT * FROM users ";

   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_POST['user_id'];
$userfname = $_POST['userfname'];
$userlname = $_POST['userlname'];
$username = $_POST['username'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$emrgcontactname_1 = $_POST['emrgcontactname_1'];
$emrgcontactnumber_1 = $_POST['emrgcontactnumber_1'];

//    $vaccination = $_POST['vaccination'];
//    $datereceived= $_POST['datereceived'];

$updatesql= "UPDATE users SET userfname = '$userfname', userlname = '$userlname',username= '$username', email = '$email', contact_number= '$contact_number', emrgcontactname_1 ='$emrgcontactname_1', emrgcontactnumber_1 ='$emrgcontactnumber_1' WHERE user_id = $user_id";

if (mysqli_query($con, $updatesql)) {
 header("Location: edit_customer.php?status=success");
 
} else {
    //var_dump($con);
    
 // echo "Error: " . $sql . "<br>" . mysqli_error($con);
header("Location: edit_customer.php?status=error");
}
mysqli_close($con);

?>