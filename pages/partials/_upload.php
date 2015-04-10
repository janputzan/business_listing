<div class="upload form-container">

	<form action="../scripts/upload.php" method="post" enctype="multipart/form-data">

	    <div class="input-field">

	    	<?php 	echo Form::file('fileToUpload');?>

	    </div>

	    <div class="input-field center-align">

	    	<?php	echo Form::submit('Upload Image');?>

	    </div>
    	

    <?php	echo Form::close();?>

    <?php	echo Form::error('fileToUpload');?>

</div>