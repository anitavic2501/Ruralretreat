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

        <div class="content">
        <h2> Manage Users </h2>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">User Type</th>
    </tr>
  </thead>
  <tbody>
      <?php

    //    $userid=$_SESSION['id'];
      //  $conn = mysqli_connect("localhost","root","","ruralretreat");
      $users = "SELECT users.user_id, users.userfname, users.userlname,users.email,users.contact_number, user_type.user_type_name, user_type.user_type_id FROM users JOIN user_type ON users.user_type_id=user_type.user_type_id";
      $res = mysqli_query($conn, $users);
      while($r = mysqli_fetch_assoc($res)): ?>
            <tr>
            <td><?php echo $r['user_id']; ?></th>
            <td><?php echo $r['userfname']; ?></td>
            <td><?php echo $r['userlname']; ?></td>
            <td><?php echo $r['email']; ?></td>
            <td><?php echo $r['contact_number']; ?></td>
            <td><?php echo $r['user_type_name']; ?></td>
            
            <td><div class="container">
        <!-- Button to Open the Modal -->
        <a onclick="initModal(<?php echo $r['user_id'].','.'\''.$r['userfname'].'\','.'\''.$r['userlname'].'\','.'\''.$r['email'].'\','.'\''.$r['contact_number'].'\','.$r['user_type_id']?>)" data-toggle="modal" data-target="#myModal">
        <i class="fas fa-edit"></i>
        </a>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h2 class="modal-title">User Details</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php
						
						// $conn = mysqli_connect("localhost", "root", "","ruralretreat");
						$sql = "SELECT * FROM user_type";
       
						$result = mysqli_query($conn, $sql);
						?>
                <!-- Modal body -->
                <form class="modal-body" method="POST" action="edituser.php">
                
                <div class="editdog" style="align: center;">
                    
                    <input id="user_id" type="hidden" name="user_id"  value="<?php echo $r['user_id']; ?>"/>
                    First Name: <br><input id="userfname" type="text" name="userfname" class="text_field form-control" value=""  required>
                    Last Name: <br><input id="userlname" type="text" name="userlname" class="text_field form-control" value=""  required>
                    Email: <br><input id="email" type="text"  name="email" class="text_field form-control" value="" placeholder="" required>
                    Contact Number: <br><input id="contact_number" type="text"  name="contact_number" class="text_field form-control" value="" placeholder="" required>
                    User Type:<br><select class="form-control" name="user_type" id ="user_type">
                  
                <?php	
                			
								while ($rows = mysqli_fetch_assoc($result)) 
								{
								?>
								<option value=<?php echo $rows['user_type_id'] ?>><?php echo $rows['user_type_name']?></option>
												
											
							    <?php }?>		
							
							  </select>
                    
                                                       
                
                </div>
                    
            
                
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Update</button>
                </div> </form>
                
              </div>
              </div>
          </div>
  
        </div>

            </td>
            <td>
             <a class="fa fa-trash btn delete" href = "deleteuser.php?user_id=<?php echo $r['user_id'] ?>" onclick="return confirm('Are you sure?')" name="delete" value="Delete User" id="delete">
              </a>
            
            </td>
                      
            </tr>

      <?php endwhile ?>
  </tbody>
</table>


<br>

<script>

 function initModal(id, fname, lname, email, number, type){

        var user_id_text =  document.getElementById('user_id');
        var userfname_text =  document.getElementById('userfname');
        var userlname_text =  document.getElementById('userlname');
        var email_text =  document.getElementById('email');
        var contact_number_text =  document.getElementById('contact_number');
        var user_type_name_text =  document.getElementById('user_type');
        

        user_id_text.value = id;
        userfname_text.value = fname;
        userlname_text.value = lname;
        email_text.value = email;
        contact_number_text.value = number;
        user_type_name_text.value = type;
        


 }



</script>

</body>

</html>