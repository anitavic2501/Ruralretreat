<?php  include_once 'dbh.inc.php';?>
<?php  require_once 'public_functions.php'; 
include '../config.php'?>


<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
	$topics = getAllTopics();
?>

			<style>
			/****************
			*** DEFAULTS
			*****************/
			* { margin: 0px; padding: 0px; }

			html { height: 100%; box-sizing: border-box; }
			body {
			position: relative;
			margin: 0;
			padding-bottom: 6rem;
			min-height: 100%;
			}

			form input {
			width: 100%;
			display: block;
			padding: 13px 13px;
			font-size: 1em;
			margin: 5px auto 10px;
			border-radius: 3px;
			box-sizing : border-box;
			background: transparent;
			border: 1px solid #3E606F;
			}
			form input:focus {
			outline: none;
			}
			/* BUTTON DEFAULT */
			.btn {
			color: white;
			background: #4E6166;
			text-align: center;
			border: none;
			border-radius: 5px;
			display: block;
			letter-spacing: .1em;
			margin: 10px 0px;
			padding: 13px 20px;
			text-decoration: none;
			}
			.container {
			width: 80%;
			margin: 0px auto;
			}
			/* NAVBAR */
			.navbar {
			margin: 0 auto;
			overflow: hidden;
			background-color: #3E606F;
			border-radius: 0px 0px 6px 6px;
			}
			.navbar ul {
			list-style-type: none;
			float: right;
			}
			.navbar ul li {
			float: left;
			font-family: 'Noto Serif', serif;
			}
			.navbar ul li a {
			display: block;
			color: white;
			text-align: center;
			padding: 20px 28px;
			text-decoration: none;
			}
			.navbar ul li a:hover {
			color: #B9E6F2;
			background-color: #334F5C;
			}

			/* LOGO */
			.navbar .logo_div {
			float: left; 
			padding-top: 5px;
			padding-left: 40px;
			}
			.navbar .logo_div h1 {
			color: #B9E6F2;
			letter-spacing: 5px;
			font-weight: 100;
			font-family: 'Tangerine', cursive;
			}

			.content .post-wrapper {
			width: 70%;
			float: left;
			min-height: 250px;
			}
			.full-post-div {	
			min-height: 300px;
			padding: 20px;
			border: 1px solid #e4e1e1;
			border-radius: 2px;
			text-align: center;
			}
			.full-post-div h2.post-title {
			margin: 10px auto 20px;
			text-align: center;
			}
			.post-body-div {
			font-family: 'Noto Serif', serif;
			font-size: 1.2em;
			}
			.post-body-div p {
			margin:20px 0px;
			}

			.post-sidebar {
			width: 24%;
			float: left;
			margin-left: 5px;
			min-height: 400px;
			}
			.content .post-comments {
			margin-top: 25px;
			border-radius: 2px;
			border-top: 1px solid #e4e1e1;
			padding: 10px;
			}
			.post-sidebar .card {
			width: 95%;
			margin: 10px auto;
			border: 1px solid #e4e1e1;
			border-radius: 10px 10px 0px 0px;
			}
			.post-sidebar .card .card-header {
			padding: 10px;
			text-align: center;
			border-radius: 3px 3px 0px 0px;
			background: #3E606F;
			}
			.post-sidebar .card .card-header h2 {
			color: white;
			}
			.post-sidebar .card .card-content a {
			display: block;
			box-sizing: border-box;
			padding: 8px 10px;
			border-bottom: 1px solid #e4e1e1;
			color: #444;
			}
			.post-sidebar .card .card-content a:hover {
			padding-left: 20px;
			background: #F9F9F9;
			transition: 0.1s;
			}
		
			</style>
<title> <?php echo $post['title'] ?> | Rural Retreat</title>
</head>
<body>
		
	
<div class="container">

	<div class="content" >
		<!-- Page wrapper -->
		<div class="post-wrapper">
			<!-- full post div -->
			<div class="full-post-div">
			<?php if ($post['published'] == false): ?>
				<h2 class="post-title">Sorry... This post has not been published</h2>
			<?php else: ?>
			<img src="<?php echo BASE_URL . ('/static/images/') . $post['image']; ?>" width=400 height=400 class="post_image" alt="">
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
				<div class="post-body-div">
					<?php echo html_entity_decode($post['body']); ?>
				</div>
			<?php endif ?>
			</div>
			<!-- // full post div -->
			
			<!-- comments section -->
			<!--  coming soon ...  -->
		</div>
		<!-- // Page wrapper -->

		<!-- post sidebar -->
		<div class="post-sidebar">
			<div class="card">
				<div class="card-header">
					<h2>Topics</h2>
				</div>
				<div class="card-content">
					<?php foreach ($topics as $topic): ?>
						<a 
							href="<?php echo '../filtered_posts.php?topic=' . $topic['id'] ?>">
							<?php echo $topic['name']; ?>
						</a> 
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<!-- // post sidebar -->
	</div>
</div>
<!-- // content -->
		</body>	