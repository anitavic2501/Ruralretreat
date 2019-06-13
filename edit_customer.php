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


<body style="margin-bottom: 10px">
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
  							<strong>Success!</strong>
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  							</button>
							</div>
                          
                         <?php 
						}  else  { ?>
						<div class="alert alert-warning2 alert-dismissible fade show" role="alert">	
  							<strong>Error!The username/email already taken.Please try again</strong>
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  							</button>
							</div>
					
						<?php }
                 } ?>
              
<h1 style="text-align:center">My Profile</h1>
<div class="col-xl" style="text-align: center;">
<div class="userprofile">
              <?php

$userid=$_SESSION['id'];
$con = mysqli_connect("localhost","root","","ruralretreat");
$user= "SELECT * FROM users WHERE user_id = $userid";
$res = mysqli_query($con, $user);
while($r = mysqli_fetch_assoc($res)): ?>
<ul class="list-group">
    <li class="list-group-item">First Name : <?php echo $r['userfname'];?></li>
    <br>
    <li class="list-group-item">Last Name : <?php echo $r['userlname'];?></li> <br>
    <li class="list-group-item">Username : <?php echo $r['username'];?></li><br>
    <li class="list-group-item">Email :<?php echo $r['email'];?></li><br>
    <li class="list-group-item">Contact Number:<?php echo $r['contact_number'];?></li><br>
    <li class="list-group-item">Emergency Contact Name:<?php echo $r['emrgcontactname_1'];?></li><br>
    <li class="list-group-item">Emergency Contact Number:<?php echo $r['emrgcontactnumber_1'];?></li><br>
</ul>
<div class="container">
<!-- Button to Open the Modal -->
<button type="button" onclick="initModal(<?php echo $r['user_id'].','.'\''.$r['userfname'].'\','.'\''.$r['userlname'].'\','.'\''.$r['username'].'\','.'\''.$r['email'].'\','.$r['contact_number'].','.'\''.$r['emrgcontactname_1'].'\','.$r['emrgcontactnumber_1'].''?>)"class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Edit
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h2 class="modal-title">My details</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <form class="modal-body" method="POST" action="updateuser.php">
                
                <div class="edituser" style="align: center;">
                <input id="user_id" type="hidden" name="user_id"  value="<?php echo $r['user_id']; ?>"/>
                    First Name :<input id="userfname" type="text" name="userfname" class="text_field form-control" value=""  required>
                   <br> Last Name : <input id="userlname" type="text" name="userlname" class="text_field form-control" value=""  required>
                   <br> Username : <input id="username" type="text"  name="username" class="text_field form-control" value="" placeholder="" required>
                   <br> Email : <input id="email" type="text"  name="email" class="text_field form-control" value="" placeholder="" required>
                    <br> Phone Number:<input id="contact_number" type="text"  name="contact_number" class="text_field form-control" value="" placeholder="" required>
                    <br> Emergency Contact Name : <input id="emrgcontactname_1" type="text"  name="emrgcontactname_1" class="text_field form-control" value="" placeholder="" required>                                                       
                    <br> Emergency Contact Number : <input id="emrgcontactnumber_1" type="text"  name="emrgcontactnumber_1" class="text_field form-control" value="" placeholder="" required>
                </div>
                    
            
                
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Update</button>
                </div> </form>

                </div></div></div></div> 
                
                <?php endwhile ?>
                <div class="col-4"></div>
                
<script>

function initModal(user_id, userfname, userlname, username, email, contact_number, emrgcontactname_1, emrgcontactnumber_1){

        var user_id_text =  document.getElementById('user_id');
        var userfname_text =  document.getElementById('userfname');
        var userlname_text =  document.getElementById('userlname');
        var username_text =  document.getElementById('username');
        var email_text=  document.getElementById('email');
        var contact_number_text =  document.getElementById('contact_number');
        var emrgcontactname_1_text=  document.getElementById('emrgcontactname_1');
        var emrgcontactnumber_1_text=  document.getElementById('emrgcontactnumber_1');

        user_id_text.value = user_id;
        userfname_text.value = userfname;
        userlname_text.value = userlname;
        username_text.value = username;
        email_text.value = email;
        contact_number_text.value = contact_number;
        emrgcontactname_1_text.value = emrgcontactname_1;
        emrgcontactnumber_1_text.value = emrgcontactnumber_1;


}



</script>
</div></div></div>
<br>
</body>

<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>
</html>