<div class="row">
	
	<div class="col s6 m6 l6">

		<?php 

			if ($premiumCount > 0) {

				echo '<a href="../scripts/packages.php?package=premium"><img alt="no image" class="responsive-img" src="../public/img/package-premium.png"/></a>';
			
			} else {

				echo '<p>No premium slots available</p>';
			}
		?>
	
	</div>
	
	<div class="col s6 m6 l6">
	
		<a href="../scripts/packages.php?package=standard"><img alt="no image" class="responsive-img" src="../public/img/package-standard.png"/></a>
	
	</div>

</div>