<?php

require_once 'ErrorMessages.php';
class Booking{

    function getyellowcount($startDate){

       
    $conn = mysqli_connect("localhost", "root", "","ruralretreat");

    $sql = "SELECT yellow FROM slots WHERE date ="."'".$startDate ."'";

    $result  =  mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count =  $row['yellow'];

   

    mysqli_close($conn);

    return $count;
    
    }

    function getbookingscount($startDate){

    // var_dump("Inside func get all ".$startDate);

    $conn = mysqli_connect("localhost", "root", "","ruralretreat");

    $sql = "SELECT totalbookings FROM slots WHERE date ="."'".$startDate ."'";


    $result  =  mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count =  $row['totalbookings'];
    
    mysqli_close($conn);
    
    return $count;
    
    }


    function dogtype($dog_id){

    $conn = mysqli_connect("localhost", "root", "","ruralretreat");

    $sql = "SELECT label from dogs WHERE dog_id = $dog_id";

    $result  =  mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $label =  $row['label'];

    return $label;

    }


    function bookingfunction($dog_type,$startDate,$dog_id,$user_id,$service_id,$endDate){

      if($startDate <= date("Y-m-d") ) {
        
        header("Location: booking.php?status=error&message=".ErrorMessages::$SAME_DATE_BOOKING);
        exit;
    }
    else if($startDate > $endDate){

        header("Location: booking.php?status=error&message=".ErrorMessages::$CORRECT_BOOKING_DATE);
        exit;

    }

        if($dog_type == 'yellow' ){
            // var_dump($this ->getyellowcount($startDate));

            if ($this ->getyellowcount($startDate) == 1){
             
               
                   header ("Location: booking.php?status=error&message=".ErrorMessages::$NO_MORE_DOGS);
                 
            }
            else if ($this ->getbookingscount($startDate) < 5){
                $sql = "INSERT INTO bookings (startdate, enddate, service_id, user_id, dog_id ) VALUES ('".$startDate."', '".$endDate."', $service_id, $user_id, $dog_id)";
                $this->updateBookingsCount($startDate, $dog_type);
                $this->executeSQL( $sql );
              
            }
            else {

            header ("Location: booking.php?status=error&message=".ErrorMessages::$NO_MORE_DOGS); 

            }

        } else{

            // var_dump("Dog type" .$dog_type);

       
            
            if($this ->getbookingscount($startDate) == 7){

           header ("Location: booking.php?status=error&message=".ErrorMessages::$NO_MORE_DOGS);

            }
            else{
                $sql = "INSERT INTO bookings (startdate, enddate, service_id, user_id, dog_id ) VALUES ('".$startDate."', '".$endDate."', $service_id, $user_id, $dog_id)";
                $this->updateBookingsCount($startDate, $dog_type);
                $this->executeSQL( $sql );
               
            }
        }


       
    } 




     //Insert booking

     function executeSQL($sql){

        $conn = mysqli_connect("localhost", "root", "","ruralretreat");      
        if (mysqli_query($conn, $sql)) {
                   
                     
      header("Location: booking.php?status=success");
            
      } else {
            
        header("Location: booking.php?status=error&message=".ErrorMessages::$BOOKING_ERROR);
      }
      mysqli_close($conn);




     }



     function updateBookingsCount($bookingDate, $dogType){

       
    if( $this -> checkForSlots($bookingDate) > 0 ) {

       $sql = "update slots set totalbookings= totalbookings +1 ";


       if($dogType == 'blue') {
          
        $sql  =  $sql." ,  blue = blue + 1";

       } else if ($dogType == 'green') {

        $sql  =  $sql." ,  green = green + 1";

       } else {

        $sql  =  $sql." ,  yellow = yellow + 1";

       }

       $sql  =  $sql." where date = "."'".$bookingDate."'";

       
       $this -> executeSQL( $sql);
    } else  {

      $sql ="";

      if($dogType == 'yellow') {
        $sql = "insert into slots (totalbookings, date , yellow ) values ( 1, "."'".$bookingDate."'". ", 1)";
      } else if ($dogType == 'green') {

        $sql = "insert into slots (totalbookings, date , green ) values ( 1, "."'".$bookingDate."'". ", 1)";

      } else {

        $sql = "insert into slots (totalbookings, date , blue ) values ( 1, "."'".$bookingDate."'". ", 1)";
      }

      
        
      $this -> executeSQL( $sql);

    }

     }



     function checkForSlots($bookingDate) {

         $sql  =  "select * from slots where date = "."'".$bookingDate."'";

         $conn = mysqli_connect("localhost", "root", "","ruralretreat");      
       
          $result  =  mysqli_query($conn, $sql);

          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $count =  $row['totalbookings'];
          

         mysqli_close($conn);
          
         return $count;



     }




   
     
     




}  
?>