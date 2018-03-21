/* global screenReaderText */
( function( $ ) {

	var body, masthead, menuToggle, siteMenu, siteNavigation, resizeTimer;

	function initMainNavigation( container ) {

		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', {
			'class': 'dropdown-toggle',
			'aria-expanded': false
		} ).append( $( '<span />', {
			'class': 'screen-reader-text',
			text: screenReaderText.expand
		} ) );

		container.find( '.menu-item-has-children > a' ).after( dropdownToggle );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		container.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this            = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
			screenReaderSpan.text( screenReaderSpan.text() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		} );
	}
	initMainNavigation( $( '.main-navigation' ) );

	masthead         = $( '#masthead' );
	menuToggle       = masthead.find( '#menu-toggle' );
	siteMenu         = masthead.find( '#site-menu' );
	siteNavigation   = masthead.find( '#site-navigation' );

	// Enable menuToggle.
	( function() {

		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		// Add an initial values for the attribute.
		menuToggle.add( siteNavigation ).attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click.orvis', function() {
			$( this ).add( siteMenu ).add( siteNavigation ).toggleClass( 'toggled-on' );

			// jscs:disable
			$( this ).add( siteMenu ).add( siteNavigation ).attr( 'aria-expanded', $( this ).add( siteNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
		} );
	} )();

	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	( function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( window.innerWidth >= 840 ) {
				$( document.body ).on( 'touchstart.orvis', function( e ) {
					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
						$( '.main-navigation li' ).removeClass( 'focus' );
					}
				} );
				siteNavigation.find( '.menu-item-has-children > a' ).on( 'touchstart.orvis', function( e ) {
					var el = $( this ).parent( 'li' );

					if ( ! el.hasClass( 'focus' ) ) {
						e.preventDefault();
						el.toggleClass( 'focus' );
						el.siblings( '.focus' ).removeClass( 'focus' );
					}
				} );
			} else {
				siteNavigation.find( '.menu-item-has-children > a' ).unbind( 'touchstart.orvis' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.orvis', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find( 'a' ).on( 'focus.orvis blur.orvis', function() {
			$( this ).parents( '.menu-item' ).toggleClass( 'focus' );
		} );
	} )();

	// Add the default ARIA attributes for the menu toggle and the navigations.
	function onResizeARIA() {
		if ( window.innerWidth < 840 ) {
			if ( menuToggle.hasClass( 'toggled-on' ) ) {
				menuToggle.attr( 'aria-expanded', 'true' );
				siteMenu.attr( 'aria-expanded', 'true' );
				siteNavigation.attr( 'aria-expanded', 'true' );
			} else {
				menuToggle.attr( 'aria-expanded', 'false' );
				siteMenu.attr( 'aria-expanded', 'false' );
				siteNavigation.attr( 'aria-expanded', 'false' );
			}
		} else {
			menuToggle.removeAttr( 'aria-expanded' );
			siteMenu.removeAttr( 'aria-expanded' );
			siteNavigation.removeAttr( 'aria-expanded' );
		}
	}

	// Move Jetpack's Related Posts.
	function relatedPostsMove() {
		var relatedPosts = $( '#jp-relatedposts' );

		if ( relatedPosts.length ) {
			relatedPosts.insertAfter( '.entry-footer' );
		}
	}

	// Add 'large-element' class to elements.
	function largeElement( param ) {
		if ( body.hasClass( 'page' ) || body.hasClass( 'search' ) || body.hasClass( 'single-attachment' ) || body.hasClass( 'error404' ) ) {
			return;
		}

		$( '.entry-content' ).find( param ).each( function() {
			var element              = $( this ),
				elementPos           = element.offset(),
				elementPosTop        = elementPos.top,
				entryFooter          = element.closest( 'article' ).find( '.entry-footer' ),
				entryFooterPos       = entryFooter.offset(),
				entryFooterPosBottom = entryFooterPos.top + ( entryFooter.height() ),
				caption              = element.closest( 'figure' ),
				newImg;

			if ( elementPosTop >= entryFooterPosBottom && element.parents( 'table' ).length === 0 ) {
				if ( 'img.size-full' === param ) {
					newImg = new Image();
					newImg.src = element.attr( 'src' );

					$( newImg ).load( function() {
						if ( newImg.width >= 924  ) {
							element.addClass( 'large-element' );

							if ( caption.hasClass( 'wp-caption' ) ) {
								caption.addClass( 'large-element' );
								caption.removeAttr( 'style' );
							}
						}
					} );
				} else if ( '.jetpack-video-wrapper' === param ) {
					if ( element.find( 'iframe, embed, object, video' ).width() >= 600 && ! element.hasClass( 'large-element' ) ) {
						element.addClass( 'large-element' );
						body.resize();
					}
				} else if ( '.tiled-gallery, .jetpack-slideshow' === param ) {
					if ( ! element.parent().hasClass( 'large-element' ) ) {
						element.wrap( '<div class="large-element" />' );
						body.resize();
					}
				} else {
					element.addClass( 'large-element' );
				}
			}
		} );
	}

	$( document ).ready( function() {
		body = $( document.body );

		$( window )
			.on( 'load.orvis', onResizeARIA )
			.on( 'resize.orvis', function() {
				clearTimeout( resizeTimer );
				resizeTimer = setTimeout( function() {
					largeElement( 'img.size-full' );
					largeElement( '.tiled-gallery, .jetpack-slideshow' );
					largeElement( '.jetpack-video-wrapper' );
				}, 300 );
				onResizeARIA();
			} )
			.on( 'post-load.orvis', function() {
				largeElement( 'img.size-full' );
				largeElement( '.tiled-gallery, .jetpack-slideshow' );
				largeElement( '.jetpack-video-wrapper' );
			} );

		relatedPostsMove();
		largeElement( 'img.size-full' );
		largeElement( '.tiled-gallery, .jetpack-slideshow' );
		largeElement( '.jetpack-video-wrapper' );
	} );

} )( jQuery );