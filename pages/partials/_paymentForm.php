<div class="form-container">

	<?php echo Form::open('..\scripts\process_payment.php'); ?>

	<div class="row">

			<div class="col s11 m11 l11">

				<div class="input-field ">

					<?php echo Form::label('card_number', 'Card Number: '); ?>
					<?php echo Form::text('card_number'); ?>
					<?php echo Form::error('card_number'); ?>

				</div>

			</div>

			<div class="col s1 m1 l1">

				<div class="input-field ">

					<?php echo Form::label('cvv', 'CVV: '); ?>
					<?php echo Form::text('cvv'); ?>
					<?php echo Form::error('cvv'); ?>

				</div>

			</div>

	</div>

		<div class="input-field center-align">

			<?php echo Form::submit('Process Payment'); ?>

		</div>

	<?php echo Form::close(); ?>

</div>