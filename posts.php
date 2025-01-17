<?php  include 'includes/dbh.inc.php'; ?>

<?php
// First we start a session which allow for us to store information as SESSION variables.
session_start();
if(!(isset($_SESSION['utd']) && $_SESSION['utd']==1)){

    echo "You are not authorized to view this page.";
      exit;
} ?>
<?php include_once './partials/head.php';?>
<?php  include 'includes/admin_functions.php'; ?>
<?php  include 'includes/post_functions.php'; ?>
<?php include 'partials/adminheader.php'; 
include 'includes/head_section.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<div class="content">
<title>Admin | Manage Posts</title>
    


<!-- Get all admin posts from DB -->
<?php $posts = getAllPosts(); ?>
	
<body>
	<h2 class="page-title">Manage Articles </h2>
		<!-- Display records from DB-->
		<div class="table-div"  style="width: 80%;">
			<!-- Display notification message -->


			<?php include 'includes/messages.php' ?>


			<?php if (empty($posts)): ?>
				<h1 style="text-align: center; margin-top: 20px;">No posts in the database.</h1>
			<?php else: ?>
				<table class="table">
						<thead>
						<th>No</th>
						<th>Title</th>
						<th>Views</th>
						<!-- Only Admin can publish/unpublish post -->
						<?php if ($_SESSION['utd'] == 1): ?>
							<th><small>Publish</small></th>
						<?php endif ?>
						<th><small>Edit</small></th>
						<th><small>Delete</small></th>
					</thead>
					<tbody>
					<?php foreach ($posts as $key => $post): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td>
								<a 	target="_blank"
								href="<?php echo 'includes/single_post.php?post-slug=' . $post['slug'] ?>">
									<?php echo $post['title']; ?>	
								</a>
							</td>
							<td><?php echo $post['views']; ?></td>
							
							<!-- Only Admin can publish/unpublish post -->
							<?php if ($_SESSION['utd'] == 1 ): ?>
								<td>
								<?php if ($post['published'] == true): ?>
									<a class="fa fa-check btn unpublish"
										href="posts.php?unpublish=<?php echo $post['id'] ?>">
									</a>
								<?php else: ?>
									<a class="fa fa-times btn publish"
										href="posts.php?publish=<?php echo $post['id'] ?>">
									</a>
								<?php endif ?>
								</td>
							<?php endif ?>

							<td>
								<a class="fa fa-pencil btn edit"
									href="create_post.php?edit-post=<?php echo $post['id'] ?>">
								</a>
							</td>
							<td>
								<a  class="fa fa-trash btn delete" 
									href="create_post.php?delete-post=<?php echo $post['id'] ?>">
								</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</div> </div>
		<!-- // Display records from DB -->
	</div>
</body>
</html>