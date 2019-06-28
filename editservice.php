
<?php
session_start();
include_once 'database.php';
   $con = mysqli_connect("localhost","root","","ruralretreat");
   $dogs = "SELECT * FROM services ";

   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$service_id = $_POST['service_id'];
$services = $_POST['services'];
$price = $_POST['price'];
$description = $_POST['description'];

$service_type = $_POST['service_type'];

//    $vaccination = $_POST['vaccination'];
//    $datereceived= $_POST['datereceived'];

$image = $_FILES["image"]["name"];
fileUpload();

$updatesql= "UPDATE services SET services = '$services', price = '$price', description = '$description',image = '$image', service_type = '$service_type' WHERE service_id = $service_id";

 
if (mysqli_query($con, $updatesql)) {


  
    
 header("Location: add_services.php?status=success");
 
} else {
     var_dump($con);
    
 // echo "Error: " . $sql . "<br>" . mysqli_error($con);
 header("Location: add_services.php?status=error");
}
mysqli_close($con);



// C:\wamp64\www\RRV2\Ruralretreat\images



function fileUpload(){

   
   
    $target_dir = "./images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    var_dump($target_file);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if($uploadOk == 1){
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){

        }
    }




}

?>