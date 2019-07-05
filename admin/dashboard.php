<?php  include('../config.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
	<title>Admin | Dashboard</title>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="<?php echo '../dashboard.php' ?>">
				<h1>Rural Retreat Dashboard | <?php echo $_SESSION['utd']['name']; ?></h1>
			</a>
		</div>
		<?php if (isset($_SESSION['user'])): ?>
			<div class="user-info">
				<span><?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp; 
				<a href="<?php echo ROOT_PATH . '/logout.php'; ?>" class="logout-btn">logout</a>
			</div>
		<?php endif ?>
	</div>
	<div class="container dashboard">
		<h1>Welcome</h1>
		<div class="stats">
			<a href="../index2.php" class="first">
				<span>1</span> <br>
				<span>View Articles</span>
			</a>
			<a href="users.php" class="second">
				<span>2</span> <br>
				<span>Users</span>
            </a> 
			<a href="posts.php" class="third">
				<span>3</span> <br>
				<span>Posts</span>
			</a>
			<a href="posts.php" class="fourth">
				<span>4</span> <br>
				<span>Comments</span>
			</a>
		</div>
		<br><br><br>
		<div class="buttons">
			<a href="users.php">Add Users</a>
			<a href="posts.php">Add Posts</a>
		</div>
	</div>
</body>
</html>