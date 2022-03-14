<?php

if ( !class_exists('KD_ELEM_HOTSPOT') ) {

    class KD_ELEM_HOTSPOT extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action( 'init', array( $this, 'kd_hotspot_init' ) );
            add_shortcode( 'tek_hotspot', array( $this, 'kd_hotspot_shrt' ) );
        }

        // Element configuration

        function kd_hotspot_init() {
            if ( function_exists( 'vc_map' ) ) {
                vc_map(
        					array(
        						"name" => esc_html__("Hotspot", "keydesign"),
        						"description" => esc_html__("Hotspot with highly customizable options.", "keydesign"),
        						"base" => "tek_hotspot",
        						"class" => "",
        						"icon" => plugins_url('assets/element_icons/hotspot.png', dirname(__FILE__)),
        						"category" => esc_html__("KeyDesign Elements", "keydesign"),
        						"params" => array(
        							array(
        								"type" => "textfield",
        								"class" => "kd-back-desc",
        								"heading" => esc_html__("Hotspot name", "keydesign"),
        								"param_name" => "hotspot_name",
        								"value" => "",
        								"admin_label" => true,
        								"description" => esc_html__("This field is optional, used for admin labeling only.", "keydesign"),
        								"group" => esc_html__("Hotspot", "keydesign"),
        							),
        							array(
        								"type" => "textfield",
        								"heading" => esc_html__("Horizontal position (%)", "keydesign"),
        								"param_name" => "horizontal_position",
        								"value" => "",
        								"group" => esc_html__("Hotspot", "keydesign"),
        							),
        							array(
        								"type" => "textfield",
        								"heading" => esc_html__("Vertical position (%)", "keydesign"),
        								"param_name" => "vertical_position",
        								"value" => "",
        								"group" => esc_html__("Hotspot", "keydesign"),
        							),
        							array(
        								"type" => "dropdown",
        								"heading" => esc_html__("Type", "keydesign"),
        								"param_name" => "hotspot_type",
        								"value" => array(
        									"Text" => "text",
        									"Icon" => "icon",
        								),
        								"save_always" => true,
        								"group" => esc_html__( "Hotspot", "keydesign" ),
        							),
        							array(
        								"type" => "textfield",
        								"heading" => esc_html__("Text", "keydesign"),
        								"param_name" => "hotspot_text",
        								"value" => "",
        								"dependency" =>	array(
        									"element" => "hotspot_type",
        									"value" => array("text")
        								),
        								"group" => esc_html__("Hotspot", "keydesign"),
        							),
        							array(
        								"type" => "iconpicker",
        								"heading" => esc_html__( "Icon", "keydesign" ),
        								"param_name" => "icon_iconsmind",
        								"settings" => array(
        									"type" => "iconsmind",
        									"iconsPerPage" => 50,
                                		),
        								"dependency" => array(
        									"element" => "hotspot_type",
        									"value" => "icon",
        								),
        								"description" => esc_html__( "Select icon from library.", "keydesign" ),
        								"group" => esc_html__( "Hotspot", "keydesign" ),
        							),
        							array(
        								"type" => "colorpicker",
        								"heading" => esc_html__("Background color", "keydesign"),
        								"param_name" => "hotspot_background",
        								"value" => "",
        								"description" => esc_html__("Select hotspot background color. If none selected, the default theme color will be used.", "keydesign"),
        								"group" => esc_html__( "Hotspot", "keydesign" ),
        							),
        							array(
        								"type" => "colorpicker",
        								"heading" => esc_html__("Content color", "keydesign"),
        								"param_name" => "hotspot_color",
        								"value" => "",
        								"description" => esc_html__("Select hotspot content color. If none selected, the default theme color will be used.", "keydesign"),
        								"group" => esc_html__( "Hotspot", "keydesign" ),
        							),
        							array(
        								"type" => "checkbox",
        								"heading" => esc_html__( "Enable link?", "keydesign" ),
        								"param_name" => "hotspot_link",
        								"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
        								"group" => esc_html__("Hotspot", "keydesign"),
        							),
        							array(
        								"type" => "href",
        								"heading" => esc_html__("Link URL", "keydesign"),
        								"param_name" => "hotspot_url",
        								"value" => "",
        								"description" => esc_html__("Enter URL (Note: parameters like \"mailto:\" are also accepted).", "keydesign"),
        								"dependency" => array(
        								   "element" => "hotspot_link",
        								   "value"	=> array( "yes" ),
        								),
        								"group" => esc_html__( "Hotspot", "keydesign" ),
        							),
        							array(
        								"type" => "checkbox",
        								"heading" => esc_html__( "Open link in a new tab?", "keydesign" ),
        								"param_name" => "hotspot_link_target",
        								"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
        								"dependency" => array(
        								   "element" => "hotspot_link",
        								   "value"	=> array( "yes" ),
        								),
                        "group" => esc_html__( "Hotspot", "keydesign" ),
        							),
        							array(
        								"type" => "checkbox",
        								"heading" => esc_html__( "Enable pulse effect?", "keydesign" ),
        								"param_name" => "hotspot_pulse",
        								"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
        								"group" => esc_html__("Hotspot", "keydesign"),
        							),
        							array(
        								"type" => "checkbox",
        								"heading" => esc_html__( "Enable tooltip?", "keydesign" ),
        								"param_name" => "enable_tooltip",
        								"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
        								"group" => esc_html__("Tooltip", "keydesign"),
        							),
                      array(
        								"type" => "textfield",
        								"heading" => esc_html__("Title", "keydesign"),
        								"param_name" => "tooltip_title",
        								"value" => "",
                        "dependency" => array(
        								   "element" => "enable_tooltip",
        								   "value"	=> array( "yes" ),
        								),
        								"group" => esc_html__( "Tooltip", "keydesign" ),
        							),
        							array(
        								"type" => "textarea",
        								"heading" => esc_html__("Content", "keydesign"),
        								"param_name" => "tooltip_content",
        								"value" => "",
                        "dependency" => array(
        								   "element" => "enable_tooltip",
        								   "value"	=> array( "yes" ),
        								),
        								"group" => esc_html__( "Tooltip", "keydesign" ),
        							),
        							array(
        								"type" => "dropdown",
        								"heading" => esc_html__("Text alignment", "keydesign"),
        								"param_name" => "tooltip_text_alignment",
        								"value" => array(
        									"Left" => "tooltip-text-left",
        									"Center" => "tooltip-text-center",
        								),
        								"save_always" => true,
                        "dependency" => array(
        								   "element" => "enable_tooltip",
        								   "value"	=> array( "yes" ),
        								),
        								"group" => esc_html__( "Tooltip", "keydesign" ),
        							),
        							array(
        								"type" => "dropdown",
        								"heading" => esc_html__("Position", "keydesign"),
        								"param_name" => "tooltip_position",
        								"value" => array(
        									"Top" => "tooltip-top",
        									"Right" => "tooltip-right",
        									"Bottom" => "tooltip-bottom",
        									"Left" => "tooltip-left",
        								),
        								"save_always" => true,
                        "dependency" => array(
        								   "element" => "enable_tooltip",
        								   "value"	=> array( "yes" ),
        								),
        								"group" => esc_html__( "Tooltip", "keydesign" ),
        							),
                      array(
        								"type" => "checkbox",
        								"heading" => esc_html__( "Disable on mobile", "keydesign" ),
        								"param_name" => "disable_mobile",
        								"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
        								"group" => esc_html__("Responsive", "keydesign"),
        							),
                      array(
        								"type" => "checkbox",
        								"heading" => esc_html__( "Disable on tablet", "keydesign" ),
        								"param_name" => "disable_tablet",
        								"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
        								"group" => esc_html__("Responsive", "keydesign"),
        							),
        							array(
        								"type" => "dropdown",
        								"class" => "",
        								"heading" => esc_html__("CSS Animation", "keydesign"),
        								"param_name" => "css_animation",
        								"value" => array(
        									"None" => "",
        									"Fade In" => "kd-animated fadeIn",
        									"Fade In Down" => "kd-animated fadeInDown",
        									"Fade In Left" => "kd-animated fadeInLeft",
        									"Fade In Right" => "kd-animated fadeInRight",
        									"Fade In Up" => "kd-animated fadeInUp",
        									"Zoom In" => "kd-animated zoomIn",
        								),
        								"save_always" => true,
        								"admin_label" => true,
        								"description" => esc_html__("Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).", "keydesign"),
        								"group" => esc_html__( "Extras", "keydesign" ),
        							),
        							array(
        								"type" => "dropdown",
        								"class" => "",
        								"heading" => esc_html__("Animation delay", "keydesign"),
        								"param_name" => "animation_delay",
        								"value" => array(
        									"0 ms" => "",
        									"200 ms" => "200",
        									"400 ms" => "400",
        									"600 ms" => "600",
        									"800 ms" => "800",
        									"1 s" => "1000",
        								),
        								"save_always" => true,
        								"admin_label" => true,
        								"dependency" =>	array(
        									"element" => "css_animation",
        									"value" => array("kd-animated fadeIn", "kd-animated fadeInDown", "kd-animated fadeInLeft", "kd-animated fadeInRight", "kd-animated fadeInUp", "kd-animated zoomIn")
        								),
        								"group" => esc_html__( "Extras", "keydesign" ),
        							),
        							array(
        								"type" => "textfield",
        								"heading" => esc_html__("Extra class name", "keydesign"),
        								"param_name" => "extra_class",
        								"value" => "",
        								"description" => esc_html__("If you wish to style this particular content element differently, then use this field to add any number of CSS classes, separated by spaces, which can be used to asssign custom CSS styles.", "keydesign"),
        								"group" => esc_html__( "Extras", "keydesign" ),
        							),
        						)
	                )
                );
              }
            }

    // Front-end rendering

		public function kd_hotspot_shrt( $atts, $content = null ) {

			$output = $elem_id = $classes = $hotspot_content = $animation_delay = '';

			extract( shortcode_atts( array(
				'hotspot_name' => '',
				'horizontal_position' => '',
				'vertical_position' => '',
				'hotspot_type' => '',
				'hotspot_text' => '',
				'icon_iconsmind' => '',
				'hotspot_background' => '',
				'hotspot_color' => '',
				'hotspot_link' => '',
				'hotspot_url' => '',
				'hotspot_link_target' => '',
				'hotspot_pulse' => '',
				'enable_tooltip' => '',
				'tooltip_title' => '',
				'tooltip_content' => '',
				'tooltip_text_alignment' => '',
				'tooltip_position' => '',
        'disable_mobile' => '',
				'disable_tablet' => '',
				'css_animation' => '',
				'animation_delay' => '',
				'extra_class' => '',
			), $atts ) );

      $elem_id = uniqid('hotspot-');

			$classes = array( 'hotspot-item', $elem_id );

      if ( !empty( $hotspot_pulse ) ) {
				$classes[] = 'enable-pulse';
			}

      if ( !empty( $disable_mobile ) ) {
				$classes[] = 'hidden-xs';
			}

      if ( !empty( $disable_tablet ) ) {
				$classes[] = 'hidden-sm';
			}

			if ( !empty( $enable_tooltip ) ) {
				$classes[] = $tooltip_position;
				$classes[] = $tooltip_text_alignment;
			}

			if ( '' != $css_animation ) {
				$classes[] = $css_animation;
			}

			if ( '' != $extra_class ) {
				$classes[] = $extra_class;
			}

      $hotspot_classes = implode( ' ', $classes );

			if ( $hotspot_type == 'icon' ) {
				$exploded = explode( ' ', $icon_iconsmind );
				$iconsmind_cat = end( $exploded );
				$font_file_name = substr( strstr( $iconsmind_cat, '-' ), strlen( '-' ) );

				if ( strpos( $exploded[0], 'iconsmind-' ) === 0 ) {
					wp_enqueue_style( $font_file_name.'-im-fonts-woff', plugin_dir_url( __DIR__ ).'assets/css/iconsmind/fonts/'.$font_file_name.'.woff' );
					wp_enqueue_style( $iconsmind_cat, plugin_dir_url( __DIR__ ).'assets/css/iconsmind/'.$iconsmind_cat.'.css' );
				} elseif ( strpos( $exploded[1], 'fa-' ) === 0 ) {
					wp_enqueue_style( 'font-awesome' );
				}

				if ( strlen( $icon_iconsmind ) > 0 ) {
					$hotspot_content = '<i class="'. esc_attr( $icon_iconsmind ) .'"></i>';
				}
      }

			if ( $hotspot_type == 'text' && $hotspot_text != '' ) {
				$hotspot_content = '<span class="hotspot-text">'. esc_html( $hotspot_text ) .'</span>';
			}

			if ( !empty( $hotspot_link ) && $hotspot_url != '' ) {
				if ( !empty( $hotspot_link_target ) ) {
					$link_target = '_blank';
				} else {
					$link_target = '_self';
				}
				$hotspot_content = '<a href="'. $hotspot_url .'" target="'.$link_target.'">'. $hotspot_content .'</a>';
			}

			// Animation delay
      if ( $animation_delay ) {
        $animation_delay = 'data-animation-delay='.$animation_delay;
      }

			$output .='<style id="hotspot-style">';
  				if ( '' != $horizontal_position ) {
  					$output .= '.' . $elem_id . '.hotspot-item { top: '.esc_attr( $vertical_position ).'; }';
  				}
				if ( '' != $vertical_position ) {
  					$output .= '.' . $elem_id . '.hotspot-item { left: '.esc_attr( $horizontal_position ).'; }';
  				}
				if ( '' != $hotspot_background ) {
  					$output .= '.' . $elem_id . '.hotspot-item .hotspot-wrapper { background-color: '.esc_attr( $hotspot_background ).'; }';
            $output .= '.' . $elem_id . '.hotspot-item.enable-pulse .hotspot-wrapper:before { background-color: '.esc_attr( $hotspot_background ).'; }';
  				}
				if ( $hotspot_type == 'icon' && '' != $hotspot_color ) {
  					$output .= '.' . $elem_id . '.hotspot-item .hotspot-wrapper i { color: '.esc_attr( $hotspot_color ).'; }';
  				}
				if ( $hotspot_type == 'text' && '' != $hotspot_color ) {
  					$output .= '.' . $elem_id . '.hotspot-item .hotspot-wrapper span { color: '.esc_attr( $hotspot_color ).'; }';
  				}
			$output .='</style>';

			$output .= '<div class="'.esc_attr( trim( $hotspot_classes ) ).'" '. $animation_delay .'>
				<div class="hotspot-wrapper">'.$hotspot_content.'</div>';

				if ( !empty( $enable_tooltip ) ) {
					$output .='<div class="hotspot-tooltip">';
            if ( '' != $tooltip_title ) {
              $output .='<h4>'. $tooltip_title .'</h4>';
            }
            if ( '' != $tooltip_content ) {
  						$output .='<p>'. $tooltip_content .'</p>';
            }
					$output .='</div>';
				}

			$output .='</div>';

			return $output;
		}
	}
}

if ( class_exists( 'KD_ELEM_HOTSPOT' ) ) {
    $KD_ELEM_HOTSPOT = new KD_ELEM_HOTSPOT;
}

?>
