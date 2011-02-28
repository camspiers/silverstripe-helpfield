(function($) {
	$('.helpFieldSeed').livequery(function() {
		var content = $(this).attr('value');
		var targetID = $(this).attr('id').replace(/_HelpFieldSeed$/, '');
		$(this).remove();
		
		var target = $('#'+targetID);
		target.find('label:first').css('position', 'relative')
				.append("<a href='#' class='helpFieldButton' id='"+targetID+"_HelpFieldButton'>?</a>")
				.after("<div class='helpField' id='"+targetID+"_HelpField'>"+content+"</div>");
		
		$('#'+targetID+'_HelpFieldButton').click(function() {
			var box = $('#'+targetID+'_HelpField');
			if (box.hasClass('open')) {
				box.removeClass('open');
				$(this).removeClass('open').blur();
			} else {
				box.addClass('open');
				$(this).addClass('open').blur();
			}
			return false;
		});
		
	});
})(jQuery);