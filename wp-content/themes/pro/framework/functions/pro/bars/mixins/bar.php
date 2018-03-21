<?php

// =============================================================================
// CORNERSTONE/INCLUDES/ELEMENTS/MIXINS/BAR.PHP
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

function x_controls_bar( $settings = array() ) {

  // Setup
  // -----

  $group        = 'bar';
  $group_setup  = $group . ':setup';
  $group_design = $group . ':design';


  // Setup - Options
  // ---------------

  $options_bar_base_font_size = array(
    'available_units' => array( 'px', 'em', 'rem' ),
    'valid_keywords'  => array( 'calc' ),
    'fallback_value'  => '16px',
    'ranges'          => array(
      'px'  => array( 'min' => 10,  'max' => 24,  'step' => 1    ),
      'em'  => array( 'min' => 0.5, 'max' => 1.5, 'step' => 0.01 ),
      'rem' => array( 'min' => 0.5, 'max' => 1.5, 'step' => 0.01 ),
    ),
  );

  $options_bar_z_index = array(
    'unit_mode'      => 'unitless',
    'fallback_value' => '9999',
  );

  $options_bar_offset = array(
    'available_units' => array( 'px' ),
    'fallback_value'  => '0px',
  );

  $options_bar_width = array(
    'available_units' => array( 'px', 'em', 'rem', 'vw', 'vh' ),
    'valid_keywords'  => array( 'calc' ),
    'fallback_value'  => '210px',
    'ranges'          => array(
      'px'  => array( 'min' => '30',  'max' => '300', 'step' => '1'    ),
      'em'  => array( 'min' => '1.5', 'max' => '15',  'step' => '0.01' ),
      'rem' => array( 'min' => '1.5', 'max' => '15',  'step' => '0.01' ),
      'vw'  => array( 'min' => '1',   'max' => '100', 'step' => '1'    ),
      'vh'  => array( 'min' => '1',   'max' => '100', 'step' => '1'    ),
    ),
  );

  $options_bar_height = array(
    'available_units' => array( 'px', 'em', 'rem', 'vw', 'vh' ),
    'valid_keywords'  => array( 'calc', 'auto' ),
    'fallback_value'  => '100px',
    'ranges'          => array(
      'px'  => array( 'min' => '30',  'max' => '150', 'step' => '1'    ),
      'em'  => array( 'min' => '1.5', 'max' => '7.5', 'step' => '0.01' ),
      'rem' => array( 'min' => '1.5', 'max' => '7.5', 'step' => '0.01' ),
      'vw'  => array( 'min' => '1',   'max' => '100', 'step' => '1'    ),
      'vh'  => array( 'min' => '1',   'max' => '100', 'step' => '1'    ),
    ),
  );

  $options_bar_outer_spacing = array(
    'available_units' => array( 'px', 'em', 'rem' ),
    'valid_keywords'  => array( 'calc' ),
    'fallback_value'  => '35px',
    'ranges'          => array(
      'px'  => array( 'min' => '0', 'max' => '50',  'step' => '1'    ),
      'em'  => array( 'min' => '0', 'max' => '2.5', 'step' => '0.01' ),
      'rem' => array( 'min' => '0', 'max' => '2.5', 'step' => '0.01' ),
    ),
  );

  $options_bar_content_length = array(
    'available_units' => array( '%' ),
    'valid_keywords'  => array( 'calc', 'auto' ),
    'fallback_value'  => '100%',
    'ranges'          => array( '%' => array( 'min' => '60', 'max' => '100', 'step' => '1' ) ),
  );

  $options_bar_content_max_length = array(
    'available_units' => array( 'px', 'em', 'rem' ),
    'valid_keywords'  => array( 'calc', 'none' ),
    'fallback_value'  => 'none',
    'ranges'          => array(
      'px'  => array( 'min' => '500', 'max' => '1200', 'step' => '1'   ),
      'em'  => array( 'min' => '25',  'max' => '60',   'step' => '0.1' ),
      'rem' => array( 'min' => '25',  'max' => '60',   'step' => '0.1' ),
    ),
  );

  $options_bar_sticky_trigger_offset = array(
    'unit_mode'      => 'unitless',
    'fallback_value' => '0',
    'min'            => '0',
    'max'            => '150',
    'step'           => '1',
  );


  // Setup - Settings
  // ----------------

  $settings_bar_bg = array(
    'group'     => $group_design,
    'condition' => array( 'bar_bg_advanced' => true ),
  );

  $settings_bar_flex_css_row = array(
    'k_pre'     => 'bar_row',
    'group'     => $group_design,
    'condition' => array( 'key' => '_region', 'op' => 'IN', 'value' => array( 'top', 'bottom', 'footer' ) ),
  );

  $settings_bar_flex_css_col = array(
    'k_pre'     => 'bar_col',
    'group'     => $group_design,
    'condition' => array( 'key' => '_region', 'op' => 'IN', 'value' => array( 'left', 'right' ) ),
  );


  // Data
  // ----

  $data = array_merge(
    array(
      array(
        'type'     => 'group',
        'title'    => __( 'Setup', '__x__' ),
        'group'    => $group_setup,
        'controls' => array(
          array(
            'type'     => 'group',
            'title'    => __( 'Font Size &amp; Z-Index', '__x__' ),
            'controls' => array(
              array(
                'key'     => 'bar_base_font_size',
                'type'    => 'unit',
                'options' => $options_bar_base_font_size,
              ),
              array(
                'key'     => 'bar_z_index',
                'type'    => 'unit',
                'options' => $options_bar_z_index,
              ),
            ),
          ),
          array(
            'key'       => 'bar_position_top',
            'type'      => 'choose',
            'title'     => __( 'Initial Position', '__x__' ),
            'condition' => array( '_region' => 'top' ),
            'options'   => array(
              'choices' => array(
                array( 'value' => 'relative', 'label' => __( 'Relative', '__x__' ) ),
                array( 'value' => 'absolute', 'label' => __( 'Absolute', '__x__' ) ),
              ),
            ),
          ),
          array(
            'key'       => 'bar_scroll',
            'type'      => 'choose',
            'label'     => __( 'Content Scrolling', '__x__' ),
            'condition' => array( 'key' => 'bar_height', 'op' => '!=', 'value' => 'auto' ),
            'options'   => array(
              'choices' => array(
                array( 'value' => false, 'label' => __( 'Off', '__x__' ) ),
                array( 'value' => true,  'label' => __( 'On', '__x__' ) ),
              ),
            ),
          ),
          array(
            'key'       => 'bar_sticky',
            'type'      => 'choose',
            'label'     => __( 'Sticky Bar', '__x__' ),
            'condition' => array( '_region' => 'top' ),
            'options'   => array(
              'choices' => array(
                array( 'value' => false, 'label' => __( 'Off', '__x__' ) ),
                array( 'value' => true,  'label' => __( 'On', '__x__' ) ),
              ),
            ),
          ),
          array(
            'type'     => 'group',
            'title'    => __( 'Background', '__x__' ),
            'controls' => array(
              array(
                'key'     => 'bar_bg_color',
                'type'    => 'color',
                'options' => array(
                  'label' => __( 'Select', '__x__' ),
                ),
              ),
              array(
                'keys' => array(
                  'bg_advanced' => 'bar_bg_advanced',
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
    x_controls_bg( $settings_bar_bg ),
    array(
      array(
        'type'     => 'group',
        'title'    => __( 'Dimensions', '__x__' ),
        'group'    => $group_design,
        'controls' => array(
          array(
            'key'       => 'bar_width',
            'type'      => 'slider',
            'title'     => __( 'Width', '__x__' ),
            'condition' => array( 'key' => '_region', 'op' => 'IN', 'value' => array( 'left', 'right' ) ),
            'options'   => $options_bar_width,
          ),
          array(
            'key'       => 'bar_height',
            'type'      => 'slider',
            'title'     => __( 'Height', '__x__' ),
            'condition' => array( 'key' => '_region', 'op' => 'IN', 'value' => array( 'top', 'bottom', 'footer' ) ),
            'options'   => $options_bar_height,
          ),
          array(
            'key'     => 'bar_outer_spacing',
            'type'    => 'slider',
            'title'   => __( 'Outer Spacing', '__x__' ),
            'options' => $options_bar_outer_spacing,
          ),
          array(
            'key'       => 'bar_content_length',
            'type'      => 'slider',
            'title'     => __( 'Content Length', '__x__' ),
            'options'   => $options_bar_content_length,
          ),
          array(
            'key'     => 'bar_content_max_length',
            'type'    => 'slider',
            'title'   => __( 'Content Max Length', '__x__' ),
            'options' => $options_bar_content_max_length,
          ),
          array(
            'type'       => 'group',
            'title'      => __( 'Margin Top &amp; Sides', '__x__' ),
            'conditions' => array( array( '_region' => 'top' ), array( 'bar_position_top' => 'absolute' ) ),
            'controls'   => array(
              array(
                'key'     => 'bar_margin_top',
                'type'    => 'unit',
                'options' => $options_bar_offset,
              ),
              array(
                'key'     => 'bar_margin_sides',
                'type'    => 'unit',
                'options' => $options_bar_offset,
              ),
            ),
          ),
        ),
      ),
    ),
    x_control_flex_layout_css( $settings_bar_flex_css_row ),
    x_control_flex_layout_css( $settings_bar_flex_css_col ),
    array(
      array(
        'type'       => 'group',
        'title'      => __( 'Sticky Setup', '__x__' ),
        'group'      => $group_design,
        'conditions' => array( array( '_region' => 'top' ), array( 'bar_sticky' => true ) ),
        'controls'   => array(
          array(
            'keys' => array(
              'sticky_keep_margins'   => 'bar_sticky_keep_margin',
              'sticky_hide_initially' => 'bar_sticky_hide_initially',
              'sticky_z_stack'        => 'bar_sticky_z_stack',
            ),
            'type'       => 'checkbox-list',
            'label'      => __( 'Options', '__x__' ),
            'options'    => array(
              'list' => array(
                array( 'key' => 'sticky_keep_margins',   'label' => __( 'Keep Margin', '__x__' ),    'half' => true ),
                array( 'key' => 'sticky_hide_initially', 'label' => __( 'Hide Initially', '__x__' ), 'half' => true ),
                array( 'key' => 'sticky_z_stack',        'label' => __( 'Z-Index Stack', '__x__' ),  'half' => true ),
              ),
            ),
          ),
          array(
            'key'     => 'bar_sticky_trigger_selector',
            'type'    => 'text',
            'label'   => __( 'Trigger Selector', '__x__' ),
            'options' => array( 'placeholder' => __( '#target-element (optional)', '__x__' ) ),
          ),
          array(
            'key'     => 'bar_sticky_trigger_offset',
            'type'    => 'slider',
            'label'   => __( 'Trigger Offset', '__x__' ),
            'options' => $options_bar_sticky_trigger_offset,
          ),
          array(
            'key'        => 'bar_sticky_shrink',
            'type'       => 'slider',
            'label'      => __( 'Shrink Amount', '__x__' ),
            'conditions' => array( array( 'bar_sticky' => true ) ),
            'options'    => array(
              'unit_mode'      => 'unitless',
              'fallback_value' => 1,
              'min'            => 0.33,
              'max'            => 1,
              'step'           => 0.001,
            ),
          ),
        ),
      ),
    ),
    x_control_padding( array( 'k_pre' => 'bar', 'group' => $group_design, 'condition' => array( 'bar_height' => 'auto' ) ) ),
    x_control_border( array( 'k_pre' => 'bar', 'group' => $group_design ) ),
    x_control_box_shadow( array( 'k_pre' => 'bar', 'group' => $group_design ) )
  );


  // Returned Value
  // --------------

  $controls = $data;

  return $controls;

}



// Control Groups
// =============================================================================

function x_control_groups_bar( $settings = array() ) {

  $group = 'bar';

  $control_groups = array(
    $group             => array( 'title' => __( 'Bar', '__x__' ) ),
    $group . ':setup'  => array( 'title' => __( 'Setup', '__x__' ) ),
    $group . ':design' => array( 'title' => __( 'Design', '__x__' ) ),
  );

  return $control_groups;

}



// Values
// =============================================================================

function x_values_bar( $settings = array() ) {

  // Values
  // ------

  $values = array_merge(
    array(
      'title'              => x_module_value( '', 'attr' ),
      'bar_base_font_size' => x_module_value( '16px', 'style' ),
      'bar_z_index'        => x_module_value( '9999', 'style' ),
      'bar_position_top'   => x_module_value( 'relative', 'markup' ),
      'bar_margin_top'     => x_module_value( '0px', 'style' ),
      'bar_margin_sides'   => x_module_value( '0px', 'style' ),
      'bar_scroll'         => x_module_value( false, 'markup' ),
      'bar_bg_color'       => x_module_value( '#ffffff', 'style:color' ),
      'bar_bg_advanced'    => x_module_value( false, 'all' ),
    ),
    x_values_bg(),
    array(
      'bar_width'                   => x_module_value( '15em', 'style' ),
      'bar_height'                  => x_module_value( '6em', 'style' ),
      'bar_outer_spacing'           => x_module_value( '2em', 'style' ),
      'bar_content_length'          => x_module_value( '100%', 'style' ),
      'bar_content_max_length'      => x_module_value( 'none', 'style' ),
      'bar_row_flex_direction'      => x_module_value( 'row', 'style' ),
      'bar_row_flex_wrap'           => x_module_value( false, 'style' ),
      'bar_row_flex_justify'        => x_module_value( 'space-between', 'style' ),
      'bar_row_flex_align'          => x_module_value( 'center', 'style' ),
      'bar_col_flex_direction'      => x_module_value( 'column', 'style' ),
      'bar_col_flex_wrap'           => x_module_value( false, 'style' ),
      'bar_col_flex_justify'        => x_module_value( 'space-between', 'style' ),
      'bar_col_flex_align'          => x_module_value( 'center', 'style' ),
      'bar_sticky'                  => x_module_value( false, 'markup' ),
      'bar_sticky_keep_margin'      => x_module_value( false, 'markup' ),
      'bar_sticky_hide_initially'   => x_module_value( false, 'markup' ),
      'bar_sticky_z_stack'          => x_module_value( false, 'markup' ),
      'bar_sticky_trigger_selector' => x_module_value( '', 'markup' ),
      'bar_sticky_trigger_offset'   => x_module_value( '0', 'markup' ),
      'bar_sticky_shrink'           => x_module_value( '1', 'markup' ),
      'bar_padding'                 => x_module_value( '0em', 'style' ),
      'bar_border_width'            => x_module_value( '0px', 'style' ),
      'bar_border_style'            => x_module_value( 'none', 'style' ),
      'bar_border_color'            => x_module_value( 'transparent', 'style:color' ),
      'bar_box_shadow_dimensions'   => x_module_value( '0em 0.15em 2em', 'style' ),
      'bar_box_shadow_color'        => x_module_value( 'rgba(0, 0, 0, 0.15)', 'style:color' ),
    )
  );


  // Returned Value
  // --------------

  return x_bar_mixin_values( $values, $settings );

}
