<?php
$dBServername = "ruralretreat.cespegrr14df.ap-southeast-2.rds.amazonaws.com";
$dBUsername = "root";
$dBPassword = "123anita";
$dBName = "ruralretreat";

// Create connection
 $conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    die("Connection to database failed: " . mysqli_connect_error());
}
