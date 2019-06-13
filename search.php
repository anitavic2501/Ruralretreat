<!doctype>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
</head>
<body>

<?php
include "includes/dbh.inc.php";
$keyword = $_POST['keyword'];	
echo "<h2> Find all articles that has $keyword word content </h2>";
//search functions



$sql = "SELECT id, post_title, post_content, date FROM post WHERE post_content LIKE '%$keyword%' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row


    while($row = $result->fetch_assoc()) {
	  echo	'<button class="accordion"><h3 style="color:Blue;">'. $row["post_title"].'</button>';
      echo'<div class="panel">';
		echo "<p><h4> Published date: " . $row["date"]. "<br><br> <h3 style='background-color:lightblue;'>Read: " . $row["post_content"]."</p> 
			<br><br>";
       echo "</div>";
    }
} else {
    echo "0 results";
}
		
$conn->close();

?>
	<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<br>
<a href="article2.php">Go back to main page</a>

</body>

</html>
