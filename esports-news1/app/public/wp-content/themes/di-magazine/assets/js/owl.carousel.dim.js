( function( $ ) {
	$(document).ready(function() {
		$('.dim-owl-top').owlCarousel({
			loop:true,
			dots:true,
			nav:false,
			autoplay:true,
			autoplayHoverPause:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:3
				}
			}
		});

		$('.dim-owl-btm').owlCarousel({
			loop:true,
			dots:true,
			nav:false,
			autoplay:true,
			autoplayHoverPause:true,
			items:1,
		});

	});
} )( jQuery );
