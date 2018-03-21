<?php

/**
 * Localize strings for javascript
 */

$accept  = __( 'Yes, proceed', '__x__' );
$decline = __( 'No, take me back', '__x__' );

return array(

  'integration-mode'            => 'pro',
  'editor-tab-logo-path'        => 'svg/logo-flat-content',
	'edit-with-cornerstone'       => __( 'Edit with Pro', '__x__' ),
  'visual-tab'                  => __( 'Visual', '__x__' ),
  'text-tab'                    => __( 'Text', '__x__' ),
	'cornerstone-tab'             => __( 'Pro', '__x__' ),
	'insert-cornerstone'          => __( 'Insert Shortcode', '__x__' ),
	'updating'                    => __( 'Updating', '__x__' ),
	'confirm-yep'                 => __( 'Yep', '__x__' ),
	'confirm-nope'                => __( 'Nope', '__x__' ),
	'manual-edit-warning'         => __( 'Hold up! You&apos;re welcome to make changes to the content. However, these will not be reflected in the content builder. If you edit the page in the content builder again, any changes made here will be overwritten. Do you wish to continue?', '__x__' ),
	'overwrite-warning'           => __( 'Hold up! The content has been modified outside of the content builder. Editing in the content builder will replace the current content. Do you wish to continue?', '__x__' ),
	'manual-edit-accept'          => $accept,
	'manual-edit-decline'         => $decline,
	'overwrite-accept'            => $accept,
	'overwrite-decline'           => $decline,
	'default-title'               => __( 'Content Draft', '__x__'),

  'dashboard-title'                  => __( 'Pro', '__x__' ),
  'dashboard-menu-title'             => __( 'Home', '__x__'),
  'dashboard-settings-title'         => __( 'Settings', '__x__' ),
  'dashboard-settings-path'          => 'pro-settings',
  'dashboard-settings-save-title'    => __( 'Save Settings', '__x__' ),
  'dashboard-settings-save-update'   => __( 'Update', '__x__' ),
  'dashboard-settings-save-info'     => __( 'Once you are satisfied with your settings, click the button below to save them.', '__x__' ),
  'dashboard-settings-save-updating' => __( 'Updating&hellip;', '__x__' ),
  'dashboard-settings-save-updated'  => __( 'Settings Saved!', '__x__' ),
  'dashboard-settings-save-error'    => __( 'Sorry! Unable to Save', '__x__' ),

  'dashboard-settings-system-title' => __( 'System', '__x__' ),

  'dashboard-settings-system-clear-style-cache-title' => __( 'Clear Style Cache', '__x__' ),
  'dashboard-settings-system-clear-style-cache-description' => __( 'For quicker page loads V2 Elements will remember the CSS generated when they were last saved. This is automatically cleared when Pro is updated. It may be useful to clear manually if any V2 Elements are missing styling.', '__x__' ),
  'dashboard-settings-system-clear-style-cache-button'      => __( 'Clear Style Cache', '__x__' ),
  'dashboard-settings-system-clear-style-cache-button-clearing' => __( 'Clearing&hellip;', '__x__' ),
  'dashboard-settings-system-clear-style-cache-button-cleared'  => __( 'Cleared!', '__x__' ),
  'dashboard-settings-system-clear-style-cache-button-error'    => __( 'Unable to clear!', '__x__' ),

  'plugin-update-nothing'   => __( 'Nothing to report.', '__x__' ),
  'plugin-update-new'       => __( 'New version available!', '__x__' ),
  'plugin-update-error'     => __( 'Unable to check for updates. Try again later.', '__x__' ),
  'plugin-update-checking'  => __( 'Checking&hellip;', '__x__' ),
  'plugin-update-changelog' => __( 'Visit the <a href="http://theme.co/changelog/#cornerstone">Themeco Changelog</a> for more information.', '__x__' ),
  'plugin-update-notice'    => __( '<a href="%s">Validate to enable automatic updates</a>', '__x__' ),

  'huebert-select-color' => __( 'Select Color', '__x__' ),

  'x-shortcodes-notice' => __( '<strong>X &ndash; Shortcodes has been deactivated</strong>. This plugin is no longer a requirement of X, and can safely be deleted.', '__x__' ),

);
