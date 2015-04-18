<?php
	/* Autoload classes and start session */
	require_once('../App.php');
	App::start();

	$businessModel 	= new Business;
	$categoryModel 	= new Category;
	$userModel 		= new User;

	if (isset($_SESSION['wizard'])) {

		unset($_SESSION['wizard']);
	}
	if (isset($_SESSION['wizard.user_id'])) {

		unset($_SESSION['wizard.user_id']);
	}
	if (isset($_SESSION['wizard.business_id'])) {

		unset($_SESSION['wizard.business_id']);
	}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Welcome</title>

	<!-- Meta Tags -->
	<?php include('partials/_metaTags.php'); ?>

	<!-- CSS files -->
	<?php echo Asset::styles(); ?>
	
</head>
<body>
	
	<!-- Navigation -->
	<?php include('partials/_publicNavBar.php'); ?>

	<!-- Flash Messages -->
	<?php include('partials/_flash.php'); ?>

	<div class="premium-container">

		<div class="business-cards-premium">

			<?php

				$premium = $businessModel->getPremium(true);

				$premiumCount = 0;

				foreach ($premium as $business) {

						include('partials/_businessCardPremium.php');

						$premiumCount++;
				}

				if ($premiumCount < 4) {

					$count = 4 - $premiumCount;

					for ($i = 0; $i < $count; $i++) {

						include('partials/_businessCardPlaceholder.php');
					}
				}

			?>

		</div>

	</div>
	<!-- Main Content -->
	<div class="container main-content">


		<div class="row">

			<div class="col s6 m4 l2 categories">

				<a href="homePage.php" class="cat-reset">reset</a>

				<ul class="collection">	

					<?php

						foreach ($categoryModel->getAll() as $category) {

							$cat_count = $businessModel->countInCategory($category->id);

							$cat_class = '';

							if (isset($_GET['category_id']) && $_GET['category_id'] == $category->id) {

								$cat_class = ' active';
							}
							
							echo '<li class="collection-item'
								. $cat_class
								. '">'
								. '<a href="'
								. Url::append('category_id', $category->id)
								. '">'
								. $category->name
								. '</a>'
								. '<span class="align-center count-label">'
								. $cat_count[0]
								. '</span>'
								. '</li>';
						}

					?>

				</ul>

			</div>

			<div class="col s6 m8 l10 business-cards">

				<div class="row">
					
					<?php

						$businesses = $businessModel->paginate(6, array('category_id'), array('is_active', 1));

						if (!count($businesses->content)) {

							echo '<p>No results to show</p>';
						}

						foreach ($businesses->content as $business) {

							include('partials/_businessCard.php');
							
						}

					?>

				</div>

				<div class="row">

					<?php

						echo '<div class="pagination">';
						echo $businesses->links();
						echo '</div>';
					
					?>

				</div>

			</div>

		</div>
	
	</div>

	<!-- JavaScript files -->
	<?php echo Asset::scripts(); ?>

	
</body>
</html>