<?php

if (!class_exists('KD_ELEM_TITLE_LABEL')) {

    class KD_ELEM_TITLE_LABEL extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_title_label_init'));
            add_shortcode('tek_title_label', array($this, 'kd_title_label_shrt'));
        }

        // Element configuration in admin

        function kd_title_label_init() {
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Title label", "keydesign"),
                    "description" => esc_html__("Custom title label with theme primary color.", "keydesign"),
                    "base" => "tek_title_label",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/title-label.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Primary title", "keydesign"),
                            "param_name" => "tl_primary_title",
                            "value" => "",
                            "description" => esc_html__("Add primary title.", "keydesign"),
                        ),
                        array(
                             "type"	=>	"dropdown",
                             "class" =>	"",
                             "heading" => esc_html__("Primary title link settings", "keydesign"),
                             "param_name" => "tl_primary_link_settings",
                             "value" =>	array(
                                    esc_html__( 'Off', 'keydesign' ) => 'link-off',
                                    esc_html__( 'On', 'keydesign' )	=> 'link-on',
                                ),
                             "save_always" => true,
                             "description" => esc_html__("Add link to primary title.", "keydesign"),
                        ),
                        array(
                            "type" => "href",
                            "class" => "",
                            "heading" => esc_html__("Primary title link URL", "keydesign"),
                            "param_name" => "tl_primary_link_url",
                            "value" => "",
                            "description" => esc_html__("Enter URL (Note: parameters like \"mailto:\" are also accepted).", "keydesign"),
                            "dependency" => array(
                               "element" => "tl_primary_link_settings",
                               "value"	=> array( "link-on" ),
                           ),
                        ),
                        array(
                      			'type' => 'dropdown',
                      			'heading' => __( 'Primary title link target', 'keydesign' ),
                      			'param_name' => 'tl_primary_link_target',
                            "value" => array(
            									esc_html__( 'Same window', 'keydesign' ) => '_self',
            									esc_html__( 'New window', 'keydesign' ) => '_blank',
            								),
                            "save_always" => true,
                            "dependency" => array(
                               "element" => "tl_primary_link_settings",
                               "value"	=> array( "link-on" ),
                           ),
                    		),
		                    array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Secondary title", "keydesign"),
                            "param_name" => "tl_secondary_title",
                            "value" => "",
                            "description" => esc_html__("Add secondary title.", "keydesign"),
                        ),
                        array(
                             "type"	=>	"dropdown",
                             "class" =>	"",
                             "heading" => esc_html__("Secondary title link settings", "keydesign"),
                             "param_name" => "tl_secondary_link_settings",
                             "value" =>	array(
                                    esc_html__( 'Off', 'keydesign' ) => 'link-off',
                                    esc_html__( 'On', 'keydesign' )	=> 'link-on',
                                ),
                             "save_always" => true,
                             "description" => esc_html__("Add link to secondary title.", "keydesign"),
                        ),
                        array(
                            "type" => "href",
                            "class" => "",
                            "heading" => esc_html__("Secondary title link URL", "keydesign"),
                            "param_name" => "tl_secondary_link_url",
                            "value" => "",
                            "description" => esc_html__("Enter URL (Note: parameters like \"mailto:\" are also accepted).", "keydesign"),
                            "dependency" => array(
                               "element" => "tl_secondary_link_settings",
                               "value"	=> array( "link-on" ),
                           ),
                        ),
                        array(
                      			'type' => 'dropdown',
                      			'heading' => __( 'Secondary title link target', 'keydesign' ),
                      			'param_name' => 'tl_secondary_link_target',
                            "value" => array(
            									esc_html__( 'Same window', 'keydesign' ) => '_self',
            									esc_html__( 'New window', 'keydesign' ) => '_blank',
            								),
                            "save_always" => true,
                            "dependency" => array(
                               "element" => "tl_secondary_link_settings",
                               "value"	=> array( "link-on" ),
                           ),
                    		),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Text align","keydesign"),
                            "param_name" => "tl_text_align",
                            "value" => array(
                                "Left" => "text-left",
                                "Center" => "text-center",
                                "Right" => "text-right",
                            ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select element alignment.", "keydesign")
                        ),
                        array(
                            'type' => 'css_editor',
                            'heading' => esc_html__( 'Css', 'keydesign' ),
                            'param_name' => 'css',
                            'group' => esc_html__( 'Design options', 'keydesign' ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("CSS Animation", "keydesign"),
                            "param_name" => "css_animation",
                            "value" => array(
                                "No"              => "",
                                "Fade In"         => "kd-animated fadeIn",
                                "Fade In Down"    => "kd-animated fadeInDown",
                                "Fade In Left"    => "kd-animated fadeInLeft",
                                "Fade In Right"   => "kd-animated fadeInRight",
                                "Fade In Up"      => "kd-animated fadeInUp",
                                "Zoom In"         => "kd-animated zoomIn",
                            ),
                            "description" => esc_html__("Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).", "keydesign"),
                            "admin_label" => true,
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Animation delay", "keydesign"),
                            "param_name" => "css_animation_delay",
                            "value" => array(
                                "0 ms"              => "",
                                "200 ms"            => "200",
                                "400 ms"            => "400",
                                "600 ms"            => "600",
                                "800 ms"            => "800",
                                "1 s"               => "1000",
                            ),
                            "dependency" =>	array(
                                "element" => "css_animation",
                                "value" => array("kd-animated fadeIn", "kd-animated fadeInDown", "kd-animated fadeInLeft", "kd-animated fadeInRight", "kd-animated fadeInUp", "kd-animated zoomIn")
                            ),
                            "description" => esc_html__("Enter animation delay in ms", "keydesign"),
                            "admin_label" => true,
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Extra class name", "keydesign"),
                            "param_name" => "tl_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                    )
                ));
            }
        }



		// Render the element on front-end

        public function kd_title_label_shrt($atts, $content = null) {
            extract(shortcode_atts(array(
                'tl_primary_title' => '',
                'tl_primary_link_settings' => '',
                'tl_primary_link_url' => '',
                'tl_primary_link_target' => '',
                'tl_secondary_title' => '',
                'tl_secondary_link_settings' => '',
                'tl_secondary_link_url' => '',
                'tl_secondary_link_target' => '',
                'tl_text_align' => '',
                'css_animation' => '',
                'css_animation_delay' => '',
                'tl_extra_class' => '',
                'css' => '',
            ), $atts));

            $output = $wrapper_class = $missing_primary_title = $missing_secondary_title = $animation_delay = '';

            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

            if ( '' == $tl_primary_title ) {
              $missing_primary_title = 'no-primary-title';
            }

            if ( '' == $tl_secondary_title ) {
              $missing_secondary_title = 'no-secondary-title';
            }

            // Animation delay
            if ( $css_animation_delay ) {
                $animation_delay = 'data-animation-delay='.$css_animation_delay;
            }

            $wrapper_class = implode(' ', array('kd-title-label', $tl_text_align, $missing_primary_title, $missing_secondary_title, $tl_extra_class, $css_animation, $css_class));

            $output .= '<div class="'.trim($wrapper_class).'" '.$animation_delay.'>';
              if ( '' != $tl_primary_title ) {
                if ( $tl_primary_link_settings == "link-on" && $tl_primary_link_url != '' ) {
                  $output .= '<a href="'.$tl_primary_link_url.'" target="'.$tl_primary_link_target.'">';
                }

        				$output .= '<span class="kd-title-label-solid">'.$tl_primary_title.'</span>';

                if ( $tl_primary_link_settings == "link-on" && $tl_primary_link_url != '' ) {
                  $output .= '</a>';
                }
              }

              if ( '' != $tl_secondary_title ) {
                if ( $tl_secondary_link_settings == "link-on" && $tl_secondary_link_url != '' ) {
                  $output .= '<a href="'.$tl_secondary_link_url.'" target="'.$tl_secondary_link_target.'">';
                }

        				$output .= '<span class="kd-title-label-transparent">'.$tl_secondary_title.'</span>';

                if ( $tl_secondary_link_settings == "link-on" && $tl_secondary_link_url != '' ) {
                  $output .= '</a>';
                }
              }
      			$output .= '</div>';

            return $output;

        }
    }
}

if (class_exists('KD_ELEM_TITLE_LABEL')) {
    $KD_ELEM_TITLE_LABEL = new KD_ELEM_TITLE_LABEL;
}

?>
