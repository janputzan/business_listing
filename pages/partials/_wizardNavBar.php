<nav>

	<div class="nav-wrapper">

		<div class="container">

			<a href="homePage.php" class="brand-logo">Pandora Box</a>

			<a href="#" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

			<ul class="right hide-on-med-and-down">

				<?php 

					if (Auth::check()) {

						if (Auth::is_admin()) {

							echo '<li><a class="small" href="dashboard.php">Back to Admin Panel</a></li>';
						
						} else {

							echo '<li><a class="small" href="userDashboard.php">Back to User Panel</a></li>';
						}
					
					} else {

						echo '<li><a class="" href="homePage.php">Back to Listings</a></li>';
					}

				?>

			</ul>

			<ul class="side-nav" id="mobile">

				<?php 

					if (Auth::check()) {

						if (Auth::is_admin()) {

							echo '<li><a class="small" href="dashboard.php">Back to Admin Panel</a></li>';
						
						} else {

							echo '<li><a class="small" href="userDashboard.php">Back to User Panel</a></li>';
						}
					
					} else {

						echo '<li><a class="" href="homePage.php">Back to Listings</a></li>';
					}

				?>

			</ul>

		</div>

	</div>

</nav>