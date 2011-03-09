jQuery(document).ready(function($) {
	$('table.standardTableClass tr td').hover(function() {
		if (!$(this).parent().hasClass('hoverRow'))
			$(this).parent().addClass('hoverRow');
	}, function() {
		if ($(this).parent().hasClass('hoverRow'))
			$(this).parent().removeClass('hoverRow');
	});
});