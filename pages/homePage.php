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

	<div class="container">

		<a href="loginPage.php">log in</a>
		<a href="registerPage.php">register</a>
		<a href="registerBusinessPage.php">register business</a>

	</div>

	<?php echo Asset::scripts(); ?>

</body>
</html>