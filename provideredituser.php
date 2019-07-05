
<?php
session_start();
include_once 'database.php';
include "includes/dbh.inc.php";
//    $conn = mysqli_connect("localhost","root","","ruralretreat");
   $users = "SELECT user_id, username, userfname, userlname, email, contact_number FROM users ";

   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$user_id = $_POST['user_id'];
$username = $_POST['username'];
$userfname = $_POST['userfname'];
$userlname = $_POST['userlname'];
$email = $_POST['email'];
$conntact_number = $_POST['contact_number'];
// $CN = $_POST['emrgcontactname_1'];
// $ECN = $_POST['emrgcontactnumber_1'];

$updatesql= "UPDATE users SET username = '$username', userfname = '$userfname', userlname='$userlname', email = '$email', contact_number = '$conntact_number' WHERE user_id = $user_id";

if (mysqli_query($conn, $updatesql)) {
 header("Location: provideruser.php?status=success");
 
} else {
    var_dump($conn);

}
mysqli_close($conn);

?>