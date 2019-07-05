<?php

include_once 'database.php';

session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="jQuery/js/jquery.multiselect.js"></script>
	<link rel="stylesheet" href="css/main.css">	
		<?php
		 include_once './partials/head.php';
		 
	   ?> 
	   
</head>
<nav>
		 <?php
			include_once './partials/header.php';
		 ?>
		 
</nav>
<body>

<p style = 'text-align: center'>

Thank you for your booking enquiry.
<br>
<h5 style = 'text-align: center'>Your total booking price will be  <?php echo "$ ". number_format ((float)  $_GET['totalPrice'],2,'.', '' ) ?> 
<br>
<br>
You will receive an email shortly. 
<br>
<br>
Please note this booking is not yet confirmed!</h5>


</p>



</body>







</html>