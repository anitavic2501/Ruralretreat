<?php
  
  // "require" creates an error message and stops the script. "include" creates an error and continues the script.
  require "includes/dbh.inc.php";
?>
<?php require_once 'includes/public_functions.php' ?>
<?php require_once 'includes/registration_login.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
 <?php
  include_once 'partials/head.php';
  require_once 'includes/head_section.php'?>

  <title>Rural Retreat | Home </title>
  </head> 

<style>
#mainNav {
    position: absolute;
    border-bottom: 1px solid #e9ecef;
    background-color: white;
	font-family: 'Raleway', sans-serif;
}
</style>
<header>
    <?php include_once 'partials/header.php'; ?>
    </header>

<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>

<body>
	<!-- container - wraps whole page -->
	<div class="container">
		

		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
            <hr>

            <?php foreach ($posts as $post): ?>
	<div class="post" style="margin-left: 0px;">
        <img src="<?php echo '/static/images/' . $post['image']; ?>" class="post_image" alt="">
        
        <?php if (isset($post['topic']['name'])): ?>
			<a 
				href="<?php echo '/filtered_posts.php?topic=' . $post['topic']['name'] ?>"
				class="btn category">
				<?php echo $post['topic']['name'] ?>
			</a>
		<?php endif ?>
		<a href="<?php echo '/comments/post_details.php?post-slug=' . $post['slug'].'&post_id='. $post['id'] ?>">
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

		</div>
		<!-- // Page content -->
		<footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>

</html>