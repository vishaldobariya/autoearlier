<?php

if (!class_exists('KD_ELEM_SECTION_TITLE')) {

    class KD_ELEM_SECTION_TITLE extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_sectiontitle_init'));
            add_shortcode('tek_sectiontitle', array($this, 'kd_sectiontitle_shrt'));
        }

        // Element configuration in admin

        function kd_sectiontitle_init() {
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Section title", "keydesign"),
                    "description" => esc_html__("Custom title, separator and subtitle.", "keydesign"),
                    "base" => "tek_sectiontitle",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/section-title.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(
                        array(
                            "type" => "textarea",
                            "class" => "kd-back-desc",
                            "heading" => esc_html__("Title", "keydesign"),
                            "param_name" => "st_title",
                            "holder" => "div",
                            "value" => "",
                            "description" => esc_html__("Add your section title here. You can highlight a word using asterisks (eg: Center aligned *section* title).", "keydesign"),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Title tag", "keydesign"),
                            "param_name" => "st_title_tag",
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
                            "description" => esc_html__("Select title tag.", "keydesign")
                        ),
                        array(
                            "type" => "textarea",
                            "class" => "",
                            "heading" => esc_html__("Subtitle", "keydesign"),
                            "param_name" => "st_subtitle",
                            "value" => "",
                            "description" => esc_html__("Add your section subtitle here.", "keydesign"),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Subtitle position", "keydesign"),
                            "param_name" => "st_subtitle_position",
                            "value" => array(
                                "Below title" => "subtitle-below-title",
                                "Above title" => "subtitle-above-title"
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select subtitle position.", "keydesign")
                        ),
                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Title color", "keydesign"),
                            "param_name" => "st_title_color",
                            "value" => "",
                            "description" => esc_html__("Select title color.", "keydesign")
                        ),
                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Subtitle color", "keydesign"),
                            "param_name" => "st_subtitle_color",
                            "value" => "",
                            "description" => esc_html__("Select subtitle color.", "keydesign")
                        ),
                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Highlighted text color", "keydesign"),
                            "param_name" => "st_highlight_text_color",
                            "value" => "",
                            "description" => esc_html__("Select highlighted text color. If none selected, the theme primary color will be used.", "keydesign")
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Title font size", "keydesign"),
                            "param_name" => "st_title_size",
                            "value" => "",
                            "description" => esc_html__("Enter title font size. (eg. 10px, 1em, 1rem)", "keydesign"),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Title line height", "keydesign"),
                            "param_name" => "st_title_line_height",
                            "value" => "",
                            "description" => esc_html__("Enter title line height. (eg. 10px, 1em, 1rem)", "keydesign"),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Title font weight", "keydesign"),
                            "param_name" => "st_title_font_weight",
                            "value" => array(
                                "Inherit" => "",
                                "Thin" => "100",
                                "Light" => "200",
                                "Book" => "300",
                                "Regular" => "400",
                                "Medium" => "500",
                                "Semi-bold" => "600",
                                "Bold" => "700",
                                "Extra-bold" => "800",
                                "Ultra-bold" => "900",
                            ),
                            "save_always" => true,
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Subtitle font size", "keydesign"),
                            "param_name" => "st_subtitle_size",
                            "value" => "",
                            "description" => esc_html__("Enter subtitle font size. (eg. 10px, 1em, 1rem)", "keydesign"),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Spacing between title and subtitle", "keydesign"),
                            "param_name" => "st_title_bottom_spacing",
                            "value" => "",
                            "description" => esc_html__("Overwrite spacing between title and subtitle. (eg. 10px, 1em, 1rem)", "keydesign"),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Use separator", "keydesign"),
                            "param_name" => "st_separator_enable",
                            "value" => array(
                                "Off" => "separator_off",
                                "On" => "separator_on"
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Enable to add a separator.", "keydesign")
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Separator position", "keydesign"),
                            "param_name" => "st_separator_position",
                            "value" => array(
                                "Above title" => "above_title",
                                "Below title" => "below_title",
                            ),
                            "dependency" =>	array(
                                "element" => "st_separator_enable",
                                "value" => array("separator_on")
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select separator position.", "keydesign")
                        ),
                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Separator color", "keydesign"),
                            "param_name" => "st_separator_color",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "st_separator_enable",
                                "value" => array("separator_on")
                            ),
                            "description" => esc_html__("Select color of separator.", "keydesign")
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Separator style","keydesign"),
                            "param_name" => "st_separator_style",
                            "value" => array(
                                "Solid line" => "solid-line",
                                "Dotted line" => "dotted-line",
                                "Dashed line" => "dashed-line",
                            ),
                            "dependency" =>	array(
                                "element" => "st_separator_enable",
                                "value" => array("separator_on")
                            ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select separator style.", "keydesign")
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Separator border width","keydesign"),
                            "param_name" => "st_separator_width",
                            "value" => array(
                                "1px" => "sep-border-width-1",
                                "2px" => "sep-border-width-2",
                                "3px" => "sep-border-width-3",
                                "4px" => "sep-border-width-4",
                                "5px" => "sep-border-width-5",
                                "6px" => "sep-border-width-6",
                                "7px" => "sep-border-width-7",
                                "8px" => "sep-border-width-8",
                                "9px" => "sep-border-width-9",
                                "10px" => "sep-border-width-10",
                            ),
                            "dependency" =>	array(
                                "element" => "st_separator_enable",
                                "value" => array("separator_on")
                            ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select border width (pixels).", "keydesign")
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Separator length", "keydesign"),
                            "param_name" => "st_separator_length",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "st_separator_enable",
                                "value" => array("separator_on")
                            ),
                            "description" => esc_html__("Enter separator length (pixels).", "keydesign"),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Text align","keydesign"),
                            "param_name" => "st_text_align",
                            "value" => array(
                                "Center" => "text-center",
                                "Left" => "text-left",
                                "Right" => "text-right",
                            ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select element alignment.", "keydesign")
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Section width","keydesign"),
                            "param_name" => "st_width",
                            "value" => array(
                                "Full width" => "st_fullwidth",
                                "2/3 columns" => "st_8_columns",
                                "1/2 columns" => "st_6_columns",
                                "1/3 columns" => "st_4_columns",
                            ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select element width.", "keydesign")
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
                                "No"              => "",
                                "Fade In"         => "kd-animated fadeIn",
                                "Fade In Down"    => "kd-animated fadeInDown",
                                "Fade In Left"    => "kd-animated fadeInLeft",
                                "Fade In Right"   => "kd-animated fadeInRight",
                                "Fade In Up"      => "kd-animated fadeInUp",
                                "Zoom In"         => "kd-animated zoomIn",
                            ),
                            "description" => esc_html__("Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).", "keydesign"),
                            "admin_label" => true,
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Animation delay", "keydesign"),
                            "param_name" => "css_animation_delay",
                            "value" => array(
                                "0 ms"              => "",
                                "200 ms"            => "200",
                                "400 ms"            => "400",
                                "600 ms"            => "600",
                                "800 ms"            => "800",
                                "1 s"               => "1000",
                            ),
                            "dependency" =>	array(
                                "element" => "css_animation",
                                "value" => array("kd-animated fadeIn", "kd-animated fadeInDown", "kd-animated fadeInLeft", "kd-animated fadeInRight", "kd-animated fadeInUp", "kd-animated zoomIn")
                            ),
                            "description" => esc_html__("Enter animation delay in ms", "keydesign"),
                            "admin_label" => true,
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Extra class name", "keydesign"),
                            "param_name" => "st_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),

                    )
                ));
            }
        }



		// Render the element on front-end

        public function kd_sectiontitle_shrt($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'st_title' => '',
                'st_title_tag' => 'h2',
                'st_subtitle' => '',
                'st_subtitle_position' => '',
                'st_title_color' => '',
                'st_subtitle_color' => '',
                'st_highlight_text_color' => '',
                'st_title_size' => '',
                'st_title_line_height' => '',
                'st_title_font_weight' => '',
                'st_subtitle_size' => '',
                'st_title_bottom_spacing' => '',
                'st_separator_enable' => '',
                'st_separator_position' => 'above_title',
                'st_separator_color' => '',
                'st_separator_style' => '',
                'st_separator_width' => '',
                'st_separator_length' => '',
                'st_text_align' => '',
                'st_width' => '',
                'css' => '',
                'css_animation' => '',
                'css_animation_delay' => '',
                'st_extra_class' => '',
            ), $atts));

            $st_title_style = $st_subtitle_style = $st_separator_classes = $separator_structure = $section_width_class = $css_class = $animation_delay = $subtitle_structure = $highlight_color = '';

            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

            if ( !empty( $st_title_color ) ) {
              $st_title_style .= 'color: '.$st_title_color.';';
            }
            if ( !empty( $st_title_size ) ) {
              $st_title_style .= 'font-size: '.$st_title_size.';';
            }
            if ( !empty( $st_title_line_height ) ) {
              $st_title_style .= 'line-height: '.$st_title_line_height.';';
            }
            if ( !empty( $st_title_font_weight ) ) {
              $st_title_style .= 'font-weight: '.$st_title_font_weight.';';
            }
            if ( !empty( $st_title_bottom_spacing ) ) {
              $st_title_style .= 'margin-bottom:' . ( preg_match( '/(px|em|\%|pt|cm)$/', $st_title_bottom_spacing ) ? $st_title_bottom_spacing : $st_title_bottom_spacing . 'px' ) . ';';
            }

            if (!empty ($st_subtitle_color) ) {
              $st_subtitle_style .= 'color: '.$st_subtitle_color.';';
            }
            if (!empty ($st_subtitle_size) ) {
              $st_subtitle_style .= 'font-size:' . ( preg_match( '/(px|em|\%)$/', $st_subtitle_size ) ? $st_subtitle_size : $st_subtitle_size . 'px' ) . ';';
            }

            if ($st_separator_enable == 'separator_on') {
              $st_separator_classes .= $st_separator_style . ' ' . $st_separator_width. ' ' . $st_separator_length;
            }

            switch($st_width){
      				case 'st_fullwidth':
      					$section_width_class = 'col-lg-12';
      				break;

      				case 'st_8_columns':
                $section_width_class = 'col-lg-8 vc_col-sm-8';
      				break;

              case 'st_6_columns':
                $section_width_class = 'vc_col-lg-6 vc_col-sm-8';
      				break;

              case 'st_4_columns':
                $section_width_class = 'vc_col-lg-4 vc_col-sm-8';
      				break;

      				default:
      			}

            // Highlight text
            $highlight_color = sway_get_option( 'tek-main-color' );

            if ( '' != $st_highlight_text_color ) {
              $highlight_color = $st_highlight_text_color;
            }

            if ( preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $st_title) ) {
              $st_title = preg_replace("/\*([^*]+)\*/", "<span style=\"color:".$highlight_color.";\">$1</span>", $st_title );
            }

            //CSS Animation
            if ($css_animation == "no_animation") {
                $css_animation = "";
            }

            // Animation delay
            if ($css_animation_delay) {
                $animation_delay = 'data-animation-delay='.$css_animation_delay;
            }

            $separator_structure .= '<div class="kd-separator ' . $st_separator_position . '" '.(!empty($st_separator_length) ? 'style="width:' . $st_separator_length . ';"' : '').'><div class="kd-separator-line" '.(!empty($st_separator_color) ? 'style="border-color:' . $st_separator_color . '"' : '').'></div></div>';

            if ( $st_subtitle ) {
              $subtitle_structure .= '<h6 class="subtitle" '.(!empty($st_subtitle_style) ? 'style="' . $st_subtitle_style . '"' : '').'>' . $st_subtitle . '</h6>';
            }

            $output = '<header class="kd-section-title '.$section_width_class.' ' . $st_text_align . ' ' . $st_separator_classes . ' ' . $st_subtitle_position . ' '.$css_animation.' ' . $st_extra_class.' '.esc_attr( $css_class ).'" '.$animation_delay.'>';
              if ( $st_subtitle && ( $st_subtitle_position == 'subtitle-above-title' ) ) {
                $output .= $subtitle_structure;
              }

              if (( $st_separator_enable == 'separator_on') && ($st_separator_position == 'above_title' )) {
                $output .= $separator_structure;
              }
              if ( $st_title ) {
                if ($st_title_tag != '') {
                  $output .= '<'.esc_attr($st_title_tag).' class="' . $st_separator_enable . '" '.(!empty($st_title_style) ? 'style="' . $st_title_style . '"' : '').'>' . $st_title . '</'.esc_attr($st_title_tag).'>';
                } else {
                  $output .= '<h2 class="' . $st_separator_enable . '" '.(!empty($st_title_style) ? 'style="' . $st_title_style . '"' : '').'>' . $st_title . '</h2>';
                }
              }

              if (( $st_separator_enable == 'separator_on' ) && ( $st_separator_position == 'below_title' )) {
                $output .= $separator_structure;
              }

              if ( $st_subtitle && ( $st_subtitle_position == 'subtitle-below-title' ) ) {
                $output .= $subtitle_structure;
              }
            $output .= '</header>';

            return $output;

        }
    }
}

if (class_exists('KD_ELEM_SECTION_TITLE')) {
    $KD_ELEM_SECTION_TITLE = new KD_ELEM_SECTION_TITLE;
}

?>
