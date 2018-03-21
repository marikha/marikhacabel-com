=== Sketch ===
Contributors: automattic
Tested up to: 4.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Sketch is based on Underscores http://underscores.me/, (C) 2012-2016 Automattic, Inc.

== Description ==

A clean, responsive portfolio theme with options for a custom site logo, a featured content slider, and lots of room to share your work.

== Bundled Licenses ==

* Images on demo and screenshot: images by Caroline Moore (https://calobeedoodles.com), licensed under [CC0](http://creativecommons.org/choose/zero/)
* Flexslider is licensed under the terms of the GNU GPLv2; Source: http://www.woothemes.com/flexslider/
* Google Font "Lato" is licensed under the SIL Open Font License, Version 1.1; Source: https://www.google.com/fonts/specimen/Lato
* Genericons icon font, Copyright 2016 Automattic; Genericons are licensed under the terms of the GNU GPL, Version 2 (or later); Source: http://www.genericons.com

== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

== Where can I add widgets? ==

Sketch includes a widget area in the site's sidebar on Posts and Pages, configured by going to Appearance -> Widgets in your Dashboard.

== Does Sketch use Featured Images? ==

If a Featured Image at least 1092px wide is set for a post, it will display below the post title on the blog

== How do I activate the Portfolio? ==

Sketch takes advantage of the Portfolio feature in Jetpack (http://jetpack.me), offering unique layouts and organization for your portfolio projects. Learn how to enable and set up this exciting Portfolio feature: http://en.support.wordpress.com/portfolios/

## Shortcodes ##

Once you create a project, you can use the portfolio shortcode to display it anywhere on your site. Adding the [portfolio] shortcode to any post or page will insert your project.

Learn more about working with the portfolio shortcode: http://en.support.wordpress.com/portfolios/portfolio-shortcode/

## Portfolio Page Template ##

This template will display your portfolio and allow you to set your portfolio as your site’s front page.

When you first activate Sketch, you’ll see your posts in a traditional blog format. If you’d like to use the portfolio page template as the front page of your site, it’s simple to configure:

1. Create or edit a page, and assign it to the Portfolio Page Template from the Page Attributes module.
2. Go to Settings → Reading and set “Front page displays” to “A static page”.
3. Select the page you just assigned the Portfolio Page Template to as “Front page” and set another page as the “Posts page” to display your blog posts.

## Where is the portfolio archive page? ##

Along with the Portfolio Page Template, your projects will be displayed on portfolio archive pages.

If your blog’s URL is http://example.com/, you’ll find your portfolio archive page at http://example.com/portfolio/.

If you’d like to add your portfolio archive page to your a Custom Menu, create a custom link using the portfolio archive URL.

== How can I add a site logo? ==

Brand your site and make it yours by including your business' logo; navigate to Customize → Site Title and upload a logo image in the space provided. The logo will appear next to your site title in the header; it can be any size, but will display at a maximum height of 100 px.

== How can I add links to my social networks? ==

You can add links to a multitude of social services in the footer, using the following steps:

1. Create a new Custom Menu, and assign it to the Social Links menu location.
2. Add links to each of your social services using the Links panel.
3. Icons for your social links will appear in the footer.

= Quick Specs (all measurements in pixels) =

* The main column width is 764.
* The sidebar width is 273.
* Featured Images for portfolio projects are 800 wide by 600 (landscape), 1067 (portrait), and 800 (square) height
* Featured Images for single posts are 764 by 300
* Images for Featured Content should be at least 1092 in width.
* Custom header image should be at least 1092 in width.

== Changelog ==

= 7 July 2016 =
* Let WordPress manage the document title by adding theme support

= 29 June 2016 =
* Update Headstart featured image URLs.

= 22 June 2016 =
* Fix Home menu position in annotation.

= 21 June 2016 =
* Correct annotation's page template setting.

= 9 June 2016 =
* Update Portfolio Featured Image function so it has the same style as Portfolio Title and Portfolio Content functions
* Update Portfolio CPT with new theme option

= 8 June 2016 =
* Move Theme Options to the Portfolio tab in the Customizer
* Add support for Portfolio CPT new feature

= 12 May 2016 =
* Add new classic-menu tag.

= 5 May 2016 =
* Move annotations into the `inc` directory.

= 4 May 2016 =
* Move existing annotations into their respective theme directories.

= 22 April 2016 =
* Add featured-content-with-pages tag to style.css and readme.txt.

= 18 April 2016 =
* Adjust z-index on header elements so DM links are not covered.

= 12 April 2016 =
* Update readme.txt.
* Update screenshot.

= 8 February 2016 =
* Changing theme author to Automattic - to ensure that all our in-house themes have the same author.

= 24 November 2015 =
* Remove webkit appearance from input.

= 6 November 2015 =
* Add support for missing Genericons and update to 3.4.1.

= 17 August 2015 =
* Update readme text to include recent changes

= 11 August 2015 =
* updating flexslider to newest version, and updating version number in functions.php.

= 31 July 2015 =
* Remove .`screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 15 July 2015 =
* Always use https when loading Google Fonts.

= 8 July 2015 =
* Make sure new portfolio items are being appended to .portfolio-projects to avoid gaps.

= 25 June 2015 =
* Update core tag cloud widget to march WP.com tag cloud.

= 19 June 2015 =
* Revert previous CSS; no change.
* Revert last CSS change, no different. Simplify widget select.
* Testing CSS for disappearing links issue.

= 17 June 2015 =
* Set wrapper param to false to avoid infinite scroll bug with grid-style layout on portfolio archives

= 10 June 2015 =
* Fixes to portfolio shortcode display on mobile - added word-wrap to titles to make sure they don't overflow the column and forced switch to one column when browser window width goes below 50em (making shortcode behaviour consistent with portfolio archives). Also added slight rounding to featured images, for consistency. Fixes #3073;

= 6 May 2015 =
* Fully remove example.html from Genericons folders.
* Remove index.html file from Genericions.

= 15 April 2015 =
* Move Previous/Next navigation below projects in portfolio archives (fix for FF);

= 11 March 2015 =
* Move gallery layout to inline-block for better appearance on all devices.
* Add clearfix method for galleries so content can clear properly.
* Fix CSS error in color declaration.

= 4 March 2015 =
* Style logo/site-title/menu area better for small and mid-size devices

= 3 March 2015 =
* Ensure site branding area (like logo, site title) is abled to be clicked on small screens by setting a higher z-index, so it's not overlapped by the site navigation.
* Ensure main navigation submenus appear above higher z-indexed items (like the slideshow gallery) on large screens.

= 15 February 2015 =
* Only load Flexslider when it's really needed (Portfolio Page Template)

= 17 December 2014 =
* Allow tablets to access submenu items in the site navigation.

= 26 November 2014 =
* Ensure Eventbrite templates in themes are not selectable as custom page templates.

= 25 November 2014 =
* Add support for upcoming Eventbrite services.

= 2 November 2014 =
* Correct size definition for Site Logo.
* Add Jetpack prefixing to Site Logo template tags.

= 21 October 2014 =
* force fr lang deploy
* Celsius, Eighties, Sketch: add missing .pot files

= 26 September 2014 =
* Make sure the fourth slide in the featured posts is hidden when the page loads.

= 24 September 2014 =
* Make sure the dropdown menu appears on top of sidebar item.

= 9 September 2014 =
* Update screenshot and readme, bump version number in style.css

= 8 September 2014 =
* Update version number and readme for submission to WP.org

= 2 September 2014 =
* Set IS posts per page to 9, as the portfolio has a three column layout.

= 15 August 2014 =
* Ensure sites with a logo do not overlap the toggle menu

= 12 August 2014 =
* Display toggle menu for devices less than 1280px width
* Display paging navigation, ensure it clears the content
* Add pagination to portfolio archives; add bottom border to site header on paginated portfolio page template
* Simplify header.php conditional for custom header image/featured content
* Hide search submit button on large screens
* Add individual archive templates for portfolio taxonomies
* Replace $post->ID with get_the_ID()
* Simplify post format archive links by combining them into a template tag
* Move thumbnail size checks into a separate function to simplify content-portfolio.php page template
* Ensure if there is no featured image assigned to a portfolio project that there is markup within the link in the form of screen-reader-text on the title
* Create a separate archive page for portfolio projects and remove logic from archive.php
* Swap out is_a() for instanceof check
* Remove widgets from 404 page
* Align wp_link_pages to match the rest of the theme
* Remove post type conditional, since single will always be a post
* Use get_post_format() for template part in archive.php, rather than 'home'
* Update jQuery function to remove document.ready()
* Remove parameter from sketch_admin_scripts
* Remove Domain Path declaration in style.css header
* Add support for infinite scroll on Portfolio posts; adjust line height for captions

= 11 August 2014 =
* Add screenshot
* Fix uneven padding around social links
* Update style.css description and readme
* Begin readme file
* Ensure we're using whole pixel values
* Reduce padding on submenu items on large screens
* Add post format link to entry meta
* Ensure comment author names stay aligned
* Don't set max-width on comments area
* Disable click on current project under More Projects in single project view, props @danielwrobert for the code
* Don't display current project on single projects page in mobile view; waste of space when there's no left/right context
* Ensure navigation styles are displayed on large screens
* Display submenu items in mobile view
* Increase size of social links
* Properly enqueue Google Fonts without init; improve custom header admin display

= 7 August 2014 =
* Ensure More Projects area does not clear
* Decrease line height on portfolio post titles
* Ensure rows clear when post title text wraps to two lines
* No hover state on slider, looks funky
* Improvements to slider display; rename Theme Options section in Customizer to Theme for consistency

= 6 August 2014 =
* improvements for mobile slider and hover effects

= 2 August 2014 =
* If no sidebar is active, let the content take up the full width of the column.
* Fix for portfolio page template selector; add RTL styles
* Fix entry title size selectors, missing class notation
* Custom header/site title/logo improvements for mobile
* Improvements to site logo and site title display
* Add support for Custom Headers
* Remove comma between tags on single portfolio posts; fix rating headings
* Fix slider bugs; add support for email social icon; set default posts per page on portfolio page template to 6
* Clear portfolio projects wrapper
* Add support for site logos

= 31 July 2014 =
* Display 9 posts per page by default on portfolio page template; remove unused minified JS; don't display #wpstats; round pixel values in style.css

= 24 July 2014 =
* change theme/author URIs and footer links to `wordpress.com/themes`.

= 3 June 2014 =
* Add edit links to portfolio projects
* Remove entry meta from portfolio items; update paging navigation function to work with portfolios; add portfolios post type support to featured content array
* Move entry meta around to make the design cleaner; add support for three different thumbnail aspect ratios; style tags

= 2 June 2014 =
* Minor tweak to spacing between posts
* Tweaks to heading styles; add support for Jetpack portfolios
* Add Genericons support; add WP.com-specific styles; tweaks to portfolio appearance
* Initial import to repo
