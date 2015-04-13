<?php
	/* Autoload classes and start session */
	require_once('../App.php');
	App::start();
// var_dump($_GET);die;
	$businessModel = new Business;

	$userModel = new User;

	/* Check if business id is specified*/
	if (!isset($_GET['business_id'])) {

		header("Location: ../pages/homePage.php");
		Message::set(array('message' => 'The page does not exist'), 'messages');

		// workaround to diplay messages on homepage
		return false;
	}

	/* Get appropiate business */
	$business = $businessModel->findOne($_GET['business_id']);

	/* Check if business exists */
	if (!$business) {

		header("Location: ../pages/homePage.php");
		Message::set(array('message' => 'The page does not exist'), 'messages');

		// workaround to diplay messages on homepage
		return false;
	}

	/* Check if business is active */
	if (!$business->is_active) {

		/* If redirected from wizard - display inactive business - only once*/
		if (isset($_SESSION['wizard.business_id'])) {

			unset($_SESSION['wizard.business_id']);
		
		/* Don't display business if not active unless it's administrator or owner */
		} else if (!Auth::is_admin()) {

			if (Auth::user()->id != $business->user_id) {


				header("Location: ../pages/homePage.php");
				Message::set(array('message' => 'The page does not exist'), 'messages');
				
				// workaround to diplay messages on homepage
				return false;
			}

		}
	}
	
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
	<?php include('partials/_wizardNavBar.php'); ?>
	
	<!-- Flash Messages -->
	<?php include('partials/_flash.php'); ?>

	<!-- Main Content -->
	<div class="container">

		<!-- Business View -->
		<?php include('partials/_business.php'); ?>

	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

</body>
</html>