<?php
session_start();
require_once 'bookfuncs.php';
include 'includes/dbh.inc.php'; 
 
    

        
                       
          
               
               
                $userid = $_SESSION['id'];
                $dogid =  $_POST['dogsname'];
                $startdate = $_POST['startdate'];
                $enddate =  $_POST['enddate'];
                $service = $_POST['service'];
                $mainService = $_POST['mainService'];

                
                $booking =  new Booking($conn);

                $dogType = $booking -> dogtype( $dogid );

                


                 
                     


                $booking -> bookingfunction( $dogType, $startdate, $dogid, $userid, $service, $mainService, $enddate);

       

?>