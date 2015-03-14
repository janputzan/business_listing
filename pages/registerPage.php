<?php

	require_once('../App.php');
	App::start();
	
?>

<!DOCTYPE html>
<html>
<head>

	<title>Log In</title>

	<?php echo Asset::styles(); ?>
	
</head>
<body>

	<?php include('partials/_navBar.php'); ?>
	<?php include('partials/_flash.php'); ?>

	<div class="container">

		<?php include('partials/_registerUser.php'); ?>

	</div>

	<?php echo Asset::scripts(); ?>

</body>
</html>