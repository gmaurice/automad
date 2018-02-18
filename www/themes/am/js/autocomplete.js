/*!	
 * 	am.autocomplete
 *	Copyright (c) 2017-2018 by Marc Anton Dahmen - http://marcdahmen.de - MIT license
 */

+function(am, $) {
	
	am.autocomplete = {
		
		submitForm: function(e) {
			
			e.preventDefault();
			
			var $form = $(e.target).closest('form');
			
			// Set timeout to make sure that the selected dropdown item is passed as value.
			setTimeout(function() {	
				$form.submit();
			}, 50);
			
		}
		
	};
	
	// Submit autocomplete form on hitting the return key.
	$(document).on('keydown', '.uk-autocomplete input[type="text"]', function(e) {
		
		if (e.which == 13) {
			am.autocomplete.submitForm(e);	
		}
		
	});
	
	// Submit form when selecting an autocomplete value (navbar only).
	$(document).on('click', '.uk-autocomplete .uk-dropdown a', am.autocomplete.submitForm);
	
}(window.am = window.am || {}, jQuery);