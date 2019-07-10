
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
  							<strong>Error!A booking is made with this dog</strong></strong>
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  							</button>
							</div>
					
					
					<?php }
				 } ?>
        </div> </div>
        <div class="content">

        <h2> Manage Dogs </h2>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Owner Name</th>
      <th scope="col">Dog Name</th>
      <th scope="col">Breed</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Label</th>
    </tr>
  </thead>
  <tbody>
      <?php

      //  $conn = mysqli_connect("localhost","root","","ruralretreat");
      $doglist = "SELECT dogs.dog_id, 
      dogs.dogname, 
      dogs.user_id, 
      dogs.age, 
      dogs.gender,
      dogs.breed,
      dogs.label,
      users.username 
      FROM dogs JOIN users ON users.user_id = dogs.user_id";
      $res = mysqli_query($conn, $doglist);
      while($r = mysqli_fetch_assoc($res)): ?>
            <tr>
            <td><?php echo $r['username']; ?></th>
            <td><?php echo $r['dogname']; ?></th>
            <td><?php echo $r['breed']; ?></td>
            <td><?php echo $r['age']; ?></td>
            <td><?php echo $r['gender']; ?></td>
            <td><?php echo $r['label']; ?></td>
            <td><div class="container">
        <!-- Button to Open the Modal -->
        <button type="button" onclick="initModal(<?php echo $r['dog_id'].','.$r['age'].','.'\''.$r['dogname'].'\','.'\''.$r['gender'].'\','.'\''.$r['breed'].'\','.'\''.$r['label'].'\''?>)"class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Edit
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h2 class="modal-title">Dog details</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <form class="modal-body" method="POST" action="editdog.php">
                
                <div class="editdog" style="align: center;">
                    
                    <input id="dog_id" type="hidden" name="dog_id"  value="<?php echo $r['dog_id']; ?>"/>
                    Dog name :<input id="dog_name" type="text" name="dogname" class="text_field form-control" value=""  required>
                    <br> Dog Breed : <input id="breed" type="text" name="breed" class="text_field form-control" value=""  required>
                    <br> Dog Age :<input id="age" type="text"  name="age" class="text_field form-control" value="" placeholder="" required>
                    <br> Dog Gender : <br>
                    <label class="dog-gender"><input type="radio" name="gender"  value="Male Whole" required> Male Whole 
                    <br><input type="radio" name="gender"  value="Male Neuter" required> Male Neuter 
                    <br><input type="radio" name="gender"  value="Female Whole" required> Female Whole
                    <br><input type="radio" name="gender"  value="Female Spay" required> Female Spay </label>
                    
                    <br> Dog Label : <br>
                    <label class="dog-label">
                    <input type="radio" name="label"  value="green" checked required> green
                    <br><input type="radio" name="label"  value="yellow" required> yellow 
                    <br><input type="radio" name="label"  value="blue" required> blue </label>
                                                       
                
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
    <form id="delete" method="POST" action="deletedog.php">
        <input type="hidden" name="dog_id"  value="<?php echo $r['dog_id']; ?>"/>
        <input type="submit" onclick="return confirm('Are you sure?')" name="delete" value="Delete" class="btn btn-danger" id="delete">

</form>

</td>
                      
            </tr>

<?php endwhile ?>
</tbody>
</table>

<br>

<script>

 function initModal(id, age, dogname, gender, breed){

        var dog_id_text =  document.getElementById('dog_id');
        var dog_name_text =  document.getElementById('dog_name');
        var dog_breed_text =  document.getElementById('breed');
        var age_text=  document.getElementById('age');
        var dog_gender_text =  document.getElementById('gender');
        

        dog_id_text.value = id;
        dog_name_text.value = dogname;
        dog_breed_text.value = breed;
        age_text.value = age;
        dog_gender_text.value = gender;
        


 }



</script>

</body>

</html>