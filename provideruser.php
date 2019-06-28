<?php

// First we start a session which allow for us to store information as SESSION variables.
session_start();
if(!(isset($_SESSION['utd']) && $_SESSION['utd']==2)){

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

<link rel="stylesheet" href="bootstrap2.min.css">
</head> 

<header>
<?php
   include_once './partials/providerheader.php';
?>
</header>

<body>
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
        </div> </div>
        
        <div class="content">
        <h1>Manage users</h1>       

    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Edit User</th>
      <th scope="col">Delete User</th>
    </tr>
  </thead>
  <tbody>
      <?php

        $provider_id=$_SESSION['id'];
       $con = mysqli_connect("localhost","root","","ruralretreat");
      $users = "SELECT users.user_id, users.username, users.userfname, users.userlname,users.email,users.contact_number FROM users WHERE provider_id=$provider_id";
      $res = mysqli_query($con, $users);
      // var_dump($con);
      while($r = mysqli_fetch_assoc($res)): ?>

            <tr>
            <td><?php echo $r['username']; ?></th>
            <td><?php echo $r['userfname']; ?></td>
            <td><?php echo $r['userlname']; ?></td>
            <td><?php echo $r['email']; ?></td>
            <td><?php echo $r['contact_number']; ?></td>
            
            <td><div class="container">
        <!-- Button to Open the Modal -->
        <button style = "background-color:green;"type="button" onclick="initModal(<?php echo $r['user_id'].','.'\''.$r['username'].'\','.'\''.$r['userfname'].'\','.'\''.$r['userlname'].'\','.'\''.$r['email'].'\','.'\''.$r['contact_number'].'\''?>)"class="btn btn-primary" data-toggle="modal" data-target="#myModal">
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
                <form class="modal-body" method="POST" action="provideredituser.php">
                
                <div class="edituser" style="align: center;">
                    <input id="user_id" type="hidden" name="user_id"  value="<?php echo $r['user_id']; ?>"/>
                    Username :<br>
                    <input id="username" name="username"  value="<?php echo $r['username']; ?>"/>
                    <br>User first Name :<input id="userfname" type="text" name="userfname" class="text_field form-control" value=""  required>
                    <br>User Last Name :<input id="userlname" type="text" name="userlname" class="text_field form-control" value=""  required>
                    <br>Email : <input id="email" type="text"  name="email" class="text_field form-control" value="<?php echo $r['email']; ?>" placeholder="" required>
                    <br>Contact Number<input id="contact_number" type="text"  name="contact_number" class="text_field form-control" value="" placeholder="" required>
                    
								
                    
                                                       
                
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
           
        </a> </form>
        

</td>
                      
            </tr>

<?php endwhile ?>
</tbody>
</table>
<div class="provideradduser">
<h1> Add new user </h1>
<?php
          // Here we create an error message if the user made an error trying to sign up.
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
              echo '<p class="providerusererror">Fill in all fields!</p>';
            }
            else if ($_GET["error"] == "invaliduidmail") {
              echo '<p class="providerusererror">Invalid username and e-mail!</p>';
            }
            else if ($_GET["error"] == "invaliduid") {
              echo '<p class="providerusererror">Invalid username!</p>';
            }
            else if ($_GET["error"] == "invalidmail") {
              echo '<p class="providerusererror">Invalid e-mail!</p>';
            }
            else if ($_GET["error"] == "passwordcheck") {
              echo '<p class="providerusererror">Your passwords do not match!</p>';
            }
            else if ($_GET["error"] == "usertaken") {
              echo '<p class="providerusererror">Username is already taken!</p>';
            }
          }
          // Here we create a success message if the new user was created.
          else if (isset($_GET["provideruser"])) {
            if ($_GET["provideruser"] == "success") {
              echo '<p class="providerusererror">Add user successful!</p>';
            }
          }
          ?>
          <form class="form-provideruser" action="includes/provideruser.inc.php" method="post">
          <div class="col-xl">
            <?php
            // Here we check if the user already tried submitting data.

            // We check username.
            if (!empty($_GET["username"])) {
              echo '<input type="text" name="username" placeholder="Username" value="'.$_GET["username"].'"required>';
            }
            else {
              echo '<input type="text" name="username" placeholder="Username"required>';
            }

            // We check e-mail.
            if (!empty($_GET["email"])) {
              echo '<input type="text" name="email" placeholder="E-mail" value="'.$_GET["email"].'"required>';
            }
            else {
              echo '<input type="text" name="email" placeholder="E-mail"required>';
            }
            ?>
            <input type="password" name="password" placeholder="Password"required>
            <input type="password" name="pwd-repeat" placeholder="Repeat password"required>
            <button type="submit" name="provideruser-submit">Add user</button>
            </div>
          </form>
    
</div>

<br>

<script>

 function initModal(id, name, fname, lname, email, number){
        var user_id_text = document.getElementById('user_id');
        var username_text =  document.getElementById('username');
        var userfname_text =  document.getElementById('userfname');
        var userlname_text =  document.getElementById('userlname');
        var email_text =  document.getElementById('email');
        var contact_number_text =  document.getElementById('contact_number');
        
        user_id_text.value = id;
        username_text.value = name;
        userfname_text.value = fname;
        userlname_text.value = lname;
        email_text.value = email;
        contact_number_text.value = number;
        


 }



</script>

</body>

<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>
</html>