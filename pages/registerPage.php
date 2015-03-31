<?php
	/* Autoload classes and start session */
	require_once('../App.php');
	App::start();
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5.01//EN">
<html>
<head>

	<title>Log In</title>

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

		<!-- Register User Form -->
		<?php include('partials/_registerUser.php'); ?>

	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

</body>
</html>