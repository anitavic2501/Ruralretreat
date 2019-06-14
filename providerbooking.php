
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

<hr>
<form class="form-horizontal" action="search.php" method="post">
<fieldset>

    <!-- Form Name -->
<h3>Search user</h3>

<!-- Search input-->
<div class="search form-group">
  <label class="col-md-4 control-label" for="keyword">search user mobile number in here :</label>
  <div class="col-md-4">
    <input name="keyword" class="form-control input-md" id="keyword" type="search" required>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button name="submit" class="btn btn-primary" id="submit">Search</button>
  </div>
</div>

</fieldset>
</form>
 <hr>
