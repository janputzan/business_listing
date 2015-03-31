<?php
	/* Autoload classes and start session */
	require_once('../App.php');
	App::start();

	/* Perform check if the user is logged in and redirects to homePage if true */
	if (Auth::check()) {

		header("Location: homePage.php");
	}
	
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
<body id="login-page">

	<!-- Navigation -->
	<?php include('partials/_loginNavBar.php'); ?>

	<!-- Flash Messages -->
	<?php include('partials/_flash.php'); ?>

	<!-- Main Content -->
	<div class="container">

		<!-- Login Form -->
		<?php include('partials/_login.php'); ?>

	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

</body>
</html>