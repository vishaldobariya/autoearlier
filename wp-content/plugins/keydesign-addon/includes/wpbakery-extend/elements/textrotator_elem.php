<?php

if (!class_exists('KD_ELEM_TEXT_ROTATOR')) {

    class KD_ELEM_TEXT_ROTATOR extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_textrotator_init'));
            add_shortcode('tek_textrotator', array($this, 'kd_textrotator_shrt'));
        }

        // Element configuration in admin

        function kd_textrotator_init() {
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Text rotator", "keydesign"),
                    "description" => esc_html__("Simple shortcode to rotate your texts.", "keydesign"),
                    "base" => "tek_textrotator",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/text-rotator.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(
                      array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Static heading", "keydesign"),
                            "param_name" => "tr_static_heading",
                            "value" => "",
                            "description" => esc_html__("Static text before rotating fields", "keydesign"),
                      ),
                      array(
                          "type" => "param_group",
                          "class" => "",
                          "heading" => esc_html__("Text rotator fields", "keydesign"),
                          "description" => esc_html__("Rotating text fields", "keydesign"),
                          "value" => "",
                          "param_name" => "tr_text_fields",
                          "params" => array(
                              array(
                                  "type" => "textfield",
                                  "heading" => __("Single item","keydesign"),
                                  "param_name" => "tr_text_item",
                                  "description" =>"",
                                  "admin_label" => true,
                              ),
                        ),
                      ),
                      array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Animation", "keydesign"),
                            "param_name" => "tr_text_animation",
                            "value" => array(
                                "Push" => "push",
                                "Slide" => "slide",
                                "Zoom" => "zoom",
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select title tag.", "keydesign")
                      ),
                      array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Text tags", "keydesign"),
                            "param_name" => "tr_text_tag",
                            "value" => array(
                                "Default" => "h2",
                                "h1" => "h1",
                                "h2" => "h2",
                                "h3" => "h3",
                                "h4" => "h4",
                                "h5" => "h5",
                                "h6" => "h6",
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select title tag.", "keydesign")
                        ),
                      array(
                          "type"			=>	"dropdown",
                          "class"			=>	"",
                          "heading"		=>	esc_html__("Text align","keydesign"),
                          "param_name"	=>	"tr_text_align",
                          "value"			=>	array(
                              "Left" => "text-left",
                              "Center" => "text-center",
                              "Right" => "text-right",
                          ),
                          "save_always" => true,
                          "description"	=>	esc_html__("Select text align.", "keydesign"),
                      ),

                      array(
                          "type" => "colorpicker",
                          "class" => "",
                          "heading" => esc_html__("Text color", "keydesign"),
                          "param_name" => "tr_text_color",
                          "value" => "",
                          "description" => esc_html__("Select text color. If none selected, the default theme color will be used.", "keydesign"),
                      ),

                      array(
                          "type" => "textfield",
                          "class" => "",
                          "heading" => esc_html__("Font size", "keydesign"),
                          "param_name" => "tr_font_size",
                          "value" => "",
                          "description" => esc_html__("Enter text font size. (eg. 20px, 2em, 2rem)", "keydesign"),
                      ),

                      array(
                          "type" => "textfield",
                          "class" => "",
                          "heading" => esc_html__("Line height", "keydesign"),
                          "param_name" => "tr_line_height",
                          "value" => "",
                          "description" => esc_html__("Enter text line height. (eg. 20px, 2em, 2rem)", "keydesign"),
                      ),

                      array(
                          "type"			=>	"dropdown",
                          "class"			=>	"",
                          "heading"		=>	esc_html__("Animation speed","keydesign"),
                          "param_name"	=>	"tr_speed",
                          "value"			=>	array(
                              "2s" => 2000,
                              "3s" => 3000,
                              "4s" => 4000,
                              "5s" => 5000,
                          ),
                          "save_always" => true,
                          "description"	=>	esc_html__("Select the animation speed.", "keydesign"),
                      ),

                      array(
                          "type" => "textfield",
                          "class" => "",
                          "heading" => esc_html__("Extra class name", "keydesign"),
                          "param_name" => "tr_extra_class",
                          "value" => "",
                          "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                          "group" => esc_html__( "Extras", "keydesign" ),
                      ),

                    )
                ));
            }
        }



	      // Render the element on front-end
        public function kd_textrotator_shrt($atts, $content = null) {

            extract(shortcode_atts(array(
              'tr_static_heading' => '',
              'tr_text_fields' => '',
              'tr_text_align' => '',
              'tr_text_animation' => '',
              'tr_text_tag' => 'h2',
              'tr_text_color' => '',
              'tr_font_size' => '',
              'tr_line_height' => '',
              'tr_speed' => '',
              'tr_extra_class' => '',
            ), $atts));

            $text_rotator_container = $kd_rotator_id = $j = $output = $first_elem_class = $last_elem_style = '';

            $kd_rotator_id = "kd-rotatorid-".uniqid();

            $output .= '<div data-speed="'.$tr_speed.'" class="kd-text-rotator '.$kd_rotator_id.' '.$tr_text_align.' '.$tr_extra_class.'">';
            // Text rotator container

            if ( !$tr_text_tag || $tr_text_tag == '' ) { $tr_text_tag = 'h2'; }
            $text_rotator_container .= '<'.$tr_text_tag.' class="kd-text-rotator-container '.$tr_text_animation.'" style="'.$last_elem_style . (!empty($tr_text_color) ? ' color: '.$tr_text_color.';' : '') . (!empty($tr_font_size) ? ' font-size: '.$tr_font_size.';' : '') . (!empty($tr_line_height) ? ' line-height: '.$tr_line_height.';' : '') .'">';
            if( isset( $tr_static_heading ) && $tr_static_heading != '' ) {
                $text_rotator_container .= $tr_static_heading .' ';
            }
            $tr_text_fields = json_decode( urldecode( $tr_text_fields ), true );
            if( isset( $tr_text_fields ) ) {
              $text_rotator_container .= '<span class="kd-rotator-wrapper">';
              $j = 0;
              foreach ( $tr_text_fields as $tr_text_fields_data ){
                $first_elem_class = '';
                if($j == 0) {
                  $first_elem_class = 'is-visible';
                  $j = 1;
                }
                if ( !$tr_text_tag || $tr_text_tag == '' ) { $tr_text_tag = 'h2'; }
                $text_rotator_container .= '<span class="rotator-single '.$first_elem_class.'">';
                if ( isset( $tr_text_fields_data["tr_text_item"] ) ){
                  $text_rotator_container .= $tr_text_fields_data["tr_text_item"];
                }
                $text_rotator_container .= '</span>';
              }
            }

            $text_rotator_container .= '</span></'.$tr_text_tag.'>';

            $output .= $text_rotator_container;
            $output .= '</div>';

            return $output;
        }
    }
}

if (class_exists('KD_ELEM_TEXT_ROTATOR')) {
    $KD_ELEM_TEXT_ROTATOR = new KD_ELEM_TEXT_ROTATOR;
}

?>
