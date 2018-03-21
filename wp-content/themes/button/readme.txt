=== Button ===

Contributors: automattic
Tags: craft, design, lifestream, blog, journal, wedding, light, playful, handcrafted, textured, whimsical, orange, white, gray, two-columns, right-sidebar, custom-background, custom-colors, custom-header, custom-menu, featured-images, flexible-header, full-width-template, infinite-scroll, post-formats, rtl-language-support, site-logo, translation-ready, responsive-layout
Requires at least: 4.1
Tested up to: 4.3
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

Button is a theme that's as cute as its name. With detailed accents, featured images, and a soft color palette, Button is perfect for crafters and designers alike.


== Installation ==
	
1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.


== Frequently Asked Questions ==

= Does this theme support any plugins? =

Button includes support for Infinite Scroll and Site Logos in Jetpack (jetpack.me).

= Does Button support Featured Images? = 

Yes, indeed! Featured Images are display on your blog and archives, with detailed accents at the corners for a sweet, vintage look.


== Quick Specs (all measurements in pixels) ==

* The main column width is 660 with an active sidebar, and flexible without an active sidebar.
* The main sidebar width is 245.
* Featured Images are displayed at 660 with flexible height.
* The site logo appears at a maximum width and height of 400.
* The custom header appears at a maximum width of 980; the height is flexible.


== Credits/Licenses ==

* Based on Underscores http://underscores.me/, (C) 2012-2015 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2015 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* Genericons font by Automattic, http://genericons.com/ (Font: SIL OFL 1.1, CSS: MIT License)
* Image in screenshot by Jeff Sheldon, https://unsplash.com/photos/rDLBArZUl1c, CC0 license (https://unsplash.com/license)

== Changelog ==

= 24 February 2016 =
* Update custom header width by 2px to match new content width;
* Update default content width; set a wide content width when no sidebar is active, and ensure slideshows and featured images are also large enough.

= 3 December 2015 =
* Manually adding sharing functions after the_excerpt(); Fixes #3499;

= 13 November 2015 =
* Adjust selector and content width for full-width page template;
* Add full-width page template and adjusted content width for it. Commit Sass files for last menus update.
* Fix menu display issue when parent menu item is the last item in the main navigation.

= 11 November 2015 =
* Add border and some margin/padding above comment reply form

= 9 November 2015 =
* Convert button graphics to sprite; use more exact sizes and positioning to work across multiple browsers.
* More font size changes for comment labels
* Use pixels for font sizes to standardize them
* Reduce font size of reply title
* Adjust font size of comments title; it was way too big
* Bug

= 4 November 2015 =
* Add .sticky class in preparation for WP.org submission

= 3 November 2015 =
* Add screenshot image license information
* Started readme
* Add screenshot.png
* Refactor heading sizes to use the assigned variables rather than browser defaults
* Oops; actual fix for menu toggle icon in RTL
* Fix for menu toggle icon in RTL
* Fix for tags links in RTL
* Don't add right padding to comment field in comment form
* Ensure link colors are applied at the basic level so as to avoid color annotations issues with media queries
* Fix for visited/hover link colors in the main navigation
* Allow users to Customize the background without conflicting with the default background's custom background size. This updates the Customizer JS to reflect the user's selections on the fly, and adds a special class to the body tag when a custom background is being used.

