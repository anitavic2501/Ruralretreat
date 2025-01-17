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
	   
		 <nav>
		 <?php
			include_once './partials/adminheader.php';
		 ?>
		 
	   </nav>

          



<body>
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
<div class="content">
<h2>Reply to users messages</h2>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">User Name</th>
      <th scope="col">Message</th>
      <th scope="col">Reply</th>
      <th scope="col">Delete Message</th>
    </tr>
  </thead>	
<tbody>
      <?php
      //  $connn = mysqli_connect("localhost","root","","ruralretreat");
      $conntactus = "SELECT * FROM contactus";
      $res = mysqli_query($conn, $conntactus);
      while($r = mysqli_fetch_assoc($res)): ?>
            <tr>
            <td><?php echo $r['email']; ?></td>
            <td><?php echo $r['name']; ?></td>
            <td><?php echo $r['message']; ?></td>
            
            
            <td>
            
            <div class="container">
            <?php
            $message_modified = trim(preg_replace('/\s+/', '', $r['message']));
            
            ?>
        <!-- Button to Open the Modal -->
        <button style = "background-color:green;"type="button" onclick="initModal(<?php echo $r['message_id'].','.'\''.$r['email'].'\','.'\''.$r['name'].'\','.'\''.$message_modified.'\''?>)"class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
            Reply
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal2">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h2 class="modal-title">Message Content</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php
						
						// $conn = mysqli_connect("localhost", "root", "","ruralretreat");
						$sql = "SELECT * FROM contactus";
       
						$result = mysqli_query($conn, $sql);
						?>
                <!-- Modal body -->
                <form class="modal-body" method="POST" action="messagereply.php">
                
                <div class="replymessage" style="align: center;">
                    
                    <input id="message_id" type="hidden" name="message_id"  value="<?php echo $r['message_id']; ?>"/>    
                    Email : <br> <input id="email" type="text" name="email" class="text_field form-control" value=""  required>
                    Name: <br><input id="name" type="text" name="name" class="text_field form-control" value=""  required>
                    Message: <br> <textarea id="message" type="text" rows = "5" name="message" class="text_field form-control" value="" placeholder="" required>
                    </textarea>
                    Reply: <br> <textarea id="reply" type="text" rows = "5" name="reply" class="text_field form-control" value="" placeholder="" required>
                    </textarea>
                   
                    
                                                       
                
                </div>
                    
            
                
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger" >Reply</button>
                </div> </form>
                
              </div>
              </div>
          </div>
       
  </div>
            
        

</td>
<td style="text-align:center;">
             <a class="fa fa-trash btn delete" href = "deletemessage.php?message_id=<?php echo $r['message_id'] ?>"  onclick="return confirm('Are you sure?')" name="delete" value="Delete Message" class="btn btn-danger" id="delete">
              </a>
            
            </td>
                      
            </tr>

<?php endwhile ?>
</tbody>	
</table>

<script>

 function initModal(id, email, name, message){

        var message_id_text =  document.getElementById('message_id');
        var email_text =  document.getElementById('email');
        var username_text =  document.getElementById('name');
        var message_text =  document.getElementById('message');
        
        
        message_id_text.value = id;
        email_text.value = email;
        username_text.value = name;
        message_text.value = message;
        
        


 }



</script>

</body>