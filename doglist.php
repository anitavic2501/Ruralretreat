 <?php

include 'database.php';



// include_once 'customer.php';

// $dog = new dog();
// $user = new user();
// if (isset($_POST['add_dog'])) {
//    
// }
// ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once './partials/head.php';
    ?>
</head>
<header class="masthead" style="background-image: url('images/dogbeach.jpg')">
<br><div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-12 mx-auto">
          <div class="site-heading">
            <h1>My Dogs</h1>
          </div>
        </div>
      </div>
    </div>

</header>

<body style="margin-bottom: 10px">
    <header>
        <?php
        include_once './partials/header.php';
    ?>
    </header>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Dog Name</th>
      <th scope="col">Breed</th>
      <th scope="col">Age</th>
      <th scope="col">Vaccination</th>
    </tr>
  </thead>
  <tbody>
      <?php
       $con = mysqli_connect("localhost","root","","ruralretreat");
      $dogs = "SELECT * FROM dogs ";
      $res = mysqli_query($con, $dogs);
      while($r = mysqli_fetch_assoc($res)): ?>
            <tr>
            <td><?php echo $r['dogname']; ?></th>
            <td><?php echo $r['breed']; ?></td>
            <td><?php echo $r['age']; ?></td>
            <td><?php echo $r['vaccination']; ?></td>
                      
            </tr>

<?php endwhile ?>
</tbody>
</table>

<div class="dogregister" id="insertdog">
<div class="row">
            <div class="col-12" style="text-align: center">
<form name="pay" method="POST" action="insertdog.php" >

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
</div>
<div class="control-group">
    <label class="control-label">user id <sup>*</sup></label>
    <div class="controls">
        <input type="text" name="user_id" required="required" id="user_id">
    </div>
</div>
<!-- <div class="control-group">
    <label class="control-label">Vaccination <sup>*</sup></label>
    <div class="controls">
        <input type="text" name="vaccination" required="required" id="vaccination">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Date of vaccination <sup>*</sup></label>
    <div class="controls">
        <input type="text" name="datereceived" required="required" id="datereceived">
    </div>
</div> -->
<div class="control-group">
                        <div class="controls">
                            <input style="margin-top: 15px;" class="btn btn-large btn-success" type="submit" name="add_dog" value="Add Dog" />
                        </div>
                    </div>
                </form>
                </div>

</div>
</div>


</body>

<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>
</html>