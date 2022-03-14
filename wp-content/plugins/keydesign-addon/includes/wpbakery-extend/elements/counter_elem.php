<?php

if (!class_exists('KD_ELEM_COUNTER')) {

    class KD_ELEM_COUNTER extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_counter_init'));
            add_shortcode('tek_counter', array($this, 'kd_counter_shrt'));
        }

        // Element configuration in admin

        function kd_counter_init() {

            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Counter", "keydesign"),
                    "description" => esc_html__("Animated counter.", "keydesign"),
                    "base" => "tek_counter",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/counter.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Display icon","keydesign"),
                            "param_name"	=>	"count_icon_type",
                            "value"			=>	array(
                                    "No" => "no_icon",
                                    "Icon Browser" => "icon_browser",
                                    "Custom Icon" => "custom_icon",
                                ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select icon source.", "keydesign")
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
              								"element" => "count_icon_type",
              								"value" => "icon_browser",
              							),
              							"description" => esc_html__( "Select icon from library.", "keydesign" ),
            						),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Icon color", "keydesign"),
                            "param_name" => "count_icon_color",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "count_icon_type",
                                "value" => array("icon_browser")
                            ),
                            "description" => esc_html__("Choose icon color. If none selected, the default theme color will be used.", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Icon size", "keydesign"),
                            "param_name" => "count_icon_size",
                            "value" => "",
                            "dependency" =>	array(
                              "element" => "count_icon_type",
                              "value" => array("icon_browser")
                            ),
                            "description" => esc_html__("Enter icon size. (eg. 10px, 1em, 1rem)", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Image source", "keydesign"),
                            "param_name" => "count_image_source",
                            "value" => array(
                                "Media library" => "media_library",
                                "External link" => "external_link",
                            ),
                            "description" => esc_html__("Select image source.", "keydesign"),
                            "dependency" => array(
                                "element" => "count_icon_type",
                                "value" => array("custom_icon"),
                            ),
                            "save_always" => true,
                        ),

                        array(
                            "type" => "attach_image",
                            "class" => "",
                            "heading" => esc_html__("Upload image icon", "keydesign"),
                            "param_name" => "count_image",
                            "value" => "",
                            "description" => esc_html__("Upload your own custom image.", "keydesign"),
                            "dependency" => array(
                                "element" => "count_image_source",
                                "value" => array("media_library"),
                            ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Image external source", "keydesign"),
                            "param_name" => "count_image_ext",
                            "value" => "",
		                        "description" => esc_html__("Enter image external link.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "count_image_source",
                                "value" => array("external_link")
                            ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Image size", "keydesign"),
                            "param_name" => "ext_image_size",
                            "value" => "",
		                        "description" => esc_html__("Enter image size in pixels. Example: 140x40 (Width x Height).", "keydesign"),
                            "dependency" =>	array(
                                "element" => "count_image_source",
                                "value" => array("external_link")
                            ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Counter number", "keydesign"),
                            "param_name" => "count_number",
                            "value" => "",
                            "admin_label" => true,
                            "description" => esc_html__("Only numerical values allowed.", "keydesign")
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Counter number color", "keydesign"),
                            "param_name" => "count_number_color",
                            "value" => "",
                            "description" => esc_html__("Choose counter number color. If none selected, the default theme color will be used.", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Counter units", "keydesign"),
                            "param_name" => "count_units",
                            "value" => "",
                            "admin_label" => true,
                            "description" => esc_html__("Ex: coffee drinks, projects, clients.", "keydesign")
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Counter units color", "keydesign"),
                            "param_name" => "count_units_color",
                            "value" => "",
                            "description" => esc_html__("Choose counter units color. If none selected, the default theme color will be used.", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Counter number and units font size", "keydesign"),
                            "param_name" => "count_number_units_size",
                            "value" => "",
                            "description" => esc_html__("Enter counter number and units text font size. (eg. 10px, 1em, 1rem)", "keydesign"),
                        ),

                        array(
                            "type" =>	"dropdown",
                            "class" => "",
                            "heading" =>	esc_html__("Counter number and units font weight","keydesign"),
                            "param_name" =>	"count_number_units_font_weight",
                            "value" => array(
                                "Regular" => "400",
                                "Medium" => "500",
                                "Bold" => "700",
                            ),
                            "save_always" => true,
                        ),

                        array(
                            "type" => "textarea",
                            "class" => "",
                            "heading" => esc_html__("Counter description", "keydesign"),
                            "param_name" => "count_description",
                            "value" => "",
                            "description" => esc_html__("This additional text will be displayed below the counter.", "keydesign")
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Counter description color", "keydesign"),
                            "param_name" => "count_description_color",
                            "value" => "",
                            "description" => esc_html__("Choose counter description color. If none selected, the default theme color will be used.", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("CSS animation", "keydesign"),
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
                            "save_always" => true,
                            "admin_label" => true,
                            "description" => esc_html__("Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                         ),

                         array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Animation delay", "keydesign"),
                            "param_name" => "elem_animation_delay",
                            "value" => array(
                                "0 ms"              => "",
                                "200 ms"            => "200",
                                "400 ms"            => "400",
                                "600 ms"            => "600",
                                "800 ms"            => "800",
                                "1 s"               => "1000",
                            ),
                            "save_always" => true,
                            "admin_label" => true,
                            "dependency" =>	array(
                                "element" => "css_animation",
                                "value" => array("kd-animated fadeIn", "kd-animated fadeInDown", "kd-animated fadeInLeft", "kd-animated fadeInRight", "kd-animated fadeInUp", "kd-animated zoomIn")
                            ),
                            "description" => esc_html__("Enter animation delay in ms", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),

                       array(
                           "type" => "textfield",
                           "class" => "",
                           "heading" => esc_html__("Extra class name", "keydesign"),
                           "param_name" => "count_extra_class",
                           "value" => "",
                           "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                           "group" => esc_html__( "Extras", "keydesign" ),
                       ),

                    )
                ));
            }
        }



	      // Render the element on front-end

        public function kd_counter_shrt($atts, $content = null) {

        // Include required JS files
    		wp_enqueue_script('kd_countto');

        // Declare empty vars
        $output = $content_icon = $counter_id = $kd_counter_img_array = $js = $icon_color_style = $icon_size_style = $icon_position_class = $animation_delay = '';
        $count_number_style = $count_units_style = '';
        $dimensions = $hwstring = '';

        extract(shortcode_atts(array(
            'count_icon_type' => '',
            'icon_iconsmind' => '',
            'count_icon_color' => '',
            'count_icon_size' => '',
            'count_image_source' => '',
            'count_image' => '',
            'count_image_ext' => '',
            'ext_image_size' => '',
            'count_number' => '',
            'count_number_color' => '',
            'count_units' => '',
            'count_units_color' => '',
            'count_number_units_size' => '',
            'count_number_units_font_weight' => '500',
            'count_description' => '',
            'count_description_color' => '',
            'css_animation' => '',
            'elem_animation_delay' => '',
            'count_extra_class' => '',
        ), $atts));

        if ( $count_icon_type == 'icon_browser' && strlen( $icon_iconsmind ) > 0 ) {
          $exploded = explode( ' ', $icon_iconsmind );
          $iconsmind_cat = end( $exploded );
          $font_file_name = substr( strstr( $iconsmind_cat, '-' ), strlen( '-' ) );

          if ( strpos( $exploded[0], 'iconsmind-' ) === 0 ) {
            wp_enqueue_style( $font_file_name.'-im-fonts-woff', plugin_dir_url( __DIR__ ).'assets/css/iconsmind/fonts/'.$font_file_name.'.woff' );
            wp_enqueue_style( $iconsmind_cat, plugin_dir_url( __DIR__ ).'assets/css/iconsmind/'.$iconsmind_cat.'.css' );
          } elseif ( strpos( $exploded[1], 'fa-' ) === 0 ) {
            wp_enqueue_style( 'font-awesome' );
          }
        }

        if ( strlen( $icon_iconsmind ) > 0 ) {
            $count_icon = $icon_iconsmind;
        }

        if ($count_icon_color !== '') {
          $icon_color_style = 'color: '.$count_icon_color.';';
        }

        if ($count_icon_size !== '') {
          $icon_size_style = 'font-size: '.$count_icon_size.';';
        }

        $default_src = vc_asset_url( 'vc/no_image.png' );
        if ( $count_image_source == 'external_link' ) {
          if ( '' != $ext_image_size ) {
            $dimensions = vc_extract_dimensions( $ext_image_size );
            $hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';
          } else {
            $hwstring = image_hwstring(100, 100);
          }
          $count_image_ext = $count_image_ext ? esc_attr( $count_image_ext ) : $default_src;
        }

        if( $count_icon_type == 'icon_browser' && !empty($count_icon) ) {
  				$content_icon = '<div class="kd-counter-icon"><i class="'.$count_icon.'" style=" '.$icon_color_style.' '.$icon_size_style.'"></i></div>';
  			}	elseif( $count_icon_type == 'custom_icon' ) {
          if ( $count_image_source == 'external_link' ) {
            if ( '' != $count_image_ext ) {
              $content_icon = '<img src="'.$count_image_ext.'" alt="" '.$hwstring.' />';
            }
          } else {
            if ( !empty($count_image) ) {
              $kd_counter_img_array = wpb_getImageBySize ( $params = array( 'post_id' => NULL, 'attach_id' => $count_image, 'thumb_size' => 'full', 'class' => "" ) );
      				$content_icon = '<div class="kd-counter-customimg">'.$kd_counter_img_array['thumbnail'].'</div>';
            }
          }
			  }

        if ( '' != $count_number_color ) {
          $count_number_style .= 'color:'.$count_number_color.';';
        }

        if ( '' != $count_number_units_size ) {
          $count_number_style .= 'font-size:'.$count_number_units_size.';';
        }

        if ( '' != $count_number_units_font_weight ) {
          $count_number_style .= 'font-weight:'.$count_number_units_font_weight.';';
        }

        if ( '' != $count_units_color ) {
          $count_units_style .= 'color:'.$count_units_color.';';
        }

        if ( '' != $count_number_units_size ) {
          $count_units_style .= 'font-size:'.$count_number_units_size.';';
        }

        if ( '' != $count_number_units_font_weight ) {
          $count_units_style .= 'font-weight:'.$count_number_units_font_weight.';';
        }

        //CSS Animation
        if ($css_animation == "no_animation") {
            $css_animation = "";
        }

        // Animation delay
        if ($elem_animation_delay) {
            $animation_delay = 'data-animation-delay='.$elem_animation_delay;
        }

				$output .= '<div class="kd_counter icon-top '.(!empty($count_extra_class) ? $count_extra_class : '').' '.$css_animation.'" '.$animation_delay.'>';
					$output .= '<div class="kd_counter_content">';
							if(!empty($content_icon)) {
							$output .= '<div class="kd_counter_icon">';
							$output .= $content_icon;
							$output .= '</div>';
							}
						$output .= '<h4 class="kd_counter_number">';
				      $output .= '<span class="kd_number_string" '.(!empty($count_number_style) ? 'style="' . $count_number_style . '"' : '').' data-from="0" data-to="'.$count_number.'" data-refresh-interval="50">0</span>';
              if ( '' != $count_units ) {
                $output .= '<span class="kd_counter_units" '.(!empty($count_units_style) ? 'style="' . $count_units_style . '"' : '').'>'.$count_units.'</span>';
              }
						$output .= '</h4>';
                        if (!empty($count_description)) {
						$output .= '<div class="kd_counter_text" '.(!empty($count_description_color) ? 'style="color: '.$count_description_color.';"' : '').'>'.$count_description.'</div>';
                        }
					$output .= '</div>';
				$output .= '</div>';

        return $output;

    }
  }
}

if (class_exists('KD_ELEM_COUNTER')) {
    $KD_ELEM_COUNTER = new KD_ELEM_COUNTER;
}

?>
