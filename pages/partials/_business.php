<div class="container business">

	<div class="row business-header">

		<div class="col s6 m6 l6 business-name"><?php echo $business->name; ?></div>

		<div class="admin-info">

			<?php

				if (Auth::is_admin()) {

					echo $business->is_active ? '<span class="status status-active"><i class="mdi-image-flash-on"></i> active </span>' : '<span class="status status-inactive" ><i class="mdi-image-flash-off"></i> inactive </span>';
					echo $business->is_premium ? '<span class="premium-package">premium</span>' : '<span class="standard-package">standard</span>';
				}

			?>
		</div>

	</div>

	<div class="row business-details">
		
		<div class="col s12 m12 l6 business-logo">
			
			<img class="responsive-img" src="<?php echo $business->photo_url ?: '../public/img/no_image.png'; ?>">

		</div>

		<div class="col s0 m12 l6 business-info">
		
			<p class="address">

				<i class="mdi-communication-location-on icon"></i>
				
				<span class="address_1"><?php echo $business->address_1; ?></span>
				<span class="address_2"><?php echo $business->address_2; ?></span>
				<span class="postcode"><?php echo $business->postcode; ?></span>
				<span class="city"><?php echo $business->city; ?></span>

			</p>

			<p class="email">

				<i class="mdi-communication-email icon"></i>

				<span><?php echo $userModel->findOne($business->user_id)->email; ?></span>

			</p>

			<p class="tel"><i class="mdi-communication-phone icon"></i>

				<span><?php echo $business->tel; ?></span>

			</p>

			<p class="url"><i class="mdi-social-public icon"></i>

				<a href="<?php echo $business->url; ?>"><?php echo $business->url; ?></a>

			</p>

		</div>

	</div>
		
	<div class="description">

			<?php echo $business->info; ?>
	</div>
	

</div>