= 2 November 2015 =
* Adjust padding around comment form labels to match fields
* Improve styles for 404 search field
* Add sidebar to 404 page template; remove extraneous widgets
* Rearrange custom header and site logo positioning to look less awkward; attempted fix for visited menu items hover color when custom colors are applied
* Ensure visited links don't get the custom color selection
* Ensure search results display the same content as index and archives
* Improve post navigation styles for mobile devices
* Add some letter spacing on uppercase transforms; add bottom margin to cat-links, removing top margin from entry titles
* Give Continue Reading link a bit of breathing room on top
* Adjust padding/margins/borders on mobile links so they're easier to target
* Add hamburger icon to make Menu button look more button-like
* Remove text decoration on main navigation links; reduce site padding on mobile devices
* Update font size for smaller screens on site title ot prevent long words from overflowing
* Go a little bit darker with the grays in the color palette to avoid feeling too washed out
* Remove back-compat shivs for navigation and title functions; remove trailing whitespace in a couple areas; fix errors on search and single content types for the link post format variable check; remove second site logo setup function and change the size in the main function.
* Prefix transforms for IE 9 compatibility
* Attempted fix for IE slideshows bleed issue
* Hack to fix weird corners bleed issue in IE 11
* Edges no longer showing on iPhone, but now showing on IE 11. Decrease positioning values to attempt to fix.
* Attempt to fix odd display issue on mobile where edges of photos bleed under the corner images
* Increase featured image size for iPad wide screens
* Fix drop-down menus for touch devices
* Make sure featured image sizes account for the largest displayed width (tablets)
* Ensure menu toggle appears and disappears at the correct breakpoint

= 30 October 2015 =
* Give the comments widget more breathing room between comments
* Improve display of recent comments widget
* Add continue reading link to content on formatted posts, if available; fix issue with multiline widget titles running into the textarea content
* Fix for multi-line widget titles
* Don't add margins around .site when on mobile; gives the text a bit more breathing room, although it doesn't show the background anymore
* Fix position of drop-down submenu arrows on rtl
* Add rtl styles

= 29 October 2015 =
* Style page links
* Make sure media queries work as intended when no sidebar is active
* Add Custom Header support; make sure Customizer JS runs; adjust recommended size of site logo
* Add theme tags
* Remove padding/background color from first widget area to avoid confusion and too-narrow sidebar

= 23 October 2015 =
* Use Menu rather than Primary Menu for button text
* Remove drop-shadow behind .site; after letting it sit for a bit, it doesn't really fit. So much rhyme.
* Adjust entry meta bottom margins for smaller screens
* Add WP.com theme colors and widget styles
* More adjustments for padding on .site for different screen resolutions; add hover indicator for Continue Reading link
* Adjust line height on post navigation
* Add post format archive links to entry meta
* Ensure link post formats grab the first URL from the content and link directly to it in the title
* Add indicator that there are submenus in the main menu area
* Add POT file from GlotPress project; remove formatting from Aside posts, as it introduced too many complications and didn't look great anyway
* Trying on a new style for Asides. Not sure it'll stick. Adjustments to site padding for large screens.
* Fix for linked featured images; use solid border rather than dashed around social links (since dashed doesn't work in FF and solid looked better to me anyway). Remove unnecessary comments for Flexslider sections.
* Style tweaks for slideshow pagination
* Switch to Lora italic for widget titles for consistency and to remove Lora regular from functions.php
* Rework main menu to make it more easily navigable by padding links instead of list items; give submenu items some breathing room; fix pixel-perfect inconsistency between Firefox and Chrome for tags

= 22 October 2015 =
* Additional styles for gallery navigation
* Remove direction nav, use control nav for sliders instead
* Adjust padding on .site to avoid too-narrow sidebar; adjust $content_width to account for smaller screens, when images may be larger than the large-screen content column width
* Add support for Gallery post format; further styles for continue reading links; add box-shadow around .site
* Remove unnecessary minified JS; ensure Flexsliders work on post-load
* Darken default text color for better readability; remove continue reading link from custom excerpts given this style works better without
* Fixes for variable warnings in inc/template-tags.php; begin styling Continue reading links
* ensure Flexslider works on archives/index/search
* Improved styles for form colors
* Add a very faint box shadow around featured images to avoid white images losing borders
* Use PNG for background image, since SVG doesn't
* Begin styling social links

= 21 October 2015 =
* Add theme description
* Delete unused SCSS files
* Delete unnecessary stylesheets
* Remove unused CSS files
* Add background color to buttons spacer
* Add config file to point stylesheets to correct output areas and remove line comments
* Add config file for Sass on WP.com
* Remove unnecessary language files
* Initial commit to /pub
