( function( $ ) {
	$(document).ready(function() {
		
		// Masonry blog loop page
		var $container = $('.dimasonry');
		$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector: '.dimasonrybox',
			});
		});
			
	});
} )( jQuery );
