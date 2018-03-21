=== Resonar ===

Contributors: automattic
Tags: blue, white, light, one-column, fixed-layout, responsive-layout, accessibility-ready, custom-background, custom-header, custom-menu, editor-style, featured-images, flexible-header, infinite-scroll, rtl-language-support, site-logo, sticky-post, translation-ready

Requires at least: 4.1
Tested up to: 4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

An elegant blog theme featuring full-screen featured images.

== Description ==

Resonar is an elegant blog theme that features full-screen featured images.

* Responsive layout.
* Custom Header
* Social Links
* Jetpack compatibility for Infinite Scroll, Responsive Videos, Site Logo.
* The GPL v2.0 or later license. :) Use it to make something cool.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Where can I add widgets? =

Resonar includes one optional widget area located behind the menu icon (three horizontal lines) in the header.

= How do I add the Social Links to the sidebar? =

Resonar allows you display links to your social media profiles, like Twitter and Facebook, with icons.

1. Create a new Custom Menu, and assign it to the Social Links Menu location.
2. Add links to each of your social services using the Links panel.
3. Icons for your social links will automatically appear if it's available.

Available icons: (Linking to any of the following sites will automatically display its icon in your social menu).

* Codepen
* Digg
* Dribbble
* Dropbox
* Facebook
* Flickr
* Foursquare
* GitHub
* Google+
* Instagram
* LinkedIn
* Email (mailto: links)
* Pinterest
* Pocket
* PollDaddy
* Reddit
* RSS Feed (URLs with /feed/)
* Spotify
* StumbleUpon
* Tumblr
* Twitch
* Twitter
* Vimeo
* WordPress
* YouTube

Social networks that aren't currently supported will be indicated by a generic share icon.

== Quick Specs ==

1. The main column width is 704px.
2. The sidebar width is 576px.
3. Featured Images are 2000px wide by 1500px high.
4. Custom Header Image is 2000px wide by 320px high.

== Changelog ==

= 7 June 2017 =
* Update JavaScript that toggles hidden widget area, to make sure new video and audio widgets are displaying correctly when opened.

= 14 April 2017 =
* Check for post parent before outputting next, previous, and image attachment information to prevent fatals.

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 9 February 2017 =
* Check for is_wp_error() in cases when using get_the_tag_list() to avoid potential fatal errors.

= 2 February 2017 =
* remove from CSS in wp-content/themes/pub

= 17 January 2017 =
* Remove portfolio tag from non-portfolio CPT themes.

= 29 December 2016 =
* clean up retired a8c widget Time Machine styles.

= 4 July 2016 =
* Fix Headstart excerpt admin URL.

= 17 June 2016 =
* Add a class of .widgets-hidden to the body tag when the sidebar is active; allows the widgets to be targeted by Direct Manipulation.

= 8 June 2016 =
* Add Headstart annotations;

= 12 May 2016 =
* Add new classic-menu tag.

= 25 February 2016 =
* Add blog-excerpts tag.

= 23 February 2016 =
* Add fixed widths to .size-big items to ensure the width in CSS overrides any smaller set widths in the image attributes themselves.

= 4 February 2016 =
* Adding author-bio tag, to keep things in sync with the Showcase.

= 14 August 2015 =
* Code style cleanup.

= 13 August 2015 =
* Make sure images aren't being displayed in .entry-summary

= 12 August 2015 =
* Improve "Continue reading" link and make sure it's being displayed even when user uses a manual excerpt.

= 15 July 2015 =
* Always use https when loading Google Fonts.

= 14 July 2015 =
* Make sure escape custom header image attributes.

= 10 July 2015 =
* Small position tweak for avatars in comments.

= 8 July 2015 =
* Declare the global post for portfolio meta to avoid php notice.

= 9 June 2015 =
* Improve accessibility for sidebar and sidebar toggle button.
* Fix a typo in readme.txt

= 8 June 2015 =
* Increment the version number.
* Remove unnecessary space.
* Change the toggle button text accordingly so that it's more accurate. Also cleanup for js variables.
* Log the last change in readme.txt
* Make sure aria-hidden for sidebar and sidebar toggle changes accordingly.
* Remove navigation role attribute from socila navigation because they are external links.

