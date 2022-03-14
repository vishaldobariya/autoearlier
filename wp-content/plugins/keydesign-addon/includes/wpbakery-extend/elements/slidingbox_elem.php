<?php

if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_tek_sliding_box extends WPBakeryShortCodesContainer {
    }
}

if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_tek_sliding_box_single extends WPBakeryShortCode {
    }
}

if (!class_exists('tek_sliding_box')) {
    class tek_sliding_box extends KEYDESIGN_ADDON_CLASS
    {
        function __construct() {
            add_action('init', array($this, 'kd_sliding_box_init'));
            add_shortcode('tek_sliding_box', array($this, 'kd_sliding_box_container'));
            add_shortcode('tek_sliding_box_single', array($this, 'kd_sliding_box_single'));
        }

        // Element configuration in admin
        function kd_sliding_box_init() {
            // Container element configuration
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Sliding box", "keydesign"),
                    "description" => esc_html__("Sliding boxes with smooth animations.", "keydesign"),
                    "base" => "tek_sliding_box",
                    "class" => "kd-outer-controls",
                    "show_settings_on_create" => false,
                    "content_element" => true,
                    "as_parent" => array('only' => 'tek_sliding_box_single'),
                    "icon" => plugins_url('assets/element_icons/sliding-box.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "js_view" => 'VcColumnView',
                    "params" => array(
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Extra class name", "keydesign"),
                            "param_name" => "sbp_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign")
                        ),
                    )
                ));

                // Shortcode configuration
                vc_map(array(
                    "name" => esc_html__("Sliding box item", "keydesign"),
                    "base" => "tek_sliding_box_single",
                    "content_element" => true,
                    "as_child" => array('only' => 'tek_sliding_box'),
                    "icon" => plugins_url('assets/element_icons/sliding-box.png', dirname(__FILE__)),
                    "params" => array(
                        array(
                            "type" =>	"dropdown",
                            "class"	=>	"",
                            "heading" =>	esc_html__("Active element","keydesign"),
                            "param_name" =>	"sb_box_active",
                            "value" =>	array(
                                    "No" => "active_no",
                                    "Yes" => "active_yes",
                                ),
                            "save_always" => true,
                            "admin_label" => true,
                            "description" => esc_html__("Note: only one child sliding box element must be set as active.", "keydesign")
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Box title", "keydesign"),
                            "param_name" => "sb_title",
                            "admin_label" => true,
                            "value" => "",
                            "description" => esc_html__("Enter item title here.", "keydesign")
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Title color", "keydesign"),
                            "param_name" => "sb_title_color",
                            "value" => "",
                            "description" => esc_html__("Choose title color. If none selected, the default theme color will be used.", "keydesign"),
                        ),

                        array(
                            "type" => "textarea",
                            "class" => "",
                            "heading" => esc_html__("Box description", "keydesign"),
                            "param_name" => "sb_description",
                            "value" => "",
                            "description" => esc_html__("Enter item description here.", "keydesign")
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Description color", "keydesign"),
                            "param_name" => "sb_description_color",
                            "value" => "",
                            "description" => esc_html__("Choose description text color. If none selected, the default theme color will be used.", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Image source", "keydesign"),
                            "param_name" => "image_source",
                            "value" => array(
                                "Media library" => "media_library",
                                "External link" => "external_link",
                            ),
                            "description" => esc_html__("Select image source.", "keydesign"),
                            "save_always" => true,
                        ),

                        array(
                            "type" => "attach_image",
                            "class" => "",
                            "heading" => esc_html__("Image", "keydesign"),
                            "param_name" => "sb_img",
                            "value" => "",
                            "description" => esc_html__("Select or upload your image using the media library.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "image_source",
                                "value" => array("media_library")
                            ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Image external source", "keydesign"),
                            "param_name" => "ext_image",
                            "value" => "",
                            "description" => esc_html__("Enter image external link.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "image_source",
                                "value" => array("external_link")
                            ),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Image size", "keydesign"),
                            "param_name" => "ext_image_size",
                            "value" => "",
                            "description" => esc_html__("Enter image size in pixels. Example: 300x300 (Width x Height).", "keydesign"),
                            "dependency" =>	array(
                                "element" => "image_source",
                                "value" => array("external_link")
                            ),
                        ),

                        array(
                             "type"	=>	"dropdown",
                             "class" =>	"",
                             "heading" => esc_html__("Link type", "keydesign"),
                             "param_name" => "sb_link_type",
                             "value" =>	array(
                                    esc_html__( 'No link', 'keydesign' ) => '#',
                                    esc_html__( 'Add a custom link', 'keydesign' )	=> '1',
                                ),
                             "save_always" => true,
                             "description" => esc_html__("You can add/remove custom link", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button action", "keydesign"),
                            "param_name" => "sb_button_action",
                            "value" => array(
                                "Link" => "button-action-link",
                                "Trigger Popup Modal"  => "modal-trigger-btn",
                                "Trigger Side Panel" => "panel-trigger-btn",
                            ),
                            "dependency" => array(
                               "element" => "sb_link_type",
                               "value"	=> array( "1" ),
                           ),
                            "save_always" => true,
                            "description" => esc_html__("Select button action."),
                        ),

                        array(
                             "type"	=>	"vc_link",
                             "class" =>	"",
                             "heading" => esc_html__("Button link", "keydesign"),
                             "param_name" => "sb_button_link",
                             "value" =>	"",
                             "description" => esc_html__("You can add or remove the existing link from here.", "keydesign"),
                             "dependency" => array(
                                "element" => "sb_button_action",
                                "value"	=> array( "button-action-link" ),
                            ),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Button text", "keydesign"),
                            "param_name" => "sb_button_text",
                            "value" => "",
                            "description" => esc_html__("Write the text displayed on the button.", "keydesign"),
                            "dependency" => array(
                               "element" => "sb_link_type",
                               "value"	=> array( "1" ),
                           ),
                        ),
                        array(
              							"type" => "dropdown",
              							"class" => "",
              							"heading" => esc_html__("Box background type", "keydesign"),
              							"param_name" =>	"sb_background_type",
              							"value" =>	array(
              								esc_html__( 'None', 'keydesign' ) => 'none',
              								esc_html__( 'Select color', 'keydesign' )	=> 'custom_bg_color',
              							),
              							"save_always" => true,
              							"description" => esc_html__("Select box background type.", "keydesign"),
            						),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Background color", "keydesign"),
                            "param_name" => "sb_background_color",
                            "value" => "",
                            "dependency" =>	array(
                								"element" => "sb_background_type",
                								"value" => array( "custom_bg_color" ),
      							        ),
                            "description" => esc_html__("Choose box background color.", "keydesign"),
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
                            "param_name" => "sb_animation_delay",
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
                            "param_name" => "sb_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                    )
                ));
            }
        }

        public function kd_sliding_box_container($atts, $content = null) {

            extract(shortcode_atts(array(
                'sbp_extra_class'          => '',
            ), $atts));

            $kd_slidingbox_id = '';

            $kd_slidingbox_id .= "kd-slidingbox-".uniqid();
            $output = '
            <div class="sliding_box_parent row '.$kd_slidingbox_id.' '.$sbp_extra_class.'">'.do_shortcode($content).'</div>';

            $output .= '<script>
              jQuery(document).ready(function($){
                if ($(".sliding_box_parent.'.$kd_slidingbox_id.'").length) {
                  $(".'.$kd_slidingbox_id.' .sliding_box_child").on("mouseenter", function() {
                    $(".'.$kd_slidingbox_id.' .sliding_box_child").removeClass("active-elem");
                    $(this).addClass("active-elem");
                  });
                }
              });
            </script>';
            return $output;
        }

        public function kd_sliding_box_single($atts, $content = null) {

            extract(shortcode_atts(array(
                'sb_title' => '',
                'sb_title_color' => '',
                'sb_description' => '',
                'sb_description_color' => '',
                'image_source' => '',
                'sb_img' => '',
                'ext_image' => '',
                'ext_image_size' => '',
                'sb_link_type' => '',
                'sb_button_action' => '',
                'sb_button_link' => '',
                'sb_button_text' => '',
                'sb_background_type' => '',
                'sb_background_color' => '',
                'sb_box_active' => '',
                'css_animation' => '',
                'sb_animation_delay' => '',
                'sb_extra_class' => '',
            ), $atts));

            $box_active_class = $link_title = $link_target = $kd_slidingbox_id = $sb_image = $default_src = $dimensions = $hwstring = $wrapper_class = $animation_delay = '';

            $sb_image = wpb_getImageBySize($params = array(
                'post_id' => NULL,
                'attach_id' => $sb_img,
                'thumb_size' => 'full',
                'class' => ""
            ));

            $default_src = vc_asset_url( 'vc/no_image.png' );
            $dimensions = vc_extract_dimensions( $ext_image_size );
            $hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';

            $href = vc_build_link($sb_button_link);
            if ($href['target'] == "") { $href['target'] = "_self"; }

      			if($href['url'] !== '') {
      				$link_target = (isset($href['target'])) ? ' target="'.$href['target'].'"' : 'target="_self"';
      				$link_title = (isset($href['title'])) ? ' title="'.$href['title'].'"' : '';
      			}

            // Active element
            if( $sb_box_active == 'active_no' ) {
                $box_active_class = '';
            } elseif ( $sb_box_active == 'active_yes' ) {
                $box_active_class = 'active-elem';
            }

            // Animation delay
            if ($sb_animation_delay) {
                $animation_delay = 'data-animation-delay='.$sb_animation_delay;
            }

            $wrapper_class = implode(' ', array('sliding_box_child', $box_active_class, $css_animation, $sb_extra_class));

            $output = '<div class="' . trim($wrapper_class) . '" '. $animation_delay . '>
                <div class="sb-image">';

                if ($image_source == 'external_link') {
                  if (!$ext_image) {
                    $output .='<img src="'.$default_src.'" alt="" class="vc_img-placeholder" />';
                  } else {
                    $output .='<img src="'.$ext_image.'" alt="" '.$hwstring.' />';
                  }
                } else {
                  if (!$sb_image) {
                    $output .='<img src="'.$default_src.'" alt="" class="vc_img-placeholder" />';
                  } else {
                    $output .= $sb_image['thumbnail'];
                  }
                }

                $output .= '</div>
                <div class="sb_content_wrapper" '.(!empty($sb_background_color) ? 'style="background-color: '.$sb_background_color.';"' : '').'>';
                    if ( !empty($sb_title) ) {
                      $output .= '<h4 '.(!empty($sb_title_color) ? 'style="color: '.$sb_title_color.';"' : '').'>'.$sb_title.'</h4>';
                    }

                    if ( !empty($sb_description) ) {
                      $output .= '<p '.(!empty($sb_description_color) ? 'style="color: '.$sb_description_color.';"' : '').'>'.$sb_description.'</p>';
                    }

                    if($sb_link_type !== '#'){
                      $output .= '<div class="sb-btncontainer">';
                        if ( $sb_button_action == 'modal-trigger-btn' ) {
                          $output .= '<a class="sliding-box-link '.$sb_button_action.'" data-toggle="modal" data-target="#popup-modal">'.$sb_button_text.'</a>';
                        } elseif ( $sb_button_action == 'panel-trigger-btn' ) {
                          $output .= '<a class="sliding-box-link '.$sb_button_action.'">'.$sb_button_text.'</a>';
                        } else {
                          $output .= '<a href="'.$href['url'].'" '.$link_target.' '.$link_title.' class="sliding-box-link">'.$sb_button_text.'</a>';
                        }
                      $output .= '</div>';
                    }

                $output .= '</div>
            </div>';

            return $output;
        }

    }

}

if (class_exists('tek_sliding_box')) {
    $tek_sliding_box = new tek_sliding_box;
}

?>
