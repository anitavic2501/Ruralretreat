<?php

  // First we start a session which allow for us to store information as SESSION variables.
  session_start();
  // "require" creates an error message and stops the script. "include" creates an error and continues the script.
  require "includes/dbh.inc.php";
?>
<!--  -->

<!DOCTYPE html>
<html lang="en">
<head>
 <?php
  include_once './partials/head.php';
?> 

</head> 
<body>

  <header>
  <?php
    include_once './partials/header.php';
     
    include "show_all.php";
  ?>
  
</header>

<form class="form-horizontal" action="search.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Search Article</legend>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Keyword</label>
  <div class="col-md-4">
    <input name="keyword" class="form-control input-md" id="keyword" type="search" placeholder="ex. dog">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button name="submit" class="btn btn-primary" id="submit">Search</button>
  </div>
</div>

</fieldset>
</form>
 <hr>

<!-- <form class="form-horizontal"action="add_article.php" method="post">
<fieldset> -->

<!-- Form Name
<legend>Add Article</legend>

// Text input
<div class="form-group">
  <label class="col-md-4 control-label" for="article_title">Article title</label>  
  <div class="col-md-4">
  <input name="article_title" class="form-control input-md" id="article_title" type="text" placeholder="Insert title">
    
  </div>
</div>

//Text input-->
<!-- <div class="form-group">
  <label class="col-md-4 control-label" for="article_content">Type content</label>  
  <div class="col-md-8">
  <input name="article_content" class="form-control input-md" id="article_content" type="text" placeholder="">
  <span class="help-block"> </span>  
  </div>
</div> -->

<!-- Button -->
<!-- <div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Add Article</label>
  <div class="col-md-4">
    <button name="singlebutton" class="btn btn-primary" id="singlebutton">Save</button>
  </div>
</div> -->

<!-- </fieldset>
</form> -->

</body>
<br>

<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>
	
	</body>
</HTML>