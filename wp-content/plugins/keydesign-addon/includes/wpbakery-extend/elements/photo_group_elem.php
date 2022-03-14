<?php

if (!class_exists('KD_ELEM_PHOTO_GROUP')) {

    class KD_ELEM_PHOTO_GROUP extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_photo_group_init'));
            add_shortcode('tek_photo_group', array($this, 'kd_photo_group_shrt'));
        }

        // Element configuration in admin

        function kd_photo_group_init() {
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Photo group", "keydesign"),
                    "description" => esc_html__("Two photo group with animation and parallax effects.", "keydesign"),
                    "base" => "tek_photo_group",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/photo-group.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("First image source", "keydesign"),
                            "param_name" => "pg_first_image_source",
                            "value" => array(
                                "Media library" => "media_library",
                                "External link" => "external_link",
                            ),
                            "description" => esc_html__("Select first image source.", "keydesign"),
                            "save_always" => true,
                        ),
                        array(
                            "type" => "attach_image",
                            "class" => "",
                            "heading" => esc_html__("First image", "keydesign"),
                            "param_name" => "pg_first_image",
                            "value" => "",
                            "description" => esc_html__("Select or upload a image using the media library.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "pg_first_image_source",
                                "value" => array("media_library"),
                            ),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("First image external source", "keydesign"),
                            "param_name" => "pg_first_ext_image",
                            "value" => "",
                            "description" => esc_html__("Enter image external link.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "pg_first_image_source",
                                "value" => array("external_link"),
                            ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Second image source", "keydesign"),
                            "param_name" => "pg_second_image_source",
                            "value" => array(
                                "Media library" => "media_library",
                                "External link" => "external_link",
                            ),
                            "description" => esc_html__("Select second image source.", "keydesign"),
                            "save_always" => true,
                        ),
                        array(
                            "type" => "attach_image",
                            "class" => "",
                            "heading" => esc_html__("Second image", "keydesign"),
                            "param_name" => "pg_second_image",
                            "value" => "",
                            "description" => esc_html__("Select or upload a image using the media library.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "pg_second_image_source",
                                "value" => array("media_library"),
                            ),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Second image external source", "keydesign"),
                            "param_name" => "pg_second_ext_image",
                            "value" => "",
                            "description" => esc_html__("Enter image external link.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "pg_second_image_source",
                                "value" => array("external_link"),
                            ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Second image position", "keydesign"),
                            "param_name" => "pg_second_image_position",
                            "value" => array(
                                "-40%" => "-40%",
                                "-35%" => "-35%",
                                "-30%" => "-30%",
                                "-25%" => "-25%",
                                "-20%" => "-20%",
                                "-15%" => "-15%",
                                "-10%" => "-10%",
                                "-5%" => "-5%",
                                "0" => "0px",
                                "5%" => "5%",
                                "10%" => "10%",
                                "15%" => "15%",
                                "20%" => "20%",
                                "25%" => "25%",
                                "30%" => "30%",
                                "35%" => "35%",
                                "40%" => "40%",
                            ),
                            "description" => esc_html__("Select second image position relative to the first image on the vertical axis.", "keydesign"),
                            "save_always" => true,
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Group layout", "keydesign"),
                            "param_name" => "pg_group_layout",
                            "value" => array(
                                "First image left - Second image left" => "group-layout-left",
                                "First image right - Second image right" => "group-layout-right",
                                "First image center - Second image center" => "group-layout-center",
                                "First image center - Second image right" => "group-layout-center-right",
                                "First image center - Second image left" => "group-layout-center-left",
                                "First image left - Second image right" => "group-layout-left-right",
                                "First image right - Second image left" => "group-layout-right-left",
                            ),
                            "description" => esc_html__("Select group image layout.", "keydesign"),
                            "save_always" => true,
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Image shadow", "keydesign"),
                            "param_name" => "pg_img_shadow",
                            "value" => array(
                                "Disable" => "no-shadow",
                                "Small shadow" => "small-shadow",
                                "Large shadow" => "large-shadow",
                            ),
                            "description" => esc_html__("Enable to apply shadow effect on photo group.", "keydesign"),
                            "save_always" => true,
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Enable parallax", "keydesign"),
                            "param_name" => "pg_parallax",
                            "value" => array(
                                "Disable" => "disable-parallax",
                                "Enable" => "enable-parallax",
                            ),
                            "description" => esc_html__("Enable to apply parallax effect on photo group.", "keydesign"),
                            "save_always" => true,
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
                            "heading" => esc_html__("Disable responsive", "keydesign"),
                            "param_name" => "pg_disable_responsive",
                            "value" => array(
                                "Off" => "",
                                "On" => "disable-responsive",
                            ),
                            "description" => esc_html__("If enabled, prevents images from \"stacking\" one on top of the other (on small media screens, eg. mobile).", "keydesign"),
                            "save_always" => true,
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("First image CSS Animation", "keydesign"),
                            "param_name" => "css_animation_first_image",
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
                            "heading" => esc_html__("First image animation delay", "keydesign"),
                            "param_name" => "first_image_animation_delay",
                            "value" => array(
                                "0 ms" => "",
                                "200 ms" => "200",
                                "400 ms" => "400",
                                "600 ms" => "600",
                                "800 ms" => "800",
                                "1 s" => "1000",
                            ),
                            "dependency" =>	array(
                                "element" => "css_animation_first_image",
                                "value" => array("kd-animated fadeIn", "kd-animated fadeInDown", "kd-animated fadeInLeft", "kd-animated fadeInRight", "kd-animated fadeInUp", "kd-animated zoomIn")
                            ),
                            "save_always" => true,
                            "admin_label" => true,
                            "description" => esc_html__("Select animation delay.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Second image CSS Animation", "keydesign"),
                            "param_name" => "css_animation_second_image",
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
                            "heading" => esc_html__("Second image animation delay", "keydesign"),
                            "param_name" => "second_image_animation_delay",
                            "value" => array(
                                "0 ms" => "",
                                "200 ms" => "200",
                                "400 ms" => "400",
                                "600 ms" => "600",
                                "800 ms" => "800",
                                "1 s" => "1000",
                            ),
                            "dependency" =>	array(
                                "element" => "css_animation_second_image",
                                "value" => array("kd-animated fadeIn", "kd-animated fadeInDown", "kd-animated fadeInLeft", "kd-animated fadeInRight", "kd-animated fadeInUp", "kd-animated zoomIn")
                            ),
                            "save_always" => true,
                            "admin_label" => true,
                            "description" => esc_html__("Select animation delay.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Extra class name", "keydesign"),
                            "param_name" => "pg_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                    )
                ));
            }
        }



        // Render the element on front-end

        public function kd_photo_group_shrt($atts, $content = null) {

            // Declare empty vars
            $output = $default_src = $first_image = $second_image = $wrapper_class = $width_first_image = $height_first_image = $width_second_image = $height_second_image = $no_image_output = $first_animation_delay = $second_animation_delay = $css_class = '';

            extract( shortcode_atts( array(
                'pg_first_image_source' => '',
                'pg_first_image' => '',
                'pg_first_ext_image' => '',
                'pg_second_image_source' => '',
                'pg_second_image' => '',
                'pg_second_ext_image' => '',
                'pg_second_image_position' => '',
                'pg_group_layout' => '',
                'pg_img_shadow' => '',
                'pg_parallax' => '',
                'css' => '',
                'pg_disable_responsive' => '',
                'css_animation_first_image' => '',
                'first_image_animation_delay' => '',
                'css_animation_second_image' => '',
                'second_image_animation_delay' => '',
                'pg_extra_class' => '',
            ), $atts ) );

            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

            $default_src = vc_asset_url( 'vc/no_image.png' );
            $no_image_output .='<img class="photo-group-img" alt="" src="'.$default_src.'" />';

            // First image source
            if ( $pg_first_image_source == 'media_library' ) {
              if ( '' != $pg_first_image ) {
                $first_image  = wpb_getImageBySize($params = array(
                    'post_id' => NULL,
                    'attach_id' => $pg_first_image,
                    'thumb_size' => 'full',
                    'class' => ""
                ));
              }
            } elseif ( $pg_first_image_source == 'external_link' ) {
              if ( '' != $pg_first_ext_image ) {
                $first_image  = $pg_first_ext_image;
              }
            }

            // Second image source
            if ( $pg_second_image_source == 'media_library' ) {
              if ( '' != $pg_second_image ) {
                $second_image  = wpb_getImageBySize($params = array(
                    'post_id' => NULL,
                    'attach_id' => $pg_second_image,
                    'thumb_size' => 'full',
                    'class' => ""
                ));
              }
            } elseif ( $pg_second_image_source == 'external_link' ) {
              if ( '' != $pg_second_ext_image ) {
                $second_image  = $pg_second_ext_image;
              }
            }

            // Image size
            if ( $pg_first_image_source == 'external_link' ) {
              if ( '' != $pg_first_ext_image ) {
                list( $width_first_image, $height_first_image ) = getimagesize( $pg_first_ext_image );
              }
            }

            if ( $pg_second_image_source == 'external_link' ) {
              if ( '' != $pg_second_ext_image ) {
                list( $width_second_image, $height_second_image ) = getimagesize( $pg_second_ext_image );
              }
            }

            // Animation delay
            if ( '' != $first_image_animation_delay ) {
                $first_animation_delay = 'data-animation-delay='.$first_image_animation_delay;
            }
            if ( '' != $second_image_animation_delay ) {
                $second_animation_delay = 'data-animation-delay='.$second_image_animation_delay;
            }

            // Wrapper class
            $wrapper_class = implode( ' ', array('kd-photo-group', $pg_group_layout, $pg_img_shadow, $pg_parallax, $css_class, $pg_disable_responsive, $pg_extra_class ));

            // Begin element output

            $output .= '<div class="'.trim( $wrapper_class ).'">
                <div class="kd-group-image first-image-wrapper">';
                    if ( '' != $css_animation_first_image ) {
                      $output .= '<div class="kd-group-image-animation '. $css_animation_first_image .'" '.$first_animation_delay.'>';
                    }

                    if ( $pg_first_image_source == 'media_library' ) {
                      if ( '' != $pg_first_image ) {
                        $output .= $first_image['thumbnail'];
                      } else {
                        $output .= $no_image_output;
                      }
                    } elseif ( $pg_first_image_source == 'external_link' ) {
                      if ( '' != $pg_first_ext_image ) {
                        $output .= '<img class="photo-group-img" src="'.$pg_first_ext_image.'" alt="" loading="lazy" width="'.$width_first_image.'" height="'.$height_first_image.'" />';
                      } else {
                        $output .= $no_image_output;
                      }
                    }

                    if ( '' != $css_animation_first_image ) {
                      $output .= '</div>';
                    }
                  $output .= '</div>
                <div class="kd-group-image second-image-wrapper" '.(!empty($pg_second_image_position) ? 'style="bottom: '.$pg_second_image_position.';"' : '').'>';
                  if ( '' != $css_animation_second_image ) {
                    $output .= '<div class="kd-group-image-animation '. $css_animation_second_image .'" '.$second_animation_delay.'>';
                  }

                  if ( $pg_second_image_source == 'media_library' ) {
                    if ( '' != $pg_second_image ) {
                      $output .= $second_image['thumbnail'];
                    } else {
                      $output .= $no_image_output;
                    }
                  } elseif ( $pg_second_image_source == 'external_link' ) {
                    if ( '' != $pg_second_ext_image ) {
                      $output .= '<img class="photo-group-img" src="'.$pg_second_ext_image.'" alt="" loading="lazy" width="'.$width_second_image.'" height="'.$height_second_image.'" />';
                    } else {
                      $output .= $no_image_output;
                    }
                  }

                  if ( '' != $css_animation_second_image ) {
                    $output .= '</div>';
                  }
                  $output .= '</div>
            </div>';

            return $output;

        }
    }
}

if (class_exists('KD_ELEM_PHOTO_GROUP')) {
    $KD_ELEM_PHOTO_GROUP = new KD_ELEM_PHOTO_GROUP;
}

?>
