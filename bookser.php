<?php
session_start();
require_once 'bookfuncs.php';
 
    

        
   $conn = mysqli_connect("localhost", "root", "","ruralretreat");                                 
               
               
               
                $userid = $_SESSION['id'];
                $dogid =  $_POST['dogsname'];
                $startdate = $_POST['startdate'];
                $enddate =  $_POST['enddate'];
                $service = $_POST['service'];
                
                $booking =  new Booking();

                $dogType = $booking -> dogtype( $dogid );

                


                 
                     


                $booking -> bookingfunction( $dogType, $startdate, $dogid, $userid, $service, $enddate);

       

?>