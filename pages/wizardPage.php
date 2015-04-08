<?php
	/* Autoload classes and start session */
	require_once('../App.php');
	App::start();
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5.01//EN">
<html>
<head>

	<title>Register Business</title>

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

		<!-- Register Business Form -->
		<?php

		if (isset($_SESSION['wizard'])) {
			
			switch($_SESSION['wizard']) {

				case 1:
					include('partials/_registerBusiness.php');
					break;

				case 2:
					include('partials/_upload.php');
					break;

				case 3:
					include('partials/_paymentForm.php');
					break;

				default:
					include('partials/_registerUser.php');
					break;

			} 
		
		} else {

			include('partials/_registerUser.php');
		}

		?>

	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

</body>
</html>