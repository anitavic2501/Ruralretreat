<?php
session_start();
include 'includes/dbh.inc.php';
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



<body>
<div class="content">
<h2>Manage Services</h2>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Service ID</th>
      <th scope="col">Service Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Type</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>	
<tbody>
      <?php
      //  $conn = mysqli_connect("localhost","root","","ruralretreat");
      $services = "SELECT * FROM services";
      $res = mysqli_query($conn, $services);
      while($r = mysqli_fetch_assoc($res)):
      
        $message_modified = trim(preg_replace('/\s+/', ' ', $r['description']));
      ?>
            <tr>
            <td><?php echo $r['service_id']; ?></td>
            <td><?php echo $r['services']; ?></td>
            <td><?php echo $r['price']; ?></td>
            <td><?php echo $r['description']; ?></td>
            <td><?php echo $r['image']; ?></td>
            <td><?php echo $r['service_type']; ?></td>
            
            <td>
            
            <div class="container">
        <!-- Button to Open the Modal -->
        <a onclick="initModal(<?php echo $r['service_id'].','.'\''.$r['services'].'\','.'\''.$r['price'].'\','.'\''.$message_modified.'\','.'\''.$r['image'].'\','.'\''.$r['service_type'].'\''?>)" data-toggle="modal" data-target="#myModal">
        <i class="fas fa-edit"></i>
        </a>

        <!-- The Modal -->
       
  </div>
  


</td>
            <td>
             <a  class="fa fa-trash btn delete"  href = "deleteservice.php?service_id=<?php echo $r['service_id'] ?>"  onclick="return confirm('Are you sure?')" name="delete" value="Delete Service" id="delete">
            </a>
            
        

</td>
                      
            </tr>

<?php endwhile ?>
</tbody>	
</table>
	

<div class="addservices" style="background-color: lightyellow";>	

<div class="row">
<div class="col-2"></div>
            <div class="col-8" style="text-align: center">
            <br>
<h2>Add Services</h2>	
		
<!-- Form Name -->
<form method ="POST" action="includes/add_services.inc.php">

<!-- Text input-->
<br>
<br>
<div class="control-group">
  <label class="control-label" for="textinput">Service name</label>  
  <div class="controls">
  <input id="service" name="service" type="text" placeholder="" class="form-control input-md" required="">
    

  <label for="description">Service description</label>  

  <textarea id="textarea" name="description"  type="text" class="form-control rounded-0" rows="10" required=""></textarea>


  <label for="price">Price</label>  
  <input id="add_price" name="add_price" type="text" placeholder="" class="form-control input-md" required="">
    <br>
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
    </div>
    <div class="col-2"></div>
  </div>
</div>
</div>


</fieldset>
</form>
<script>

 function initModal(id, services, price, description, image, type){

        var service_id_text =  document.getElementById('service_id');
        var services_text =  document.getElementById('services');
        var price_text =  document.getElementById('price');
        var description_text =  document.getElementById('description');
      
        var service_type_text =  document.getElementById('service_type');
        

        service_id_text.value = id;
        services_text.value = services;
        price_text.value = price;
        description_text.value = description;
     
        service_type_text.value = type;
        


 }



</script>
<!-- The Modal -->
<div class="modal" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h2 class="modal-title">Service Details</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php
						
						// $conn = mysqli_connect("localhost", "root", "","ruralretreat");
						$sql = "SELECT distinct(service_type) FROM services";
       
						$result = mysqli_query($conn, $sql);
						?>
                <!-- Modal body -->
                <form class="modal-body" method="POST" action="editservice.php" enctype="multipart/form-data">
                
                <div class="editdog" style="align: center;">
                    
                    <input id="service_id" type="hidden" name="service_id"  value="<?php echo $r['service_id']; ?>"/>
                    Service Name:<br><input id="services" type="text" name="services" class="text_field form-control" value=""  required>
                    Price: <br><input id="price" type="text" name="price" class="text_field form-control" value=""  required>
                    Description:<br><input id="description" type="text"  name="description" class="text_field form-control" value="" placeholder="" required>
                    Service type:<br><select class="form-control" id="service_type" name="service_type">
                    
                    
								<?php				
								while ($rows = mysqli_fetch_assoc($result)) 
								{
								?>
								<option><?php echo $rows['service_type']?></option>
												
											
							<?php }?>		
							
							</select>
              <span >Upload image:</span>
                    <input id="image" type="file"  name="image"  value="Upload" placeholder="" >
                    
                                                       
                
                </div>
                    
            
                
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Update</button>
                </div> </form>
                
      </div>
    </div>
  </div>
  
</div>
</body>



</html>