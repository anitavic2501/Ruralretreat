<?php 
include "dbh.inc.php";


if (isset ($_POST['singlebutton'])){
$service = $_POST['service'];
$description = $_POST['description'];
$price = $_POST['price'];
$agency_name = $_POST['sub1'];

$sql= "INSERT INTO services (service, description, price, agencyname) VALUES ('$service','$description','$price','$agency_name')";
$result = $conn->query($sql) or die(mysqli_error($sql));
header("Location: ../add_services.php?addservices=success");
$conn->close();
}

?>