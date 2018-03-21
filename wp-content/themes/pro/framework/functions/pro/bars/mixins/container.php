<?php

// =============================================================================
// CORNERSTONE/INCLUDES/ELEMENTS/MIXINS/CONTAINER.PHP
// -----------------------------------------------------------------------------
// V2 element mixins.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Control
//   02. Control Groups
//   03. Values
// =============================================================================

// Control
// =============================================================================

function x_controls_container( $settings = array() ) {

  // Setup
  // -----

  $group        = 'container';
  $group_setup  = $group . ':setup';
  $group_design = $group . ':design';


  // Setup - Settings
  // ----------------

  $settings_container_bg = array(
    'group'     => $group_design,
    'condition' => array( 'container_bg_advanced' => true )
  );

  $settings_container_flex_css_row = array(
    'k_pre'     => 'container_row',
    'group'     => $group_design,
    'condition' => array( 'key' => '_region', 'op' => 'IN', 'value' => array( 'top', 'bottom', 'footer' ) ),
  );

  $settings_container_flex_css_col = array(
    'k_pre'     => 'container_col',
    'group'     => $group_design,
    'condition' => array( 'key' => '_region', 'op' => 'IN', 'value' => array( 'left', 'right' ) ),
  );

  $settings_container_design = array(
    'k_pre' => 'container',
    'group' => $group_design
  );


  // Controls
  // --------

  $controls = array_merge(
    array(
      array(
        'type'     => 'group',
        'title'    => __( 'Setup', '__x__' ),
        'group'    => $group_setup,
        'controls' => array(
          array(
            'key'     => 'container_max_width',
            'type'    => 'unit',
            'label'   => __( 'Max Width', '__x__' ),
            'options' => array(
              'available_units' => array( 'px', 'em', 'rem', '%' ),
              'valid_keywords'  => array( 'none' ),
              'fallback_value'  => 'none',
              'ranges'          => array(
                'px'  => array( 'min' => '0', 'max' => '300', 'step' => '1'    ),
                'em'  => array( 'min' => '0', 'max' => '30',  'step' => '0.25' ),
                'rem' => array( 'min' => '0', 'max' => '30',  'step' => '0.25' ),
                '%'   => array( 'min' => '0', 'max' => '100', 'step' => '1'    ),
              ),
            ),
          ),
          array(
            'key'     => 'container_max_height',
            'type'    => 'unit',
            'label'   => __( 'Max Height', '__x__' ),
            'options' => array(
              'available_units' => array( 'px', 'em', 'rem', '%' ),
              'valid_keywords'  => array( 'none' ),
              'fallback_value'  => 'none',
              'ranges'          => array(
                'px'  => array( 'min' => '0', 'max' => '300', 'step' => '1'    ),
                'em'  => array( 'min' => '0', 'max' => '30',  'step' => '0.25' ),
                'rem' => array( 'min' => '0', 'max' => '30',  'step' => '0.25' ),
                '%'   => array( 'min' => '0', 'max' => '100', 'step' => '1'    ),
              ),
            ),
          ),
          array(
            'type'     => 'group',
            'title'    => __( 'Background', '__x__' ),
            'controls' => array(
              array(
                'key'     => 'container_bg_color',
                'type'    => 'color',
                'options' => array(
                  'label' => __( 'Select', '__x__' ),
                ),
              ),
              array(
                'keys' => array(
                  'bg_advanced' => 'container_bg_advanced',
                ),
                'type'    => 'checkbox-list',
                'options' => array(
                  'list' => array(
                    array( 'key' => 'bg_advanced', 'label' => __( 'Advanced', '__x__' ) ),
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    x_controls_bg( $settings_container_bg ),
    x_control_flex( array_merge( $settings_container_design, array( 't_pre' => __( 'Self', '__x__' ) ) ) ),
    x_control_flex_layout_css( $settings_container_flex_css_row ),
    x_control_flex_layout_css( $settings_container_flex_css_col ),
    x_control_margin( $settings_container_design ),
    x_control_padding( $settings_container_design ),
    x_control_border( $settings_container_design ),
    x_control_border_radius( $settings_container_design ),
    x_control_box_shadow( $settings_container_design )
  );


  // Returned Value
  // --------------

  return $controls;

}



// Control Groups
// =============================================================================

function x_control_groups_container( $settings = array() ) {

  $group = 'container';

  $control_groups = array(
    $group             => array( 'title' => __( 'Container', '__x__' ) ),
    $group . ':setup'  => array( 'title' => __( 'Setup', '__x__' ) ),
    $group . ':design' => array( 'title' => __( 'Design', '__x__' ) ),
  );

  return $control_groups;

}



// Values
// =============================================================================

function x_values_container( $settings = array() ) {

  // Values
  // ------

  $values = array_merge(
    array(
      'title'                 => x_module_value( '', 'attr' ),
      'container_max_width'   => x_module_value( 'none', 'style' ),
      'container_max_height'  => x_module_value( 'none', 'style' ),
      'container_bg_color'    => x_module_value( 'transparent', 'style:color' ),
      'container_bg_advanced' => x_module_value( false, 'all' ),
    ),
    x_values_bg(),
    array(
      'container_flex'                  => x_module_value( '0 1 auto', 'style' ),
      'container_row_flex_direction'    => x_module_value( 'row', 'style' ),
      'container_row_flex_wrap'         => x_module_value( false, 'style' ),
      'container_row_flex_justify'      => x_module_value( 'space-between', 'style' ),
      'container_row_flex_align'        => x_module_value( 'center', 'style' ),
      'container_col_flex_direction'    => x_module_value( 'column', 'style' ),
      'container_col_flex_wrap'         => x_module_value( false, 'style' ),
      'container_col_flex_justify'      => x_module_value( 'space-between', 'style' ),
      'container_col_flex_align'        => x_module_value( 'center', 'style' ),
      'container_margin'                => x_module_value( '0px', 'style' ),
      'container_padding'               => x_module_value( '0px', 'style' ),
      'container_border_width'          => x_module_value( '0px', 'style' ),
      'container_border_style'          => x_module_value( 'none', 'style' ),
      'container_border_color'          => x_module_value( 'transparent', 'style:color' ),
      'container_border_radius'         => x_module_value( '0px', 'style' ),
      'container_box_shadow_dimensions' => x_module_value( '0em 0em 0em 0em', 'style' ),
      'container_box_shadow_color'      => x_module_value( 'transparent', 'style:color' ),
    )
  );


  // Returned Value
  // --------------

  return x_bar_mixin_values( $values, $settings );

}
