<?php

if (!class_exists('KD_ELEM_ICON_BOX')) {

    class KD_ELEM_ICON_BOX extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_iconbox_init'));
            add_shortcode('tek_iconbox', array($this, 'kd_iconbox_shrt'));
        }

        // Element configuration in admin

        function kd_iconbox_init() {
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Icon box", "keydesign"),
                    "description" => esc_html__("Simple text box with icon.", "keydesign"),
                    "base" => "tek_iconbox",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/icon-box.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(

                        array(
                            "type" => "textarea",
                            "class" => "kd-back-desc",
                            "heading" => esc_html__("Box title", "keydesign"),
                            "param_name" => "title",
                            "holder" => "div",
                            "value" => "",
                            "description" => esc_html__("Enter box title here.", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Title tag","keydesign"),
                            "param_name"	=>	"title_size",
                            "value"			=>	array(
                                "Default" => "h5",
                                "h1" => "h1",
                                "h2" => "h2",
                                "h3" => "h3",
                                "h4" => "h4",
                                "h5" => "h5",
                                "h6" => "h6",
                            ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select title tag. Default is set to h5.", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Title color", "keydesign"),
                            "param_name" => "title_color",
                            "value" => "",
                            "description" => esc_html__("Choose title color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Content type","keydesign"),
                            "param_name"	=>	"box_content_type",
                            "value"			=>	array(
                                "Simple text" => "simple_text",
                                "HTML content" => "html_content",
                            ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select box content type.", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),

	                      array(
                            "type" => "textarea",
                            "class" => "",
                            "heading" => esc_html__("Box content - simple text", "keydesign"),
                            "param_name" => "text_box",
                            "value" => "",
                            "description" => esc_html__("Enter box content text here.", "keydesign"),
		                        "dependency" =>	array(
                                "element" => "box_content_type",
                                "value" => array("simple_text")
                            ),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),

                        array(
                            "type" => "textarea_html",
                            "class" => "",
                            "heading" => esc_html__("Box content - HTML content", "keydesign"),
                            "param_name" => "content",
                            "value" => "",
                            "description" => esc_html__("Enter box content text here.", "keydesign"),
			                      "dependency" =>	array(
                                "element" => "box_content_type",
                                "value" => array("html_content")
                            ),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Content text size", "keydesign"),
                            "param_name" => "text_font_size",
                            "value" => "",
                            "description" => esc_html__("Enter content text size. (eg. 14px, 1em, 1rem)", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Content text color", "keydesign"),
                            "param_name" => "text_color",
                            "value" => "",
                            "description" => esc_html__("Select content text color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Display icon","keydesign"),
                            "param_name"	=>	"icon_type",
                            "value"			=>	array(
                                    "Icon browser" => "icon_browser",
                                    "Custom image" => "custom_icon",
                                    "No icon" => "no_icon",
                                ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select icon source.", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Icon position","keydesign"),
                            "param_name"	=>	"icon_position",
                            "value"			=>	array(
                                    "Top" => "icon_top",
                                    "Left" => "icon_left",
                                ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "icon_type",
                                "value" => array("icon_browser", "custom_icon"),
                            ),
                            "description"	=>	esc_html__("Select icon/image position relative to the content.", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Icon layout","keydesign"),
                            "param_name"	=>	"icon_layout",
                            "value"			=>	array(
                                    "Contained" => "contained-icon",
                                    "Full-width" => "fullwidth-image",
                                ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "icon_position",
                                "value" => array("icon_top"),
                            ),
                            "description"	=>	esc_html__("Select icon layout size.", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Icon background","keydesign"),
                            "param_name"	=>	"icon_background",
                            "value"			=>	array(
                                "None" => "icon-no-background",
                                "Solid color" => "icon-with-background",
                            ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "icon_layout",
                                "value" => array("contained-icon"),
                            ),
                            "description"	=>	esc_html__("Select icon/image background type.", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Icon background color", "keydesign"),
                            "param_name" => "icon_background_color",
                            "value" => "",
                            "dependency" => array(
                                "element" => "icon_background",
                                "value" => array("icon-with-background"),
                            ),
                            "description" => esc_html__("Choose icon background color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Icon border","keydesign"),
                            "param_name"	=>	"icon_border",
                            "value"			=>	array(
                                "None" => "icon-no-border",
                                "Solid color" => "icon-with-border",
                            ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "icon_layout",
                                "value" => array("contained-icon"),
                            ),
                            "description"	=>	esc_html__("Select icon/image border type.", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Icon border color", "keydesign"),
                            "param_name" => "icon_border_color",
                            "value" => "",
                            "dependency" => array(
                                "element" => "icon_border",
                                "value" => array("icon-with-border"),
                            ),
                            "description" => esc_html__("Choose icon border color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Icon shadow effect", "keydesign"),
                            "param_name" => "ib_icon_shadow",
                            "value" => array(
                                "Disable" => "",
                                "Enable" => "icon-with-shadow",
                            ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "icon_layout",
                                "value" => array("contained-icon"),
                            ),
                            "description" => esc_html__("Select to enable shadow effect on the icon wrapper.", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
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
              								"element" => "icon_type",
              								"value" => "icon_browser",
              							),
              							"description" => esc_html__( "Select icon from library.", "keydesign" ),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
            						),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Icon color", "keydesign"),
                            "param_name" => "icon_color",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "icon_type",
                                "value" => array("icon_browser")
                            ),
                            "description" => esc_html__("Choose icon color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Icon size", "keydesign"),
                            "param_name" => "icon_size",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "icon_type",
                                "value" => array("icon_browser")
                            ),
                            "description" => esc_html__("Enter icon size. (eg. 10px, 1em, 1rem)", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Icon font weight", "keydesign"),
                            "param_name" => "icon_font_weight",
                            "value" => array(
                                "Thin" => "400",
                                "Bold" => "700",
                            ),
                            "dependency" => array(
                                "element" => "icon_type",
                                "value" => array("icon_browser"),
                            ),
                            "description" => esc_html__("Select icon font weight. Works only with IconsMind icons.", "keydesign"),
                            "save_always" => true,
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Icon wrapper size", "keydesign"),
                            "param_name" => "icon_wrapper_size",
                            "value" => "",
                            "dependency" =>	array(
                              "element" => "icon_layout",
                              "value" => array("contained-icon"),
                            ),
                            "description" => esc_html__("Enter icon wrapper size. (eg. 40px, 4em, 4rem)", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Icon wrapper bottom spacing", "keydesign"),
                            "param_name" => "icon_wrapper_bottom_spacing",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "icon_layout",
                                "value" => array( "contained-icon" )
                            ),
                            "description" => esc_html__("Add spacing between icon wrapper and the title. (eg. 20px, 2em, 2rem)", "keydesign"),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Custom image source", "keydesign"),
                            "param_name" => "ib_image_source",
                            "value" => array(
                                "Media library" => "media_library",
                                "External link" => "external_link",
                            ),
                            "dependency" => array(
                                "element" => "icon_type",
                                "value" => array("custom_icon"),
                            ),
                            "description" => esc_html__("Select image source.", "keydesign"),
                            "save_always" => true,
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type" => "attach_image",
                            "class" => "",
                            "heading" => esc_html__("Image", "keydesign"),
                            "param_name" => "icon_img",
                            "value" => "",
                            "description" => esc_html__("Upload custom image.", "keydesign"),
                            "dependency" => array(
                                "element" => "ib_image_source",
                                "value" => array("media_library"),
                            ),
                            "save_always" => true,
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Image external source", "keydesign"),
                            "param_name" => "ib_ext_image",
                            "value" => "",
                            "description" => esc_html__("Enter image external link.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "ib_image_source",
                                "value" => array("external_link"),
                            ),
                            "group" => esc_html__( "Icon Settings", "keydesign" ),
                        ),

                        array(
                             "type"	=>	"dropdown",
                             "class" =>	"",
                             "heading" => esc_html__("Display badge", "keydesign"),
                             "param_name" => "badge_settings",
                             "value" =>	array(
                                    esc_html__( "No", "keydesign" ) => "badge-off",
                                    esc_html__( "Yes", "keydesign" )	=> "badge-on",
                                ),
                             "save_always" => true,
                             "description" => esc_html__("Display a text badge in the right corner of the box.", "keydesign"),
                             "group" => esc_html__( "Badge", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Badge text", "keydesign"),
                            "param_name" => "badge_text",
                            "value" => "",
                            "description" => esc_html__("Enter badge text. Eg: New, Exclusive, Sale, Best.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "badge_settings",
                                "value" => array("badge-on"),
                            ),
                            "group" => esc_html__( "Badge", "keydesign" ),
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Badge text color", "keydesign"),
                            "param_name" => "badge_text_color",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "badge_settings",
                                "value" => array("badge-on")
                            ),
                            "description" => esc_html__("Select badge text color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__( "Badge", "keydesign" ),
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Badge background color", "keydesign"),
                            "param_name" => "badge_bg_color",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "badge_settings",
                                "value" => array("badge-on")
                            ),
                            "description" => esc_html__("Select badge background color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__( "Badge", "keydesign" ),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Content alignment", "keydesign"),
                            "param_name" => "content_alignment",
                            "value" => array(
                                "Align center"      => "content_center",
                                "Align left"        => "content_left",
                                "Align right"       => "content_right"
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Choose content alignment.", "keydesign"),
                            "group" => esc_html__( "Content", "keydesign" ),
                        ),

                        array(
                             "type"	=>	"dropdown",
                             "class" =>	"",
                             "heading" => esc_html__("Link settings", "keydesign"),
                             "param_name" => "custom_link",
                             "value" =>	array(
                                    esc_html__( "No link", "keydesign" ) => "ib-no-link",
                                    esc_html__( "Text link", "keydesign" )	=> "ib-text-link",
                                    esc_html__( "Button link", "keydesign" )	=> "ib-button-link",
                                    esc_html__( "Box link", "keydesign" )	=> "ib-box-link",
                                    esc_html__( "Icon/image link", "keydesign" )	=> "ib-icon-link",
                                ),
                             "save_always" => true,
                             "description" => esc_html__("You can add/remove custom link", "keydesign"),
                             "group" => esc_html__( "Link", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Link text", "keydesign"),
                            "param_name" => "link_text",
                            "value" => "",
                            "description" => esc_html__("Enter link text here.", "keydesign"),
                            "dependency" => array(
                               "element" => "custom_link",
                               "value"	=> array( "ib-text-link", "ib-button-link" ),
                           ),
                           "group" => esc_html__( "Link", "keydesign" ),
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Link color", "keydesign"),
                            "param_name" => "link_color",
                            "value" => "",
                            "description" => esc_html__("Choose link color. If none selected, the default theme color will be used.", "keydesign"),
                            "dependency" => array(
                               "element" => "custom_link",
                               "value"	=> array( "ib-text-link" ),
                           ),
                           "group" => esc_html__( "Link", "keydesign" ),
                        ),

                        array(
                            "type" => "href",
                            "class" => "",
                            "heading" => esc_html__("Link URL", "keydesign"),
                            "param_name" => "iconbox_link",
                            "value" => "",
                            "description" => esc_html__("Enter URL (Note: parameters like \"mailto:\" are also accepted).", "keydesign"),
                            "dependency" => array(
                               "element" => "custom_link",
                               "value"	=> array( "ib-text-link", "ib-button-link", "ib-box-link", "ib-icon-link" ),
                           ),
                           "group" => esc_html__( "Link", "keydesign" ),
                        ),

                        array(
                      			'type' => 'dropdown',
                      			'heading' => __( 'Link target', 'keydesign' ),
                      			'param_name' => 'iconbox_link_target',
                            "value" => array(
            									esc_html__( 'Same window', 'keydesign' ) => '_self',
            									esc_html__( 'New window', 'keydesign' ) => '_blank',
            								),
                            "dependency" => array(
                               "element" => "custom_link",
                               "value"	=> array( "ib-text-link", "ib-button-link", "ib-box-link", "ib-icon-link" ),
                           ),
                           "save_always" => true,
                           "group" => esc_html__( "Link", "keydesign" ),
                    		),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button style", "keydesign"),
                            "param_name" => "iconbox_button_style",
                            "value" => array(
                                "Solid" => "tt_primary_button",
                                "Outline" => "tt_secondary_button"
                            ),
                            "save_always" => true,
                            "dependency" => array(
                               "element" => "custom_link",
                               "value"	=> array( "ib-button-link" ),
                            ),
                            "description" => esc_html__("Select button style", "keydesign"),
                            "group" => esc_html__( "Link", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button color scheme", "keydesign"),
                            "param_name" => "iconbox_button_color_scheme",
                            "value" => array(
                                "Primary color" => "btn_primary_color",
                                "Secondary color" => "btn_secondary_color"
                            ),
                            "save_always" => true,
                            "dependency" => array(
                               "element" => "custom_link",
                               "value"	=> array( "ib-button-link" ),
                            ),
                            "description" => esc_html__("Select button predefined color scheme.", "keydesign"),
                            "group" => esc_html__( "Link", "keydesign" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button hover state", "keydesign"),
                            "param_name" => "iconbox_button_hover_state",
                            "value" => array(
                                "Solid - Primary color" => "hover_solid_primary",
                                "Solid - Secondary color" => "hover_solid_secondary",
                                "Outline - Primary color" => "hover_outline_primary",
                                "Outline - Secondary color" => "hover_outline_secondary",
                            ),
                            "save_always" => true,
                            "dependency" => array(
                               "element" => "custom_link",
                               "value"	=> array( "ib-button-link" ),
                            ),
                            "description" => esc_html__("Select button hover state style.", "keydesign"),
                            "group" => esc_html__( "Link", "keydesign" ),
                        ),
                        array(
              							"type" => "dropdown",
              							"class" => "",
              							"heading" => esc_html__("Background type", "keydesign"),
              							"param_name" =>	"background_type",
              							"value" =>	array(
              								esc_html__( 'None', 'keydesign' ) => 'none',
              								esc_html__( 'Solid color', 'keydesign' )	=> 'custom_bg_color',
                              esc_html__( 'Background image', 'keydesign' )	=> 'custom_bg_image',
              							),
              							"save_always" => true,
              							"description" => esc_html__("Select box background type.", "keydesign"),
                            "group" => esc_html__( "Box style", "keydesign" ),
            						),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Background color", "keydesign"),
                            "param_name" => "background_color",
                            "value" => "",
                            "dependency" =>	array(
                								"element" => "background_type",
                								"value" => array( "custom_bg_color" ),
      							        ),
                            "description" => esc_html__("Choose box background color.", "keydesign"),
                            "group" => esc_html__( "Box style", "keydesign" ),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Background image source", "keydesign"),
                            "param_name" => "background_image_source",
                            "value" => array(
                                "Media library" => "media_library",
                                "External link" => "external_link",
                            ),
                            "dependency" => array(
                                "element" => "background_type",
                                "value" => array("custom_bg_image"),
                            ),
                            "description" => esc_html__("Select image source.", "keydesign"),
                            "save_always" => true,
                            "group" => esc_html__( "Box style", "keydesign" ),
                        ),

                        array(
                            "type" => "attach_image",
                            "class" => "",
                            "heading" => esc_html__("Image", "keydesign"),
                            "param_name" => "background_image",
                            "value" => "",
                            "description" => esc_html__("Upload custom image.", "keydesign"),
                            "dependency" => array(
                                "element" => "background_image_source",
                                "value" => array("media_library"),
                            ),
                            "save_always" => true,
                            "group" => esc_html__( "Box style", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Image external source", "keydesign"),
                            "param_name" => "background_ext_image",
                            "value" => "",
                            "description" => esc_html__("Enter image external link.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "background_image_source",
                                "value" => array("external_link"),
                            ),
                            "group" => esc_html__( "Box style", "keydesign" ),
                        ),

                        array(
              							"type" => "dropdown",
              							"class" => "",
              							"heading" => esc_html__("Border type", "keydesign"),
              							"param_name" =>	"border_type",
              							"value" =>	array(
              								esc_html__( 'None', 'keydesign' ) => 'none',
              								esc_html__( 'Solid color', 'keydesign' )	=> 'custom_border_color',
              							),
              							"save_always" => true,
              							"description" => esc_html__("Select box border type.", "keydesign"),
                            "group" => esc_html__( "Box style", "keydesign" ),
            						),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Border color", "keydesign"),
                            "param_name" => "border_color",
                            "value" => "",
                            "dependency" =>	array(
                								"element" => "border_type",
                								"value" => array( "custom_border_color" ),
      							        ),
                            "description" => esc_html__("Choose box border color.", "keydesign"),
                            "group" => esc_html__( "Box style", "keydesign" ),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Shadow effect", "keydesign"),
                            "param_name" => "ib_box_shadow",
                            "value" => array(
                                "Disable" => "",
                                "Enable" => "with-shadow",
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select to enable shadow effect on the box wrapper.", "keydesign"),
                            "group" => esc_html__( "Box style", "keydesign" ),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Hover effect", "keydesign"),
                            "param_name" => "hover_effect",
                            "value" => array(
                                "No effect" => "ib-no-effect",
                                "Effect 1" => "ib-hover-1",
                                "Effect 2" => "ib-hover-2"
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select box hover effect.", "keydesign"),
                            "group" => esc_html__( "Box style", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Top padding", "keydesign"),
                            "param_name" => "ib_top_padding",
                            "value" => "",
                            "description" => esc_html__("Add extra spacing between the top edge of the element and the inner contents.", "keydesign"),
                            "group" => esc_html__( "Design", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Bottom padding", "keydesign"),
                            "param_name" => "ib_bottom_padding",
                            "value" => "",
                            "description" => esc_html__("Add extra spacing between the bottom edge of the element and the inner contents.", "keydesign"),
                            "group" => esc_html__( "Design", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Left padding", "keydesign"),
                            "param_name" => "ib_left_padding",
                            "value" => "",
                            "description" => esc_html__("Add extra spacing between the left edge of the element and the inner contents.", "keydesign"),
                            "group" => esc_html__( "Design", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Right padding", "keydesign"),
                            "param_name" => "ib_right_padding",
                            "value" => "",
                            "description" => esc_html__("Add extra spacing between the right edge of the element and the inner contents.", "keydesign"),
                            "group" => esc_html__( "Design", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Top margin", "keydesign"),
                            "param_name" => "ib_top_margin",
                            "value" => "",
                            "description" => esc_html__("Add extra spacing between the top edge of the element and the outer contents.", "keydesign"),
                            "group" => esc_html__( "Design", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Bottom margin", "keydesign"),
                            "param_name" => "ib_bottom_margin",
                            "value" => "",
                            "description" => esc_html__("Add extra spacing between the bottom edge of the element and the outer contents.", "keydesign"),
                            "group" => esc_html__( "Design", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Left margin", "keydesign"),
                            "param_name" => "ib_left_margin",
                            "value" => "",
                            "description" => esc_html__("Add extra spacing between the left edge of the element and the outer contents.", "keydesign"),
                            "group" => esc_html__( "Design", "keydesign" ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Right margin", "keydesign"),
                            "param_name" => "ib_right_margin",
                            "value" => "",
                            "description" => esc_html__("Add extra spacing between the right edge of the element and the outer contents.", "keydesign"),
                            "group" => esc_html__( "Design", "keydesign" ),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("CSS animation", "keydesign"),
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
                            "param_name" => "ib_animation_delay",
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
                            "param_name" => "ib_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__( "Extras", "keydesign" ),
                        ),

                    )
                ));
            }
        }



		// Render the element on front-end
    public function kd_iconbox_shrt($atts, $content = null) {

            // Declare empty vars
            $output = $content_icon = $icons = $icon_position_class = $content_alignment_class = $link_title = $link_target = $icon_style = '';
            $box_style = $theme_primary_color = $bg_extra_class = $animation_delay = $wrapper_class = $link = $image = $box_bg_image = $bg_image = $bg_image_data = $bg_image_src = $bg_image_class = '';
            $exploded = $iconsmind_cat = $border_class = $icon_background = $icon_border = $icon_wrapper_style = $box_wrapper_style = $button_class = $content_text_style = '';
            $simple_icon_style = $badge_style = '';

            extract(shortcode_atts(array(
                'icon_type' => '',
                'title' => '',
                'title_size' => '',
                'title_color' => '',
	              'box_content_type' => '',
                'text_box' => '',
                'text_font_size' => '',
                'text_color' => '',
                'icon_type' => '',
                'icon_iconsmind' => '',
                'icon_color' => '',
                'icon_size' => '',
                'icon_font_weight' => '',
                'icon_wrapper_size' => '',
                'icon_wrapper_bottom_spacing' => '',
                'ib_image_source' => '',
                'ib_ext_image' => '',
                'icon_img' => '',
                'icon_position' => '',
                'icon_layout' => '',
                'icon_background' => '',
                'icon_background_color' => '',
                'icon_border' => '',
                'icon_border_color' => '',
                'ib_icon_shadow' => '',
                'content_alignment' => '',
                'custom_link' => '',
                'link_text'=> '',
                'link_color' => '',
                'iconbox_link' => '',
                'iconbox_link_target' => '_self',
                'iconbox_button_style' => '',
                'iconbox_button_color_scheme' => '',
                'iconbox_button_hover_state' => '',
                'background_type'=> '',
                'background_color' => '',
                'background_image_source' => '',
                'background_image' => '',
                'background_ext_image' => '',
                'border_type' => '',
                'border_color' => '',
                'hover_effect' => '',
                'ib_box_shadow' => '',
                'ib_top_padding' => '',
                'ib_bottom_padding' => '',
                'ib_left_padding' => '',
                'ib_right_padding' => '',
                'ib_top_margin' => '',
                'ib_bottom_margin' => '',
                'ib_left_margin' => '',
                'ib_right_margin' => '',
                'badge_settings' => '',
                'badge_text' => '',
                'badge_text_color' => '',
                'badge_bg_color' => '',
                'css_animation' => '',
                'ib_animation_delay' => '',
                'ib_extra_class' => '',
            ), $atts));

            if ( $icon_type == 'icon_browser' && strlen( $icon_iconsmind ) > 0 ) {
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

            if (strlen($icon_iconsmind) > 0) {
                $icons = $icon_iconsmind;
            }

            if ( $icon_color !== '' ) {
              $icon_style .= 'color: '.$icon_color.';';
            }

            if ( $icon_size !== '' ) {
              $icon_style .= 'font-size: '.$icon_size.';';
            }

            if ( $icon_font_weight !== '' && strpos( $exploded[0], 'iconsmind-' ) === 0 ) {
              $icon_style .= 'font-weight: '.$icon_font_weight.';';
            }


            $a_attrs['href'] = $iconbox_link;
            $a_attrs['target'] = $iconbox_link_target;

            // Icon settings
            if ( '' != $icon_img ) {
              $image = wpb_getImageBySize($params = array(
                  'post_id' => NULL,
                  'attach_id' => $icon_img,
                  'thumb_size' => 'full',
                  'class' => ""
              ));
            }

            if ( $ib_image_source == 'external_link' && !empty( $ib_ext_image ) ) {
              $src = $ib_ext_image;
            } elseif ( $ib_image_source == 'media_library' && !empty( $icon_img ) ) {
              $link = wp_get_attachment_image_src( $icon_img, 'large' );
              $link = $link[0];
              $src = $link;
            }

            if ( $icon_type == 'icon_browser' ) {
			          $content_icon = '<i class="'.$icons .'" style="'.$icon_style.'"></i> ';
            } elseif ( $icon_type == 'custom_icon') {
                if ( $ib_image_source == 'external_link' && $ib_ext_image != '' ) {
                  $content_icon = '<div class="tt-iconbox-customimg"><img src="'.$ib_ext_image.'" alt="" /></div>';
                } elseif ( $ib_image_source == 'media_library' && !empty( $icon_img ) ) {
                  $content_icon = '<div class="tt-iconbox-customimg">'.$image['thumbnail'].'</div>';
                }
			      }

            // Icon border and background style

            if ( $icon_wrapper_bottom_spacing ) {
                $simple_icon_style .= 'margin-bottom:'. $icon_wrapper_bottom_spacing .';';
            }

            if ( $icon_type != "no_icon" ) {
              if ( $icon_background == 'icon-with-background' ) {
                if ( '' != $icon_background_color ) {
                  $icon_wrapper_style .= 'background-color: '. $icon_background_color .';';
                }
              }
              if ( $icon_border == 'icon-with-border' ) {
                if ( '' != $icon_border_color ) {
                  $icon_wrapper_style .= 'border: 1px solid '. $icon_border_color .';';
                }
              }
              if ( $icon_wrapper_size ) {
                  $icon_wrapper_style .= 'width:'. $icon_wrapper_size .';height:'. $icon_wrapper_size .';';
              }

              if ( $icon_wrapper_bottom_spacing ) {
                  $icon_wrapper_style .= $simple_icon_style;
              }
            }

            if ( $icon_type != "no_icon" && ( $icon_background == 'icon-with-background' || $icon_border == 'icon-with-border' ) ) {
              $content_icon = '<div class="ib-icon-wrapper" '.(!empty($icon_wrapper_style) ? 'style="'.$icon_wrapper_style.'"' : '').'>'.$content_icon.'</div>';
            }

            if ( $icon_type != "no_icon" && $icon_background == 'icon-no-background' && $icon_border == 'icon-no-border' ) {
              $content_icon = '<div class="ib-simple-icon-wrapper" '.(!empty($simple_icon_style) ? 'style="'.$simple_icon_style.'"' : '').'>'.$content_icon.'</div>';
            }

            // Box background image settings

            if ( $background_image_source == 'media_library' && '' != $background_image ) {
              $bg_image = intval( $background_image );
            	$bg_image_data = wp_get_attachment_image_src( $bg_image, 'large' );
            	$bg_image_src = $bg_image_data[0];
            }

            if ( $background_image_source == 'external_link' && '' != $background_ext_image ) {
              $box_bg_image = $background_ext_image;
            } elseif ( $background_image_source == 'media_library' && '' != $background_image ) {
              $box_bg_image = $bg_image_src;
            }

            // Content alignment in box
            if( $content_alignment == 'content_center' ) {
                $content_alignment_class = 'cont-center';
            }
            elseif ( $content_alignment == 'content_left' ) {
                $content_alignment_class = 'cont-left';
            }
            elseif ( $content_alignment == 'content_right' ) {
                $content_alignment_class = 'cont-right';
            }


            // Icon position class
            if ( $icon_position == 'icon_top' ) {
                $icon_position_class = 'icon-top';
            } elseif ( $icon_position == 'icon_left' ) {
                $icon_position_class = 'icon-left';
            }

            // Background type
            switch( $background_type ){
      				case 'none':
      					$box_style .= 'background-color: transparent;';
      				break;

      				case 'custom_bg_color':
                if ( $background_color != '' ) {
                  $box_style .= 'background-color: '. $background_color .';';
                } else {
                  $box_style .= 'background-color: transparent;';
                }
      				break;

              case 'custom_bg_image':
                if ( $box_bg_image != '' ) {
                  $box_style .= 'background-image: url('. $box_bg_image .');';
                } else {
                  $box_style .= 'background-color: transparent;';
                }
              break;

      				default:
      			}

            // Border type
            if ( $border_type == 'custom_border_color' ) {
              $border_class = 'with-border';
              if ( '' != $border_color ) {
                $box_style .= 'border: 1px solid '. $border_color .';';
              }
            }

            // Box margin
            if ( $ib_top_margin ) {
                $box_style .= 'margin-top:'.$ib_top_margin.';';
            }

            if ( $ib_bottom_margin ) {
                $box_style .= 'margin-bottom:'.$ib_bottom_margin.';';
            }

            if ( $ib_left_margin ) {
                $box_style .= 'margin-left:'.$ib_left_margin.';';
            }

            if ( $ib_right_margin ) {
                $box_style .= 'margin-right:'.$ib_right_margin.';';
            }

            if ( !empty($box_bg_image) ) {
              $bg_image_class = 'with-bg-img';
            } else {
              $bg_image_class = '';
            }

            // Badge style
            if ( $badge_text_color ) {
                $badge_style .= 'color:'.$badge_text_color.';';
            }

            if ( $badge_bg_color ) {
                $badge_style .= 'background-color:'.$badge_bg_color.';';
            }

            //CSS Animation
            if ($css_animation == "no_animation") {
                $css_animation = "";
            }

            // Animation delay
            if ($ib_animation_delay) {
                $animation_delay = 'data-animation-delay='.$ib_animation_delay;
            }

            // Box wrapper spacing
            if ( $ib_top_padding ) {
                $box_wrapper_style .= 'padding-top:'.$ib_top_padding.';';
            }

            if ( $ib_bottom_padding ) {
                $box_wrapper_style .= 'padding-bottom:'.$ib_bottom_padding.';';
            }

            if ( $ib_left_padding ) {
                $box_wrapper_style .= 'padding-left:'.$ib_left_padding.';';
            }

            if ( $ib_right_padding ) {
                $box_wrapper_style .= 'padding-right:'.$ib_right_padding.';';
            }

            // Content text style
            if ( $text_color ) {
              $content_text_style .= 'color:'.$text_color.';';
            }

            if ( $text_font_size ) {
              $content_text_style .= 'font-size: '.$text_font_size.';';
            }

            // Check if background color matches theme primary colorpicker
            $theme_primary_color = sway_get_option( 'tek-main-color' );
            if ( $theme_primary_color == $background_color ) {
              $bg_extra_class = "iconbox-main-color";
            }

            $wrapper_class = implode( ' ', array('key-icon-box', 'icon-default', $icon_position_class, $content_alignment_class, $hover_effect, $ib_box_shadow, $ib_icon_shadow, $bg_image_class, $border_class, $icon_background, $icon_border, $css_animation, $ib_extra_class ) );
            $button_class = implode( ' ', array('tt_button', $iconbox_button_style, $iconbox_button_color_scheme, $iconbox_button_hover_state ) );

            $output .= '<div class="'.trim($wrapper_class).'" '.(!empty($box_style) ? 'style="'.$box_style.'"' : '').' '.$animation_delay.'>';

              if ($custom_link == "ib-box-link") {
                $output .= '<a ' . vc_stringify_attributes( $a_attrs ) . '>';
              }

              if ( $badge_settings == "badge-on" ) {
                if ( $badge_text ) {
                  $output .= '<span class="ib-badge" '.(!empty($badge_style) ? 'style="'.$badge_style.'"' : '').'>'.$badge_text.'</span>';
                }
              }

              if ( $icon_layout == 'fullwidth-image' ) {
                if ($icon_type != "no_icon") {
                  $output .= '<div class="fullwidth-image">';
                  if ($custom_link == "ib-icon-link") {
                    $output .= '<a ' . vc_stringify_attributes( $a_attrs ) . '>' . $content_icon . '</a>';
                  } else {
                    $output .= $content_icon;
                  }
                  $output .= '</div>';
                }
              }

              if ( $hover_effect != "ib-no-effect" || $border_type == 'custom_border_color' || $background_type != 'none' ) {
                $output .= '<div class="ib-wrapper" '.(!empty( $box_wrapper_style ) ? 'style="'.$box_wrapper_style.'"' : '').'>';
              }

              if ( $icon_type != "no_icon" && $icon_layout != 'fullwidth-image' ) {
                if ($custom_link == "ib-icon-link") {
                  $output .= '<a ' . vc_stringify_attributes( $a_attrs ) . '>' . $content_icon . '</a>';
                } else {
                  $output .= $content_icon;
                }
              }

              if ( '' != $title && '' != $title_size ) {
                $output .= '<'.esc_attr( $title_size ).' class="service-heading" '.(!empty($title_color) ? 'style="color: '.$title_color.';"' : '').'>'.$title.'</'.esc_attr( $title_size ).'>';
              }

              if ( $box_content_type == "html_content" ) {
      					if ( $content != '' ) {
      						$output .= '<p '.(!empty( $content_text_style ) ? 'style="'.$content_text_style.'"' : '').'>'.do_shortcode($content).'</p>';
      					}
      				} else {
                if ( !empty($text_box) ) {
      					  $output .= '<p '.(!empty( $content_text_style ) ? 'style="'.$content_text_style.'"' : '').'>'.$text_box.'</p>';
      					}
              }

              if ( $custom_link == "ib-text-link" ) {
                $output .= '<p class="ib-link '.$bg_extra_class.'"><a ' . vc_stringify_attributes( $a_attrs ) . ' '.(!empty($link_color) ? 'style="color: '.$link_color.';"' : '').'>'.$link_text.'</a></p>';
              }

              if ( $custom_link == "ib-button-link" ) {
                $output .= '<div class="ib-button-wrapper"><a class="'.trim($button_class).'" ' . vc_stringify_attributes( $a_attrs ) . '>'.$link_text.'</a></div>';
              }

              if ( $hover_effect != "ib-no-effect" || $border_type == 'custom_border_color' || $background_type != 'none' ) {
                $output .= '</div>';
              }
              if ( $custom_link == "ib-box-link" ) {
                $output .= '</a>';
              }
            $output .= '</div>';
            return $output;

        }
    }
}

if (class_exists('KD_ELEM_ICON_BOX')) {
    $KD_ELEM_ICON_BOX = new KD_ELEM_ICON_BOX;
}

?>
