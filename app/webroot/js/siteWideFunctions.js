jQuery(document).ready(function($) {
	$(document).pngFix();
	$('table.standardTableClass tr td').hover(function() {
		if (!$(this).parent().hasClass('hoverRow'))
			$(this).parent().addClass('hoverRow');
	}, function() {
		if ($(this).parent().hasClass('hoverRow'))
			$(this).parent().removeClass('hoverRow');
	});
	
	$('a#addAnotherModelImage').bind('click', function() {
		var jObj = $(this).prev('div#adminModelImageUploads').find('div:last-child').clone();
		$('div#adminModelImageUploads').append('<div>' + jObj.html().replace(/\d+/g, function(val) { return parseInt(val)+1; }) + '</div>');

		return false;
	});
	
	$("a[rel^='prettyPhoto']").prettyPhoto({
		show_title: false,
		theme: 'light_rounded'
	}).hover(function() {
		if ($(this).find('#zoomOverlay').length > 0)
			$(this).find('#zoomOverlay').fadeIn('medium');
	}, function() {
		if ($(this).find('#zoomOverlay').length > 0)
			$(this).find('#zoomOverlay').fadeOut('fast');
	});
});