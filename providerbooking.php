
<?php

// First we start a session which allow for us to store information as SESSION variables.
session_start();
// "require" creates an error message and stops the script. "include" creates an error and continues the script.
require "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once './partials/head.php';
?>  

<link rel="stylesheet" href="bootstrap2.min.css">
</head> 

<header>
<?php
   include_once './partials/adminheader.php';
?>
</header>

<body>

<hr>
<form class="form-horizontal" method="post">
<fieldset>

    <!-- Form Name -->
<h3>Search user</h3>

<!-- Search input-->
<div class="search form-group">
  <label class="col-md-4 control-label">search user mobile number in here :</label>
  <div class="col-md-4">
    <input name="contact_number" class="form-control input-md" id="contact_number" type="search" required>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-primary" id="submit" value="contact_number">Search</button>
  </div>
</div>

</fieldset>
</form>
 <hr>


 
<?php
if(isset($_POST['contact_number'])){
 $con = mysqli_connect("localhost","root","","ruralretreat");
 $user = "SELECT * FROM users ";

 if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$contact_number = $_POST['contact_number'];

$userinfo_array = array();

$sql = "SELECT user_id, userfname, userlname, username, email FROM users WHERE contact_number LIKE '%$contact_number%' ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $userinfo_array['user_id']=$row['user_id'];
        $userinfo_array['userfname']=$row['userfname'];
        $userinfo_array['userlname']=$row['userlname'];
        $userinfo_array['username']=$row['username'];
        $_SESSION['userinfo']=$userinfo_array;
        echo'<div class="panel">';
        echo "User First name: " . $row['userfname']. "<br>";
        echo "User Last Name: " .$row['userlname']." <br> ";
        echo "Username: ".$row['username']."<br>";
        echo "email: ".$row['email']."<br>";
        echo "</div>";
        echo '<a class="btn btn-primary" href="booking.php">Book Now</a>';
        
    }
} else {
    echo "0 results";
}
		
$conn->close(); }

?>
