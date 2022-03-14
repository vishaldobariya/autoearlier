<?php

if (!class_exists('KD_ELEM_SCROLL_DOWN')) {

    class KD_ELEM_SCROLL_DOWN extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_scrolldown_init'));
            add_shortcode('tek_scrolldown', array($this, 'kd_scrolldown_shrt'));
        }

        // Element configuration in admin

        function kd_scrolldown_init() {
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Scroll down button", "keydesign"),
                    "description" => esc_html__("Scroll down button with animated effect.", "keydesign"),
                    "base" => "tek_scrolldown",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/scroll-down.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Scroll to section ID", "keydesign"),
                            "param_name" => "sd_section_id",
                            "value" => "",
                            "admin_label" => true,
                            "description" => esc_html__("Enter the ID of the section you want to scroll. (eg. #section-slug-id)", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Icon design", "keydesign"),
                            "param_name" => "sd_icon_design",
                            "value" => array(
                                "Theme default" => "theme_default",
                                "Custom image" => "custom_image",
                            ),
                            "description" => esc_html__("Select icon design.", "keydesign"),
                            "save_always" => true,
                        ),

                        array(
                            "type" => "attach_image",
                            "class" => "",
                            "heading" => esc_html__("Custom image", "keydesign"),
                            "param_name" => "sd_custom_icon",
                            "value" => "",
                            "description" => esc_html__("Upload custom image.", "keydesign"),
                            "dependency" => array(
                                "element" => "sd_icon_design",
                                "value" => array("custom_image"),
                            ),
                            "save_always" => true,
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Icon color", "keydesign"),
                            "param_name" => "sd_icon_color",
                            "value" => "",
                            "dependency" => array(
                                "element" => "sd_icon_design",
                                "value" => array("theme_default"),
                            ),
                            "description" => esc_html__("Select icon color. If none selected, the default theme color will be used.", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button alignment", "keydesign"),
                            "param_name" => "sd_button_alignment",
                            "value" => array(
                                "Left" => "",
                                "Center" => "sd-align-center",
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select button alignment.", "keydesign"),
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
                                "No" => "",
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
                            "heading" => esc_html__("Animation Delay", "keydesign"),
                            "param_name" => "animation_delay",
                            "value" => array(
                                "0 ms" => "",
                                "200 ms" => "200",
                                "400 ms" => "400",
                                "600 ms" => "600",
                                "800 ms" => "800",
                                "1000 ms" => "1000",
                            ),
                            "dependency" => array(
                                  "element" => "css_animation",
                                  "value" => array ("kd-animated fadeIn", "kd-animated fadeInDown", "kd-animated fadeInLeft", "kd-animated fadeInRight", "kd-animated fadeInUp", "kd-animated zoomIn"),
                            ),
                            "save_always" => true,
                            "admin_label" => true,
                            "description" => esc_html__("Enter animation delay in ms", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Extra class name", "keydesign"),
                            "param_name" => "sd_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                    )
                ));
            }
        }



	      // Render the element on front-end

        public function kd_scrolldown_shrt($atts, $content = null) {
            extract(shortcode_atts(array(
                'sd_section_id' => '',
                'sd_icon_design' => '',
                'sd_custom_icon' => '',
                'sd_icon_color' => '',
                'sd_button_alignment' => '',
                'css' => '',
                'css_animation' => '',
                'animation_delay' => '',
                'sd_extra_class' => '',
            ), $atts));

            $output = $wrapper_class = $arrow_down_svg = $css_class = '';

            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

            // Custom image
            if ( '' != $sd_custom_icon ) {
              $image = wpb_getImageBySize($params = array(
                  'post_id' => NULL,
                  'attach_id' => $sd_custom_icon,
                  'thumb_size' => 'full',
                  'class' => ""
              ));
            }

            // Animation delay
            if ( $animation_delay ) {
              $animation_delay = 'data-animation-delay='.$animation_delay;
            }

            $wrapper_class = implode( ' ', array( 'scroll-down-wrapper', $sd_button_alignment, $css_animation, $css_class, $sd_extra_class ) );

            $output .= '<div class="'.trim($wrapper_class).'" '.$animation_delay.'>';
            if ( '' != $sd_section_id ) {
              if ( $sd_icon_design != 'custom_image' ) {
                $output .= '<a href="'.$sd_section_id.'" class="scroll-down-arrow btn-smooth-scroll" '.(!empty($sd_icon_color) ? 'style="background-color: '.$sd_icon_color.';"' : '').'></a>';
              } else {
                $output .= '<a href="'.$sd_section_id.'" class="scroll-down-custom-icon btn-smooth-scroll">'.$image['thumbnail'].'</a>';
              }
            }

            $output .= '</div>';

            return $output;

        }
    }
}

if (class_exists('KD_ELEM_SCROLL_DOWN')) {
    $KD_ELEM_SCROLL_DOWN = new KD_ELEM_SCROLL_DOWN;
}

?>
