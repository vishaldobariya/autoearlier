<?php

if (!class_exists('KD_ELEM_PARTICLES')) {

    class KD_ELEM_PARTICLES extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_particles_init'));
            add_shortcode('tek_particles', array($this, 'kd_particles_shrt'));
        }

        // Element configuration in admin

        function kd_particles_init() {
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Particles", "keydesign"),
                    "description" => esc_html__("Place a particles background anywhere in a row.", "keydesign"),
                    "base" => "tek_particles",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/particles.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(
                        array(
                          "type" => "param_group",
                          "class" => "",
                          "heading" => esc_html__("Color options", "keydesign"),
                          "value" => "",
                          "param_name" => "part_color_options",
                          "params" => array(
                              array(
                                  "type" => "colorpicker",
                                  "class" => "",
                                  "heading" => esc_html__("Particle color", "keydesign"),
                                  "param_name" => "part_color",
                                  "value" => "#7776f6",
                                  "description" => esc_html__("Select particle color.", "keydesign"),
                              ),
                        ),
                      ),
                      array(
                          "type" => "textfield",
                          "class" => "",
                          "heading" => esc_html__("Number of particles", "keydesign"),
                          "param_name" => "part_number",
                          "value" => "30",
                          "description" => esc_html__("Enter the number of particles.", "keydesign")
                      ),
                      array(
                          "type" => "dropdown",
                          "class" => "",
                          "heading" => esc_html__("Particle shape", "keydesign"),
                          "param_name" => "part_shape",
                          "value" => array(
                              "Circle" => "circle",
                              "Edge" => "edge",
                              "Triangle" => "triangle",
                              "Polygon" => "polygon",
                              "Star" => "star",
                          ),
                          "save_always" => true,
                          "description" => esc_html__("Select particle shape.", "keydesign"),
                      ),
                      array(
                          "type" => "dropdown",
                          "class" => "",
                          "heading" => esc_html__("Particle size", "keydesign"),
                          "param_name" => "part_size",
                          "value" => array(
                              "Small" => "4",
                              "Medium" => "8",
                              "Large" => "12"
                          ),
                          "std" => "8",
                          "save_always" => true,
                          "description" => esc_html__("Select particle size.", "keydesign"),
                      ),
                      array(
                          "type" => "textfield",
                          "class" => "",
                          "heading" => esc_html__("Extra class name", "keydesign"),
                          "param_name" => "part_extra_class",
                          "value" => "",
                          "description" => esc_html__("If you wish to style a particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign")
                      ),
                    )
                ));
            }
        }



		// Render the element on front-end

        public function kd_particles_shrt($atts, $content = null)
        {
            // Include required JS files
            wp_enqueue_script('kd_particles');

            extract(shortcode_atts(array(
                'part_color_options' => '',
                'part_number' => '',
                'part_shape' => '',
                'part_size' => '',
                'part_extra_class' => '',
            ), $atts));

            $output = $color_data = '';

            if (!$part_number) {
              $part_number = 30;
            }

            // Get particle colors
            $part_color_options = json_decode( urldecode( $part_color_options ), true );
            if( isset( $part_color_options ) ) {
	            foreach ( $part_color_options as $part_color_data ) {
                $color_data .= isset($part_color_data["part_color"]) ? '\''.$part_color_data["part_color"].'\'' : '';
              }
            }

            $res = str_replace("''", "', '", $color_data);

            $particles_id = '';
            $particles_id .= 'particles-js-'.uniqid();
            $output = '<div class="particles-wrapper" data-number="'.$part_number.'" data-shape="'.$part_shape.'" data-size="'.$part_size.'" data-colors="['.$res.']"><div id="'.$particles_id.'"></div></div>';

            return $output;

        }
    }
}

if (class_exists('KD_ELEM_PARTICLES')) {
    $KD_ELEM_PARTICLES = new KD_ELEM_PARTICLES;
}

?>
