$(document).ready(function() {

	$('#flash').children().delay(1000).fadeOut(1500);

	$('form').find('input').next().each( function() {
		if ($(this).text() != '') {

			$(this).prev().addClass('invalid');
		}
	});
	
	$('form').find('input').focus( function() {

		$(this).next().fadeOut(500);
		$(this).removeClass('invalid');
	});
});

