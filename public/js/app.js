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

	$(".button-collapse").sideNav();

	/* drop down buttons */
	$('.dropdown-button').dropdown({
		inDuration: 300,
		outDuration: 225,
		constrain_width: false, // Does not change width of dropdown to that of the activator
		hover: false, // Activate on click
		alignment: 'left', // Aligns dropdown to left or right edge (works with constrain_width)
		gutter: 0, // Spacing from edge
		belowOrigin: true // Displays dropdown below the button
	});

	$(document).ready(function() {
		$('select').material_select();
	});
});

