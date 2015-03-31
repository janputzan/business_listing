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
	<?php include('partials/_adminNavBar.php'); ?>

	<!-- Flash Messages -->
	<?php include('partials/_flash.php'); ?>

	<!-- Main Content -->
	<div class="container">

	
	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

	
</body>
</html>