<?php

if (!class_exists('KD_ELEM_SHAPE')) {

    class KD_ELEM_SHAPE extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_shape_init'));
            add_shortcode('tek_shape', array($this, 'kd_shape_shrt'));
        }

        // Element configuration in admin

        function kd_shape_init() {
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Shape", "keydesign"),
                    "description" => esc_html__("Display basic geometric shapes.", "keydesign"),
                    "base" => "tek_shape",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/shape.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(
                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Template","keydesign"),
                            "param_name"	=>	"shape_template",
                            "value"			=>	array(
                                "Dots" => "shape_dots",
                                "Rectangle" => "shape_rectangle",
                                "Circle" => "shape_circle",
              									"Egg" => "shape_egg",
                                "Organic 1" => "shape_organic_1",
                                "Organic 1 rotated" => "shape_organic_1_rotate",
                                "Organic 2" => "shape_organic_2",
                                "Organic 2 rotated" => "shape_organic_2_rotate",
                            ),
                            "admin_label" => true,
                            "save_always" => true,
                            "description"	=>	esc_html__("Select shape template.", "keydesign")
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Top position", "keydesign"),
                            "param_name" => "shape_top_position",
                            "value" => "",
                            "description" => esc_html__("Accepts values in px, em, rem or auto.", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Bottom position", "keydesign"),
                            "param_name" => "shape_bottom_position",
                            "value" => "",
                            "description" => esc_html__("Accepts values in px, em, rem or auto.", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Left position", "keydesign"),
                            "param_name" => "shape_left_position",
                            "value" => "",
                            "description" => esc_html__("Accepts values in px, em, rem or auto.", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Right position", "keydesign"),
                            "param_name" => "shape_right_position",
                            "value" => "",
                            "description" => esc_html__("Accepts values in px, em, rem or auto.", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Width", "keydesign"),
                            "param_name" => "shape_width",
                            "value" => "",
                            "description" => esc_html__("Enter shape width.", "keydesign"),
                        ),
		                    array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Height", "keydesign"),
                            "param_name" => "shape_height",
                            "value" => "",
                            "description" => esc_html__("Enter shape height.", "keydesign"),
                        ),
		                    array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Background color", "keydesign"),
                            "param_name" => "shape_bg_color",
                            "value" => "",
                            "description" => esc_html__("Select shape background color.", "keydesign")
                        ),
                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Parallax","keydesign"),
                            "param_name"	=>	"shape_parallax",
                            "value"			=>	array(
                                "Disable" => "",
                                "Enable" => "with-parallax",
                            ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select to enable parallax effect.", "keydesign")
                        ),
                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Parallax speed","keydesign"),
                            "param_name"	=>	"shape_parallax_speed",
                            "value"			=>	array(
                                "-15%" => "-0.15",
                                "-10%" => "-0.1",
                                "-5%" => "-0.05",
                                "5%" => "0.05",
                                "10%" => "0.1",
                                "15%" => "0.15",
                            ),
                            "save_always" => true,
                            "dependency" =>	array(
                                "element" => "shape_parallax",
                                "value" => array("with-parallax")
                            ),
                            "description"	=>	esc_html__("Select parallax speed.", "keydesign")
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
                            "param_name" => "shape_animation_delay",
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
                            "description" => esc_html__("Enter animation delay in ms.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Extra class name", "keydesign"),
                            "param_name" => "shape_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                    )
                ));
            }
        }



		// Render the element on front-end

        public function kd_shape_shrt($atts, $content = null)  {
            extract(shortcode_atts(array(
                'shape_template' => '',
                'shape_top_position' => '',
                'shape_bottom_position' => '',
                'shape_left_position' => '',
                'shape_right_position' => '',
                'shape_width' => '',
        				'shape_height' => '',
        				'shape_bg_color' => '',
        				'shape_parallax' => '',
        				'shape_parallax_speed' => '',
        				'css_animation' => '',
        				'shape_animation_delay' => '',
        				'shape_extra_class' => '',
            ), $atts));

      			$output = $wrapper_class = $shape_style = $parallax_data = $animation_delay = '';

            $wrapper_class = implode(' ', array('kd-shapes', $shape_template, $shape_parallax, $css_animation));

            if (!empty ($shape_top_position) ) {
              $shape_style .= 'top: '.$shape_top_position.';';
            }

            if (!empty ($shape_right_position) ) {
              $shape_style .= 'right: '.$shape_right_position.';';
            }

            if (!empty ($shape_bottom_position) ) {
              $shape_style .= 'bottom: '.$shape_bottom_position.';';
            }

            if (!empty ($shape_left_position) ) {
              $shape_style .= 'left: '.$shape_left_position.';';
            }

      			if (!empty ($shape_width) ) {
              $shape_style .= 'width: '.$shape_width.';';
            }

            if (!empty ($shape_height) ) {
              $shape_style .= 'height: '.$shape_height.';';
            }

      			if (!empty ($shape_bg_color) ) {
              $shape_style .= 'background-color: '.$shape_bg_color.';';
            }

            if ( $shape_parallax == 'with-parallax' ) {
              $parallax_data = 'data-parallax-speed="'.$shape_parallax_speed.'"';
            }

            // Animation delay
            if ($shape_animation_delay) {
                $animation_delay = 'data-animation-delay='.$shape_animation_delay;
            }

            $output = '<div class="'.$wrapper_class.'" '.(!empty($shape_style) ? 'style="' . $shape_style . '"' : '').' '.$parallax_data.' '. $animation_delay . '></div>';

            return $output;

        }
    }
}

if (class_exists('KD_ELEM_SHAPE')) {
    $KD_ELEM_SHAPE = new KD_ELEM_SHAPE;
}

?>
