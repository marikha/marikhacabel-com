=== Sela ===

Contributors: automattic
Tags: light, pink, white, two-columns, right-sidebar, responsive-layout, custom-background, custom-header, custom-menu, featured-images,  full-width-template, post-formats, rtl-language-support, sticky-post, theme-options, translation-ready, testimonials

Requires at least: 4.0
Tested up to: 4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Sela is not your typical business theme. Vibrant, bold, and clean, with lots of space for large images, it's a great canvas to tell your comapny's story.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= How to setup the front page like the demo site? =

The demo site URL: http://selademo.wordpress.com/?demo

When you first activate Sela, your homepage will display posts in a traditional blog format. If you’d like to use the Front Page Template instead, follow these steps:

1. Create or edit a page, and then assign it the Front Page Template from the Page Attributes module.
2. Go to Settings > Reading and set "Front page displays" to "A static page".
3. Select the page you just assigned the Front Page template to as "Front page" and then choose another page as "Posts page" to serve your blog posts.

The Front Page Template is divided into three sections:

* A featured area with a full-width featured image and an overlay containing the page content.
* Three front-page widget areas, displayed side-by-side in columns.
* The Testimonial area, displaying two testimonials. To add a testimonial, go to Testimonials > Add New in your dashboard. You can change the order in which your testimonials are displayed by using the Order field of the Attributes module on the testimonial edit screen.

= How do I add a site logo? =
Sela supports Jetpack's Site Logo feature (http://jetpack.me/support/site-logo/). To add your own image, go to Customize > Site Title. The logo will appear in the header, above the Site Title.

= I don't see the Testimonials menu in my admin, where can I find it? =

