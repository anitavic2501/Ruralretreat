
<?php
session_start();
include_once 'database.php';
   $con = mysqli_connect("localhost","root","","ruralretreat");
   $user = "SELECT * FROM users ";

   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


$contact_number = $_POST['contact_number'];


$sql = "SELECT userfname FROM users WHERE contact_number LIKE '%$contact_number%' ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row


    while($row = $result->fetch_assoc()) {
	 
      echo'<div class="panel">';
        echo "<p><h4> User First name: " . $row['userfname']. "<br>
        User Last Name:" .$row[<br> </h4></p> 
			<br><br>";
       echo "</div>";
    }
} else {
    echo "0 results";
}
		
$conn->close();

?>