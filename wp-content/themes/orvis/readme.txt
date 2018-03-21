=== Orvis ===

Contributors: automattic
Requires at least: 4.1
Tested up to: 4.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Orvis is a portfolio theme crafted with designers and photographers in mind. It's a minimalist, powerful, and flexible theme that puts the focus on your projects.

* Responsive layout.
* Portfolio Page Template.
* Jetpack.me compatibility for Infinite Scroll, Site Logo, Social Menu and Portfolio Custom Post Type.
* The GPL v2.0 or later license. :) Use it to make something cool.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= I don't see the Portfolio menu in my admin, where can I find it? =

To make the Portfolio menu appear in your admin, you need to install the [Jetpack plugin](http://jetpack.me) because it has the required code needed to make [custom post types](http://codex.wordpress.org/Post_Types#Custom_Post_Types) work for the theme.

Once Jetpack is active, the Portfolio menu will appear in your admin, in addition to standard blog posts. No special Jetpack module is needed and a WordPress.com connection is not required for the Portfolio feature to function. Portfolio will work on a localhost installation of WordPress if you add this line to `wp-config.php`:

`define( 'JETPACK_DEV_DEBUG', TRUE );`

= How to setup the front page like the demo site? =

The demo site URL: http://orvisdemo.wordpress.com/?demo

When you first activate Orvis, you’ll see your posts in a traditional blog format. If you’d like to use the portfolio page template as the front page of your site, as the demo site does, it’s simple to configure:

1. Create or edit a page, and assign it to the Portfolio Page Template from the Page Attributes module.
2. Go to Settings > Reading and set “Front page displays” to “A static page”.
3. Select the page you just assigned the Portfolio Page Template to as “Front page” and set another page as the “Posts page” to display your blog posts.

By default, page title will appear. You can hide it if you prefer by going to Appearance → Customize → Portfolio and check “Hide title on Portfolio Page Template” option.

= Where is the page that lists all projects? =

Along with the Portfolio Page Template, your projects will be displayed on portfolio archive pages.

Let's say you have a WordPress.com site at: http://mygroovydomain.com

The URL of the portfolio archive page will be: http://mygroovydomain.com/portfolio/

If your blog’s URL is http://mygroovydomain.com/, you’ll find your portfolio archive page at http://mygroovydomain.com/portfolio/.

You'll need pretty permalinks (any structure) for this URL to work though. If you're stuck with default permalinks - your links have a query string at the end, like ?p=123 - then your portfolio archive can be accessed by adding this immediately after your URL:

`/?post_type=jetpack-portfolio`

The portfolio archive page: https://orvisdemo.wordpress.com/portfolio/?demo

= How to add large images in projects? =

People love full-size images of your work, so make sure the images you include are at least 924px wide. Orvis displays these images at full width on larger screens.

= How to use Portfolio Shortcodes? =

Once you create a project, you can use the portfolio shortcode to display it anywhere on your site. Adding the [portfolio] shortcode to any post or page will insert your project. More info on the shortcode.

= How to add the social links in the footer? =

Orvis allows you display links to your social media profiles, like Twitter and Facebook, with icons via the [Jetpack plugin](http://jetpack.me).

1. Create a new Custom Menu, and assign it to the Social Menu location.
2. Add links to each of your social services using the Links panel.
3. Icons for your social links will automatically appear if it’s available.

== Quick Specs (all measurements in pixels) ==

1. The main column width is 924.
2. The sidebar width is 276.
3. Featured Images are 924 wide with unlimited height.

== Credits ==

* Based on Underscores http://underscores.me/, (C) 2012-2016 Automattic, Inc., licensed under [GPL2](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, licensed under [MIT](http://opensource.org/licenses/MIT)
* Genericons: font by Automattic (http://automattic.com/), licensed under [GPL2](https://www.gnu.org/licenses/gpl-2.0.html)
* Images: images by Unsplash (https://unsplash.com), licensed under [CC0](http://creativecommons.org/choose/zero/)
** https://unsplash.com/photos/y76F3TFw9KY
** https://unsplash.com/photos/g1-N7rv720w
** https://unsplash.com/photos/brKCNseqD-A
** https://unsplash.com/photos/otyxnXPBtOQ
** https://unsplash.com/photos/of0pMsWApZE
** https://unsplash.com/photos/rBJMwMiSIQk
** https://unsplash.com/photos/4AS6y6UH70s
** https://unsplash.com/photos/aexHH1MgPZw
** https://unsplash.com/photos/JkTv__BqmaA

== Changelog ==

= 20 June 2016 =
* Make sure select color is always black.

= 13 June 2016 =
* Remove sidebar description

= 9 June 2016 =
* Update Portfolio Featured Image function so it has the same style as Portfolio Title and Portfolio Content functions
* Update Portfolio CPT with new theme option
* Add links to images used in the screenshot
* New screenshot

= 7 June 2016 =
* Multiple changes:

= 2 June 2016 =
* Filter the archive title for the Portfolio Custom Post Type and rename Theme Option

= 27 May 2016 =
* Fix PHP warnings
* Fix PHP warning

= 12 May 2016 =
* Add new classic-menu tag.

= 5 April 2016 =
* Editor styles on .wp-audio-shortcode caused an infinite loop when audio players were inserted into the content. Removing these styles

= 22 March 2016 =
* Remove portfolio shortcode from masonry since it's not being used

= 2 February 2016 =
* Make sure Portfolio Item fits in wrapper.

= 25 January 2016 =
* Return early if Social Menu is not available.

= 22 January 2016 =
* Remove changelog since it's auto-generated by the .org submitter plugin
* Update credits
* Fix typo in text domain and functions.

= 15 January 2016 =
* Fix typo
* Fix entry-footer margin-bottom

= 14 January 2016 =
* Make sure Project title is being displayed even without a featured image
* Add readme
* Update description
* Add RTL stylesheet + clean normal stylesheet
* Add editor style
* Remove support for Post Formats
* Remove .wp-caption-text:after and make sure .wp-caption-text isn't italic (hard to read)
* Make sure body.resize() isn't triggered all the time when targeting .large-element
* Improve Menu Toggle focus/active state
* Update table of content
* Fix dropdown toggle border + Replace spaces with tabs

= 13 January 2016 =
* Fix Javascript linting + typo
* Fix missing escaping

= 12 January 2016 =
* Update tags
* Update screenshot

= 11 January 2016 =
* Image Link add border-color to make sure it's no inheriting the text color

= 8 January 2016 =
* Remove useless font sizes
* Trigger a screen resize when resizing jetpack-video-wrapper to a large element + Fix Instagram shortcode width/margin
* Fix gallery resize when they can be large
* Ignore large element if in a table
* Fix php error, sprintf missing arguments
* Increase Pages' width on larger screens + Minor sharedaddy fix
* Tweak comments (like and form) and fix sharedaddy margin-bottom

= 7 January 2016 =
* Add style for wpcom comment form
* Add Reblogger style + tweak video margin when using responsive video wrapper
* Tweak wpcom border theme color
* Add style for wpcom widgets +  update wpcom colors
* Make sure Sharedaddy doesn't add a margin-bottom on large screens when it's a Portfolio Item
* Improve Related Posts on large screens -- 3 columns instead of 1 when using visual setting
* Fix ratings margin bottom when display below post
* Tweak sharedaddy styles so it's similar to .entry-footer

= 6 January 2016 =
* Add relatedPostMove() back and add style for large screens
* Remove relatedPostsMove()
* Update jetpackMove() function with only related posts being moved in DOM
* Add style for Social Menu
* Add wpcom-specific files
* Add theme support for Social Menu.

= 5 January 2016 =
* Add style for portfolio shortcode

= 31 December 2015 =
* Initial import of the .org version of the Orvis theme
