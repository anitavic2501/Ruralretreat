<?php

require_once 'ErrorMessages.php';

class Booking {



  public $connection;

  public $bookingId;

  function __construct($conn) {
    $this->connection =$conn;

  
}

    function getyellowcount($startDate){

       
    

    $sql = "SELECT yellow FROM slots WHERE date ="."'".$startDate ."'";

    $result  =  mysqli_query($this -> connection, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count =  $row['yellow'];

   
    return $count;
    
    }

  

    function getbookingscount($startDate){

    // var_dump("Inside func get all ".$startDate);

    

    $sql = "SELECT totalbookings FROM slots WHERE date ="."'".$startDate ."'";


    $result  =  mysqli_query($this->connection, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count =  $row['totalbookings'];
    


    
    return $count;
    }


    function dogtype($dog_id){

  

    $sql = "SELECT label from dogs WHERE dog_id = $dog_id";
    var_dump($this->connection);

    $result  =  mysqli_query($this -> connection, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $label =  $row['label'];

    return $label;

    }


    function bookingfunction($dog_type,$startDate,$dog_id,$user_id,$service_ids, $mainService, $endDate){

      date_default_timezone_set('Pacific/Auckland');

      $currentDateTime =  strtotime(date("Y-m-d"));


      $startDateTime =  strtotime($startDate);

      $endDateTime  =  strtotime($endDate);

      $currentDate = date("Y-m-d");
      // var_dump($currentDate);
      // var_dump($currentDateTime);
      // var_dump($startDate);
      // var_dump($startDateTime);

      if($startDateTime <= $currentDateTime ) {
        
        header("Location: booking.php?status=error&message=".ErrorMessages::$SAME_DATE_BOOKING);
        exit;
    }
    else if($startDateTime > $endDateTime){

        header("Location: booking.php?status=error&message=".ErrorMessages::$CORRECT_BOOKING_DATE);
        exit;

    }

    
        if($dog_type == 'yellow' ){
            
          var_dump("inside  of the condiion yellow dog".$this ->getyellowcount($startDate));


            if ($this ->getyellowcount($startDate) == 1){
             
               
                 header ("Location: booking.php?status=error&message=".ErrorMessages::$NO_MORE_DOGS);
                 
            }
            else if ($this ->getbookingscount($startDate) < 5){
                
              $sql = "";
              if(isset($_SESSION['userinfo'])){
                $provider_id=$_SESSION['id'];
                $user_id = $_SESSION['userinfo']['user_id'];
                $sql = "INSERT INTO bookings (startdate, enddate, user_id, dog_id, provider_id ) VALUES ('".$startDate."', '".$endDate."', $user_id, $dog_id, $provider_id)";
              } else {
              $sql = "INSERT INTO bookings (startdate, enddate,  user_id, dog_id ) VALUES ('".$startDate."', '".$endDate."', $user_id, $dog_id)";
            }

              
                
                $this->updateBookingsCount($startDate, $dog_type);
                $this->executeSQL( $sql );
                $generated_booking_id = mysqli_insert_id($this->connection);
                $this->bookingId = $generated_booking_id;

                $datetime1 = date_create($startDate);
                $datetime2 = date_create($endDate);
                $interval = date_diff($datetime1, $datetime2);

                $mainServieSQLRecord = "INSERT INTO service_booking (service_id, booking_id, quantity) VALUES ($mainService, $generated_booking_id, $interval->days)";
                $this->executeSQL(  $mainServieSQLRecord );

                foreach($service_ids as $service_id ) {
              $sqlmappingrecord = "INSERT INTO service_booking (service_id, booking_id) VALUES ($service_id, $generated_booking_id)";
              $this->executeSQL( $sqlmappingrecord );
                }

                $this-> updatebookingprice($generated_booking_id);
              
            }
            else {

            header ("Location: booking.php?status=error&message=".ErrorMessages::$NO_MORE_DOGS); 

            }

        } else{

            // var_dump("Dog type" .$dog_type); for green and blue dogs

            
            
            if($this ->getbookingscount($startDate) == 7){

           header ("Location: booking.php?status=error&message=".ErrorMessages::$NO_MORE_DOGS);

            }
            else{ 
              $sql = "";
						if(isset($_SESSION['userinfo'])){
              $provider_id=$_SESSION['id'];
              $user_id = $_SESSION['userinfo']['user_id'];
              $sql = "INSERT INTO bookings (startdate, enddate,  user_id, dog_id, provider_id ) VALUES ('".$startDate."', '".$endDate."',  $user_id, $dog_id, $provider_id)";
						} else {
            $sql = "INSERT INTO bookings (startdate, enddate, user_id, dog_id ) VALUES ('".$startDate."', '".$endDate."', $user_id, $dog_id)";
          }

           
               
                $this->updateBookingsCount($startDate, $dog_type);
                $this->executeSQL( $sql );

                $generated_booking_id = mysqli_insert_id($this->connection);
                $this->bookingId = $generated_booking_id;

                $datetime1 = date_create($startDate);
                $datetime2 = date_create($endDate);
                $interval = date_diff($datetime1, $datetime2);

                $mainServieSQLRecord = "INSERT INTO service_booking (service_id, booking_id, quantity) VALUES ($mainService, $generated_booking_id, $interval->days)";
                $this->executeSQL(  $mainServieSQLRecord );

                foreach($service_ids as $service_id ) {
                  $sqlmappingrecord = "INSERT INTO service_booking (service_id, booking_id) VALUES ($service_id, $generated_booking_id)";
                  $this->executeSQL( $sqlmappingrecord );
                    }

                    $this-> updatebookingprice($generated_booking_id);
               
            }
        }


       $this-> redirectToBookingSuccessPage();
    } 




     //Insert booking

     function executeSQL($sql){
    
        if (!mysqli_query($this->connection, $sql)) {
         
          header("Location: booking.php?status=error&message=".ErrorMessages::$BOOKING_ERROR);
          exit;
        }
            
     
     }


     function redirectToBookingSuccessPage(){

         $totalSum =  $this-> gettotalsum($this-> bookingId);

         header("Location: booking_success.php?booking_id=".$this-> bookingId."&totalPrice=".$totalSum);
         exit;

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

         
       
          $result  =  mysqli_query($this->connection, $sql);

          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $count =  $row['totalbookings'];
          

      

          
         return $count;



     }
     function gettotalsum($booking_id){
       
      $sql = "SELECT sum(services.price*service_booking.quantity) as total_price  from service_booking 
      INNER JOIN services ON service_booking.service_id = services.service_id
      where service_booking.booking_id = $booking_id;";
      
  
      $result  =  mysqli_query($this ->connection, $sql);
  
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  
      $totalPrice =  $row['total_price'];
  
      return $totalPrice;


    }




    function updatebookingprice($booking_id){

     $totalprice = $this->gettotalsum($booking_id);

     $sql = "UPDATE bookings SET price = $totalprice  WHERE booking_id = $booking_id";

     $this -> executeSQL($sql);

    }




   
     
     




}  
?>