<div class="form-container">

	<?php echo Form::open('..\scripts\login.php'); ?>

		<div class="input-field">

			<?php echo Form::label('email', 'Email: '); ?>
			<?php echo Form::email(); ?>

		</div>

		<div class="input-field">

			<?php echo Form::label('password', 'Password: '); ?>
			<?php echo Form::password(); ?>

		</div>

		<div class="input-field">

			<?php echo Form::submit('Log In', 'active'); ?>

		</div>

	<?php echo Form::close(); ?>

</div>