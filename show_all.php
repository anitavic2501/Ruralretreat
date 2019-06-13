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

<?php
include "includes/dbh.inc.php";

echo "<h2> RURAL RETREAT ARTICLES </h2>";
//search functions

$sql = "SELECT id, post_title, post_content, date FROM post";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		  echo	'<button class="accordion"><h3>'. $row["post_title"].'</button>';
      echo'<div class="panel">';
       echo "<h2>Article: " . $row["id"]. "<h2>" . $row["post_title"]. " <br> <h4> Published date: " . $row["date"]. "<br><br> <h3>Read: " . $row["post_content"]. 
			"<br><br>";
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