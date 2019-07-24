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


<div class="dogspa">
<?php
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