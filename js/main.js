$(window).load(function() {
	$('#carousel').flexslider({
		animation: "fade",
		controlNav: false,
		directionNav: false,
		animationLoop: true,
		animationSpeed: 1600,
		slideshow: true,
	});
});

$(document).ready(function() {
	$('input').addClass('form-control');
	$('textarea').addClass('form-control');
	$('input[type="submit"]').removeClass('form-control').addClass('btn btn-primary');
});