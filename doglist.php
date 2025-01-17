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
  							<strong>Error! You made booking with this dog</strong>
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  							</button>
							</div>
					
					
					<?php }
				 } ?>

    <table class="table table-hover">
    <h1 style="text-align:center;">List of your dog</h1>
  <thead>
    <tr>
      <th scope="col">Dog Name</th>
      <th scope="col">Breed</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <!-- <th scope="col">Vaccination</th> -->
    </tr>
  </thead>
  <tbody>
      <?php

       $userid="";
       if(isset($_SESSION['userinfo'])){
         $userid=$_SESSION['userinfo']['user_id'];
       } else {
       $userid=$_SESSION['id']; }
       
      //  $conn = mysqli_connect("localhost","root","","ruralretreat");
      $dogs = "SELECT * FROM dogs WHERE user_id = $userid";
      $res = mysqli_query($conn, $dogs);
      while($r = mysqli_fetch_assoc($res)): ?>
            <tr>
            <td><?php echo $r['dogname']; ?></th>
            <td><?php echo $r['breed']; ?></td>
            <td><?php echo $r['age']; ?></td>
            <td><?php echo $r['gender']; ?></td>
            
            
            <td><div class="container">
        <!-- Button to Open the Modal -->
        <a onclick="initModal(<?php echo $r['dog_id'].','.$r['age'].','.'\''.$r['dogname'].'\','.'\''.$r['gender'].'\','.'\''.$r['breed'].'\''?>)" data-toggle="modal" data-target="#myModal">
        <i class="fas fa-edit"></i>
        </a>

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
                    <label class="control-label">Gender <sup>*</sup></label>
    <div class="controls"> 
    <div class="row">          
    <div class="col-4"></div>
    <div class="col-4"> 
    <label class="doggender">Male Whole
      <input type="radio" checked="checked" name="gender" value="Male Whole" required>
      <span class="checkmark"></span>
    </label>
    <label class="doggender">Male Neuter
      <input type="radio" name="gender" value="Male Neuter" required>
      <span class="checkmark"></span>
    </label>
    <label class="doggender">Female Whole
      <input type="radio" name="gender" value="Female Whole" required>
      <span class="checkmark"></span>
    </label>
    <label class="doggender">Female Spay
      <input type="radio" name="gender" value="Female Spay" required>
      <span class="checkmark"></span>
    </label>
    </div>
    <div class="col-4"></div>
         </div> </div>                                 
                
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
            <a class="fa fa-trash btn delete" href = "deletedog.php?dog_id=<?php echo $r['dog_id'] ?>" onclick="return confirm('Are you sure?')" name="delete" value="Delete dog" id="delete">

</td>
                      
            </tr>

<?php endwhile ?>
</tbody>
</table>

<div class="dogregister" id="insertdog">
<div class="row">
            <div class="col-12" style="text-align: center">
            <h2>Add a dog</h2> <br>
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
      <input type="radio" checked="checked" name="gender" value="Male Whole" required>
      <span class="checkmark"></span>
    </label>
    <label class="doggender">Male Neuter
      <input type="radio" name="gender" value="Male Neuter" required>
      <span class="checkmark"></span>
    </label>
    <label class="doggender">Female Whole
      <input type="radio" name="gender" value="Female Whole" required>
      <span class="checkmark"></span>
    </label>
    <label class="doggender">Female Spay
      <input type="radio" name="gender" value="Female Spay" required>
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