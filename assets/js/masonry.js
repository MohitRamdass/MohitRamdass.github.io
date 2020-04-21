( function( $ ) {
	$(document).ready(function() {

		// Masonry front page - secondary right grid
		var $container = $('.dimasonry-secondary-right');
		$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector: '.dimasonrybox-secondary-right',
			});
		});

	});
} )( jQuery );


( function( $ ) {
	$(document).ready(function() {

		// Masonry front page - categories grid
		var $container = $('.front-single-category-dimasonry');
		$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector: '.front-single-category-dimasonry-item',
			});
		});

	});
} )( jQuery );
