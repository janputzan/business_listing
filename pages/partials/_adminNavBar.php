<nav>

	<div class="nav-wrapper">

		<a href="homePage.php" class="brand-logo">Logo</a>

		<a href="#" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

		<ul class="right hide-on-med-and-down">

			<li><a href="registerPage.php">register</a></li>

			<li><a href="registerBusinessPage.php">register business</a></li>

			<li>
				<?php 
					if (Auth::check()) {

						echo '<a href="..\scripts\logout.php">log out</a>';	
					
					} else {

						echo '<a href="loginPage.php">log in</a>';
					}
				?>
			</li>

		</ul>

		<ul class="side-nav" id="mobile">

			<li><a href="registerPage.php">register</a></li>

			<li><a href="registerBusinessPage.php">register business</a></li>

			<li>
				<?php 
					if (Auth::check()) {

						echo '<a href="..\scripts\logout.php">log out</a>';	
					
					} else {

						echo '<a href="loginPage.php">log in</a>';
					}
				?>
			</li>

		</ul>

	</div>

</nav>