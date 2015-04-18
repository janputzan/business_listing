<?php
	/* Autoload classes and start session */
	require_once('../App.php');
	App::start();

	/* Perform check if the user is logged in and redirects to homePage if true */
	if (!Auth::check() || Auth::is_admin()) {

		Message::set(array('message' => 'You are not authorised to view this page.'), 'messages');
		header("Location: homePage.php");

		return false;
	}

	$businessModel = new Business;

	$userModel = new User;

	$paymentModel = new Payment;

	$listings = $businessModel->paginate(5, array(), array('user_id',Auth::user()->id));
	
?>

<!DOCTYPE html>
<html>
<head>

	<title>User Panel</title>

	<!-- Meta Tags -->
	<?php include('partials/_metaTags.php'); ?>

	<!-- CSS files -->
	<?php echo Asset::styles(); ?>
	
</head>
<body id="login-page">

	<!-- Navigation -->
	<?php include('partials/_navBar.php'); ?>

	<!-- Flash Messages -->
	<?php include('partials/_flash.php'); ?>

	<!-- Main Content -->
	<div class="container">

		<h4>Manage Listings</h4>

		<div class="divider"></div>

		<a href="../scripts/registerNew.php" class="btn right">register new business</a>
		<?php include('partials/_listings.php'); ?>

	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

</body>
</html>