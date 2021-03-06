<?php
	/* Autoload classes and start session */
	require_once('../App.php');
	App::start();

	if (Auth::is_admin()) {

		Message::set(array('message' => 'You are not authorised to view this page'), 'messages');
		header("Location: ../pages/homePage.php");

		return false;
	}

	function getCategories() {

		$categoryModel = new Category;

		$categoriesArray = array();

		$categories = $categoryModel->getAll();


		foreach ($categories as $category) {
			
			array_push($categoriesArray, array($category->name => $category->id));
		}

		return $categoriesArray;
	}

	$businessModel = new Business;
	$premiumCount = $businessModel->getAvailablePremiumCount();
	
?>

<!DOCTYPE html>
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

		<h4>Register your business</h4>

		<div class="divider"></div>

		<!-- Register Business Form -->
		<?php

			if (isset($_SESSION['wizard'])) {
				
				switch($_SESSION['wizard']) {

					case 1:
						echo '<p>Step 2 out 5 - choose your package</p>';
						include('partials/_packages.php');
						break;

					case 2:
						echo '<p>Step 3 out 5 - register business</p>';
						include('partials/_registerBusiness.php');
						break;

					case 3:
						echo '<p>Step 4 out 5 - upload a picture</p>';
						include('partials/_upload.php');
						break;

					case 4:
						echo '<p>Step 5 out 5 - process payment</p>';
						include('partials/_paymentForm.php');
						break;

					default:
						if (Auth::check()) {

							echo '<p>Step 2 out 5 - choose your package</p>';
							include('partials/_packages.php');

						} else {

							echo '<p>Step 1 out 5 - create an account</p>';
							include('partials/_registerUser.php');
						}
						break;

				} 
			
			} else {

				if (Auth::check()) {

					echo '<p>Step 2 out 5 - choose your package</p>';
					include('partials/_packages.php');

				} else {

					echo '<p>Step 1 out 5 - create an account</p>';
					include('partials/_registerUser.php');
				}
			}

		?>

	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

</body>
</html>