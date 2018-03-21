( function( $ ) {

	// Focus styles for menus.
	$( '.main-navigation' ).find( 'a' ).on( 'focus.sela blur.sela', function() {
		$( this ).parents().toggleClass( 'focus' );
	} );

	// Additional class for posts with thumbnails
    function addHentryClass() {
        $( '.hentry + .has-post-thumbnail' ).prev().addClass( 'has-post-thumbnail-prev' );
    }

	$( document.body ).on( 'post-load',  addHentryClass );

	addHentryClass();

} )( jQuery );
