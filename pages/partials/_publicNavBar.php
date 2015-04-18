<nav>

	<div class="nav-wrapper">

		<div class="container">

			<a href="homePage.php" class="brand-logo">Pandora Box</a>

			<a href="#" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

			<ul class="right hide-on-med-and-down">

				<?php

					if (Auth::check()) {

						if (Auth::is_admin()) {

							echo '<li><a href="dashboard.php">Admin Site</a></li>';
						
						} else {

							echo '<li><a href="userDashboard.php">User Panel</a></li>';
						}
						
						echo '<li><a href="../scripts/logout.php">Log Out</a></li>';
					
					} else {

						echo '<li><a href="wizardPage.php">Sign Up</a></li>'

						. '<li><a href="tutorPage.php">Tutor Page</a></li>'

						. '<li><a class="" href="loginPage.php">Business Sign In</a></li>';
						
					}

				?>

			</ul>

			<ul class="side-nav" id="mobile">

				<?php

					if (Auth::check()) {

						if (Auth::is_admin()) {

							echo '<li><a href="dashboard.php">Admin Site</a></li>';
						
						} else {

							echo '<li><a href="userDashboard.php">User Panel</a></li>';
						}
						
						echo '<li><a href="../scripts/logout.php">Log Out</a></li>';
					
					} else {

						echo '<li><a href="wizardPage.php">Sign Up</a></li>'

						. '<li><a href="tutorPage.php">Tutor Page</a></li>'

						. '<li><a class="small" href="loginPage.php">Business Sign In</a></li>';
						
					}

				?>

			</ul>

		</div>

	</div>

</nav>