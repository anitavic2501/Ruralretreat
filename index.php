<?php

  // First we start a session which allow for us to store information as SESSION variables.
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
  <?php
     include_once './partials/header.php';
  ?>
  </header>
  <?php 
						if (isset ($_GET['status'] )) {
                             if($_GET['status'] == 'success'){
						?>

							<div class="alert alert-warning alert-dismissible fade show" role="alert">	
  							<strong>Your message has been sent! We will reply you shortly!</strong>
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
  <body>
      <div>
        <div class="col-xl" style="text-align: center;">

          <br><h1>Welcome      
        <?php
        if (isset($_SESSION['id']))  {
        echo $_SESSION['uid'];

        }
        ?> </h1> 
          <i class="fas fa-paw"></i>
        <p> Are you looking a place for your dog while you are away? <br>
         You have come to the right place. 
        <br>
           Rural Retreat is facilitate with unquestionable quality of services,<br> your lovely one will enjoy
           their staying in our place. 
           <br> We always made them feel at home and loved.</p>
          <br>
          
          <div class="img-fluid">
          <img src="./images/2.jpg" class="rounded-circle" alt="dogs" width="300">
          <br>

          <p style="font-size: 40px;">
          <b>“Dogs are not our whole life, <br> 
          but they make our lives whole.” </b>
          </p>
        </div> </div>

        <div class="contact" style="text-align: center;" id="section3">
        <div class="container" >   
          <div class="row">
              <div class="col-4 md"> </div>
              <div class="col-4 lg">    
        <section class="form" >
                         <form  id="Contactus" name="contactform" action = "contactus.php" method="POST">
                                    <br><br>
                                    <h2>CONTACT US</h2>
                                    <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                                            </div>
                                            <div class="form-group">
                                                    <label for="message">Message:</label>
                                                    <textarea type="text" name="message" class="form-control rounded-0" id="message" rows="10" required></textarea>
                                                </div>
                                    
                                        <button type="submit" class="btn btn-info" value="Submit Button">Send</button>
                                
                                        <input type="button" class="btn btn-danger" onclick="myFunction()" value="Reset">
                                        <br><br>
                                        
                                    </div>
                        </form>
                    </section>     </div></div> </div></div>
                    
  
          
        </div>
       
      </div>
</body>
<script>
function myFunction() {
  document.getElementById("Contactus").reset();
}
</script>
  <footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>
      
</html>