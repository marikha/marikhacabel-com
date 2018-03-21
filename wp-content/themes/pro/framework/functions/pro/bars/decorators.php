<?php

// =============================================================================
// FUNCTIONS/BARS/DECORATORS.PHP
// -----------------------------------------------------------------------------
// Bar module decorators.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Decorator: Bar
//   02. Decorator: Container
// =============================================================================

// Decorator: Bar
// =============================================================================

// Notes
// -----
// 01. Previous flex layout attribute mixin:
//     x_module_decorator_flex_layout_attr( $_region, 'bar', $bar_row_flex_layout_attr, $bar_col_flex_layout_attr )

function x_module_decorator_bar( $module ) {

  extract( $module );

  $bar_position = 'fixed';

  if ( $_region === 'top' ) {
    if ( $bar_sticky === true && $bar_sticky_hide_initially === true ) {
      $bar_position = 'absolute';
    } else {
      $bar_position = $bar_position_top;
    }
  } else if ( $_region === 'footer' ) {
    $bar_position = 'relative';
  }

  $module = array_merge(
    $module,
    array(
      'bar_position' => $bar_position
    )
    // 01
  );

  return $module;

}



// Decorator: Container
// =============================================================================

// Notes
// -----
// 01. Previous flex layout attribute mixin:
//     x_module_decorator_flex_layout_attr( $_region, 'bar', $bar_row_flex_layout_attr, $bar_col_flex_layout_attr )

// function x_module_decorator_container( $module ) {
//
//   extract( $module );
//
//   $module = array_merge(
//     $module
//     // 01
//   );
//
//   return $module;
//
// }
