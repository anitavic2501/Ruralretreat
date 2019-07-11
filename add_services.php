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
      <th scope="col">Edit Service</th>
      <th scope="col">Delete Service</th>
    </tr>
  </thead>	
<tbody>
      <?php
      //  $conn = mysqli_connect("localhost","root","","ruralretreat");
      $services = "SELECT * FROM services";
      $res = mysqli_query($conn, $services);
      while($r = mysqli_fetch_assoc($res)):
      
        $message_modified = trim(preg_replace('/\s+/', '', $r['description']));
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
        <button style = "background-color:green;"type="button" onclick="initModal(<?php echo $r['service_id'].','.'\''.$r['services'].'\','.'\''.$r['price'].'\','.'\''.$message_modified.'\','.'\''.$r['image'].'\','.'\''.$r['service_type'].'\''?>)"class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Edit
        </button>

        <!-- The Modal -->
       
  </div>
  


</td>
            <td>
            <a class="btn btn-danger" href = "deleteservice.php?service_id=<?php echo $r['service_id'] ?>" style= "background-color: orange;"  onclick="return confirm('Are you sure?')" name="delete" value="Delete Service" class="btn btn-danger" id="delete">Delete Service
            </a>
            
        

</td>
                      
            </tr>

<?php endwhile ?>
</tbody>	
</table>
	

	
<h2>Add Services</h2>	
		
<!-- Form Name -->
<form method ="POST" action="includes/add_services.inc.php">

<!-- Text input-->
<br>
<br>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Service name</label>  
  <div class="col-md-5">
  <input id="service" name="service" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Service description</label>  

  <div class="col-md-8">
  <textarea id="textarea" name="description"  type="text" class="form-control rounded-0" rows="10" required=""></textarea>

    
  </div>
</div>

<!-- Button Drop Down -->

<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price</label>  
  <div class="col-md-3">
  <input id="add_price" name="add_price" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Add Service</label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
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
                    <input id="services" type="text" name="services" class="text_field form-control" value=""  required>
                    <input id="price" type="text" name="price" class="text_field form-control" value=""  required>
                    <input id="description" type="text"  name="description" class="text_field form-control" value="" placeholder="" required>
                    <select class="form-control" id="service_type" name="service_type">
                    
                    
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