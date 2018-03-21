/**
 * Flexslider for galleries
 */

( function( $ ) {
	$(window).on( 'load post-load', function() {
		$('.flexslider').flexslider({
			animation: "slide",
			itemWidth: 982,
			itemMargin: 0,
			directionNav: false
		});
	});
} )( jQuery );
