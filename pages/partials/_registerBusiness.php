<div class="form-container">

	<?php echo Form::open('..\scripts\registerBusiness.php'); ?>

		<div class="input-field">

			<?php echo Form::label('name', 'Business Name'); ?>
			<?php echo Form::text('name'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('address_1', 'Address 1'); ?>
			<?php echo Form::text('address_1'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('address_2', 'Address 2'); ?>
			<?php echo Form::text('address_2'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('city', 'City'); ?>
			<?php echo Form::text('city'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('postcode', 'Postcode'); ?>
			<?php echo Form::text('postcode'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('tel', 'Phone'); ?>
			<?php echo Form::text('tel'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('url', 'Website'); ?>
			<?php echo Form::text('url'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('infp', 'Description'); ?>
			<?php echo Form::text('info'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::submit('Register Business', 'active'); ?>

		</div>

	<?php echo Form::close(); ?>

</div>