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

<!DOCTYPE html>
<html>
<head>

	<title>Listings</title>

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

	<h5>Listings</h5>

	

	<div class="divider"></div>

	<!-- Filters -->

	<?php

		if (isset($_GET['is_premium']) && $_GET['is_premium'] == 0) {

			echo '<a href="'.Url::append('is_premium', 1).'" class="btn">Show Premium</a>';

		} else {

			echo '<a href="'.Url::append('is_premium', 0).'" class="btn">Show Non Premium</a>';
		}
		if (isset($_GET['is_active']) && $_GET['is_active'] == 0) {

			echo '<a href="'.Url::append('is_active', 1).'" class="btn">Show Active</a>';
			
		} else {

			echo '<a href="'.Url::append('is_active', 0).'" class="btn">Show Inactive</a>';
		}

	?>

	<a href="<?php echo Url::reset();?>" class="btn">Reset</a>



	<!-- End Filters -->

	<?php

		$businessModel 	= new Business;
		$userModel 		= new User;
		$paymentModel 	= new Payment;

		$listings = $businessModel->paginate(5, array('is_active', 'is_premium', 'category_id'));

		/* Listings Table*/

		include('partials/_listings.php');

	?>
		
	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

	
</body>
</html>