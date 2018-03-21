<?php

// =============================================================================
// CORNERSTONE/INCLUDES/ELEMENTS/DEFINITIONS/BAR.PHP
// -----------------------------------------------------------------------------
// V2 element definitions.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Define Element
//   02. Builder Setup
//   03. Register Element
// =============================================================================

// Define Element
// =============================================================================

$data = array(
  'title'  => __( 'Bar', '__x__' ),
  'values' => array_merge(
    x_values_bar(),
    x_values_omega()
  ),
);



// Builder Setup
// =============================================================================

function x_element_builder_setup_bar() {
  return array(
    'control_groups' => array_merge(
      x_control_groups_bar(),
      x_control_groups_omega()
    ),
    'controls' => array_merge(
      x_controls_bar(),
      x_controls_omega()
    ),
  );
}



// Register Element
// =============================================================================

cornerstone_register_element( 'bar', x_element_base( $data ) );
