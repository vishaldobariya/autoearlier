<?php

/* Before VC init */
add_action( 'vc_before_init', 'keydesign_vc_before_init_actions' );
function keydesign_vc_before_init_actions() {
  // Force WPBakery Page Builder to initialize as "built into the theme"
  if( function_exists('vc_set_as_theme') ){
    vc_set_as_theme();
  }

  // Link VC elements's folder
  if( function_exists('vc_set_shortcodes_templates_dir') ){
    vc_set_shortcodes_templates_dir( plugin_dir_path( __FILE__ ).'vc-elements' );
  }
}

/* Extend WPBakery Templates */
if ( class_exists('WPBakeryShortCode') ) {
  require_once ( trailingslashit( KEYDESIGN_PLUGIN_PATH ) . 'includes/wpbakery-extend/templates/templates-init.php' );
  require_once ( trailingslashit( KEYDESIGN_PLUGIN_PATH ) . 'includes/wpbakery-extend/templates/templates-panel.php' );
}

/* After VC init */
add_action( 'vc_after_init', 'keydesign_vc_after_init_actions' );
function keydesign_vc_after_init_actions() {

  // Enable VC by default on a list of Post Types
  if ( get_option( 'kd-default-post-types' ) != 'yes' ) {
    if( function_exists('vc_set_default_editor_post_types') ) {
      $list = array(
          'page',
          'post',
          'portfolio',
      );
      vc_set_default_editor_post_types( $list );
      vc_editor_set_post_types($list);
    }
    update_option( 'kd-default-post-types', 'yes' );
  }


  if ( function_exists('vc_remove_param') ){
    vc_remove_param( 'vc_masonry_grid', 'initial_loading_animation' );
    vc_remove_param( 'vc_masonry_grid', 'filter_color' );
    vc_remove_param( 'vc_masonry_grid', 'filter_size' );
    vc_remove_param( 'vc_basic_grid', 'arrows_design' );
    vc_remove_param( 'vc_basic_grid', 'arrows_position' );
    vc_remove_param( 'vc_basic_grid', 'arrows_color' );
    vc_remove_param( 'vc_basic_grid', 'paging_design' );
    vc_remove_param( 'vc_basic_grid', 'paging_color' );
    vc_remove_param( 'vc_basic_grid', 'loop' );
    vc_remove_param( 'vc_basic_grid', 'autoplay' );
    vc_remove_param( 'vc_basic_grid', 'paging_animation_in' );
    vc_remove_param( 'vc_basic_grid', 'paging_animation_out' );
  }

  if ( function_exists('vc_add_param') ) {

      $base_css_editor = array( 'vc_row', 'vc_row_inner', 'vc_column', 'vc_column_inner' );
      $attributes_css_editor = array(
        array(
          'type' => 'css_editor',
          'heading' => esc_html__( 'Desktop Options', 'keydesign' ),
          'param_name' => 'css',
          'group' => esc_html__( 'Desktop', 'keydesign' )
        ),
        array(
          'type' => 'css_editor',
          'heading' => esc_html__( 'Tablet Options', 'keydesign' ),
          'param_name' => 'css_tablet_landscape',
          'group' => esc_html__( 'Tablet Landscape', 'keydesign' )
        ),
        array(
          'type' => 'css_editor',
          'heading' => esc_html__( 'Tablet Options', 'keydesign' ),
          'param_name' => 'css_tablet_portrait',
          'group' => esc_html__( 'Tablet Portrait', 'keydesign' )
        ),
        array(
          'type' => 'css_editor',
          'heading' => esc_html__( 'Mobile Options', 'keydesign' ),
          'param_name' => 'css_mobile',
          'group' => esc_html__( 'Mobile', 'keydesign' )
        ),
      );

      foreach($base_css_editor as $base_item) {
          foreach($attributes_css_editor as $attribute_item) {
            vc_add_param( $base_item, $attribute_item );
          }
      }
      $base_responsive_options = array( 'vc_column', 'vc_column_inner' );

      foreach( $base_responsive_options as $base_item ) {
        vc_remove_param( $base_item, 'width' );
        vc_remove_param( $base_item, 'offset' );
      }

      $attributes_responsive_options = array(
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Width', 'keydesign' ),
          'param_name' => 'width',
          'value' => array(
            esc_html__( '1 column - 1/12', 'keydesign' ) => '1/12',
            esc_html__( '2 columns - 1/6', 'keydesign' ) => '1/6',
            esc_html__( '3 columns - 1/4', 'keydesign' ) => '1/4',
            esc_html__( '4 columns - 1/3', 'keydesign' ) => '1/3',
            esc_html__( '5 columns - 5/12', 'keydesign' ) => '5/12',
            esc_html__( '6 columns - 1/2', 'keydesign' ) => '1/2',
            esc_html__( '7 columns - 7/12', 'keydesign' ) => '7/12',
            esc_html__( '8 columns - 2/3', 'keydesign' ) => '2/3',
            esc_html__( '9 columns - 3/4', 'keydesign' ) => '3/4',
            esc_html__( '10 columns - 5/6', 'keydesign' ) => '5/6',
            esc_html__( '11 columns - 11/12', 'keydesign' ) => '11/12',
            esc_html__( '12 columns - 1/1', 'keydesign' ) => '1/1',
            esc_html__( '20% - 1/5', 'keydesign' ) => '1/5',
            esc_html__( '40% - 2/5', 'keydesign' ) => '2/5',
            esc_html__( '60% - 3/5', 'keydesign' ) => '3/5',
            esc_html__( '80% - 4/5', 'keydesign' ) => '4/5',
          ),
          'group' => esc_html__( 'Responsive Options', 'keydesign' ),
          'description' => esc_html__( 'Select column width.', 'keydesign' ),
          'std' => '1/1',
        ),
        array(
          'type' => 'column_offset',
          'heading' => esc_html__( 'Responsiveness', 'keydesign' ),
          'param_name' => 'offset',
          'group' => esc_html__( 'Responsive Options', 'keydesign' ),
          'description' => esc_html__( 'Adjust column for different screen sizes. Control width, offset and visibility settings.', 'keydesign' ),
        ),
      );

      foreach($base_responsive_options as $base_item) {
          foreach($attributes_responsive_options as $attribute_item) {
            vc_add_param( $base_item, $attribute_item );
          }
      }

      // Add parameters to vc_row_inner

      $attributes_inner_row = array(
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Row stretch', 'keydesign' ),
          'param_name' => 'full_width',
          'value' => array(
            esc_html__( 'Default', 'keydesign' ) => '',
            esc_html__( 'Contained', 'keydesign' ) => 'inner_row_contained',
          ),
          'description' => esc_html__( 'Select stretching options for inner row. The default value will inherit the parent width.', 'keydesign' ),
          'weight' => 1,
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Main color background overlay', 'keydesign' ),
          'param_name' => 'kd_background_overlay',
          'description' => esc_html__( 'If checked the row will take the theme primary color with opacity as background.', 'keydesign' ),
          'group' => esc_html__( 'Background', 'keydesign' ),
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Fixed background', 'keydesign' ),
          'param_name' => 'kd_fixed_background',
          'description' => esc_html__( 'If checked the background image stays fixed.', 'keydesign' ),
          'group' => esc_html__( 'Background', 'keydesign' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Background image position', 'keydesign' ),
          'param_name' => 'kd_background_image_position',
          'value' =>	array(
              'Top' => 'vc_row-bg-position-top',
              'Center' => 'vc_row-bg-position-center',
              'Bottom' => 'vc_row-bg-position-bottom',
          ),
          'save_always' => true,
          'group' => esc_html__( 'Background', 'keydesign' ),
        ),
      );

      foreach ( $attributes_inner_row as $attribute ) {
        vc_add_param( 'vc_row_inner', $attribute );
      }

      //Add parameters to vc_row

      $attributes_row = array(
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Main color background overlay', 'keydesign' ),
          'param_name' => 'kd_background_overlay',
          'description' => esc_html__( 'If checked the row will take the theme primary color with opacity as background.', 'keydesign' ),
          'group' => esc_html__( 'Background', 'keydesign' ),
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Fixed background', 'keydesign' ),
          'param_name' => 'kd_fixed_background',
          'description' => esc_html__( 'If checked the background image stays fixed.', 'keydesign' ),
          'group' => esc_html__( 'Background', 'keydesign' ),
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Image overlay', 'keydesign' ),
          'param_name' => 'kd_image_overlay',
          'description' => esc_html__( 'If checked a layer will be applied over the row background image.', 'keydesign' ),
          'group' => esc_html__( 'Background', 'keydesign' ),
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Box shadow', 'keydesign' ),
          'param_name' => 'kd_row_shadow',
          'description' => esc_html__( 'If checked an outer shadow effect will be applied on the row.', 'keydesign' ),
          'group' => esc_html__( 'Background', 'keydesign' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Background image position', 'keydesign' ),
          'param_name' => 'kd_background_image_position',
          'value' =>	array(
              'Top' => 'vc_row-bg-position-top',
              'Center' => 'vc_row-bg-position-center',
              'Bottom' => 'vc_row-bg-position-bottom',
          ),
          'save_always' => true,
          'group' => esc_html__( 'Background', 'keydesign' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__('Overlay color', 'keydesign'),
          'param_name' => 'kd_image_overlay_color',
          'value' => '',
          'dependency' => array(
             'element' => 'kd_image_overlay',
             'value'	=> 'true',
          ),
          'group' => esc_html__( 'Background', 'keydesign' ),
        ),
        array(
          'type' => 'kd_param_title',
          'text' => 'Top separator',
          'description' => esc_html__( 'Configure top row separator.', 'keydesign' ),
          'param_name' => 'top_section_title',
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Enable top separator', 'keydesign' ),
          'param_name' => 'kd_top_separator',
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Style', 'keydesign' ),
          'param_name' => 'kd_top_separator_style',
          'value' =>	array(
              'Rounded up' => 'rounded-up',
              'Rounded down' => 'rounded-down',
              'Skew left' => 'skew-left',
              'Skew right' => 'skew-right',
              'Big triangle down' => 'arrow-down',
              'Big triangle up' => 'arrow-up',
              'Big triangle left' => 'triangle-left',
              'Big triangle right' => 'triangle-right',
              'Small triangle center' => 'small-triangle',
              'Waves - static' => 'static-waves',
          ),
          'edit_field_class' => 'vc_col-sm-6',
          'dependency' => array(
             'element' => 'kd_top_separator',
             'value'	=> 'true',
          ),
          'save_always' => true,
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__('Background', 'keydesign'),
          'param_name' => 'kd_top_separator_bg',
          'edit_field_class' => 'vc_col-sm-6',
          'dependency' => array(
             'element' => 'kd_top_separator',
             'value'	=> 'true',
          ),
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Flip horizontally', 'keydesign' ),
          'param_name' => 'kd_top_separator_flip_y',
          'dependency' => array(
             'element' => 'kd_top_separator_style',
             'value'	=> 'static-waves',
          ),
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Height', 'keydesign' ),
          'param_name' => 'kd_top_separator_height',
          'value' =>	array(
              'Small (50px)' => 'separator-height-small',
              'Medium (100px)' => 'separator-height-medium',
              'Large (150px)' => 'separator-height-large',
          ),
          'dependency' => array(
             'element' => 'kd_top_separator',
             'value'	=> 'true',
          ),
          'save_always' => true,
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
        array(
          'type' => 'kd_param_title',
          'text' => 'Bottom separator',
          'description' => esc_html__( 'Configure bottom row separator.', 'keydesign' ),
          'param_name' => 'bottom_section_title',
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Enable bottom separator', 'keydesign' ),
          'param_name' => 'kd_bottom_separator',
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Style', 'keydesign' ),
          'param_name' => 'kd_bottom_separator_style',
          'value' =>	array(
              'Rounded up' => 'rounded-up',
              'Rounded down' => 'rounded-down',
              'Skew left' => 'skew-left',
              'Skew right' => 'skew-right',
              'Big triangle down' => 'arrow-down',
              'Big triangle up' => 'arrow-up',
              'Big triangle left' => 'triangle-left',
              'Big triangle right' => 'triangle-right',
              'Small triangle center' => 'small-triangle',
              'Waves - static' => 'static-waves',
              'Waves - animated' => 'waves',
          ),
          'edit_field_class' => 'vc_col-sm-6',
          'dependency' => array(
             'element' => 'kd_bottom_separator',
             'value'	=> 'true',
          ),
          'save_always' => true,
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__('Background', 'keydesign'),
          'param_name' => 'kd_bottom_separator_bg',
          'edit_field_class' => 'vc_col-sm-6',
          'dependency' => array(
             'element' => 'kd_bottom_separator',
             'value'	=> 'true',
          ),
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
        array(
          'type' => 'checkbox',
          'heading' => esc_html__( 'Flip horizontally', 'keydesign' ),
          'param_name' => 'kd_bottom_separator_flip_y',
          'dependency' => array(
             'element' => 'kd_bottom_separator_style',
             'value'	=> 'static-waves',
          ),
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Height', 'keydesign' ),
          'param_name' => 'kd_bottom_separator_height',
          'value' =>	array(
              'Small (50px)' => 'separator-height-small',
              'Medium (100px)' => 'separator-height-medium',
              'Large (150px)' => 'separator-height-large',
          ),
          'dependency' => array(
             'element' => 'kd_bottom_separator',
             'value'	=> 'true',
          ),
          'save_always' => true,
          'group' => esc_html__( 'Separator', 'keydesign' ),
        ),
      );

      foreach ($attributes_row as $attribute) {
        vc_add_param( 'vc_row', $attribute );
      }

    }
}

/* Load PhotoSwipe markup */
if ( ! function_exists( 'keydesign_photoswipe' ) ) {
  function keydesign_photoswipe() {
    if ( file_exists( dirname( __FILE__ ) . '/photoswipe.php' ) ) {
      require_once dirname( __FILE__ ) . '/photoswipe.php';
    }
  }
}

if ( ! function_exists( 'build_vc_shortcode_callback' ) ) {
  function build_vc_shortcode_callback( $css_old, $id, $recurse=false ) {

    if ( $recurse == true ) {
      $content = $css_old;
    } else {
      $post = get_post( $id );
      if ( is_object( $post ) ) {
        $content = $post->post_content;
      } else {
        $content = $css_old;
      }
    }

    $css = '';

    if ( ! preg_match( '/\s*(\.[^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $content ) ) {
      return $css;
    }

    WPBMap::addAllMappedShortcodes();
    preg_match_all( '/' . get_shortcode_regex() . '/', $content, $shortcodes );
    foreach ( $shortcodes[2] as $index => $tag ) {
      $shortcode = WPBMap::getShortCode( $tag );
      $attr_array = shortcode_parse_atts( trim( $shortcodes[3][ $index ] ) );
      if ( isset( $shortcode['params'] ) && ! empty( $shortcode['params'] ) ) {
        foreach ( $shortcode['params'] as $param ) {
          if ( isset( $param['type'] ) && 'css_editor' === $param['type'] && isset( $attr_array[ $param['param_name'] ] ) && 'css_tablet_landscape' === $param['param_name'] ) {
            $css .= '@media (max-width: 1269px) and (min-width: 992px) {' . $attr_array[ $param['param_name'] ] . '}';
          } elseif ( isset( $param['type'] ) && 'css_editor' === $param['type'] && isset( $attr_array[ $param['param_name'] ] ) && 'css_tablet_portrait' === $param['param_name'] ) {
            $css .= '@media (max-width: 991px) and (min-width: 768px) {' . $attr_array[ $param['param_name'] ] . '}';
          } elseif ( isset( $param['type'] ) && 'css_editor' === $param['type'] && isset( $attr_array[ $param['param_name'] ] ) && 'css_mobile' === $param['param_name'] ) {
            $css .= '@media (max-width: 767px) {' . $attr_array[ $param['param_name'] ] . '}';
          } elseif ( isset( $param['type'] ) && 'css_editor' === $param['type'] && isset( $attr_array[ $param['param_name'] ] ) ) {
            $css .= $attr_array[ $param['param_name'] ];
          }
        }
      }
    }

    foreach ( $shortcodes[5] as $shortcode_content ) {
      $css .= build_vc_shortcode_callback( $shortcode_content, $id, true );
    }
    return $css;
  }
}
add_filter('vc_base_build_shortcodes_custom_css', 'build_vc_shortcode_callback', 10, 2);

// Overwrite VC Border Radius dropdown options
function keydesign_getBorderRadiusOptions() {
  $radiuses = array(
    '' => esc_html__( 'None', 'keydesign' ),
    '0px' => '0px',
    '1px' => '1px',
    '2px' => '2px',
    '3px' => '3px',
    '4px' => '4px',
    '5px' => '5px',
    '10px' => '10px',
    '15px' => '15px',
    '20px' => '20px',
    '25px' => '25px',
    '30px' => '30px',
    '35px' => '35px',
    '40px' => '40px',
    '45px' => '45px',
    '50px' => '50px',
  );
  return $radiuses;
}
add_filter('vc_css_editor_border_radius_options_data', 'keydesign_getBorderRadiusOptions');

/* Contact form 7 shortcode init */
add_action( 'plugins_loaded', 'kd_init_vendor_cf7' );
function kd_init_vendor_cf7() {
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
  if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) || defined( 'WPCF7_PLUGIN' ) ) {
    require_once ( plugin_dir_path( __FILE__ ).'elements/vendors/vendor-contact-form-7.php' );
  } // if contact form7 plugin active
}
