<?php

session_start();
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

<header>
    <header>
        <?php
        include_once './partials/header.php';
    ?>
    </header>


<body>
<div class="services">
<?php
						
						// $conn = mysqli_connect("localhost", "root", "","ruralretreat");
						$sql = "SELECT * FROM services WHERE service_type = 'main'";
       
						$result = mysqli_query($conn, $sql);
            ?>
<h1>Our Services</h1>

<?php				
while ($rows = mysqli_fetch_assoc($result)){ ?>

<h2> <?php	echo $rows['services'] ?> </h2>
<p>  <?php echo $rows['description']; ?>  </p>
<?php   } ?>

            
<!-- <h2>Overnight Stay</h2>
$5 surcharge applies for day care and over night care during peak periods, <br>
including all long weekends, Easter weekend and the two week break over Christmas and New Years
<br><br>
Discount applies for 2+ dog families. 
<br>2 dog = $20 off the price of a concession card, 
<br>3 dogs at day care= $30 off the price of a concession card, 
<br>4 dogs at day care= $40 off the price of a concession card
<br><br>
*Please note that dogs must live at the same address and be owned by the same owner to be eligible for this deal
<br> -->

<div class="dogspa">
<?php
						
						// $conn = mysqli_connect("localhost", "root", "","ruralretreat");
						$sql = "SELECT * FROM services WHERE service_type = 'addon'";
       
						$result = mysqli_query($conn, $sql);
            ?>
<h2>Our additional services</h2>

<?php				
while ($rows = mysqli_fetch_assoc($result)){
 echo '<img src="' ."images/". $rows['image'] . '" alt=" " style="max-width:600px;max-height:400px" /></a>';
 
 echo '<br>';
 echo '<a href="#'.$rows['services'].'" class="btn btn-info" data-toggle="collapse">'.$rows['services'].'</a>'; 
 echo '<br>';
 echo '<div id="'.$rows['services'].'" class="collapse">';
 
 echo $rows['description'];
 echo '<h2>only for $'.$rows['price'].'</h2>';
 echo '</div>';
 echo '<br>';
}
 
 ?>
 
</div>
</body>
<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>
      
</html>