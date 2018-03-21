( function( $ ) {

	var portfolioMedia, entryContent;

	$( '.portfolio-content' ).after( '<div class="portfolio-media" />' );

	portfolioMedia = $( '.portfolio-media' );
	entryContent   = $( '.entry-content' );

	entryContent.find( '.jetpack-video-wrapper, .jetpack-slideshow, .tiled-gallery, .gallery' ).each( function() {
		$( this ).appendTo( portfolioMedia );
	} );

	entryContent.find( 'img' ).closest( 'p, figure' ).each( function() {
		$( this ).appendTo( portfolioMedia );
	} );

} )( jQuery );