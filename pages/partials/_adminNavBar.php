<nav>

	<div class="nav-wrapper">

		<div class="container">

			<a href="homePage.php" class="brand-logo">Pandora Box</a>

			<a href="#" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

			<ul class="right hide-on-med-and-down">

				<li class="<?php echo Url::is_active('dashboard.php'); ?>"><a href="dashboard.php">Listings</a></li>
				<li class="<?php echo Url::is_active('adminUsers.php'); ?>"><a href="adminUsers.php">Users</a></li>
				<li class="<?php echo Url::is_active('adminPayments.php'); ?>"><a href="adminPayments.php">Payments</a></li>
				<li><a href="..\scripts\logout.php">Log Out</a>

			</ul>

			<ul class="side-nav" id="mobile">

				<li class="<?php echo Url::is_active('dashboard.php'); ?>"><a href="dashboard.php">Listings</a></li>
				<li class="<?php echo Url::is_active('adminUsers.php'); ?>"><a href="adminUsers.php">Users</a></li>
				<li class="<?php echo Url::is_active('adminPayments.php'); ?>"><a href="adminPayments.php">Payments</a></li>
				<li><a href="..\scripts\logout.php">Log Out</a>

			</ul>

		</div>

	</div>

</nav>

