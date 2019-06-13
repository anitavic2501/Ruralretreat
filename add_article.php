<?php
include "includes/dbh.inc.php";

$title = addslashes($_POST['article_title']);
$content = $_POST['article_content'];

$sql = "INSERT INTO post (id, post_title, post_content) VALUES ('null', '$title','$content')";
$result = $conn->query($sql) or die(mysqli_error($sql));
$conn->close();
include "show_all.php";
?>
