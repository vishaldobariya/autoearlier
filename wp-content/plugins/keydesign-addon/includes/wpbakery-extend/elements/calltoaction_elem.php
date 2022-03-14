<?php

if (!class_exists('KD_ELEM_CALL_TO_ACTION')) {

    class KD_ELEM_CALL_TO_ACTION extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_calltoaction_init'));
            add_shortcode('tek_calltoaction', array($this, 'kd_calltoaction_shrt'));
        }

        // Element configuration in admin

        function kd_calltoaction_init() {
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Call to action", "keydesign"),
                    "description" => esc_html__("Call to action section with button.", "keydesign"),
                    "base" => "tek_calltoaction",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/calltoaction-box.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(
                        array(
                            "type" => "textarea",
                            "class" => "",
                            "heading" => esc_html__("Title", "keydesign"),
                            "param_name" => "cta_title",
                            "value" => "",
                            "admin_label" => true,
                            "description" => esc_html__("Enter call to action title here.", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Title tag", "keydesign"),
                            "param_name" => "cta_title_tag",
                            "value" => array(
                                "Default" => "",
                                "h1" => "h1",
                                "h2" => "h2",
                                "h3" => "h3",
                                "h4" => "h4",
                                "h5" => "h5",
                                "h6" => "h6",
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select title tag. Default is set to h2.", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),
                        array(
                            "type" => "textarea",
                            "class" => "",
                            "heading" => esc_html__("Subtitle", "keydesign"),
                            "param_name" => "cta_subtitle",
                            "value" => "",
                            "description" => esc_html__("This text will be displayed under the title.", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),
                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Text color", "keydesign"),
                            "param_name" => "cta_text_color",
                            "value" => "",
                            "description" => esc_html__("Choose text color.", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),
                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Box color", "keydesign"),
                            "param_name" => "cta_box_color",
                            "value" => "",
                            "description" => esc_html__("Choose box color.", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button action", "keydesign"),
                            "param_name" => "button_action",
                            "value" => array(
                                "Link" => "button-action-link",
                                "Trigger Popup Modal"  => "modal-trigger-btn",
                                "Trigger Side Panel" => "panel-trigger-btn",
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select button action."),
                            "group" => esc_html__( "Button", "keydesign" ),
                        ),
                        array(
                             "type"	=>	"vc_link",
                             "class" =>	"",
                             "heading" => esc_html__("Button link", "keydesign"),
                             "param_name" => "cta_button_link",
                             "value" =>	"",
                             "dependency" => array(
                 								"element" => "button_action",
                 								"value" => "button-action-link",
							                ),
                             "description" => esc_html__("You can add or remove the existing link from here.", "keydesign"),
                             "group" => esc_html__( "Button", "keydesign" ),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Button text", "keydesign"),
                            "param_name" => "cta_button_text",
                            "value" => "",
                            "description" => esc_html__("Write the text displayed on the button.", "keydesign"),
                            "group" => esc_html__( "Button", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Show icon?", "keydesign"),
                            "param_name" => "cta_button_icon",
                            "value" => array(
                                "No" => "no",
                                "Yes" => "yes",
                            ),
                            "save_always" => true,
                            "group" => esc_html__( "Button", "keydesign" ),
                        ),
                        array(
                            "type" => "iconpicker",
                            "class" => "",
                            "heading" => esc_html__("Icon browser", "keydesign"),
                            "param_name" => "button_icon",
                            "dependency" => array(
                                "element"  => "cta_button_icon",
                                "value"    => array("yes")
                                ),
                            "description" => esc_html__("Select your icon.", "keydesign"),
                            "group" => esc_html__( "Button", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Icon position", "keydesign"),
                            "param_name" => "cta_button_icon_position",
                            "value" => array(
                                "Left" => "icon_left",
                                "Right" => "icon_right",
                            ),
                            "dependency" => array(
                                "element" => "cta_button_icon",
                                "value" => array("yes")
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select icon position.", "keydesign"),
                            "group" => esc_html__( "Button", "keydesign" ),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Icon size", "keydesign"),
                            "param_name" => "cta_button_icon_size",
                            "value" => "",
                            "dependency" => array(
                                "element" => "cta_button_icon",
                                "value" => array("yes")
                            ),
                            "description" => esc_html__("Enter icon size in pixels. (eg. 10px, 1em, 1rem)", "keydesign"),
                            "group" => esc_html__( "Button", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button style", "keydesign"),
                            "param_name" => "cta_button_style",
                            "value" => array(
                                "Solid color" => "tt_primary_button",
                                "Outline" => "tt_secondary_button"
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select button style", "keydesign"),
                            "group" => esc_html__( "Button", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button color scheme", "keydesign"),
                            "param_name" => "cta_button_color_scheme",
                            "value" => array(
                                "Primary color" => "btn_primary_color",
                                "Secondary color" => "btn_secondary_color"
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select button predefined color scheme.", "keydesign"),
                            "group" => esc_html__( "Button", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button hover state", "keydesign"),
                            "param_name" => "cta_button_hover_state",
                            "value" => array(
                                "Default" => "",
                                "Solid - Primary color" => "hover_solid_primary",
                                "Solid - Secondary color" => "hover_solid_secondary",
                                "Solid - White color" => "hover_solid_white",
                                "Outline - Primary color" => "hover_outline_primary",
                                "Outline - Secondary color" => "hover_outline_secondary",
                                "Outline - White color" => "hover_outline_white",
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select button hover state style.", "keydesign"),
                            "group" => esc_html__( "Button", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Text CSS animation", "keydesign"),
                            "param_name" => "css_animation_text",
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
                            "heading" => esc_html__("Button CSS animation", "keydesign"),
                            "param_name" => "css_animation_button",
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
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Extra class name", "keydesign"),
                            "param_name" => "cta_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),

                    )
                ));
            }
        }



		// Render the element on front-end

        public function kd_calltoaction_shrt($atts, $content = null) {
            extract(shortcode_atts(array(
                'cta_title' => '',
                'cta_title_tag' => '',
                'cta_subtitle' => '',
                'cta_text_color' => '',
                'cta_box_color' => '',
                'button_action' => '',
                'cta_button_link' => '',
                'cta_button_text' => '',
                'cta_button_icon' => '',
                'button_icon' => '',
                'cta_button_icon_position' => '',
                'cta_button_icon_size' => '',
                'cta_button_style' => '',
                'cta_button_color_scheme' => '',
                'cta_button_hover_state' => '',
                'css_animation_text' => '',
                'css_animation_button' => '',
                'cta_extra_class' => '',
            ), $atts));

            $href = $link_target = $link_title = $icon_content = $animation_delay_text = $animation_delay_button = $button_class = $wrapper_class = '';

            $href = vc_build_link($cta_button_link);
      			if($href['url'] !== '') {
        				$link_target = (isset($href['target']) && ($href['target'] != '')) ? 'target="'.$href['target'].'"' : '';
        				$link_title = (isset($href['title'])) ? 'title="'.$href['title'].'"' : '';
      			}

            if ( $cta_button_icon == 'yes' && strlen( $button_icon ) > 0 ) {
              wp_enqueue_style( 'font-awesome' );
            }

            $icon_content .= '<span class="'.$button_icon.' iconita" '.( !empty( $cta_button_icon_size ) ? 'style="font-size: '.$cta_button_icon_size.';"' : '' ).'></span>';

            //Animation delay
            if ('' != $css_animation_text) {
                $animation_delay_text = 'data-animation-delay="200"';
            }
            if ('' != $css_animation_button) {
                $animation_delay_button = 'data-animation-delay="200"';
            }

            // Highlight text
            $main_color = sway_get_option( 'tek-main-color' );

            if ( preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $cta_title) ) {
              $cta_title = preg_replace("/\*([^*]+)\*/", "<span style=\"color:".$main_color.";\">$1</span>", $cta_title );
            }

            $button_class = implode(' ', array('tt_button', $cta_button_style, $cta_button_color_scheme, $cta_button_hover_state, $button_action, $cta_button_icon_position, $css_animation_button ));

            $wrapper_class = implode(' ', array('kd-calltoaction', $cta_extra_class ));

            $output = '<div class="'.trim($wrapper_class).'" '.(!empty($cta_box_color) ? 'style="background-color: '.$cta_box_color.';"' : '').'>
                <div class="container">
                  <div class="cta-text-container ' . $css_animation_text . '" ' . $animation_delay_text . '>';
                    $output .= '<div class="cta-text">';

                      if ( '' != $cta_title ) {
                        if ( $cta_title_tag != '' ) {
                          $output .= '<'.esc_attr( $cta_title_tag ).' '.(!empty($cta_text_color) ? 'style="color: '.$cta_text_color.';"' : '').'>' . $cta_title . '</'.esc_attr( $cta_title_tag ).'>';
                        } else {
                          $output .= '<h2 '.(!empty($cta_text_color) ? 'style="color: '.$cta_text_color.';"' : '').'>' . $cta_title . '</h2>';
                        }
                      }

                      if ( '' != $cta_subtitle ) {
                        $output .= '<p '.(!empty($cta_text_color) ? 'style="color: '.$cta_text_color.';"' : '').'>'.$cta_subtitle.'</p>';
                      }

                    $output .= '</div>
                    </div>
                    <div class="cta-btncontainer">';
                      if ( $button_action == 'modal-trigger-btn' ) {
                        $output .= '<a class="'.trim( $button_class ).'" ' . $animation_delay_button . ' data-toggle="modal" data-target="#popup-modal">';
                      } elseif ( $button_action == 'panel-trigger-btn' ) {
                        $output .= '<a class="'.trim( $button_class ).'" ' . $animation_delay_button .'>';
                      } else {
                        $output .= '<a href="'.$href['url'].'" '.$link_target.' '.$link_title.' class="'.trim( $button_class ).'" ' . $animation_delay_button .'>';
                      }

                      if ( $cta_button_icon == 'yes' && $cta_button_icon_position == 'icon_left' ) {
                          $output .= $icon_content;
                      }
                      if ( '' != $cta_button_text ) {
                        $output .= $cta_button_text;
                      }
                      if ( $cta_button_icon == 'yes' && $cta_button_icon_position == 'icon_right' ) {
                          $output .= $icon_content;
                      }
                      $output .= '</a>';
                    $output .= '</div>
                </div>
            </div>';

            return $output;

        }
    }
}

if (class_exists('KD_ELEM_CALL_TO_ACTION')) {
    $KD_ELEM_CALL_TO_ACTION = new KD_ELEM_CALL_TO_ACTION;
}

?>
