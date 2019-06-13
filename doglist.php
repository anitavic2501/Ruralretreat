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

<script>
  function deleteThis() {
    "use strict";
    var sure = confirm('Are you sure you want to delete this?');
    if (!sure) {
      return;
    }

    var del = document.getElementById("delete");
    var delRow = document.getElementById("deleteRow");
    var page = "database.php";
    var parameters = 'delete=' + del + '&deleteRow=' + delRow;
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(data) {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        alert("Success");
      }
    }
    xmlhttp.open("POST", page, true);
    xmlhttp.send(parameters);
  }
</script>

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
  							<strong>Error!</strong>
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  							</button>
							</div>
					
					
					<?php }
				 } ?>

    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Dog Name</th>
      <th scope="col">Breed</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Vaccination</th>
    </tr>
  </thead>
  <tbody>
      <?php

       $userid=$_SESSION['id'];
       $con = mysqli_connect("localhost","root","","ruralretreat");
      $dogs = "SELECT * FROM dogs WHERE user_id = $userid";
      $res = mysqli_query($con, $dogs);
      while($r = mysqli_fetch_assoc($res)): ?>
            <tr>
            <td><?php echo $r['dogname']; ?></th>
            <td><?php echo $r['breed']; ?></td>
            <td><?php echo $r['age']; ?></td>
            <td><?php echo $r['gender']; ?></td>
            <td><?php echo $r['vaccination']; ?></td>
            
            <td><div class="container">
        <!-- Button to Open the Modal -->
        <button type="button" onclick="initModal(<?php echo $r['dog_id'].','.$r['age'].','.'\''.$r['dogname'].'\','.'\''.$r['gender'].'\','.'\''.$r['breed'].'\''?>)"class="btn btn-primary" data-toggle="modal" data-target="#myModal">
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
                    <input id="dog_name" type="text" name="dogname" class="text_field form-control" value=""  required>
                    <input id="breed" type="text" name="breed" class="text_field form-control" value=""  required>
                    <input id="age" type="text"  name="age" class="text_field form-control" value="" placeholder="" required>
                    <input id="gender" type="text"  name="gender" class="text_field form-control" value="" placeholder="" required>
                    
                                                       
                
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
        <input type="submit" onclick="deleteThis()" name="delete" value="Delete" class="btn btn-danger" id="delete";>

</form>

</td>
                      
            </tr>

<?php endwhile ?>
</tbody>
</table>

<div class="dogregister" id="insertdog">
<div class="row">
            <div class="col-12" style="text-align: center">
<form name="add_dog" method="POST" action="insertdog.php" >

<div class="control-group">
    <label class="control-label">Dog name<sup>*</sup></label>
    <div class="controls">
        <input type="text" name="dogname" required="required" id="dogname">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Breed<sup>*</sup></label>
    <div class="controls">
        <input type="text" name="breed" required="required" id="breed">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Age <sup>*</sup></label>
    <div class="controls">
        <input type="text" name="age" required="required" id="age">
    </div>
    
<div class="control-group">
    <label class="control-label">Gender <sup>*</sup></label>
    <div class="controls"> 
    <div class="row">          
    <div class="col-4"></div>
    <div class="col-4"> 
    <label class="doggender">Male Whole
      <input type="radio" checked="checked" name="gender" value="Male Whole">
      <span class="checkmark"></span>
    </label>
    <label class="doggender">Male Neuter
      <input type="radio" name="gender" value="Male Neuter">
      <span class="checkmark"></span>
    </label>
    <label class="doggender">Female Whole
      <input type="radio" name="gender" value="Female Whole">
      <span class="checkmark"></span>
    </label>
    <label class="doggender">Female Spay
      <input type="radio" name="gender" value="Female Spay">
      <span class="checkmark"></span>
    </label>
    </div>
    <div class="col-4"></div>
         </div>
    </div>
</div>


<div class="control-group">
                        <div class="controls">
                            <input style="margin-top: 15px;" class="btn btn-large btn-success" type="submit" name="add_dog" value="Add Dog"  />
                         </div>
                    </div>
                </form>
                </div>

</div>
</div>
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

<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>
</html>