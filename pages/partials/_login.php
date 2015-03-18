<div class="form-container">

	<?php echo Form::open('..\scripts\login.php'); ?>

		<div class="input-field">

			<?php echo Form::label('email', 'Email: '); ?>
			<?php echo Form::text('email'); ?>
			<?php echo Form::error('email'); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('password', 'Password: '); ?>
			<?php echo Form::password(); ?>
			<?php echo Form::error('password'); ?>

		</div>

		<div class="input-field center-align">

			<?php echo Form::submit('Log In'); ?>

		</div>

	<?php echo Form::close(); ?>

</div>