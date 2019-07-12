<?php

// First we start a session which allow for us to store information as SESSION variables.
session_start();
if(!(isset($_SESSION['utd']) && $_SESSION['utd']==1)){

    echo "You are not authorized to view this page.";
      exit;
} 
// "require" creates an error message and stops the script. "include" creates an error and continues the script.
require "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once './partials/head.php';
    ?>
</head>


<body style="margin-bottom: 10px">
    <header>
        <?php
        include './partials/adminheader.php';
    ?>
    </header>
    <div class="container">
        <div class="piereport">
        <?php include "graph.php" ?>
        </div>
    <hr>
    <br>
<a href="reports2.php"> Approved Sales > </a>
        </div>
  
    </body>

    </html>