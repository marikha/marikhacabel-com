<?php

// =============================================================================
// FUNCTIONS/PRO/MIGRATION.PHP
// -----------------------------------------------------------------------------
// Handles theme migration.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Version Migration
//   02. Version Migration Notice
//   03. Theme Migration
// =============================================================================

// Version Migration
// =============================================================================

function pro_version_migration() {

  $prior = get_option( 'pro_version', false );


  // Store the version on first install
  // ----------------------------------

  if ( false === $prior ) {
    update_option( 'pro_version', X_VERSION, true );
    update_option( 'x_dismiss_update_notice', true );
    return;
  }

  // Run migrations
  // --------------

  pro_version_migration_1_1_0( $prior );


  // Operations run for every update
  // -------------------------------
  // 01. Update stored version number. Save as autoloading value.
  // 02. Enable validation reminder.
  // 03. Bust Google Font cache.
  // 04. Purge all generated CSS
  // 05. Don't show the update notice on new installs
  // 06. Show update notice after an update

  if ( version_compare( $prior, X_VERSION, '<' ) ) {

    update_option( 'pro_version', X_VERSION, true ); // 01
    delete_option( 'x_dismiss_validation_notice' );  // 02
    x_bust_google_fonts_cache();                     // 03

    do_action( 'cornerstone_updated', 999 );

    if ( false === $prior ) {
      update_option( 'pro_dismiss_update_notice', true ); // 05
    } else {
      delete_option( 'pro_dismiss_update_notice' ); // 06
    }
  }

}

add_action( 'init', 'pro_version_migration' );



//
// 1.1.0
//

function pro_version_migration_1_1_0( $prior ) {

  if ( version_compare( $prior, '1.1.0', '<' ) ) {

    $body_font_size    = intval( get_option( 'x_body_font_size', '14' ) );
    $content_font_size     = intval( get_option( 'x_content_font_size', '14' ) );
    $content_font_size_rem = round( $content_font_size / $body_font_size, 3 );

    $updated = array(
      'x_root_font_size_stepped_xs'  => get_option( 'x_root_font_size_stepped_xs', $body_font_size ),
      'x_root_font_size_stepped_sm'  => get_option( 'x_root_font_size_stepped_sm', $body_font_size ),
      'x_root_font_size_stepped_md'  => get_option( 'x_root_font_size_stepped_md', $body_font_size ),
      'x_root_font_size_stepped_lg'  => get_option( 'x_root_font_size_stepped_lg', $body_font_size ),
      'x_root_font_size_stepped_xl'  => get_option( 'x_root_font_size_stepped_xl', $body_font_size ),
      'x_root_font_size_scaling_min' => get_option( 'x_root_font_size_scaling_min', $body_font_size ),
      'x_root_font_size_scaling_max' => get_option( 'x_root_font_size_scaling_max', $body_font_size ),
      'x_content_font_size_rem'      => get_option( 'x_content_font_size_rem', $content_font_size_rem )
    );

    foreach ( $updated as $key => $value ) {
      update_option( $key, $value );
    }
  }

}


// Version Migration Notice
// =============================================================================

//
// 1. Output notice.
// 2. Dismiss notice.
//

function pro_version_migration_notice() { // 1

  if ( false === get_option( 'pro_dismiss_update_notice', false ) && 'xpro' !== X_SLUG ) {

    x_tco()->admin_notice( array(
      'message' => __( 'Congratulations, you&apos;ve successfully updated Pro! Be sure to <a href="//theme.co/changelog/" target="_blank">check out the release notes and changelog</a> to see all that has changed, especially if you&apos;re utilizing any additional plugins or have made modifications to your website via a child theme.', '__x__' ),
      'dismissible' => true,
      'ajax_dismiss' => 'pro_dismiss_update_notice'
    ) );

  }

  if ( 'xpro' === X_SLUG ) {

    x_tco()->admin_notice( array(
      'message' => __( 'Your site has been updated to version 1.1.0. "X Pro" is becoming "Pro" which necessitates changing the theme folder. To stay up-to-date you will need to install "Pro" and switch to it as the active theme. While there is no automated way of doing this, it is a very quick one-time process. Please read <a href="https://theme.co/apex/forums/topic/x-pro-is-now-pro-what-you-need-to-know-and-do/" target="_blank">this article</a> for more detailed information.', '__x__' ),
    ) );

  }


}

add_action( 'admin_notices', 'pro_version_migration_notice' );


function pro_version_migration_notice_dismiss() { // 2

  update_option( 'pro_dismiss_update_notice', true );
  wp_send_json_success();

}

add_action( 'wp_ajax_pro_dismiss_update_notice', 'pro_version_migration_notice_dismiss' );



// Theme Migration
// =============================================================================

function pro_theme_migration( $new_name, $new_theme ) {

  if ( $new_theme == 'Pro' || $new_theme->get( 'Template' ) == 'pro' ) {
    return false;
  }

  // Leaving Pro

}

add_action( 'switch_theme', 'pro_theme_migration', 10, 2 );
