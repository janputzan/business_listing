<?php

	require_once('../App.php');
	App::start();

	if (Auth::check()) {

		header("Location: homePage.php");
	}
	
?>

<!DOCTYPE html>
<html>
<head>

	<title>Log In</title>

	<?php echo Asset::styles(); ?>
	
</head>
<body id="login-page">

	
	<?php include('partials/_loginNavBar.php'); ?>
	<?php include('partials/_flash.php'); ?>

	<div class="container">

		<?php include('partials/_login.php'); ?>

	</div>

	<?php echo Asset::scripts(); ?>

</body>
</html>