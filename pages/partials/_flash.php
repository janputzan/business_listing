<div id="flash">
	
	<div class="container">
		<?php 

			$messages = Message::messages();

			if (!empty($messages)) {

				foreach ($messages as $key => $value) {
					
					echo '<p class="flash message">'.$value.'</p>';
				}
			}

			Message::flash();
		?>
	</div>
</div>