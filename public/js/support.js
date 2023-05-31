$(document).ready(function() {
	$('.reply').click(function(event) {
		event.preventDefault();
		// $(this).next().slideToggle('fast');
		$('.form-reply').slideUp('slow');
		$(this).nextAll('.form-reply:eq(0)').slideToggle('slow');
		// $(this).next().find('.form-reply').slideToggle('slow');
		/*$flip = $(this);
		$content = $flip.next();
		$content.slideToggle();*/
	});
});