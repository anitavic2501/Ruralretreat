<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "ruralretreat";

// Create connection
 $conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    die("Connection to database failed: " . mysqli_connect_error());
}
