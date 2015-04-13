<?php
	/* Autoload classes and start session */
	require_once('../App.php');
	App::start();

	if (!Auth::is_admin()) {

		Message::set(array('message' => 'You are not authorised to view this page'), 'messages');
		header("Location: ../pages/homePage.php");

		return false;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5.01//EN">
<html>
<head>

	<title>Payments</title>

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

	<h5>Payments</h5>

	

	<div class="divider"></div>

	<!-- Filters -->

	<!-- End Filters -->

	<?php

		$businessModel 	= new Business;
		$userModel 		= new User;
		$paymentModel 	= new Payment;

		$payments = $paymentModel->paginate(5);

		/* Listings Table*/

		include('partials/_payments.php');

	?>
		
	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

	
</body>
</html>