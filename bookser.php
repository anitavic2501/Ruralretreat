<?php

      session_start();
    $table = "bookings";
    $table2 ="services";

        
   $conn = mysqli_connect("localhost", "root", "","ruralretreat");                                 
               
               
               
                $userid = $_SESSION['id'];
                $dogid =  $_POST['dogsname'];
                $startdate = $_POST['startdate'];
                $enddate =  $_POST['enddate'];
                $service = $_POST['service'];
                



                


                $sql = "INSERT INTO $table (startdate, enddate, service_id, user_id, dog_id ) VALUES ('".$startdate."', '".$enddate."', $service, $userid, $dogid)";
               
                 
               
                
                if (mysqli_query($conn, $sql)) {
                   
                     

                    header("Location: booking.php?status=success");
                    
              } else {
                    
                    header("Location: booking.php?status=error");
              }
              mysqli_close($conn);
              



            
            
                           

?>