To make the Testimonials menu appear in your admin, you need to install the [Jetpack plugin](http://jetpack.me) because it has the required code needed to make [custom post types](http://codex.wordpress.org/Post_Types#Custom_Post_Types) work for the Sela theme.

Once Jetpack is active, the Testimonials menu will appear in your admin, in addition to standard blog posts. No special Jetpack module is needed and a WordPress.com connection is not required for the Testimonials feature to function. Testimonials will work on a localhost installation of WordPress if you add this line to `wp-config.php`:

`define( 'JETPACK_DEV_DEBUG', TRUE );`

= Where is the page that lists all testimonials? =

All testimonials are displayed in a testimonial archive page.

Let's say you have a WordPress site at: http://mygroovydomain.com

The URL of the testimonial archive page will be: http://mygroovydomain.com/testimonial/

You'll need pretty permalinks (any structure) for this URL to work though. If you're stuck with default permalinks - your links have a query string at the end, like ?p=123 - then your testimonial archive can be accessed by adding this immediately after your URL:

`/?post_type=jetpack-testimonial`

= How to customize the testimonial archive page? =

Once you have published a testimonial, under the Testimonials menu in your admin, you will see a link that takes you to the Customizer where you can edit the page title, add an intro text and a featured image. Just make sure you have pretty permalinks (any structure) for this to work.

= Grid Page =

The Grid Page template is designed to show child pages in a grid format. To get started, first create or edit a page, and assign it to the Grid Page template from the Page Attributes box. The content of this page and featured image – if one is set – will be displayed above the grid.

To add items to the grid, create additional pages and set their parent page in the Page Attributes box to the grid page you just created
Be sure to set a featured image for each child page if you want an image to show up inside the grid. Repeat these steps for every item you want to display in the grid.

= How to add the social links? =

With Sela, you have the option to display links to your social media profiles in the footer, just above the website credits. Icons for Twitter, Facebook, LinkedIn and most other popular networks are included, and Sela will automatically display an icon for each service if it's available.

- Set up the menu -

To automatically apply icons to your links, simply create a new Custom Menu from Appearance > Menus. You can name it however you like. Next, add each of your social links to this menu. Each menu item should be added as a custom link.

Once your menu is created and your social links are added, assign it to the Social Menu location under Menu Settings.

- Available icons -

Linking to any of the following sites will automatically display its icon in your menu:

* Codepen
* Digg
* Dribbble
* Dropbox
* Facebook
* Foursquare
* Flickr
* GitHub
* Google+
* Instagram
* LinkedIn
* Email (mailto: links)
* Pinterest
* Pocket
* PollDaddy
* Reddit
* RSS Feed (urls with /feed/)
* Spotify
* StumbleUpon
* Tumblr
* Twitter
* Vimeo
* WordPress
* YouTube

== Quick Specs (all measurements in pixels) ==

	1. The main column width is 620 except in the full-width layout where it’s 778.
	2. A widget in the sidebar is 250.
	3. A widget in the Footer Widget Area or Front Page Widget Area is 320.
	4. The featured image on the front page and on pages works best with images at least 1180 wide.
	5. Featured Images for posts should be at least 820 wide by 312.

== Credits ==

* Genericons: font by Automattic (http://automattic.com/), licensed under [GPL2](https://www.gnu.org/licenses/gpl-2.0.html)
* Screenshot image by Unsplash (http://pixabay.com/en/notebook-workplace-desk-iphone-336634/), licensed under CC0 Public Domain (http://creativecommons.org/publicdomain/zero/1.0/deed.en)

== Changelog ==

= 26 July 2016 =
* Remove 'Permalink to' text from grid template featured images.
* Update RTL styles to prevent content overflowing on small screens for RTL languages.

= 21 July 2016 =
* Add support for Content Options

= 7 July 2016 =
* Update Headstart featured image URL.

= 27 June 2016 =
* Update Headstart featured image URLs.
* Update Headstart featured image URLs.

= 7 June 2016 =
* Add parent object checks before getting attachments for an attachment object.

= 27 May 2016 =
* fix the behavior of `*_the_attached_image()` for PHP 7 compat

= 25 May 2016 =
* Update version number for .org submission
* Update version number for .org submission

= 24 May 2016 =
* Ensure separator dots on main navigation appear regardless of whether a custom menu is set.

= 12 May 2016 =
* Add new classic-menu tag.

= 10 May 2016 =
* Adjust padding on front page template content without featured image on small screens.

= 5 May 2016 =
* Update code responsible for outputting site description, so that Customizer live preview works correctly. Fixes #3845;
* Move annotations into the `inc` directory.

= 4 May 2016 =
* Move existing annotations into their respective theme directories.

= 22 April 2016 =
* Add testimonials tag to style.css and readme.txt.

= 3 March 2016 =
* Updating RTL styles to go with tabbing menu fix -
* Change dropdown menu behaviour. Originally the menus were hidden and shown on hover, but this made it impossible to navigate the menu using the keyboard. Changed it to push the dropdowns offscreen instead.

= 19 February 2016 =
* Add missing a to :focus CSS rule.

= 26 November 2015 =
* Remove duplicate closing anchor tags.
* Update ID to avoid duplicate.

= 6 November 2015 =
* Add support for missing Genericons and update to 3.4.1.

= 29 October 2015 =
* fix SVN properties.

= 22 September 2015 =
* Adjust spacing around individual menu items, so menu does not display slightly off-center.

= 7 September 2015 =
* Add jQuery dependency when loading sela.js.

= 31 August 2015 =
* check if `$jetpack_options['featured-image']` exists before checking its value to prevent undefined index notice

= 20 August 2015 =
* Add text domain and/or remove domain path. (O-S)

= 14 August 2015 =
* Update readme to reflect changes; update version number
* Fix additional undefined error with Jetpack testimonials

= 5 August 2015 =
* version bumps

= 31 July 2015 =
* Remove `.screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 17 July 2015 =
* Use Latin extended character subset in order to provide support for more languages.

= 15 July 2015 =
* Always use https when loading Google Fonts.

= 12 June 2015 =
* Use overflow: auto instead of overflow: scroll on frontpage hero image.

= 11 June 2015 =
* Scroll content of front-page hero image if text overflows.
* Properly implement IS behaviour for testimonials.
* Fix missing argument error for template-tags.php.

= 30 April 2015 =
* Style tweaks for Testimonials shortcode;

= 3 April 2015 =
* Add missing italics for the 300 font weight.

= 3 March 2015 =
* Add styling for Fieldset/Legend elements to better match the theme
* Update widget area names for clarification; they're not "sidebars" they're "widget areas".

= 18 February 2015 =
* Fixed textdomain issues; Switched to admin_enqueue_scripts to enqueue custom fonts on header customization screen; Bumped version number.

= 18 January 2015 =
* Fixed required Theme Check items:

= 14 January 2015 =
* Added sela.pot file
* Delete file motif.pot

= 13 January 2015 =
* Added readme.txt

= 8 January 2015 =
* Fixed no results page
* Minor CSS adjustments for mobile view
* Minor CSS adjustments

= 7 January 2015 =
* Changed widget titles to <h3>
* Color adjustments for better contrast

= 6 January 2015 =
* Sela: backward comatibility for archive title and description

= 5 January 2015 =
* Added styling for single Jetpack Testimonial view
* Switched to CSS grid in grid-page.php
* Added esc_url() around instances of get_permalink()

= 19 December 2014 =
* Removed date from featured posts, minor CSS adjustments

= 18 December 2014 =
* Minor color adjustemnts
* Color adjustments
* Background color adjustments
* Allow tablets to access submenu items in the site navigation.
* Genericons update

= 17 December 2014 =
* update one URL to HTTPS.
* Code error fix in full-eidth page template
* Inifinite Scroll styling and code adjustments
* WPCOM widgets styling
* Abstracted additional class for jetpack testimonials to a function
* iix SVN properties.

= 9 December 2014 =
* Replaced sela_wp_title() with core title handling

= 2 November 2014 =
* Add a max-height to the Site Logo.
* Add Jetpack prefixing to Site Logo template tags.

= 1 September 2014 =
* - switch to proper  screenshot

= 27 August 2014 =
* - editor.css - list style changed to match frontend

= 25 August 2014 =
* Fixed tab width issue in style.css, added placeholder for small featured images

= 22 August 2014 =
* Jetpack Testimonial Archive Page with featured image styling

= 21 August 2014 =
* Jetpack Testimonials Archive Page fix to make featured image full-width and overlayed with title
* Switched link color in footer for consistency, fixed Full-width page witout image layout, fixed visual issues with Jetpack Testimonials Archive Page
* Overriding default page styles for Jetpack Testimonials Archive Page
* Jetpack Testimonials Archive Page Template
* Jetpack Testimonials Archive Template, changed squares to discs in lists for consistent look

= 20 August 2014 =
* Footer color changes from pink to gray, adjustments to menu - better contrast for hover, front page hero unit opacity adjustment
* Gravatar Profile widget adjustments, footer widget link color change
* Added Social Menu, fixed home page spacing issues, switched sidebar link colors, added custom styling for Gravatar Profile widget

= 19 August 2014 =
* <hr> margin adjustment, .wp-caption remove marign bottom, fixed gap between posts with featured image in blog view, fixed margin below milestone widget
* Adjustments to milestone widget styling, mobile Safari button style fix, widgets overflow adjustment
* Styling for Milestone widget, Comments styling adjustments
* Updated theme description and tags

= 18 August 2014 =
* Move from /dev to /pub
