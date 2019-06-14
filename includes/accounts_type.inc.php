<?php
include "dbh.inc.php";
session_start();

if ($_SESSION['utd']== 3){ 
	echo "<script> ;window.location='../accounts.php'</script>";
         exit();
} elseif ($_SESSION['utd']== 2){ 
	echo "<script> ;window.location='../providerdashboard.php'</script>";
         exit();
} elseif ($_SESSION['utd']== 1){ 
	echo "<script> ;window.location='../admindashboard.php'</script>";
         exit();
}
?>