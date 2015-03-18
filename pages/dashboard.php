<?php

	require_once('../App.php');
	App::start();
?>

<!DOCTYPE html>
<html>
<head>

	<title>Welcome</title>

	<?php echo Asset::styles(); ?>
	
</head>
<body>
	
	<?php include('partials/_adminNavBar.php'); ?>
	<?php include('partials/_flash.php'); ?>

	<div class="container">

	
	</div>

	<?php echo Asset::scripts(); ?>

	
</body>
</html>