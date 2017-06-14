$(document).ready(function() {
	$('a.column-link, a.more-link').on('click', function(e) {
		e.preventDefault();
		$(this).closest('.main-column').find('.light-box-bg').removeClass('fadeOut');
	});

	$('a.close-light-box').on('click', function(e) {
		e.preventDefault();
		$(this).closest('.light-box-bg').addClass('fadeOut');
	});
});