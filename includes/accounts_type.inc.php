<?php
include "dbh.php";
session_start();

if ($_SESSION['utd']== 3){ 
	echo "<script> alert('This is a user account');window.location='accounts.php'</script>";
         exit();
} elseif ($_SESSION['utd']== 2){ 
	echo "<script> alert('This is a Agency account');window.location='dashboard2.php'</script>";
         exit();
} elseif ($_SESSION['utd']== 1){ 
	echo "<script> alert('This is a Admin account');window.location='dashboard3.php'</script>";
         exit();
}
?>