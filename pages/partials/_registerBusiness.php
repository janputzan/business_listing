<div class="form-container">

	<?php echo Form::open('..\scripts\registerBusiness.php'); ?>

		<div class="input-field">

			<?php echo Form::label('name', 'Business Name'); ?>
			<?php echo Form::text('name'); ?>
			<?php echo Form::error('name'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('address_1', 'Address 1'); ?>
			<?php echo Form::text('address_1'); ?>
			<?php echo Form::error('address_1'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('address_2', 'Address 2'); ?>
			<?php echo Form::text('address_2'); ?>
			<?php echo Form::error('address_2'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('city', 'City'); ?>
			<?php echo Form::text('city'); ?>
			<?php echo Form::error('city'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('postcode', 'Postcode'); ?>
			<?php echo Form::text('postcode'); ?>
			<?php echo Form::error('postcode'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('tel', 'Phone'); ?>
			<?php echo Form::text('tel'); ?>
			<?php echo Form::error('tel'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('url', 'Website'); ?>
			<?php echo Form::text('url'); ?>
			<?php echo Form::error('url'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('info', 'Description'); ?>
			<?php echo Form::textarea('info'); ?>
			<?php echo Form::error('info'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::submit('Register Business', 'active'); ?>

		</div>

	<?php echo Form::close(); ?>

</div>

<div id="upload-file" class="modal">

	<?php include('_upload.php'); ?>

</div>