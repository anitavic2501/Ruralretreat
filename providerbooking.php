
<?php

// First we start a session which allow for us to store information as SESSION variables.
//session_start();
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
    search user mobile number in here :
    