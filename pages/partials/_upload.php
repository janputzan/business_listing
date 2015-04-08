<div class="upload">

	<form action="../scripts/upload.php" method="post" enctype="multipart/form-data">
		<div class="modal-content">

		    <div class="input-field">

		    	<?php 	echo Form::file('fileToUpload');?>

		    </div>


		</div>
    	
    	<div class="modal-footer">

		    <div class="input-field center-align">

		    	<?php	echo Form::submit('Upload Image');?>

		    </div>

		</div>

    <?php	echo Form::close();?>

    <?php	echo Form::error('fileToUpload');?>

</div>