<?php
  include 'config.php';
  // "require" creates an error message and stops the script. "include" creates an error and continues the script.
  require "includes/dbh.inc.php";
?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
 <?php
  include_once './partials/head.php';
  ?>

  <title>Rural Retreat | Home </title>
  </head> 

<style>
	.btn {
	color: white;
	background: #4E6166;
	text-align: center;
	border: none;
	display: block;
	letter-spacing: .1em;
	padding: 13px 20px;
	text-decoration: none;
}
/* * * * * * * * * *
* HEADER
* * * * * * * * * */

/* * * * * * * * * *
* DASHBOARD
* * * * * * * * * */
.container {
	border: 1px solid #BFBCB3;
	padding: 10px 0px 50px;
}
.container:after { content: ""; display: block; clear: both; }
.container.dashboard h1 { text-align: center; margin: 25px; }
.container.dashboard .stats a {
	display: inline-block;
	width: 25%;
	text-align: center;
	border-radius: 3px;
	border: 1px solid #BFBCB3;
}
.container.dashboard .stats a.first { margin-left: 25px; }
.container.dashboard .stats a:hover { cursor: pointer; background-color: #E1E1E1; }
.container.dashboard .buttons { margin-left: 15px; }
.container.dashboard .buttons a {
	display: inline-block;
	text-decoration: none;
	color: #444;
	background-color: #0E7D92;
	color: white;
}
/* * * * * * * * * *
* PAGE CONTENT
* * * * * * * * * */
.container.content .menu { width: 16%; float: left; padding: 40px 10px; }
/* Menu card */
.container.content .menu .card .card-header {
	padding: 10px;
	text-align: center;
	border-radius: 3px 3px 0px 0px;
	background: #3E606F;
}
.container.content .menu .card .card-header h2 { color: white; }
.container.content .menu .card .card-content a {
	display: block;
	box-sizing: border-box;
	padding: 8px 10px;
	border-bottom: 1px solid #e4e1e1;
	color: #444;
}
.container.content .menu .card .card-content a:hover {
	padding-left: 20px; background: #F9F9F9; transition: 0.1s;
}
/* Actions div (at the middle) */
.container.content .action { width: 35%; float: left; text-align: center; }
.container.content .action form { width: 90%; }
.container.content .action .page-title { margin: 25px; }
.container.content .action.create-post-div { width: 80%; }
/* Table div (Displaying records from DB) */
.table-div { float: left; width: 47%; }
.table-div .message { width: 90%; margin-top: 20px; }
.table-div table { width: 90%; }
.table-div a.fa { color: white; padding: 3px; }
.table-div .edit { background: #004220; }
.table-div .delete { background: #F70E1A; }
.table-div .publish { background: red; }
.table-div .unpublish { background: green; }
/* * * * * * * * * *
* VALIDATION ERRORS
* * * * * * * * * */
.message {
	width: 100%; 
	margin: 0px auto; 
	padding: 10px 0px; 
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	border-radius: 5px; 
	text-align: center;
}
.error {color: #a94442; background: #f2dede; border: 1px solid #a94442; margin-bottom: 20px; }
.validation_errors p {text-align: left;margin-left: 10px;}
#mainNav {
    position: absolute;
    border-bottom: 1px solid #e9ecef;
    background-color: white;
	font-family: 'Raleway', sans-serif;
}
</style>


<header>
    <?php include_once './partials/header.php'; ?>
    </header>

<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>

<body>
	<!-- container - wraps whole page -->
	<div class="container">
		

		<!-- Page content -->
		<div class="content" style="text-align: center; align: center; ">
			<h2 class="content-title">Recent Articles</h2>
            <hr>

            <?php foreach ($posts as $post): ?>
	<div class="post" style="margin-left: 0px;">
        <img src="<?php echo BASE_URL . ('/static/images/') . $post['image']; ?>" class="post_image" alt="">
        
        <?php if (isset($post['topic']['name'])): ?>
			<a 
				href="<?php echo BASE_URL . '/filtered_posts.php?topic=' . $post['topic']['name'] ?>"
				class="btn category">
				<?php echo $post['topic']['name'] ?>
			</a>
		<?php endif ?>
		<a href="<?php echo BASE_URL . '/comments/post_details.php?post-slug=' . $post['slug'].'&post_id='. $post['id'] ?>">
			<div class="post_info">
				<h3><?php echo $post['title'] ?></h3>
				<div class="info">
					<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
					<span class="read_more">Read more...</span> 
				</div>
			</div>
		</a>
	</div>
<?php endforeach ?>

		</div></div>
		<!-- // Page content -->
		<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>

</html>