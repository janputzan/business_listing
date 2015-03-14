$(document).ready(function() {

	$('#flash').children().delay(1000).fadeOut(1500);

	$('form').find('input, textarea').next().each( function() {
		if ($(this).text() != '') {

			$(this).prev().addClass('invalid');
		}
	});
	
	$('form').find('input, textarea').focus( function() {

		$(this).next().fadeOut(500);
		$(this).removeClass('invalid');
	});
});

