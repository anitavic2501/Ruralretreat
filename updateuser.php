
<?php
session_start();
include_once 'database.php';
include "includes/dbh.inc.php";
//    $conn = mysqli_connect("localhost","root","","ruralretreat");
   $user = "SELECT * FROM users ";

   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_POST['user_id'];
$userfname = $_POST['userfname'];
$userlname = $_POST['userlname'];
$username = $_POST['username'];
$email = $_POST['email'];
$conntact_number = $_POST['contact_number'];
$emrgcontactname_1 = $_POST['emrgcontactname_1'];
$emrgcontactnumber_1 = $_POST['emrgcontactnumber_1'];

//    $vaccination = $_POST['vaccination'];
//    $datereceived= $_POST['datereceived'];

$updatesql= "UPDATE users SET userfname = '$userfname', userlname = '$userlname',username= '$username', email = '$email', contact_number= '$conntact_number', emrgcontactname_1 ='$emrgcontactname_1', emrgcontactnumber_1 ='$emrgcontactnumber_1' WHERE user_id = $user_id";

if (mysqli_query($conn, $updatesql)) {
 header("Location: edit_customer.php?status=success");
 
} else {
    //var_dump($conn);
    
 // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
header("Location: edit_customer.php?status=error");
}
mysqli_close($conn);

?>