<?php
	/* Autoload classes and start session */
	require_once('../App.php');
	App::start();

?>

<!DOCTYPE html>
<html>
<head>

	<title>Tutor page</title>

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

		<!-- Tutor -->
		<?php include('partials/_tutor.php'); ?>

	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

</body>
</html>