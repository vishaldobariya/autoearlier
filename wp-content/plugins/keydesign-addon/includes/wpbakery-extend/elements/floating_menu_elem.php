<?php

if (!class_exists('KD_ELEM_FLOATING_MENU')) {

    class KD_ELEM_FLOATING_MENU extends KEYDESIGN_ADDON_CLASS {

        function __construct() {
            add_action('init', array($this, 'kd_floating_menu_init'));
            add_shortcode('tek_floating_menu', array($this, 'kd_floating_menu_shrt'));
        }

        // Element configuration in admin

        function kd_floating_menu_init() {
            if (function_exists('vc_map')) {
                vc_map(
                  array(
                    "name" => esc_html__("Floating menu", "keydesign"),
                    "description" => esc_html__("Sticky one page navigator menu.", "keydesign"),
                    "base" => "tek_floating_menu",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/floating-menu.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(
	                array(
        						"type" => "param_group",
        						"class" => "",
        						"heading" => esc_html__("Add menu items", "keydesign"),
        						"description" => esc_html__("Drag the items into the order you prefer. Click the toggle row icon on the right to reveal additional configuration options.", "keydesign"),
        						"value" => "",
        						"param_name" => "menu_items",
        						"params" => array(
      								array(
      									"type" => "textfield",
      									"heading" => esc_html__("Navigation label", "keydesign"),
      									"param_name" => "navigation_label",
      									"description" =>"",
      									"admin_label" => true,
      								),
      								array(
      									"type" => "href",
      									"heading" => esc_html__("URL", "keydesign"),
      									"param_name" => "navigation_url",
      									"value" => "",
      									"description" => esc_html__("Enter URL (Note: parameters like \"mailto:\" are also accepted).", "keydesign"),
      								),
      								array(
      									"type" => "checkbox",
      									"heading" => esc_html__( "Open link in a new tab?", "keydesign" ),
      									"param_name" => "navigation_target",
      									"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
      								),
                      array(
      									"type" => "checkbox",
      									"heading" => esc_html__( "Set element as active?", "keydesign" ),
      									"param_name" => "navigation_active_link",
      									"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
      									"description" => esc_html__( "If checked the current menu item will take the active state.", "keydesign" ),
      								),
	                  ),
                    "group" => esc_html__("Content", "keydesign"),
			            ),
			            array(
        						"type" => "checkbox",
        						"heading" => esc_html__( "Enable scrollspy?", "keydesign" ),
        						"param_name" => "navigation_scrollspy",
        						"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
        						"description" => esc_html__( "Highlight navigation links based on scroll position to indicate which link is currently active in the viewport.", "keydesign" ),
        						"group" => esc_html__("Content", "keydesign"),
        					),
                  array(
      							"type" => "checkbox",
      							"heading" => esc_html__( "Set static position?", "keydesign" ),
      							"param_name" => "static_position",
      							"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
      							"description" => esc_html__( "Display the element in a static position. The default position state is fixed.", "keydesign" ),
      							"group" => esc_html__("Content", "keydesign"),
      						),
			            array(
                    "type" => "colorpicker",
                    "heading" => esc_html__("Menu bar background color", "keydesign"),
                    "param_name" => "navbar_bg_color",
                    "value" => "",
                    "description" => esc_html__("Select menu bar background color. If none selected, the default style will be applied.", "keydesign"),
                    "group" => esc_html__("Design", "keydesign"),
                  ),
			            array(
                    "type" => "colorpicker",
                    "heading" => esc_html__("Link text color", "keydesign"),
                    "param_name" => "link_color",
                    "value" => "",
                    "description" => esc_html__("Select link color for the inactive state. If none selected, the default style will be applied.", "keydesign"),
                    "group" => esc_html__("Design", "keydesign"),
                  ),
			            array(
                    "type" => "colorpicker",
                    "heading" => esc_html__("Active/Hover link background color", "keydesign"),
                    "param_name" => "active_link_bg_color",
                    "value" => "",
                    "description" => esc_html__("Select link background color for the active/hover state. If none selected, the default style will be applied.", "keydesign"),
                    "group" => esc_html__("Design", "keydesign"),
                  ),
			            array(
                    "type" => "colorpicker",
                    "heading" => esc_html__("Active/Hover link text color", "keydesign"),
                    "param_name" => "active_link_text_color",
                    "value" => "",
                    "description" => esc_html__("Select link text color for the active/hover state. If none selected, the default style will be applied.", "keydesign"),
                    "group" => esc_html__("Design", "keydesign"),
                  ),
      						array(
      							"type" => "checkbox",
      							"heading" => esc_html__( "Hide on mobile?", "keydesign" ),
      							"param_name" => "hide_mobile",
      							"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
      							"description" => esc_html__( "Hide element on mobile devices.", "keydesign" ),
      							"group" => esc_html__("Responsive Options", "keydesign"),
      						),
      						array(
      							"type" => "checkbox",
      							"heading" => esc_html__( "Hide on tablet?", "keydesign" ),
      							"param_name" => "hide_tablet",
      							"value" => array( esc_html__( "Yes", "keydesign" ) => "yes" ),
      							"description" => esc_html__( "Hide element on tablet devices.", "keydesign" ),
      							"group" => esc_html__("Responsive Options", "keydesign"),
      						),
			            array(
                    "type" => "textfield",
                    "param_name" => "menu_id",
                    "heading" => esc_html__( "Element ID (Optional)", "keydesign" ),
                    "description" => sprintf( esc_html__( "Enter element ID (Note: make sure it is unique and valid according to %sw3c specification%s).", "keydesign" ), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>' ),
                    "group" => esc_html__("Extras", "keydesign"),
                  ),
          				array(
          					"type" => "textfield",
          					"heading" => esc_html__("Extra class name", "keydesign"),
          					"param_name" => "extra_class",
          					"value" => "",
          					"description" => esc_html__("If you wish to style this particular content element differently, then use this field to add any number of CSS classes, separated by spaces, which can be used to asssign custom CSS styles.", "keydesign"),
          					"group" => esc_html__( "Extras", "keydesign" ),
          				),
                )
              ));
          }
        }

	    // Render the element on front-end

      public function kd_floating_menu_shrt($atts, $content = null) {

        $output = $menu_item = $menu_item_data = $menu_items_build = $link_target = $wrapper_class = $wrapper_classes[] = $elem_id = $link_active = $label_class = '';

        extract(shortcode_atts(array(
          'menu_items' => '',
          'navigation_scrollspy' => '',
          'navbar_bg_color' => '',
          'link_color' => '',
          'active_link_bg_color' => '',
          'active_link_text_color' => '',
          'hide_mobile' => '',
          'hide_tablet' => '',
          'static_position' => '',
          'menu_id' => '',
          'extra_class' => '',
        ), $atts));

  			// Element ID
  			if ( empty( $menu_id ) ) {
          $elem_id = uniqid('fm-');
        } else {
          $elem_id = $menu_id;
        }

        // Wrapper main class
        $wrapper_classes[] = 'fm-wrapper';

        // Wrapper extra class
        if ( !empty( $extra_class ) ) {
          $wrapper_classes[] = $extra_class;
        }

  			// Enable scrollspy
  			if ( !empty( $navigation_scrollspy ) ) {
  				$wrapper_classes[] = 'enable-scrollspy';
  			}

  			// Responsive options classes
  			if ( !empty( $hide_mobile ) ) {
  				$wrapper_classes[] = 'hide-mobile';
  			}
  			if ( !empty( $hide_tablet ) ) {
  				$wrapper_classes[] = 'hide-tablet';
  			}
  			if ( !empty( $static_position ) ) {
  				$wrapper_classes[] = 'static-position';
  			}

  			if ( $navbar_bg_color || $link_color || $active_link_bg_color || $active_link_text_color ) {
  				$output .='<style id="floating-menu-style">';
  				if ( '' != $navbar_bg_color ) {
  					$output .= '#' . $elem_id . '.fm-wrapper { background-color: '.esc_attr( $navbar_bg_color ).'; }';
  				}
  				if ( '' != $link_color ) {
  					$output .= '#' . $elem_id . ' .fm-item a { color: '.esc_attr( $link_color ).'; }';
  				}
  				if ( '' != $active_link_bg_color ) {
  					$output .= '#' . $elem_id . ' .fm-item.active a, #' . $elem_id . ' .fm-item:hover a { background-color: '.esc_attr( $active_link_bg_color ).'; }';
  				}
  				if ( '' != $active_link_text_color ) {
  					$output .= '#' . $elem_id . ' .fm-item.active a, #' . $elem_id . ' .fm-item:hover a { color: '.esc_attr( $active_link_text_color ).'; }';
  				}
  				$output .='</style>';
  			}

  			// Wrapper class
  			$wrapper_class = implode( ' ', $wrapper_classes );

        // Menu items group
        $menu_item = json_decode( urldecode( $menu_items ), true );
  			$menu_items_build .= '<ul class="fm-list nav">';

        if ( isset( $menu_item ) ) {
  				foreach ( $menu_item as $menu_item_data ) {
            // Sanitize nav label to be used as class
            $label_class = 'fm-' . sanitize_title( $menu_item_data["navigation_label"] );

  					if ( !empty( $menu_item_data["navigation_target"] ) ) {
  						$link_target = '_blank';
  					} else {
  						$link_target = '_self';
  					}

            if ( !empty( $menu_item_data["navigation_active_link"] ) ) {
              $link_active = 'active';
            } else {
              $link_active = '';
            }

            $item_class = implode( ' ', array('fm-item', $label_class, $link_active ) );

  					if ( isset( $menu_item_data["navigation_url"] ) && isset( $menu_item_data["navigation_label"] ) ) {
  						$menu_items_build .= '<li class="'.trim( $item_class ).'"><a href="'.esc_url( $menu_item_data["navigation_url"] ).'" target="'.esc_attr( $link_target ).'">'.esc_html( $menu_item_data["navigation_label"] ).'</a></li>';
  					}
          }
        }

        $menu_items_build .= '</ul>';

  			$output .= '<div id="'.esc_attr( $elem_id ).'" class="'.esc_attr( trim( $wrapper_class ) ).'">
  				<nav class="fm-nav">'.$menu_items_build.'</nav>
  			</div>';

        return $output;
    }
  }
}

if (class_exists('KD_ELEM_FLOATING_MENU')) {
    $KD_ELEM_FLOATING_MENU = new KD_ELEM_FLOATING_MENU;
}

?>
