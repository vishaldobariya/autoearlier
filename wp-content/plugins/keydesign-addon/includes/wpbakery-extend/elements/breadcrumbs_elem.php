<?php

if (!class_exists('KD_ELEM_BREADCRUMBS')) {

    class KD_ELEM_BREADCRUMBS extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_breadcrumbs_init'));
            add_shortcode('tek_breadcrumbs', array($this, 'kd_breadcrumbs_shrt'));
        }

        // Element configuration in admin

        function kd_breadcrumbs_init() {
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Breadcrumbs", "keydesign"),
                    "description" => esc_html__("Display breadcrumb navigation.", "keydesign"),
                    "base" => "tek_breadcrumbs",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/breadcrumbs.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(
                        array(
                          "type" => "kd_param_notice",
                          "text" => "<span style='display: block;'>This module requires the Breadcrumbs NavXT plugin.</span>",
                          "param_name" => "notification",
                          "edit_field_class" => "vc_column vc_col-sm-12",
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Alignment","keydesign"),
                            "param_name"	=>	"bcn_alignment",
                            "value"			=>	array(
                                "Left" => "bcn-left",
                                "Center" => "bcn-center",
                            ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select breadcrumbs text alignment.", "keydesign")
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Text color", "keydesign"),
                            "param_name" => "bcn_color",
                            "value" => "",
                            "description" => esc_html__("Select breadcrumbs text color. If none selected, the default theme colors will be used.", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("CSS Animation", "keydesign"),
                            "param_name" => "css_animation",
                            "value" => array(
                                "None"              => "",
                                "Fade In"         => "kd-animated fadeIn",
                                "Fade In Down"    => "kd-animated fadeInDown",
                                "Fade In Left"    => "kd-animated fadeInLeft",
                                "Fade In Right"   => "kd-animated fadeInRight",
                                "Fade In Up"      => "kd-animated fadeInUp",
                                "Zoom In"         => "kd-animated zoomIn",
                            ),
                            "save_always" => true,
                            "admin_label" => true,
                            "description" => esc_html__("Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                         ),

                         array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Animation Delay", "keydesign"),
                            "param_name" => "animation_delay",
                            "value" => array(
                                "0 ms"              => "",
                                "200 ms"            => "200",
                                "400 ms"            => "400",
                                "600 ms"            => "600",
                                "800 ms"            => "800",
                                "1 s"               => "1000",
                            ),
                            "dependency" => array(
                                  "element" => "css_animation",
                                  "value" => array ("kd-animated fadeIn", "kd-animated fadeInDown", "kd-animated fadeInLeft", "kd-animated fadeInRight", "kd-animated fadeInUp", "kd-animated zoomIn"),
                            ),
                            "save_always" => true,
                            "admin_label" => true,
                            "description" => esc_html__("Enter animation delay in ms.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Extra class name", "keydesign"),
                            "param_name" => "bcn_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                    )
                ));
            }
        }



		// Render the element on front-end

        public function kd_breadcrumbs_shrt($atts, $content = null) {
            extract(shortcode_atts(array(
                'bcn_alignment' => '',
                'bcn_color' => '',
                'css_animation' => '',
                'animation_delay' => '',
                'bcn_extra_class' => '',
            ), $atts));

            $output = '';

            // Animation delay
            if ( $animation_delay ) {
                $animation_delay = 'data-animation-delay='.$animation_delay;
            }

            $wrapper_class = implode( ' ', array( 'breadcrumbs', 'breadcrumbs-shortcode', $bcn_alignment, $css_animation, $bcn_extra_class ) );

      			if ( function_exists('bcn_display') ) {
              $output .= '<div '.( !empty( $bcn_color ) ? 'style="color:'.$bcn_color.';"' : '').' class="'.trim($wrapper_class).'" typeof="BreadcrumbList" vocab="https://schema.org/" '.$animation_delay.'>';
      				    $output .= bcn_display(true);
              $output .= '</div>';
      			}

            return $output;
        }
    }
}

if (class_exists('KD_ELEM_BREADCRUMBS')) {
    $KD_ELEM_BREADCRUMBS = new KD_ELEM_BREADCRUMBS;
}

?>
