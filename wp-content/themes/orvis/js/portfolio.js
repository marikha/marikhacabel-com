/* global direction */
( function( $ ) {

	var origin_position, container, project, resizeTimer;

	// Check RTL
	origin_position = true;

	if ( 1 === direction.rtl ) {
		origin_position = false;
	}

	// Initialize Masonry
	container = $( '.portfolio-wrapper' );

	container.imagesLoaded( function() {
		container.masonry( {
			gutter: 24,
			itemSelector: '.jetpack-portfolio',
			transitionDuration: 0,
			isOriginLeft : origin_position
		} );
	} );

	/*
	 * Toggle hover class on hover and
	 * make sure the hover style stays
	 * when anchors inside are focused with a tab key.
	 */
	function projectHover() {
		project = $( '.post-type-archive-jetpack-portfolio, .tax-jetpack-portfolio-type, .tax-jetpack-portfolio-tag, .page-template-page-templatesportfolio-page-php' ).find( '.hentry' );

		project.off( 'mouseenter' ).on( 'mouseenter', function() {
			$( this ).addClass( 'hover' );
		} );

		project.off( 'mouseleave' ).on( 'mouseleave', function() {
			$( this ).removeClass( 'hover' );
		} );

		project.find( 'a:not(.image-link)' ).off( 'focus focusout' ).on( 'focus focusout', function() {
			$( this ).closest( '.hentry' ).toggleClass( 'hover' );
		} );
	}

	$( document ).ready( function() {
		$( window )
			.on( 'load.orvis', projectHover )
			.on( 'resize.orvis', function() {
				clearTimeout( resizeTimer );
				resizeTimer = setTimeout( function() {
					container.masonry();
				}, 300 );
			} )
			.on( 'post-load.orvis', function() {
				var new_items = $( '.infinite-wrap .jetpack-portfolio' );
				container.append( new_items );
				container.masonry( 'appended', new_items );
				clearTimeout( resizeTimer );
				resizeTimer = setTimeout( function() {
					container.masonry();
				}, 300 );
				projectHover();
			} );
	} );

} )( jQuery );