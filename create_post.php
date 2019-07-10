<?php  
session_start();


if(!(isset($_SESSION['utd']) && $_SESSION['utd']==1)){

    echo "You are not authorized to view this page.";
      exit;
}

    include_once 'includes/dbh.inc.php'; ?>
<?php  include 'includes/admin_functions.php'; ?>
<?php  include 'includes/post_functions.php'; ?>
<?php include 'includes/head_section.php';
include_once 'partials/head.php';
include 'partials/adminheader.php'; ?>
<!-- Get all topics -->
<?php $topics = getAllTopics();	?>

<div class="content">
  
    <table class="table table-hover">
  <thead>
    <tr>
  <a href="manage_articles.php"> View Articles | </a>  
  <a href="create_post.php"> Create Posts | </a>
  <a href="posts.php"> Manage Articles | </a>
  <a href="topics.php"> Manage Topics | </a>
    </tr>
  </thead>
</table>


	<title>Admin | Create Post</title>
</head>
<body>

		<!-- Middle form - to create and edit  -->
		<div class="action create-post-div">
			<h1 class="page-title">Create/Edit Post</h1>
			<form method="post" enctype="multipart/form-data" action="<?php echo 'create_post.php'; ?>" >
				<!-- validation errors for the form -->
				<?php include ('./includes/errors.php') ?>

				<!-- if editing post, the id is required to identify that post -->
				<?php if ($isEditingPost === true): ?>
					<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
				<?php endif ?>

				<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title"><br>
				<label style="float: left; margin: 5px auto 5px;">Featured image</label><br><br>
				<input type="file" name="featured_image" >
				<textarea name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>
				<select name="topic_id">
					<option value="" selected disabled>Choose topic</option><br>
					<?php foreach ($topics as $topic): ?>
						<option value="<?php echo $topic['id']; ?>">
							<?php echo $topic['name']; ?>
						</option>
					<?php endforeach ?>
				</select>
				
				<!-- Only admin users can view publish input field -->
				<?php if ($_SESSION['utd'] == 1): ?>
					<!-- display checkbox according to whether post has been published or not -->
					<?php if ($published == true): ?>
						<label for="publish">
							Publish
							<input type="checkbox" value="1" name="publish" checked="checked">&nbsp;
						</label>
					<?php else: ?><br>
						<label for="publish">
							Publish
							<input type="checkbox" value="1" name="publish">&nbsp;
						</label>
					<?php endif ?>
				<?php endif ?>
				
				<!-- if editing post, display the update button instead of create button -->
				<?php if ($isEditingPost === true): ?> 
					<button type="submit" class="btn" name="update_post">UPDATE</button>
				<?php else: ?><br>
					<button type="submit" class="btn" name="create_post">Save Post</button>
				<?php endif ?>

			</form>
		</div>
		<!-- // Middle form - to create and edit -->
	</div>
</body>
</html>

<script>
	CKEDITOR.replace('body');
</script>