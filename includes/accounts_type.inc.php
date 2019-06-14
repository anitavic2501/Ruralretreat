<?php
include "dbh.php";
session_start();

if ($_SESSION['utd']== 3){ 
	echo "<script> alert('This is a user account');window.location='..//accounts.php'</script>";
         exit();
} elseif ($_SESSION['utd']== 2){ 
	echo "<script> alert('This is a Agency account');window.location='..//providerdashboard.php'</script>";
         exit();
} elseif ($_SESSION['utd']== 1){ 
	echo "<script> alert('This is a Admin account');window.location='..//admindashboard.php'</script>";
         exit();
}
?>