<?php
if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_tek_photogallery extends WPBakeryShortCodesContainer { }
}
if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_tek_photogallery_single extends WPBakeryShortCode { }
}

if (!class_exists('tek_photogallery')) {
    class tek_photogallery extends KEYDESIGN_ADDON_CLASS {
        function __construct() {
            add_action('init', array($this, 'kd_photogallery_init'));
            add_shortcode('tek_photogallery', array($this, 'kd_photogallery_container'));
            add_shortcode('tek_photogallery_single', array($this, 'kd_photogallery_single'));
        }
        // Element configuration in admin
        function kd_photogallery_init() {
            // Container element configuration
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Slider gallery", "keydesign"),
                    "description" => esc_html__("Responsive image gallery.", "keydesign"),
                    "base" => "tek_photogallery",
                    "class" => "kd-outer-controls",
                    "show_settings_on_create" => true,
                    "content_element" => true,
                    "as_parent" => array('only' => 'tek_photogallery_single'),
                    "icon" => plugins_url('assets/element_icons/photo-gallery.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "js_view" => 'VcColumnView',
                    "params" => array(
                        array(
                            "type"          =>  "dropdown",
                            "class"         =>  "",
                            "heading"       =>  esc_html__("Gallery layout","keydesign"),
                            "param_name"    =>  "pg_carousel_layout",
                            "value"         =>  array(
                                "Carousel" => "carousel-layout",
                                "Slider" => "slider-layout",
                            ),
                            "save_always" => true,
                            "description"   =>  esc_html__("Select gallery layout design.", "keydesign"),
                        ),

                        array(
                            "type"          =>  "dropdown",
                            "class"         =>  "",
                            "heading"       =>  esc_html__("Transparent inactive items","keydesign"),
                            "param_name"    =>  "pg_transparent_opt",
                            "value"         =>  array(
                                "Enable" => "enable-transparent-items",
                                "Disable" => "disable-transparent-items",
                            ),
                            "save_always" => true,
                            "dependency" =>	array(
                                "element" => "pg_carousel_layout",
                                "value" => array("carousel-layout")
                            ),
                            "description"   =>  esc_html__("Set a transparency layer to inactive carousel items.", "keydesign"),
                        ),

                        array(
                            "type"          =>  "dropdown",
                            "class"         =>  "",
                            "heading"       =>  esc_html__("Navigation style","keydesign"),
                            "param_name"    =>  "pg_nav_style",
                            "value"         =>  array(
                                    "Arrows" => "nav-arrows",
                                    "Dots" => "nav-dots",
                                    "Arrows and dots" => "nav-arrows-dots",
                                ),
                            "save_always" => true,
                            "description"   =>  esc_html__("Select navigation style.", "keydesign"),
                        ),

                        array(
                            "type"          =>  "dropdown",
                            "class"         =>  "",
                            "heading"       =>  esc_html__("Enable autoplay","keydesign"),
                            "param_name"    =>  "pg_autoplay",
                            "value"         =>  array(
                                    "Off"   => "auto_off",
                                    "On"   => "auto_on"
                                ),
                            "save_always" => true,
                            "description"   =>  esc_html__("Carousel autoplay settings.", "keydesign")
                        ),

                        array(
                            "type"          =>  "dropdown",
                            "class"         =>  "",
                            "heading"       =>  esc_html__("Autoplay speed","keydesign"),
                            "param_name"    =>  "pg_autoplay_speed",
                            "value"         =>  array(
                                    "10s"   => "10000",
                                    "9s"   => "9000",
                                    "8s"   => "8000",
                                    "7s"   => "7000",
                                    "6s"   => "6000",
                                    "5s"   => "5000",
                                    "4s"   => "4000",
                                    "3s"   => "3000",
                                ),
                            "save_always" => true,
                            "dependency" =>	array(
                                "element" => "pg_autoplay",
                                "value" => array("auto_on")
                            ),
                            "description"   =>  esc_html__("Select autoplay speed.", "keydesign")
                        ),

                        array(
                            "type"          =>  "dropdown",
                            "class"         =>  "",
                            "heading"       =>  esc_html__("Stop on hover","keydesign"),
                            "param_name"    =>  "pg_stoponhover",
                            "value"         =>  array(
                                    "Off"   => "hover_off",
                                    "On"   => "hover_on"
                                ),
                            "save_always" => true,
                            "dependency" =>	array(
                                "element" => "pg_autoplay",
                                "value" => array("auto_on")
                            ),
                            "description"   =>  esc_html__("Stop sliding on mouse over.", "keydesign")
                        ),

                        array(
                            "type"          =>  "dropdown",
                            "class"         =>  "",
                            "heading"       =>  esc_html__("Enable loop","keydesign"),
                            "param_name"    =>  "pg_enable_loop",
                            "value"         =>  array(
                                    "Off" => "loop_off",
                                    "On" => "loop_on",
                                ),
                            "save_always" => true,
                            "description"   =>  esc_html__("Infinity loop. Duplicate last and first items to get loop illusion.", "keydesign"),
                        ),

                        array(
                            'type' => 'css_editor',
                            'heading' => esc_html__( 'Css', 'keydesign' ),
                            'param_name' => 'css',
                            'group' => esc_html__( 'Design options', 'keydesign' ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Extra class name", "keydesign"),
                            "param_name" => "extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style this particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                    )
                ));
                // Shortcode configuration
                vc_map(array(
                    "name" => __("Child image", "keydesign"),
                    "base" => "tek_photogallery_single",
                    "content_element" => true,
                    "as_child" => array('only' => 'tek_photogallery'),
                    "icon" => plugins_url('assets/element_icons/child-image.png', dirname(__FILE__)),
                    "params" => array(
                      array(
                          "type" => "dropdown",
                          "class" => "",
                          "heading" => esc_html__("Image source", "keydesign"),
                          "param_name" => "pg_image_source",
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
                          "param_name" => "pg_image",
                          "value" => "",
                          "description" => esc_html__("Select or upload a image using the media library.", "keydesign"),
                          "dependency" =>	array(
                              "element" => "pg_image_source",
                              "value" => array("media_library"),
                          ),
                      ),
                      array(
                          "type" => "textfield",
                          "class" => "",
                          "heading" => esc_html__("Image external source", "keydesign"),
                          "param_name" => "pg_ext_image",
                          "value" => "",
                          "description" => esc_html__("Enter image external link.", "keydesign"),
                          "dependency" =>	array(
                              "element" => "pg_image_source",
                              "value" => array("external_link"),
                          ),
                      ),

                      array(
                          "type" => "textfield",
                          "class" => "",
                          "heading" => esc_html__("Image size", "keydesign"),
                          "param_name" => "pg_image_size",
                          "value" => "",
                          "description" => esc_html__("Enter image size in pixels. Example: 650x450 (Width x Height).", "keydesign"),
                          "dependency" =>	array(
                              "element" => "pg_image_source",
                              "value" => array("external_link"),
                          ),
                      ),

                      array(
                          "type" => "dropdown",
                          "class" => "",
                          "heading" => esc_html__("On click action", "keydesign"),
                          "param_name" => "pg_click_action",
                          "value" => array(
                              "None" => "click_action_none",
                              "Open PhotoSwipe" => "open_photoswipe",
                              "Open custom link" => "custom_link",
                          ),
                          "description" => esc_html__("Select action for click action.", "keydesign"),
                          "save_always" => true,
                      ),

                      array(
                          "type" => "textfield",
                          "class" => "",
                          "heading" => esc_html__("Caption title", "keydesign"),
                          "param_name" => "pg_image_caption_title",
                          "value" => "",
                          "description" => esc_html__("Show caption title with PhotoSwipe lightbox.", "keydesign"),
                          "dependency" =>	array(
                              "element" => "pg_click_action",
                              "value" => array("open_photoswipe"),
                          ),
                      ),

                      array(
                          "type" => "textfield",
                          "class" => "",
                          "heading" => esc_html__("Caption description", "keydesign"),
                          "param_name" => "pg_image_caption_desc",
                          "value" => "",
                          "description" => esc_html__("Show caption description with PhotoSwipe lightbox.", "keydesign"),
                          "dependency" =>	array(
                              "element" => "pg_click_action",
                              "value" => array("open_photoswipe"),
                          ),
                      ),

                      array(
                          "type" => "href",
                          "class" => "",
                          "heading" => esc_html__("Image link", "keydesign"),
                          "param_name" => "pg_image_link",
                          "value" => "",
                          "description" => esc_html__("Enter URL if you want this image to have a link (Note: parameters like \"mailto:\" are also accepted).", "keydesign"),
                          "dependency" =>	array(
                              "element" => "pg_click_action",
                              "value" => array("custom_link"),
                          ),
                      ),

                      array(
                    			'type' => 'dropdown',
                    			'heading' => __( 'Link Target', 'keydesign' ),
                    			'param_name' => 'pg_link_target',
                          "value" => array(
          									esc_html__( 'Same window', 'keydesign' ) => '_self',
          									esc_html__( 'New window', 'keydesign' ) => '_blank',
          								),
                    			'dependency' => array(
                      				'element' => 'pg_click_action',
                      				'value' => array('custom_link'),
                    			),
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
                          "param_name" => "elem_animation_delay",
                          "value" => array(
                              "0 ms" => "",
                              "200 ms" => "200",
                              "400 ms" => "400",
                              "600 ms" => "600",
                              "800 ms" => "800",
                              "1000 ms" => "1000",
                          ),
                          "dependency" =>	array(
                              "element" => "css_animation",
                              "value" => array("kd-animated fadeIn", "kd-animated fadeInDown", "kd-animated fadeInLeft", "kd-animated fadeInRight", "kd-animated fadeInUp", "kd-animated zoomIn")
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
                          "param_name" => "pg_extra_class",
                          "value" => "",
                          "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                          "group" => esc_html__( "Extras", "keydesign" ),
                      ),

                    )
                ));
            }
        }

        public function kd_photogallery_container($atts, $content = null) {

            // Declare empty vars
            $output = $photo_gallery_id = $pg_wrapper_class = '';

            extract(shortcode_atts(array(
                'pg_nav_style' => '',
                'pg_autoplay' => '',
                'pg_autoplay_speed' => '',
                'pg_stoponhover' => '',
                'pg_enable_loop' => '',
                'pg_transparent_opt' => '',
                'pg_carousel_layout' => '',
                'extra_class' => '',
                'css' => '',
            ), $atts));

            // Load PhotoSwipe resources
            wp_enqueue_style( 'photoswipe' );
            wp_enqueue_script( 'photoswipejs' );
            add_action( 'wp_footer', 'keydesign_photoswipe' );

            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );

            $photo_gallery_id = "kd-photo-gallery-".uniqid();

            $pg_wrapper_class = implode(' ', array('photo-gallery-wrapper', $pg_transparent_opt, $pg_carousel_layout, $photo_gallery_id, $pg_nav_style, $extra_class, $css_class));

            $output .= '<div class="'.trim($pg_wrapper_class).'">
              <div class="gallery-items">' . do_shortcode($content) . '</div>
            </div>';

            $output .= '<script>
              jQuery(document).ready(function($){
                if ($(".'.$photo_gallery_id.' .gallery-items").length) {
                  $(".'.$photo_gallery_id.' .gallery-items").owlCarousel({
                    stageClass: "owl-wrapper",
                    stageOuterClass: "owl-wrapper-outer",
                    loadedClass: "owl-carousel",
                    items: 1,
                    rewind: true,
                    responsive:{
                        0:{
                            dots: false,
                            nav: true,
                            navSpeed: 500,
                        },
                        1366:{';
                            if ( vc_is_inline() ) {
                              $output .= 'dots: false, nav: false,';
                            } else {
                              if ( $pg_nav_style == "nav-arrows" ) {
                                $output .= "\n".'nav: true,
                                navSpeed: 500,
                                dots: false,';
                              } elseif ( $pg_nav_style == "nav-dots" ) {
                                $output .= "\n".'dots: true,
                                nav: false,
                                dotsSpeed: 500,
                                dotsEach: true,';
                              } elseif ( $pg_nav_style == "nav-arrows-dots" ) {
                                $output .= "\n".'nav: true,
                                navSpeed: 500,
                                dots: true,
                                dotsSpeed: 500,
                                dotsEach: true,';
                              }
                            }
                        $output .= '}
                    },';

                    if ( $pg_enable_loop == "loop_on" && ! vc_is_inline() ) {
                      $output .= "\n".'loop: true,';
                    }

                    if ( $pg_autoplay == "auto_on" ) {
                      $output .= "\n".'autoplay: true,';
                    } else {
                      $output .= "\n".'autoplay: false,';
                    }

                    if ( $pg_autoplay_speed !== "" ) {
                      $output .= "\n".'autoplayTimeout: '.$pg_autoplay_speed.',';
                    }

                    if ( $pg_autoplay == "auto_on" && $pg_stoponhover == "hover_on" ) {
                      $output .= "\n".'autoplayHoverPause: true,';
                    } else {
                      $output .= "\n".'autoplayHoverPause: false,';
                    }

                    $output .='
                    addClassActive: true,
                  });
                }
              });
            </script>';

            return $output;
        }

        public function kd_photogallery_single($atts, $content = null) {

            // Declare empty vars
            $output = $default_src = $image = $caption_title = $caption_desc = $size_fix = $dimensions = $ext_image_size_style = $wrapper_class = $animation_delay = '';

            extract(shortcode_atts(array(
                'pg_image_source' => '',
                'pg_image' => '',
                'pg_ext_image' => '',
                'pg_image_size' => '',
                'pg_click_action' => '',
                'pg_image_caption_title' => '',
                'pg_image_caption_desc' => '',
                'pg_image_link' => '',
                'pg_link_target' => '',
                'css_animation' => '',
                'elem_animation_delay' => '',
                'pg_extra_class' => '',
            ), $atts));

            $image  = wpb_getImageBySize($params = array(
                'post_id' => NULL,
                'attach_id' => $pg_image,
                'thumb_size' => 'full',
                'class' => ""
            ));

            $default_src = vc_asset_url( 'vc/no_image.png' );

            if ($pg_image_source == 'external_link') {
              $src = $pg_ext_image;
            } elseif ($pg_image_source == 'media_library' && !$image) {
              $src = $default_src;
            } else {
              $link = wp_get_attachment_image_src( $pg_image, 'large' );
              $link = $link[0];
              $src = $link;
            }

            if ($pg_image_source == 'external_link' && !$pg_ext_image ) {
              $width = '800';
              $height = '600';
            } elseif ($pg_image_source == 'media_library' && !$image) {
              $width = '800';
              $height = '600';
            } elseif ($pg_image_source == 'external_link' && $pg_ext_image != '') {
                if (is_readable($src)) {
                    list($width, $height) = getimagesize($src);
                } else {
                     $width = '800';
                     $height = '600';
                }
            } else {
              $size_fix = wp_get_attachment_image_src( $pg_image, 'large' );
              $width = $size_fix[1];
              $height = $size_fix[2];
            }
            $a_attrs['href'] = $pg_image_link;
            $a_attrs['target'] = $pg_link_target;

            if ( '' != $pg_image_caption_title ) {
              $caption_title = 'data-caption-title="'.esc_html( $pg_image_caption_title ).'"';
            }

            if ( '' != $pg_image_caption_desc ) {
              $caption_desc = 'data-caption-desc="'.esc_html( $pg_image_caption_desc ).'"';
            }

            // External image size
            if ( $pg_image_source == 'external_link' && '' != $pg_ext_image ) {
              if ( '' != $pg_image_size ) {
                $dimensions = vc_extract_dimensions( $pg_image_size );
                $ext_image_size_style .= 'width:'.$dimensions[0].'px;';
                $ext_image_size_style .= 'height:'.$dimensions[1].'px;';
                $ext_image_size_style = 'style="'.$ext_image_size_style.'"';
                $width = $dimensions[0];
                $height = $dimensions[1];
              }
            }

            // Animation delay
            if ( $elem_animation_delay ) {
                $animation_delay = 'data-animation-delay='.$elem_animation_delay;
            }

            $wrapper_class = implode( ' ', array( 'pg-child-image', $pg_extra_class, $css_animation ));

            $output .= '<div class="'.trim($wrapper_class).'" '.$animation_delay.'>';
              if ($pg_image_source == 'external_link') {
                if ($pg_ext_image != '') {
                  if ($pg_click_action == 'open_photoswipe') {
                    $output .= '<a href='. $src . ' data-size="' . $width. 'x' .$height .'" '.$caption_title.' '.$caption_desc.'><img class="pg-img open-photoswipe" src="'.$pg_ext_image.'" alt="" width="'.$width.'" height="'.$height.'" '.$ext_image_size_style.' /></a>';
                  } elseif ($pg_click_action == 'custom_link') {
                    $output .= '<a ' . vc_stringify_attributes( $a_attrs ) . '><img class="pg-img" src="'.$pg_ext_image.'" alt="" width="'.$width.'" height="'.$height.'" '.$ext_image_size_style.' /></a>';
                  } else {
                    $output .='<img class="pg-img" src="'.$pg_ext_image.'" alt="" width="'.$width.'" height="'.$height.'" '.$ext_image_size_style.' />';
                  }
                } else {
                  $output .='<img class="pg-img" src="'.$default_src.'" alt="" class="vc_img-placeholder" />';
                }
              } else {
                if ($image != '') {
                  if ($pg_click_action == 'open_photoswipe') {
                    $output .= '<a href='. $src . ' data-size="' . $width. 'x' .$height .'" '.$caption_title.' '.$caption_desc.'>' . $image['thumbnail'] . '</a>';
                  } elseif ($pg_click_action == 'custom_link') {
                    $output .= '<a ' . vc_stringify_attributes( $a_attrs ) . '>' . $image['thumbnail'] . '</a>';
                  } else {
                    $output .= $image['thumbnail'];
                  }
                } else {
                  $output .='<img class="pg-img" src="'.$default_src.'" alt="" class="vc_img-placeholder" />';
                }
              }
            $output .= '</div>';

            return $output;

        }

    }
}
if (class_exists('tek_photogallery')) {
    $tek_photogallery = new tek_photogallery;
}
?>
