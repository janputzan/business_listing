<div class="form-container">

	<?php echo Form::open('..\scripts\register.php'); ?>

		<div class="input-field">

			<?php echo Form::label('first_name', 'First Name'); ?>
			<?php echo Form::text('first_name'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('last_name', 'Last Name'); ?>
			<?php echo Form::text('last_name'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('email', 'Email: '); ?>
			<?php echo Form::text('email'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('password', 'Password: '); ?>
			<?php echo Form::password(); ?>

		</div>

		<div class="input-field">

			<?php echo Form::submit('Register', 'active'); ?>

		</div>

	<?php echo Form::close(); ?>

</div>