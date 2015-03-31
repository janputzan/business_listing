<?php
	/* Autoload classes and start session */
	require_once('../App.php');
	App::start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5.01//EN">
<html>
<head>

	<title>Welcome</title>

	<!-- Meta Tags -->
	<?php include('partials/_metaTags.php'); ?>

	<!-- CSS files -->
	<?php echo Asset::styles(); ?>
	
</head>
<body>
	
	<!-- Navigation -->
	<?php include('partials/_navBar.php'); ?>

	<!-- Flash Messages -->
	<?php include('partials/_flash.php'); ?>

	<!-- Main Content -->
	<div class="container">


	<!-- Pagination test -->

	<a href="?page=1">test</a>

	<?php

	$user = new User;

	$users = $user->paginate(3);

	echo $users->links();

	$x = $user->getAll();

	var_dump($users->content, $x);

	?>

	<!-- End Pagination test -->
	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

	
</body>
</html>