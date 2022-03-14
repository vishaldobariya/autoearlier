<?php
if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_tek_featuresections extends WPBakeryShortCodesContainer {
    }
}
if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_tek_featuresections_single extends WPBakeryShortCode {
    }
}
if (!class_exists('tek_featuresections')) {
    class tek_featuresections extends KEYDESIGN_ADDON_CLASS
    {
        function __construct() {
            add_action('init', array($this, 'kd_featuresections_init'));
            add_shortcode('tek_featuresections', array($this, 'kd_featuresections_container'));
            add_shortcode('tek_featuresections_single', array($this, 'kd_featuresections_single'));
        }
        // Element configuration in admin
        function kd_featuresections_init() {
            // Container element configuration
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Sticky navbar sections", "keydesign"),
                    "description" => esc_html__("Simple sections with sticky navigation.", "keydesign"),
                    "base" => "tek_featuresections",
                    "class" => "kd-outer-controls",
                    "content_element" => true,
                    "as_parent" => array('only' => 'tek_featuresections_single'),
                    "icon" => plugins_url('assets/element_icons/feature-sections.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "show_settings_on_create" => false,
                    "js_view" => 'VcColumnView',
                    "params" => array(
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Navigation type", "keydesign"),
                            "param_name" => "fsp_navigation_type",
                            "value" => array(
                                "Icons" => "navigation-icons",
                                "Numbers" => "navigation-numbers",
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select navigation position.", "keydesign"),
                            "group" => esc_html__("Sticky navbar", "keydesign"),
                        ),
                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Background color", "keydesign"),
                            "param_name" => "fsp_background_color",
                            "value" => "",
                            "description" => esc_html__("Select sticky navbar background color. Default is set to white (#fff).", "keydesign"),
                            "group" => esc_html__("Sticky navbar", "keydesign"),
                        ),
                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Border color", "keydesign"),
                            "param_name" => "fsp_border_color",
                            "value" => "",
                            "description" => esc_html__("Select sticky navbar border bottom color.", "keydesign"),
                            "group" => esc_html__("Sticky navbar", "keydesign"),
                        ),
                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Link color", "keydesign"),
                            "param_name" => "fsp_link_color",
                            "value" => "",
                            "description" => esc_html__("Select sticky navbar link color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__("Sticky navbar", "keydesign"),
                        ),
                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Link hover and active color", "keydesign"),
                            "param_name" => "fsp_link_hover_color",
                            "value" => "",
                            "description" => esc_html__("Select sticky navbar link color on hover and active. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__("Sticky navbar", "keydesign"),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Extra class name", "keydesign"),
                            "param_name" => "fsp_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__("Extras", "keydesign"),
                        ),
                    )
                ));
                // Shortcode configuration
                vc_map(array(
                    "name" => esc_html__("Single section", "keydesign"),
                    "base" => "tek_featuresections_single",
                    "content_element" => true,
                    "as_child" => array('only' => 'tek_featuresections'),
                    "icon" => plugins_url('assets/element_icons/feature-sections-child.png', dirname(__FILE__)),
                    "params" => array(
                        array(
                            "type" => "textfield",
                            "param_name" => "fss_id",
                            "heading" => esc_html__( "Section ID", "keydesign" ),
                            "description" => sprintf( esc_html__( "Enter section ID (Note: make sure it is unique and valid according to %sw3c specification%s).", "keydesign" ), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>' ),
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                            "type" => "textarea",
                            "class" => "",
                            "heading" => esc_html__("Title", "keydesign"),
                            "param_name" => "fss_title",
                            "value" => "",
                            "description" => esc_html__("Enter section title.", "keydesign"),
                            "admin_label" => true,
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Title tag", "keydesign"),
                            "param_name" => "fss_title_tag",
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
                            "description" => esc_html__("Select title tag. Default is set to H2.", "keydesign"),
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                            "type" => "textarea",
                            "class" => "",
                            "heading" => esc_html__("Title label", "keydesign"),
                            "param_name" => "fss_title_label",
                            "value" => "",
                            "description" => esc_html__("Enter section title label. Displays above the title.", "keydesign"),
                            "admin_label" => true,
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                            "type" => "textarea",
                            "class" => "",
                            "heading" => esc_html__("Subtitle", "keydesign"),
                            "param_name" => "fss_subtitle",
                            "value" => "",
                            "description" => esc_html__("Enter section subtitle.", "keydesign"),
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                            "type" => "textarea_html",
                            "class" => "",
                            "heading" => esc_html__("Content", "keydesign"),
                            "param_name" => "content",
                            "value" => "",
                            "description" => esc_html__("Enter section content text here.", "keydesign"),
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                             "type"	=>	"dropdown",
                             "class" =>	"",
                             "heading" => esc_html__("Template", "keydesign"),
                             "param_name" => "fss_section_template",
                             "value" =>	array(
                                    esc_html__( "Single image", "keydesign" )	=> "side_photo",
                                    esc_html__( "Gallery", "keydesign" )	=> "side_gallery",
                                    esc_html__( "Video", "keydesign" )	=> "side_video",
                                ),
                             "save_always" => true,
                             "group" => esc_html__("Content", "keydesign"),
                             "description" => esc_html__("Select the section general style.", "keydesign"),
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Title color", "keydesign"),
                            "param_name" => "fss_title_color",
                            "value" => "",
                            "description" => esc_html__("Select title color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Title labelcolor", "keydesign"),
                            "param_name" => "fss_title_label_color",
                            "value" => "",
                            "description" => esc_html__("Select title label color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Subtitle color", "keydesign"),
                            "param_name" => "fss_subtitle_color",
                            "value" => "",
                            "description" => esc_html__("Select subtitle color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Content text color", "keydesign"),
                            "param_name" => "fss_content_color",
                            "value" => "",
                            "description" => esc_html__("Select content text color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Display icon","keydesign"),
                            "param_name"	=>	"fss_icon_type",
                            "value"			=>	array(
                                    "Disable" => "no_icon",
                                    "Icon browser" => "icon_browser",
                                    "Custom icon" => "custom_icon",
                                ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Icon will be placed above the section title.", "keydesign"),
                            "group" => esc_html__("Content", "keydesign"),
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
              								"element" => "fss_icon_type",
              								"value" => "icon_browser",
              							),
              							"description" => esc_html__( "Select icon from library.", "keydesign" ),
                            "group" => esc_html__("Content", "keydesign"),
            						),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Icon color", "keydesign"),
                            "param_name" => "fss_icon_color",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "fss_icon_type",
                                "value" => array("icon_browser")
                            ),
                            "description" => esc_html__("Select icon color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Icon size", "keydesign"),
                            "param_name" => "fss_icon_size",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "fss_icon_type",
                                "value" => array("icon_browser", "custom_icon")
                            ),
                            "description" => esc_html__("Enter icon size. (eg. 10px, 1em, 1rem)", "keydesign"),
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                            "type" => "attach_image",
                            "class" => "",
                            "heading" => esc_html__("Upload custom icon", "keydesign"),
                            "param_name" => "fss_icon_img",
                            "value" => "",
                            "description" => esc_html__("Upload custom image.", "keydesign"),
                            "dependency" => array(
                                "element" => "fss_icon_type",
                                "value" => array("custom_icon"),
                            ),
                            "group" => esc_html__("Content", "keydesign"),
                        ),

                        array(
                             "type"	=>	"dropdown",
                             "class" =>	"",
                             "heading" => esc_html__("Add primary button?", "keydesign"),
                             "param_name" => "fss_custom_link",
                             "value" =>	array(
                                    esc_html__( "Disable", "keydesign" ) => "#",
                                    esc_html__( "Enable", "keydesign" )	=> "1",
                                ),
                             "save_always" => true,
                             "description" => esc_html__("You can add/remove custom link", "keydesign"),
                             "group" => esc_html__("Primary Button", "keydesign"),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button action", "keydesign"),
                            "param_name" => "fss_primary_button_action",
                            "value" => array(
                                "Link" => "button-action-link",
                                "Trigger Popup Modal"  => "modal-trigger-btn",
                                "Trigger Side Panel" => "panel-trigger-btn",
                            ),
                            "save_always" => true,
                            "group" => esc_html__("Button settings", "keydesign"),
                            "description" => esc_html__("Select button action."),
                            "dependency" => array(
                                "element" => "fss_custom_link",
                                "value" => array( "1" ),
                            ),
                            "group" => esc_html__("Primary Button", "keydesign"),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Button text", "keydesign"),
                            "param_name" => "fss_primary_button_text",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "fss_custom_link",
                                "value" => array("1")
                            ),
                            "description" => esc_html__("Enter button text.", "keydesign"),
                            "group" => esc_html__("Primary Button", "keydesign"),
                        ),
                        array(
                             "type"	=>	"vc_link",
                             "class" =>	"",
                             "heading" => esc_html__("Link settings", "keydesign"),
                             "param_name" => "fss_section_link",
                             "value" =>	"",
                             "description" => esc_html__("You can add or remove the existing link from here.", "keydesign"),
                             "dependency" => array(
                                "element" => "fss_primary_button_action",
                                "value"	=> array( "button-action-link" ),
                            ),
                            "group" => esc_html__("Primary Button", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Link style", "keydesign"),
                            "param_name" => "fss_link_style",
                            "value" => array(
                                "Solid button" => "solid_button",
                                "Outline button" => "outline_button",
                                "Simple link" => "simple_link",
                            ),
                            "dependency" => array(
                               "element" => "fss_custom_link",
                               "value"	=> array( "1" ),
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select link style.", "keydesign"),
                            "group" => esc_html__("Primary Button", "keydesign"),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button color scheme", "keydesign"),
                            "param_name" => "fss_button_color_scheme",
                            "value" => array(
                                "Primary color" => "btn_primary_color",
                                "Secondary color" => "btn_secondary_color"
                            ),
                            "dependency" => array(
                               "element" => "fss_link_style",
                               "value"	=> array( "solid_button", "outline_button" ),
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select button predefined color scheme.", "keydesign"),
                            "group" => esc_html__("Primary Button", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Button extra class name", "keydesign"),
                            "param_name" => "fss_btn_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style this particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "dependency" => array(
                                "element" => "fss_custom_link",
                                "value" => array( "1" ),
                            ),
                            "group" => esc_html__("Primary Button", "keydesign"),
                        ),

                        array(
                             "type"	=>	"dropdown",
                             "class" =>	"",
                             "heading" => esc_html__("Add secondary button?", "keydesign"),
                             "param_name" => "fss_secondary_button",
                             "value" =>	array(
                                    esc_html__( "Disable", "keydesign" ) => "disable-secondary-btn",
                                    esc_html__( "Enable", "keydesign" )	=> "enable-secondary-btn",
                                ),
                             "save_always" => true,
                             "description" => esc_html__("You can add/remove custom link", "keydesign"),
                             "group" => esc_html__("Secondary Button", "keydesign"),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button action", "keydesign"),
                            "param_name" => "fss_secondary_button_action",
                            "value" => array(
                                "Link" => "button-action-link",
                                "Trigger Popup Modal"  => "modal-trigger-btn",
                                "Trigger Side Panel" => "panel-trigger-btn",
                            ),
                            "save_always" => true,
                            "group" => esc_html__("Button settings", "keydesign"),
                            "description" => esc_html__("Select button action."),
                             "dependency" => array(
                                "element" => "fss_secondary_button",
                                "value" => array( "enable-secondary-btn" ),
                            ),
                            "group" => esc_html__("Secondary Button", "keydesign"),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Button text", "keydesign"),
                            "param_name" => "fss_secondary_button_text",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "fss_secondary_button",
                                "value" => array("enable-secondary-btn")
                            ),
                            "description" => esc_html__("Enter button text.", "keydesign"),
                            "group" => esc_html__("Secondary Button", "keydesign"),
                        ),
                        array(
                             "type"	=>	"vc_link",
                             "class" =>	"",
                             "heading" => esc_html__("Link settings", "keydesign"),
                             "param_name" => "fss_secondary_button_link",
                             "value" =>	"",
                             "description" => esc_html__("You can add or remove the existing link from here.", "keydesign"),
                             "dependency" => array(
                                "element" => "fss_secondary_button_action",
                                "value"	=> array( "button-action-link" ),
                            ),
                            "group" => esc_html__("Secondary Button", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Link style", "keydesign"),
                            "param_name" => "fss_secondary_button_style",
                            "value" => array(
                                "Solid button" => "solid_button",
                                "Outline button" => "outline_button",
                                "Simple link" => "simple_link",
                            ),
                            "dependency" => array(
                               "element" => "fss_secondary_button",
                               "value"	=> array( "enable-secondary-btn" ),
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select link style.", "keydesign"),
                            "group" => esc_html__("Secondary Button", "keydesign"),
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Button color scheme", "keydesign"),
                            "param_name" => "fss_secondary_button_color_scheme",
                            "value" => array(
                                "Primary color" => "btn_primary_color",
                                "Secondary color" => "btn_secondary_color"
                            ),
                            "dependency" => array(
                               "element" => "fss_secondary_button_style",
                               "value"	=> array( "solid_button", "outline_button" ),
                            ),
                            "save_always" => true,
                            "description" => esc_html__("Select button predefined color scheme.", "keydesign"),
                            "group" => esc_html__("Secondary Button", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Button extra class name", "keydesign"),
                            "param_name" => "fss_secondary_btn_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style this particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "dependency" => array(
                               "element" => "fss_secondary_button",
                               "value" => array( "enable-secondary-btn" ),
                            ),
                            "group" => esc_html__("Secondary Button", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Navigation label (*required)", "keydesign"),
                            "param_name" => "fss_nav_label",
                            "value" => "",
                            "description" => esc_html__("Enter navigation label for this section.", "keydesign"),
                            "group" => esc_html__("Navigation", "keydesign"),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Display navigation icon","keydesign"),
                            "param_name"	=>	"fss_nav_icon_type",
                            "value"			=>	array(
                                    "Disable" => "no_icon",
                                    "Icon browser" => "icon_browser",
                                    "Custom icon" => "custom_icon",
                                ),
                            "save_always" => true,
                            "description"	=>	esc_html__("Select navigation icon source.", "keydesign"),
                            "group" => esc_html__("Navigation", "keydesign"),
                        ),

            						array(
              							"type" => "iconpicker",
              							"heading" => esc_html__( "Navigation icon", "keydesign" ),
              							"param_name" => "fss_nav_icon_iconsmind",
                            "settings" => array(
                        				"type" => "iconsmind",
                        				"iconsPerPage" => 50,
                        		),
              							"dependency" => array(
              								"element" => "fss_nav_icon_type",
              								"value" => "icon_browser",
              							),
              							"description" => esc_html__( "Select icon from library.", "keydesign" ),
                            "group" => esc_html__("Navigation", "keydesign"),
            						),

                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => esc_html__("Navigation icon color", "keydesign"),
                            "param_name" => "fss_nav_icon_color",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "fss_nav_icon_type",
                                "value" => array("icon_browser")
                            ),
                            "description" => esc_html__("Choose navigation icon color. If none selected, the default theme color will be used.", "keydesign"),
                            "group" => esc_html__("Navigation", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Navigation icon size", "keydesign"),
                            "param_name" => "fss_nav_icon_size",
                            "value" => "",
                            "dependency" =>	array(
                                "element" => "fss_nav_icon_type",
                                "value" => array("icon_browser", "custom_icon")
                            ),
                            "description" => esc_html__("Enter navigation icon size. (eg. 10px, 1em, 1rem)", "keydesign"),
                            "group" => esc_html__("Navigation", "keydesign"),
                        ),

                        array(
                            "type" => "attach_image",
                            "class" => "",
                            "heading" => esc_html__("Navigation image icon", "keydesign"),
                            "param_name" => "fss_nav_icon_img",
                            "value" => "",
                            "dependency" => array(
                                "element" => "fss_nav_icon_type",
                                "value" => array("custom_icon"),
                            ),
                            "description" => esc_html__("Upload custom image.", "keydesign"),
                            "group" => esc_html__("Navigation", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Image source", "keydesign"),
                            "param_name" => "featured_image_source",
                            "value" => array(
                                "Media library" => "media_library",
                                "External link" => "external_link",
                            ),
                            "description" => esc_html__("Select image source.", "keydesign"),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_photo"),
                            ),
                            "group" => esc_html__("Image Settings", "keydesign"),
                        ),

                        array(
                            "type" => "attach_image",
                            "class" => "",
                            "heading" => esc_html__("Featured image", "keydesign"),
                            "param_name" => "fss_featured_image",
                            "value" => "",
                            "description" => esc_html__("Upload custom image. Recommended image size: 650x450 (Width x Height).", "keydesign"),
                            "dependency" => array(
                                "element" => "featured_image_source",
                                "value" => array("media_library"),
                            ),
                            "group" => esc_html__("Image Settings", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Image external source", "keydesign"),
                            "param_name" => "featured_ext_image",
                            "value" => "",
                            "description" => esc_html__("Enter image external link.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "featured_image_source",
                                "value" => array("external_link")
                            ),
                            "group" => esc_html__("Image Settings", "keydesign"),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Image align","keydesign"),
                            "param_name"	=>	"fss_image_align",
                            "value"			=>	array(
                                    "Left" => "img-align-left",
                                    "Right" => "img-align-right",
                                ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_photo"),
                            ),
                            "description"	=>	esc_html__("Select image alignment relative to the content.", "keydesign"),
                            "group" => esc_html__("Image Settings", "keydesign"),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Image style","keydesign"),
                            "param_name"	=>	"fss_image_style",
                            "value"			=>	array(
                                  "Rectangle" => "fss-rectangle",
                                  "Circle" => "fss-circle",
                                  "Egg" => "fss-egg",
                                  "Organic 1" => "fss-organic-1",
                                  "Organic 1 rotated" => "fss-organic-1-rotate",
                                  "Organic 2" => "fss-organic-2",
                                  "Organic 2 rotated" => "fss-organic-2-rotate",
                                ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_photo"),
                            ),
                            "description"	=>	esc_html__("Select image style. The round styles work best with square images.", "keydesign"),
                            "group" => esc_html__("Image Settings", "keydesign"),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Image shadow","keydesign"),
                            "param_name"	=>	"fss_image_shadow",
                            "value"			=>	array(
                                  "None" => "",
                                  "With shadow" => "fss-shadow-image",
                                ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_photo"),
                            ),
                            "description"	=>	esc_html__("Add shadow to image.", "keydesign"),
                            "group" => esc_html__("Image Settings", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("On click action", "keydesign"),
                            "param_name" => "fss_click_action",
                            "value" => array(
                                "None" => "click_action_none",
                                "Open PhotoSwipe" => "open_photoswipe",
                                "Open custom link" => "custom_link",
                            ),
                            "description" => esc_html__("Select action for click action.", "keydesign"),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_photo"),
                            ),
                            "group" => esc_html__("Image Settings", "keydesign"),
                        ),

                        array(
                            "type" => "href",
                            "class" => "",
                            "heading" => esc_html__("Image link", "keydesign"),
                            "param_name" => "fss_image_link",
                            "value" => "",
                            "description" => esc_html__("Enter URL if you want this image to have a link (Note: parameters like \"mailto:\" are also accepted).", "keydesign"),
                            "dependency" =>	array(
                                "element" => "fss_click_action",
                                "value" => array("custom_link"),
                            ),
                            "group" => esc_html__("Image Settings", "keydesign"),
                        ),

                        array(
                      			'type' => 'dropdown',
                      			'heading' => __( 'Link Target', 'keydesign' ),
                      			'param_name' => 'fss_link_target',
                            "value" => array(
            									esc_html__( 'Same window', 'keydesign' ) => '_self',
            									esc_html__( 'New window', 'keydesign' ) => '_blank',
            								),
                      			'dependency' => array(
                        				'element' => 'fss_click_action',
                        				'value' => array('custom_link'),
                      			),
                            "group" => esc_html__("Image Settings", "keydesign"),
                    		),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Image gallery source", "keydesign"),
                            "param_name" => "gallery_image_source",
                            "value" => array(
                                "Media library" => "media_library",
                                "External link" => "external_link",
                            ),
                            "description" => esc_html__("Select image source.", "keydesign"),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_gallery"),
                            ),
                            "group" => esc_html__("Gallery settings", "keydesign"),
                        ),

                        array(
                            "type" => "attach_images",
                            "class" => "",
                            "heading" => esc_html__("Photo gallery", "keydesign"),
                            "param_name" => "fss_photo_gallery",
                            "value" => "",
                            "description" => esc_html__("Select images from media library.", "keydesign"),
                            "dependency" => array(
                                "element" => "gallery_image_source",
                                "value" => array("media_library"),
                            ),
                            "save_always" => true,
                            "group" => esc_html__("Gallery settings", "keydesign"),
                        ),

                        array(
                            "type" => "exploded_textarea_safe",
                            "class" => "",
                            "heading" => esc_html__("Image external links", "keydesign"),
                            "param_name" => "gallery_ext_image",
                            "value" => "",
                            "description" => esc_html__("Enter external link for each gallery image (Note: divide links with linebreaks (Enter)).", "keydesign"),
                            "dependency" =>	array(
                                "element" => "gallery_image_source",
                                "value" => array("external_link")
                            ),
                            "group" => esc_html__("Gallery settings", "keydesign"),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Image size", "keydesign"),
                            "param_name" => "gallery_ext_image_size",
                            "value" => "",
                            "description" => esc_html__("Enter image size in pixels. Example: 650x450 (Width x Height).", "keydesign"),
                            "dependency" =>	array(
                                "element" => "gallery_image_source",
                                "value" => array("external_link")
                            ),
                            "group" => esc_html__("Gallery settings", "keydesign"),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Gallery shadow","keydesign"),
                            "param_name"	=>	"fss_gallery_shadow",
                            "value"			=>	array(
                                  "None" => "",
                                  "With shadow" => "fss-shadow-gallery",
                                ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_gallery"),
                            ),
                            "description"	=>	esc_html__("Add shadow to image.", "keydesign"),
                            "group" => esc_html__("Gallery settings", "keydesign"),
                        ),

                        array(
                            "type"          =>  "dropdown",
                            "class"         =>  "",
                            "heading"       =>  esc_html__("Enable loop","keydesign"),
                            "param_name"    =>  "fss_loop",
                            "value"         =>  array(
                                    "Off" => "loop_off",
                                    "On" => "loop_on",
                                ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_gallery"),
                            ),
                            "description"   =>  esc_html__("Infinity loop. Duplicate last and first items to get loop illusion.", "keydesign"),
                            "group" => esc_html__("Gallery settings", "keydesign"),
                        ),

                        array(
                            "type"          =>  "dropdown",
                            "class"         =>  "",
                            "heading"       =>  esc_html__("Enable autoplay","keydesign"),
                            "param_name"    =>  "fss_autoplay",
                            "value"         =>  array(
                                    "Off"   => "auto_off",
                                    "On"   => "auto_on"
                                ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_gallery"),
                            ),
                            "description"   =>  esc_html__("Carousel autoplay settings.", "keydesign"),
                            "group" => esc_html__("Gallery settings", "keydesign"),
                        ),

                        array(
                            "type"          =>  "dropdown",
                            "class"         =>  "",
                            "heading"       =>  esc_html__("Autoplay speed","keydesign"),
                            "param_name"    =>  "fss_autoplay_speed",
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
                                "element" => "fss_autoplay",
                                "value" => array("auto_on")
                            ),
                            "description"   =>  esc_html__("Carousel autoplay speed.", "keydesign"),
                            "group" => esc_html__("Gallery settings", "keydesign"),
                        ),

                        array(
                            "type"          =>  "dropdown",
                            "class"         =>  "",
                            "heading"       =>  esc_html__("Stop on hover","keydesign"),
                            "param_name"    =>  "fss_stoponhover",
                            "value"         =>  array(
                                    "Off"   => "hover_off",
                                    "On"   => "hover_on"
                                ),
                            "save_always" => true,
                            "dependency" =>	array(
                                "element" => "fss_autoplay",
                                "value" => array("auto_on")
                            ),
                            "description"   =>  esc_html__("Stop sliding carousel on mouse over.", "keydesign"),
                            "group" => esc_html__("Gallery settings", "keydesign"),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Gallery align","keydesign"),
                            "param_name"	=>	"fss_gallery_align",
                            "value"			=>	array(
                                    "Left" => "gallery-align-left",
                                    "Right" => "gallery-align-right",
                                ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_gallery"),
                            ),
                            "description"	=>	esc_html__("Select image gallery alignment relative to the content.", "keydesign"),
                            "group" => esc_html__("Gallery settings", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("YouTube URL", "keydesign"),
                            "param_name" => "fss_video_url",
                            "value" => "",
		                        "description" => esc_html__("Paste the YouTube url here.", "keydesign"),
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_video"),
                            ),
                            "group" => esc_html__("Video settings", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Video image source", "keydesign"),
                            "param_name" => "video_image_source",
                            "value" => array(
                                "Media library" => "media_library",
                                "External link" => "external_link",
                            ),
                            "description" => esc_html__("Select video cover image source.", "keydesign"),
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_video"),
                            ),
                            "save_always" => true,
                            "group" => esc_html__("Video settings", "keydesign"),
                        ),

                        array(
                            "type" => "attach_image",
                            "heading" => esc_html__("Video cover image", "keydesign"),
                            "param_name" => "fss_video_cover",
                            "description" => esc_html__("Upload video cover image. Recommended image size: 650x450 (Width x Height).", "keydesign"),
                            "dependency" => array(
                                "element" => "video_image_source",
                                "value" => array("media_library"),
                            ),
                            "group" => esc_html__("Video settings", "keydesign"),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Image external link", "keydesign"),
                            "param_name" => "video_ext_image",
                            "value" => "",
		                        "description" => esc_html__("Enter image external link.", "keydesign"),
                            "dependency" =>	array(
                                "element" => "video_image_source",
                                "value" => array("external_link")
                            ),
                            "group" => esc_html__("Video settings", "keydesign"),
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Image size", "keydesign"),
                            "param_name" => "video_ext_image_size",
                            "value" => "",
		                        "description" => esc_html__("Enter image size in pixels. Example: 650x450 (Width x Height).", "keydesign"),
                            "dependency" =>	array(
                                "element" => "video_image_source",
                                "value" => array("external_link")
                            ),
                            "group" => esc_html__("Video settings", "keydesign"),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Video shadow","keydesign"),
                            "param_name"	=>	"fss_video_shadow",
                            "value"			=>	array(
                                  "None" => "",
                                  "With shadow" => "fss-shadow-video",
                                ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_video"),
                            ),
                            "description"	=>	esc_html__("Add shadow to image.", "keydesign"),
                            "group" => esc_html__("Video settings", "keydesign"),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Play button style","keydesign"),
                            "param_name"	=>	"fss_play_button",
                            "value"			=>	array(
                                "White" => "",
                                "Primary theme color" => "play-btn-primary-color",
                                "Secondary theme color" => "play-btn-secondary-color",
                            ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_video"),
                            ),
                            "description"	=>	esc_html__("Select play button color scheme.", "keydesign"),
                            "group" => esc_html__("Video settings", "keydesign"),
                        ),

                        array(
                            "type"			=>	"dropdown",
                            "class"			=>	"",
                            "heading"		=>	esc_html__("Video align","keydesign"),
                            "param_name"	=>	"fss_video_align",
                            "value"			=>	array(
                                    "Left" => "video-align-left",
                                    "Right" => "video-align-right",
                                ),
                            "save_always" => true,
                            "dependency" => array(
                                "element" => "fss_section_template",
                                "value" => array("side_video"),
                            ),
                            "description"	=>	esc_html__("Select video alignment relative to the content.", "keydesign"),
                            "group" => esc_html__("Video settings", "keydesign"),
                        ),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Content CSS Animation", "keydesign"),
                            "param_name" => "css_animation_content",
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
                            "heading" => esc_html__("Image CSS Animation", "keydesign"),
                            "param_name" => "css_animation_image",
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
                            "heading" => esc_html__("Section extra class name", "keydesign"),
                            "param_name" => "fss_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style this particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign"),
                            "group" => esc_html__("Extras", "keydesign"),
                        ),

                    )
                ));
            }
        }

        public function kd_featuresections_container($atts, $content = null) {

            $redux_ThemeTek = get_option( 'redux_ThemeTek' );
            $with_sticky_topbar ='';
            $with_fixed_menu ='';

            extract(shortcode_atts(array(
              'fsp_navigation_type' => '',
              'fsp_background_color' => '',
              'fsp_border_color' => '',
              'fsp_link_color' => '',
              'fsp_link_hover_color' => '',
              'fsp_extra_class' => '',
            ), $atts));

            $wrapper_class = $parent_id = '';

            if (isset($redux_ThemeTek['tek-topbar-sticky'])) {
              if ($redux_ThemeTek['tek-topbar-sticky'] == '1') {
                $with_sticky_topbar = 'with-sticky-topbar';
              }
            }

            if (isset($redux_ThemeTek['tek-menu-behaviour'])) {
              if ($redux_ThemeTek['tek-menu-behaviour'] == '2') {
                $with_fixed_menu = 'with-fixed-menu';
              }
            }

            $parent_id = uniqid('kd-fsp-');

            $wrapper_class = implode(' ', array('feature-sections-wrapper', $fsp_navigation_type, $parent_id, $fsp_extra_class));

            $output = '<div class="'.trim($wrapper_class).'">
            <div class="feature-sections-tabs '.$with_sticky_topbar.' '.$with_fixed_menu.'">
              <nav class="kd-feature-tabs">
                <ul class="nav nav-tabs sticky-tabs container">
                </ul>
              </nav>
            </div>
            '.do_shortcode($content).'
            </div>';

            $output .='<style>';
              if ( '' != $fsp_background_color ) {
                $output .= '.feature-sections-wrapper.'.$parent_id.' .feature-sections-tabs { background-color: '.$fsp_background_color.'; }';
              }
              if ( '' != $fsp_border_color ) {
                $output .= '.feature-sections-wrapper.'.$parent_id.' .feature-sections-tabs { border-color: '.$fsp_border_color.'; }';
              }
              if ( '' != $fsp_link_color ) {
                $output .= '.feature-sections-wrapper.'.$parent_id.' .feature-sections-tabs .nav-tabs a, .feature-sections-wrapper .feature-sections-tabs .nav-tabs a .fa { color: '.$fsp_link_color.'; }';
              }
              if ( '' != $fsp_link_hover_color ) {
                $output .= '.feature-sections-wrapper.'.$parent_id.' .feature-sections-tabs .nav-tabs li.active a,
                .feature-sections-wrapper.'.$parent_id.' .feature-sections-tabs .nav-tabs a:hover,
                .feature-sections-wrapper.'.$parent_id.' .feature-sections-tabs .nav-tabs li.active a .fa,
                .feature-sections-wrapper.'.$parent_id.' .feature-sections-tabs .nav-tabs a:hover .fa { color: '.$fsp_link_hover_color.'; }';
                $output .= '.feature-sections-wrapper.'.$parent_id.' .feature-sections-tabs .nav-tabs li.active a { border-color: '.$fsp_link_hover_color.'; }';
              }
            $output .='</style>';

            return $output;
        }

        public function kd_featuresections_single($atts, $content = null) {

            /* Declare empty vars */
            $output = $icons = $nav_icons = $icon_color_style = $icon_size_style = $content_icon = $nav_icon_color_style = $nav_icon_size_style =
            $nav_content_icon = $section_class = $href = $section_bg_class = $link_class = $link_target = $link_title = $animation_delay = $custom_image_size = $custom_nav_image_size = '';

            extract(shortcode_atts(array(
                'fss_section_template' => '',
                'fss_id' => '',
                'fss_title' => '',
                'fss_title_tag' => '',
                'fss_title_label' => '',
                'fss_nav_label' => '',
                'fss_nav_icon_type' => '',
                'fss_nav_icon_iconsmind' => '',
                'fss_nav_icon_color' => '',
                'fss_nav_icon_size' => '',
                'fss_nav_icon_img' => '',
                'fss_title_color' => '',
                'fss_title_label_color' => '',
                'fss_subtitle' => '',
                'fss_subtitle_color' => '',
                'fss_icon_type' => '',
                'icon_iconsmind' => '',
                'fss_icon_color' => '',
                'fss_icon_size' => '',
                'fss_icon_img' => '',
                'fss_content_color' => '',
                'fss_custom_link' => '',
                'fss_section_link' => '',
                'fss_link_style' => '',
                'fss_button_color_scheme' => '',
                'fss_secondary_button' => '',
                'fss_secondary_button_link' => '',
                'fss_secondary_button_style' => '',
                'fss_secondary_button_color_scheme' => '',
                'fss_primary_button_action' => '',
                'fss_primary_button_text' => '',
                'fss_secondary_button_action' => '',
                'fss_secondary_button_text' => '',
                'fss_image_align' => '',
                'fss_gallery_align' => '',
                'fss_video_align' => '',
                'css_animation_content' => '',
                'fss_extra_class' => '',
                'fss_btn_extra_class' => '',
                'fss_secondary_btn_extra_class' => '',
            ), $atts));

            if ( $fss_icon_type == 'icon_browser' && strlen($icon_iconsmind) > 0 ) {
              $exploded_section = explode( ' ', $icon_iconsmind );
              $iconsmind_cat_section = end( $exploded_section );
              $font_file_cat_name = substr( strstr( $iconsmind_cat_section, '-' ), strlen( '-' ) );

              if ( strpos( $exploded_section[0], 'iconsmind-' ) === 0 ) {
                wp_enqueue_style( $font_file_cat_name.'-im-fonts-woff', plugin_dir_url( __DIR__ ).'assets/css/iconsmind/fonts/'.$font_file_cat_name.'.woff' );
                wp_enqueue_style( $iconsmind_cat_section, plugin_dir_url( __DIR__ ).'assets/css/iconsmind/'.$iconsmind_cat_section.'.css' );
              } elseif ( strpos( $exploded_section[1], 'fa-' ) === 0 ) {
                wp_enqueue_style( 'font-awesome' );
              }
            }

            if ( $fss_nav_icon_type == 'icon_browser' && strlen($fss_nav_icon_iconsmind) > 0 ) {
              $exploded_nav = explode( ' ', $fss_nav_icon_iconsmind );
              $iconsmind_cat_nav = end( $exploded_nav );
              $font_file_nav_name = substr( strstr( $iconsmind_cat_nav, '-' ), strlen( '-' ) );

              if ( strpos( $exploded_nav[0], 'iconsmind-' ) === 0 ) {
                wp_enqueue_style( $font_file_nav_name.'-im-fonts-woff', plugin_dir_url( __DIR__ ).'assets/css/iconsmind/fonts/'.$font_file_nav_name.'.woff' );
                wp_enqueue_style( 'iconsmind-'.$iconsmind_cat_nav, plugin_dir_url( __DIR__ ).'assets/css/iconsmind/'.$iconsmind_cat_nav.'.css' );
              } elseif ( strpos( $exploded_nav[1], 'fa-' ) === 0 ) {
                wp_enqueue_style( 'font-awesome' );
              }
            }

            if (strlen($icon_iconsmind) > 0) {
              $icons = $icon_iconsmind;
            }

            if (strlen($fss_nav_icon_iconsmind) > 0) {
              $nav_icons = $fss_nav_icon_iconsmind;
            }

            if ($fss_icon_color !== '') {
              $icon_color_style = 'color: '.$fss_icon_color.';';
            }

            if ($fss_nav_icon_color !== '') {
              $nav_icon_color_style = 'color: '.$fss_nav_icon_color.';';
            }

            if ($fss_icon_size !== '') {
              $icon_size_style = 'font-size: '.$fss_icon_size.';';
              $custom_image_size = $fss_icon_size;
            }

            if ($fss_nav_icon_size !== '') {
              $nav_icon_size_style = 'font-size: '.$fss_nav_icon_size.';';
              $custom_nav_image_size = $fss_nav_icon_size;
            }

            if ( $fss_icon_type == 'icon_browser' ) {
				          $content_icon = '<i class="'.$icons .' section-icon" style="'.$icon_size_style.' '.$icon_color_style.'"></i> ';
            } elseif ( $fss_icon_type == 'custom_icon' && !empty($fss_icon_img) ) {
				          $icon_img_array = wpb_getImageBySize ( $params = array( 'post_id' => NULL, 'attach_id' => $fss_icon_img, 'thumb_size' => 'full', 'class' => "" ) );
			            $content_icon = '<div class="custom-icon" '.(!empty($custom_image_size) ? 'style="width: '.$custom_image_size.';"' : '').'>'.$icon_img_array['thumbnail'].'</div>';
			      }

            if ( $fss_nav_icon_type == 'icon_browser' ) {
				          $nav_content_icon = '<i class="'.$nav_icons .' fss-nav-icon" style="'.$nav_icon_size_style.' '.$nav_icon_color_style.'"></i> ';
            } elseif ( $fss_nav_icon_type == 'custom_icon' && !empty($fss_nav_icon_img) ) {
				          $nav_icon_img_array = wpb_getImageBySize ( $params = array( 'post_id' => NULL, 'attach_id' => $fss_nav_icon_img, 'thumb_size' => 'full', 'class' => "" ) );
			            $nav_content_icon = '<span class="nav-custom-icon" '.(!empty($custom_nav_image_size) ? 'style="width: '.$custom_nav_image_size.';"' : '').'>'.$nav_icon_img_array['thumbnail'].'</span>';
			      }

            /* Featured content alignment */
            switch($fss_section_template) {
      				case 'side_photo':
                if ($fss_image_align == 'img-align-left') {
	                $section_class = 'featured-left';
                } elseif ($fss_image_align == 'img-align-right') {
                  $section_class = 'featured-right';
                }
      				break;

              case 'side_gallery':
                if ($fss_gallery_align == 'gallery-align-left') {
	                $section_class = 'featured-left';
                } elseif ($fss_gallery_align == 'gallery-align-right') {
                  $section_class = 'featured-right';
                }
      				break;

      				case 'side_video':
                if ($fss_video_align == 'video-align-left') {
                  $section_class = 'featured-left';
                } elseif ($fss_video_align == 'video-align-right') {
                  $section_class = 'featured-right';
                }
      				break;

      				default:
      			}

            if ( $fss_custom_link == "1" ) {
              /* Primary Button Link settings */
              $href = vc_build_link($fss_section_link);
              if ($href['target'] == "") { $href['target'] = "_self"; }

              if ( '' == $href['title'] && '' != $fss_primary_button_text ) {
                $href['title'] = $fss_primary_button_text;
              }


        			if($href['url'] !== '') {
        				$link_target = (isset($href['target'])) ? ' target="'.$href['target'].'"' : 'target="_self"';
        				$link_title = (isset($href['title'])) ? ' title="'.$href['title'].'"' : '';
        			}

              /* Primary Button Link class */
              switch($fss_link_style) {
                case 'solid_button':
                  if ($fss_button_color_scheme == 'btn_primary_color') {
  	                $link_class = 'tt_button tt_primary_button btn_primary_color ';
                  } elseif ($fss_button_color_scheme == 'btn_secondary_color') {
                    $link_class = 'tt_button tt_primary_button btn_secondary_color ';
                  }
        				break;

        				case 'outline_button':
                  if ($fss_button_color_scheme == 'btn_primary_color') {
                    $link_class = 'tt_button tt_secondary_button btn_primary_color ';
                  } elseif ($fss_button_color_scheme == 'btn_secondary_color') {
                    $link_class = 'tt_button tt_secondary_button btn_secondary_color ';
                  }
        				break;

                case 'simple_link':
                  $link_class = 'simple-link ';
        				break;
              }

              if ('' != $fss_btn_extra_class) {
                $link_class .= $fss_btn_extra_class;
              }
              $link_class .= $fss_primary_button_action;
            }

            /* Secondary Button Link settings */
            if ( $fss_secondary_button == "enable-secondary-btn" ) {
              $secondary_href = vc_build_link($fss_secondary_button_link);
              if ($secondary_href['target'] == "") { $secondary_href['target'] = "_self"; }

              if ( '' == $secondary_href['title'] && '' != $fss_secondary_button_text ) {
                $secondary_href['title'] = $fss_secondary_button_text;
              }

        			if($secondary_href['url'] !== '') {
        				$secondary_link_target = (isset($secondary_href['target'])) ? ' target="'.$secondary_href['target'].'"' : 'target="_self"';
        				$secondary_link_title = (isset($secondary_href['title'])) ? ' title="'.$secondary_href['title'].'"' : '';
        			} else {
                        $secondary_link_target = $secondary_link_title = '';
                    }

              /* Secondary Button Link class */
              switch($fss_secondary_button_style) {
                case 'solid_button':
                  if ($fss_secondary_button_color_scheme == 'btn_primary_color') {
  	                $secondary_link_class = 'tt_button tt_primary_button btn_primary_color ';
                  } elseif ($fss_secondary_button_color_scheme == 'btn_secondary_color') {
                    $secondary_link_class = 'tt_button tt_primary_button btn_secondary_color ';
                  }
        				break;

        				case 'outline_button':
                  if ($fss_secondary_button_color_scheme == 'btn_primary_color') {
                    $secondary_link_class = 'tt_button tt_secondary_button btn_primary_color ';
                  } elseif ($fss_secondary_button_color_scheme == 'btn_secondary_color') {
                    $secondary_link_class = 'tt_button tt_secondary_button btn_secondary_color ';
                  }
        				break;

                case 'simple_link':
                  $secondary_link_class = 'simple-link ';
        				break;
              }

              if ('' != $fss_secondary_btn_extra_class) {
                $secondary_link_class .= $fss_secondary_btn_extra_class;
              }
              $secondary_link_class .= $fss_secondary_button_action;
            }

            /* Animation delay */
            if ('' != $css_animation_content) {
                $animation_delay = 'data-animation-delay="200"';
            }

            if (empty($fss_id)) {
              $kd_featuresections_id = uniqid('kd-fss-');
            } else {
              $kd_featuresections_id = $fss_id;
            }

            $output .= '<section id="'.$kd_featuresections_id.'" class="'.$section_class.' '.$fss_extra_class.'">';
              if ($fss_nav_icon_type != 'no_icon') {
                $output .= '<li class="nav-label"><a class="feature-tabs-scroll" href="#'.$kd_featuresections_id.'"><span class="nav-number"></span>'.$nav_content_icon . $fss_nav_label.'</a></li>';
              } else {
                $output .= '<li class="nav-label"><a class="feature-tabs-scroll" href="#'.$kd_featuresections_id.'"><span class="nav-number"></span>'.$fss_nav_label.'</a></li>';
              }
              $output .= '<div class="container">
                <div class="side-content-wrapper ' . $css_animation_content . '" ' . $animation_delay . '>';
                  if ($fss_icon_type != "no_icon") {
                    $output .= $content_icon;
                  }

                  if ( $fss_title_label ) {
                    $output .= '<span class="side-content-title-label" '.(!empty($fss_title_label_color) ? 'style="color: '.$fss_title_label_color.';"' : '').'>'.$fss_title_label.'</span>';
                  }

                  if ( $fss_title ) {
                    if ( $fss_title_tag != '' ) {
                      $output .= '<'.esc_attr($fss_title_tag).' class="side-content-title" '.(!empty($fss_title_color) ? 'style="color: '.$fss_title_color.';"' : '').'>' . $fss_title . '</'.esc_attr($fss_title_tag).'>';
                    } else {
                      $output .= '<h2 class="side-content-title" '.(!empty($fss_title_color) ? 'style="color: '.$fss_title_color.';"' : '').'>'.$fss_title.'</h2>';
                    }
                  }

                  if($fss_subtitle != '') {
                    $output .= '<h6 class="side-content-subtitle" '.(!empty($fss_subtitle_color) ? 'style="color: '.$fss_subtitle_color.';"' : '').'>'.$fss_subtitle.'</h6>';
                  }
                  if($content != '') {
                    $output .= '<div class="side-content-text" '.(!empty($fss_content_color) ? 'style="color: '.$fss_content_color.';"' : '').'>'.do_shortcode( $content ).'</div>';
                  }
                  if ($fss_custom_link == "1" && $href['title'] != '') {
                    if ( $fss_primary_button_action == 'modal-trigger-btn' ) {
                      $output .= '<div class="side-content-link sc-primary-btn"><a class="'.$link_class.'" data-toggle="modal" data-target="#popup-modal">'.$href['title'].'</a></div>';
                    } elseif ( $fss_primary_button_action == 'panel-trigger-btn' ) {
                      $output .= '<div class="side-content-link sc-primary-btn"><a class="'.$link_class.'">'.$href['title'].'</a></div>';
                    } else {
                      $output .= '<div class="side-content-link sc-primary-btn"><a href="'.$href['url'].'"'.$link_target.''.$link_title.' class="'.$link_class.'">'.$href['title'].'</a></div>';
                    }
                  }
                  if ($fss_secondary_button == "enable-secondary-btn" && $secondary_href['title'] != '') {
                    if ( $fss_secondary_button_action == 'modal-trigger-btn' ) {
                      $output .= '<div class="side-content-link sc-secondary-btn"><a class="'.$secondary_link_class.'" data-toggle="modal" data-target="#popup-modal">'.$secondary_href['title'].'</a></div>';
                    } elseif ( $fss_secondary_button_action == 'panel-trigger-btn' ) {
                      $output .= '<div class="side-content-link sc-secondary-btn"><a class="'.$secondary_link_class.'">'.$secondary_href['title'].'</a></div>';
                    } else {
                      $output .= '<div class="side-content-link sc-secondary-btn"><a href="'.$secondary_href['url'].'"'.$secondary_link_target.''.$secondary_link_title.' class="'.$secondary_link_class.'">'.$secondary_href['title'].'</a></div>';
                    }
                  }
                $output .= '</div>';
                if ( in_array( $fss_section_template, array( 'side_photo','side_gallery', 'side_video' ), true ) ) {
                  require_once( KEYDESIGN_PLUGIN_PATH.'/includes/wpbakery-extend/elements/templates/sticky-nav/section-'.$fss_section_template.'.php' );
                  $template_func = 'kd_section_set_'.$fss_section_template;
            			$output .= $template_func($atts,$content);
                }

              $output .= '</div>
            </section>';

            return $output;
        }
    }
}
if (class_exists('tek_featuresections')) {
    $tek_featuresections = new tek_featuresections;
}
?>
