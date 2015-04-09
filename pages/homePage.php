<?php
	/* Autoload classes and start session */
	require_once('../App.php');
	App::start();

	$businessModel = new Business;
	$categoryModel = new Category;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5.01//EN">
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

	<!-- Main Content -->
	<div class="container">

		<div class="row premium">

		<?php

			$premium = $businessModel->findAll('is_premium', 1);

			$premiumCount = count($premium);

			foreach ($premium as $business) {

				$image = $business->photo_url ?: '../public/img/no_image.png';
				
				echo '<div class="card col s12 m6 l3">
    					<div class="card-image waves-effect waves-block waves-light">
      						<img class="activator" src="' . $image . '">
    					</div>
    					<div class="card-content">
      						<span class="card-title activator grey-text text-darken-4">' . $business->name . '</span>
      						<p><a href="#">Premium Business</a></p>
    					</div>
    					<div class="card-reveal">
      						<span class="card-title grey-text text-darken-4">' . $business->name . '<i class="mdi-navigation-close right"></i></span>
      						<p>' . $business->info . '</p>
    					</div>
  					</div>';
			}
			if ($premiumCount < 4) {

				$count = 4 - $premiumCount;

				for ($i = 0; $i < $count; $i++) {

					echo '<div class="card col s12 m6 l3">
	    					<div class="card-image waves-effect waves-block waves-light">
	      						<img class="activator" src="../public/img/premium.png">
	    					</div>
	    					<div class="card-content">
	      						<span class="card-title activator grey-text text-darken-4">Your Business Name</span>
	      						<p><a href="#">Sign up for premium</a></p>
	    					</div>
	    					<div class="card-reveal">
	      						<span class="card-title grey-text text-darken-4">Your Business Name<i class="mdi-navigation-close right"></i></span>
	      						<p>You can sign up for a premium slot</p>
	    					</div>
	  					</div>';
				}
			}

			

		?>

		</div>

		<div class="row">

			<div class="col s0 m2 l2 hide-on-small-only">

				<ul class="collection">	

				<?php

					foreach ($categoryModel->getAll() as $category) {
						
						echo '<li class="collection-item">'
							. '<a href="?category_id='
							. $category->id
							. '">'
							. $category->name
							. '</a>'
							. '</li>';
					}

				?>

				</ul>

			</div>

			<div class="col s12 m10 l10 business-cards">

				

				<div class="row">
					
				<?php

					$businesses = $businessModel->paginate(8, array('category_id'), array('is_active', '1'));

					if (!count($businesses->content)) {

						echo '<p>No results to show</p>';
					}

					foreach ($businesses->content as $business) {
						
						echo '<div class="card col s12 m6 l4">
	        					<div class="card-image waves-effect waves-block waves-light">
	          						<img class="activator" src="' . $business->photo_url . '">
	        					</div>
	        					<div class="card-content">
	          						<span class="card-title activator grey-text text-darken-4">' . $business->name . '<i class="mdi-navigation-more-vert right"></i></span>
	          						<p><a href="#">View Business</a></p>
	        					</div>
	        					<div class="card-reveal">
	          						<span class="card-title grey-text text-darken-4">' . $business->name . '<i class="mdi-navigation-close right"></i></span>
	          						<p>' . $business->info . '</p>
	        					</div>
	      					</div>';
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