= 29 April 2015 =
* Log the last change in readme.txt.
* Add the blog name as an alt attribute in the custom header image.

= 21 April 2015 =
* Reset a custom background arguments for WP.com to use the default callback.

= 14 April 2015 =
* Add a custom background callback to apply a custom background color to some elements for self hosted version.

= 9 April 2015 =
* Remove unnecesssary custom descriptions.

= 5 April 2015 =
* Style tweak for Top Posts Widget.
* Move Goodreads widget style to the main stylesheet since it's in Jetpack.

= 2 April 2015 =
* Style tweaks.

= 25 March 2015 =
* Remove underline from post date on featured image.

= 24 March 2015 =
* Log the recent changes and increment its version number.

= 22 March 2015 =
* Adjust margins for syntaxhighlighter.

= 19 March 2015 =
* Style tweak for Infinite Scroll.

= 18 March 2015 =
* Override default gallery widget content width and triger resize event so that the widget displays correctly.
* Remove underline from the link about the ad.

= 17 March 2015 =
* Add bottom margin to Spotify embed.
* Remove unused animation keyframes.
* Adjust page header position.
* Cleanup Genericons folder.
* Adjust bottom margin for blockquotes.
* Add editor style.

= 13 March 2015 =
* Further tweak on social menu.
* Style tweak for the social menu.
* Alignment tweak
* CSS for RTL
* Make sure the open sidear is on top of footer.
* Style tweaks.

= 11 March 2015 =
* Minor style tweaks.
* Social links style tweaks.
* Nascar form style tweak.
* Make sure Author Grid widget don't have bullets and margin left.
* Narrow widget area, style tweaks for some elements in the sidebar.
* Darken the sidebar just a little bit to make obvious if it's opened.
* Display main navigation larger than 924px wide viewport.

= 10 March 2015 =
* Format clean up
* Remove underline from native audio controler.
* Make sure Google Maps and Instagram embed have right margin.
* Remove width value from big captions. Minor style tweak for focus style.
* Stop image inside table overhang.
* Jetpack comments style tweak
* Style tweaks
* More tweak the overhangign image and license declaration for the new image on screenshot.
* Overhanging image tweak

= 9 March 2015 =
* Limit the overhangign image to full size image.
* Clean up
* Cancelling floats for overhangign images.
* Style tweaks.
* Style tweaks
* Clean up
* Make sure latex images don't overhang.
* A new screenshot
* Clean up
* Non uppercase menu items. Add visual feedback for hovered sticky post title.
* Minor style tweaks.
* Large content width for outdented images for large screen.

= 8 March 2015 =
* "More" icon for sidebar toggle once the main menu appears on a large screen.
* More outdented images and quotes for larger screens.
* Pull quotes
* One column layout, outdented images.

= 6 March 2015 =
* Remove widont from titles.
* Page links tweak.
* Make dropdown look good.
* Fix dropdown arrow.
* Style tweak.

= 5 March 2015 =
* Clean-up.
* Site title size tweak
* Handle a long menu nicely.

= 4 March 2015 =
* Site logo tweak and some clean up.
* Reset letter spacing for related post titles.
* Non sticky header.
* This theme requires at least 4.1
* Add custom description to the tagline control because it's hidden in this theme.
* Move custom header image out of masthead.
* Add a body class when a custom menu is active.
* A new screenshot.
* Add missing width value.
* Let user have non uppercase site title as default.
* Style tweak
* Show main navigation as default on large screen.

= 3 March 2015 =
* WP.com style

= 2 March 2015 =
* Remove unnecessary codekit cache directory.
* Clean up theme file structure.
* Initial import.

== Credits ==

* Genericons: font by Automattic (http://automattic.com/), licensed under [GPL2](https://www.gnu.org/licenses/gpl-2.0.html)
* Images: image by Todd Quackenbush (https://unsplash.com/toddquackenbush), licensed under [CC0](http://creativecommons.org/choose/zero/)
