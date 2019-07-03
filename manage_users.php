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
  							<strong>Successfuly updated!</strong>
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
        </div> <  

        <div class="content">
        <h1> Manage Users </h1>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">User Type</th>
      <th scope="col">Edit User</th>
      <th scope="col">Delete User</th>
    </tr>
  </thead>
  <tbody>
      <?php

    //    $userid=$_SESSION['id'];
       $con = mysqli_connect("localhost","root","","ruralretreat");
      $dogs = "SELECT users.user_id, users.userfname, users.userlname,users.email,users.contact_number, user_type.user_type_name FROM users JOIN user_type ON users.user_type_id=user_type.user_type_id";
      $res = mysqli_query($con, $dogs);
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
        <button style = "background-color:green;"type="button" onclick="initModal(<?php echo $r['user_id'].','.'\''.$r['userfname'].'\','.'\''.$r['userlname'].'\','.'\''.$r['email'].'\','.'\''.$r['contact_number'].'\','.'\''.$r['user_type_name'].'\''?>)"class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Edit
        </button>

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
						
						$con = mysqli_connect("localhost", "root", "","ruralretreat");
						$sql = "SELECT * FROM user_type";
       
						$result = mysqli_query($con, $sql);
						?>
                <!-- Modal body -->
                <form class="modal-body" method="POST" action="edituser.php">
                
                <div class="editdog" style="align: center;">
                    
                    <input id="user_id" type="hidden" name="user_id"  value="<?php echo $r['user_id']; ?>"/>
                    <input id="userfname" type="text" name="userfname" class="text_field form-control" value=""  required>
                    <input id="userlname" type="text" name="userlname" class="text_field form-control" value=""  required>
                    <input id="email" type="text"  name="email" class="text_field form-control" value="" placeholder="" required>
                    <input id="contact_number" type="text"  name="contact_number" class="text_field form-control" value="" placeholder="" required>
                    <select class="form-control" name="user_type">
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
             <a type ="button" href = "deleteuser.php?user_id=<?php echo $r['user_id'] ?>" style= "background-color: orange;"  onclick="return confirm('Are you sure?')" name="delete" value="Delete User" class="btn btn-danger" id="delete">Delete User
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
        var user_type_name_text =  document.getElementById('user_type_name');
        

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