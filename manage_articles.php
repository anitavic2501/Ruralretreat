<?php
// First we start a session which allow for us to store information as SESSION variables.
session_start();
if(!(isset($_SESSION['utd']) && $_SESSION['utd']==1)){

    echo "You are not authorized to view this page.";
      exit;
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once './partials/head.php';
    include_once './includes/dbh.inc.php';
    ?>
    <?php require_once './includes/public_functions.php';?>
</head>


<body style="margin-bottom: 10px">
    <header>
        <?php
        include_once './partials/adminheader.php';
    ?>
    </header>
    <div class="content">
  
    
<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>

<body>
	<!-- container - wraps whole page -->
	<div class="container">
		

		<!-- Page content -->
		<div class="content">
			<h2 class="page-title">Recent Articles</h2>
            <hr>

            <?php foreach ($posts as $post): ?>
	<div class="post" style="margin-left: 0px;">
        <img src="<?php echo '/static/images/'. $post['image'] ?>" class="post_image" alt="">
        
        <?php if (isset($post['topic']['name'])): ?>
			<a 
				href="<?php echo '/filtered_posts.php?topic=' . $post['topic']['name'] ?>"
				class="btn category">
				<?php echo $post['topic']['name'] ?>
			</a>
		<?php endif ?>
		<a href="<?php echo 'includes/single_post.php?post-slug=' . $post['slug'] ?>">
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

</html>

