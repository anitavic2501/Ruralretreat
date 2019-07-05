<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "ruralretreat";

if (isset($_ENV['DATABASE_CONNECTION_URL'])) {
    $dBServername = $_ENV['DATABASE_CONNECTION_URL'];
}
if (isset($_ENV['DATABASE_NAME'])) {
    $dBName = $_ENV['DATABASE_NAME'];
}
if (isset($_ENV['DATABASE_USERNAME'])) {
    $dBUsername = $_ENV['DATABASE_USERNAME'];
}
if (isset($_ENV['DATABASE_PASSWORD'])) {
    $dBPassword = $_ENV['DATABASE_PASSWORD'];
}

// Create connection
 $conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    die("Connection to database failed: " . mysqli_connect_error());
}
