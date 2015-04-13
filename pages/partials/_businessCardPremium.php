<div class="premium">

	<div class="premium-logo tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click image to view business">

		<a href="businessPage.php?business_id=<?php echo $business->id; ?>">

			<img src="<?php echo $business->photo_url ?: '../public/img/no_image.png'; ?>">

		</a>

	</div>

	<div class="premium-content">

		<div class="folded"><span>Featured</span></div>

		<p class="premium-address">

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

		<div class="card-info show">

			<p class="card-name"><?php echo $business->name; ?></p>

			<p class="card-description"><?php echo $business->info; ?></p>

		</div>

	</div>

</div>