<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title>Business Listings</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.2/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="public\css\styles.css">
</head>
<body>

	<div class="container">

		
		<div class="form-container login">

			<h2>Log In</h2>

			<form id="login-form" action="scripts\login.php" method="post">
				<input type="text" name="username" placeholder="username">
				<input type="password" name="password" placeholder="password">
				<button class="btn">log in</button>
			</form>	
		</div>
		<div id="loaderImage"></div>
		<div class="form-container register">

			<h2>Register</h2>

			<form id="register-form" action="scripts\register.php" method="post">
				<input type="text" name="username" placeholder="username">
				<input type="password" name="password" placeholder="password">
				<button class="btn">register</button>
			</form>	
		</div>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="public\js\app.js"></script>

</body>
</html>