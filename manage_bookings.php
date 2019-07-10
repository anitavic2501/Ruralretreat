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
        include_once './partials/adminheader.php';
    ?>
    </header>
    <div class="content">
    <h2> Manage Bookings </h2>
    <div class="container">
    <?php 
						if (isset ($_GET['status'] )) {
                             if($_GET['status'] == 'success'){
						?>

							<div class="alert alert-warning alert-dismissible fade show" role="alert">	
  							<strong>Success!</strong>
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  							</button>
							</div>
                          
                         <?php 
						}  else  { ?>
						<div class="alert alert-warning2 alert-dismissible fade show" role="alert">	
  							<strong>Error!</strong>
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  							</button>
							</div>
					
					
					<?php }
				 } ?>
        </div>  
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Booking ID</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Service</th>
      <th scope="col">Label</th>
      <th scope="col">Status</th>
      <th scope="col">Approve</th>
      <th scope="col">Reject</th>
    </tr>
  </thead>
  <tbody>
      <?php

      // $conn = mysqli_connect("localhost","root","","ruralretreat");

      $dogs = "SELECT bookings.booking_id, bookings.user_id, bookings.startdate,bookings.enddate,services.services, dogs.label, bookings.status FROM bookings JOIN service_booking ON bookings.booking_id=service_booking.booking_id JOIN services ON services.service_id=service_booking.service_id  JOIN dogs ON bookings.dog_id=dogs.dog_id ";


      $res = mysqli_query($conn, $dogs);
      while($r = mysqli_fetch_assoc($res)): ?>
            <tr>
            <td><?php echo $r['booking_id']; ?></th>
            <td><?php echo $r['startdate']; ?></td>
            <td><?php echo $r['enddate']; ?></td>
            <td><?php echo $r['services']; ?></td>
            <td><?php echo $r['label']; ?></td>
            <td><?php echo $r['status']; ?></td>
            
            <td><div class="container">
        <?php   if($r['status'] == 'pending') { ?>
        <a class="btn btn-danger" href = "change_booking_status.php?status=approve&id=<?php echo $r['booking_id'] ?> "  class="btn btn-primary" style ="background-color: green;"  >
            Approve
        </a>
                <?php   }?>
        
       </div>
    </div>
  </div>
  
</div>

</td>
            <td>
            <?php   if($r['status'] == 'pending' ) { ?>
            <a class="btn btn-danger" href = "change_booking_status.php?status=reject&id=<?php echo $r['booking_id'] ?>"class="btn btn-primary" style ="background-color: red;">
            Reject
        </a>
        <?php   }?>

</td>
                      
            </tr>

<?php endwhile ?>
</tbody>
</table>


<br>

<script>

 function approvefun(){


    }




</script>

</body>

</html>