$(document).ready(function() {
	console.log('alive');

	// $('form').submit(function(e) {
	// 	e.preventDefault();
	// 	$('#loaderImage').show();
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: $(this).attr('action'),
	// 		data: {
	// 			'username' : $(this).find('[name=username]').val(),
	// 			'password' : $(this).find('[name=password]').val()
	// 		},
	// 		success: function(data) {
	// 			console.log(data);
	// 			$('form').find('input').val('');
	// 			 $('#loaderImage').hide();
	// 			 // window.location.replace('home.php');
	// 		}
	// 	})
	// })
});