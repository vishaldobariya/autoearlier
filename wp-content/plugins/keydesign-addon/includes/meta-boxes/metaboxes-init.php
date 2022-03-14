<?php

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
}

if ( file_exists( dirname( __FILE__ ) . '/cmb2-tabs/plugin.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2-tabs/plugin.php';
}

add_action( 'cmb2_admin_init', 'keydesign_page_metaboxes' );
function keydesign_page_metaboxes() {
	$box_options = array(
		'id'           => 'keydesign_page_metaboxes',
		'title'        => __( 'Page Settings', 'keydesign' ),
		'object_types' => array( 'page', 'portfolio' ),
		'show_names'   => true,
	);

	$cmb = new_cmb2_box( $box_options );

	$tabs_setting = array(
		'config' => $box_options,
		'layout' => 'vertical',
		'tabs'   => array()
	);
	$tabs_setting['tabs'][] = array(
		'id'     => 'HeaderMetaboxes',
		'title'  => __( 'Header', 'keydesign' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hide header', 'keydesign' ),
				'desc' => esc_html__( 'If checked, the Header section will be hidden.', 'keydesign' ),
				'id'   => 'keydesign_hide_header',
				'type' => 'checkbox',
			),
			array(
				'name' => esc_html__( 'Transparent navbar', 'keydesign' ),
				'desc' => esc_html__( 'If checked, the navbar section will take a transparent background.', 'keydesign' ),
				'id'   => 'keydesign_page_transparent_navbar',
				'type' => 'checkbox',
			),
			array(
				'name'    => esc_html__( 'Transparent menu link color', 'keydesign' ),
				'desc'    => esc_html__( 'Set menu link color when using a transparent background.', 'keydesign' ),
				'id'      => 'keydesign_transparent_menu_color',
				'type'    => 'colorpicker',
			),
		)
	);
	$tabs_setting['tabs'][] = array(
		'id'     => 'TitleSectionMetaboxes',
		'title'  => __( 'Title Section', 'keydesign' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hide page title section', 'keydesign' ),
				'desc' => esc_html__( 'If checked, title section will be hidden.', 'keydesign' ),
				'id'   => 'keydesign_page_showhide_title_section',
				'type' => 'checkbox',
			),
			array(
				'name' => esc_html__( 'Hide breadcrumbs', 'keydesign' ),
				'desc' => esc_html__( 'If checked, breadcrumbs will be hidden.', 'keydesign' ),
				'id'   => 'keydesign_page_showhide_breadcrumbs',
				'type' => 'checkbox',
			),
			array(
				'name' => esc_html__( 'Page subtitle', 'keydesign' ),
				'desc' => esc_html__( 'Section subtitle is displayed under the main page title.', 'keydesign' ),
				'id'   => 'keydesign_page_subtitle',
				'type' => 'text',
			),
			array(
				'name'             => esc_html__( 'Title text align', 'keydesign' ),
				'id'               => 'keydesign_page_title_align',
				'type'             => 'radio_inline',
				'options'          => array(
					'left' => esc_html__( 'Left', 'keydesign' ),
					'center'   => esc_html__( 'Center', 'keydesign' ),
				),
				'default' => 'center',
			),
			array(
				'name'    => esc_html__( 'Title and subtitle color', 'keydesign' ),
				'desc'    => esc_html__( 'Specify the page title and subtitle color.', 'keydesign' ),
				'id'      => 'keydesign_page_title_color',
				'type'    => 'colorpicker',
			),
			array(
				'name'    => esc_html__( 'Title bar background color', 'keydesign' ),
				'desc'    => esc_html__( 'Specify the title bar background color.', 'keydesign' ),
				'id'      => 'keydesign_page_titlebar_background',
				'type'    => 'colorpicker',
			),
			array(
				'name' => esc_html__( 'Title bar top padding', 'keydesign' ),
				'desc' => esc_html__( 'Specify the title bar top padding value (Default: 200px). Used to adjust the title bar height.', 'keydesign' ),
				'id'   => 'keydesign_title_bar_top_padding',
				'type' => 'text_small',
			),
			array(
				'name' => esc_html__( 'Title bar bottom padding', 'keydesign' ),
				'desc' => esc_html__( 'Specify the title bar bottom padding value (Default: 100px). Used to adjust the title bar height.', 'keydesign' ),
				'id'   => 'keydesign_title_bar_bottom_padding',
				'type' => 'text_small',
			),
			array(
				'name' => esc_html__( 'Header background image size', 'keydesign' ),
				'id' => 'keydesign_header_background_image_size',
				'type' => 'radio_inline',
				'options' => array(
					'auto' => esc_html__( 'Auto', 'keydesign' ),
					'contain' => esc_html__( 'Contain', 'keydesign' ),
					'cover' => esc_html__( 'Cover', 'keydesign' ),
				),
				'show_on_cb' => 'cmb_show_field_for_pages',
				'default' => 'cover',
			),
			array(
				'name' => esc_html__( 'Header background image position', 'keydesign' ),
				'id' => 'keydesign_header_background_image_position',
				'type' => 'radio_inline',
				'options' => array(
					'center' => esc_html__( 'Center', 'keydesign' ),
					'top' => esc_html__( 'Top', 'keydesign' ),
					'right' => esc_html__( 'Right', 'keydesign' ),
					'bottom' => esc_html__( 'Bottom', 'keydesign' ),
					'left' => esc_html__( 'Left', 'keydesign' ),
				),
				'show_on_cb' => 'cmb_show_field_for_pages',
				'default' => 'center',
			),
		)
	);
	$tabs_setting['tabs'][] = array(
		'id'     => 'LayoutMetaboxes',
		'title'  => __( 'Layout', 'keydesign' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Background color', 'keydesign' ),
				'desc'    => esc_html__( 'Specify the page background color.', 'keydesign' ),
				'id'      => 'keydesign_page_bgcolor',
				'type'    => 'colorpicker',
			),
			array(
				'name' => esc_html__( 'Top padding', 'keydesign' ),
				'desc' => esc_html__( 'Specify the page top padding value. Eg. 100px', 'keydesign' ),
				'id'   => 'keydesign_page_top_padding',
				'type' => 'text_small',
			),
			array(
				'name' => esc_html__( 'Bottom padding', 'keydesign' ),
				'desc' => esc_html__( 'Specify the page bottom padding value. Eg. 100px', 'keydesign' ),
				'id'   => 'keydesign_page_bottom_padding',
				'type' => 'text_small',
			)
		)
	);
	$tabs_setting['tabs'][] = array(
		'id'     => 'FooterMetaboxes',
		'title'  => __( 'Footer', 'keydesign' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hide footer', 'keydesign' ),
				'desc' => esc_html__( 'If checked, the Footer section will be hidden.', 'keydesign' ),
				'id'   => 'keydesign_hide_footer',
				'type' => 'checkbox',
			),
			array(
				'name' => esc_html__( 'Fixed footer', 'keydesign' ),
				'desc' => 'Choose to enable/disable footer fixed scroll effect.',
				'id' => 'keydesign_fixed_footer',
				'type' => 'radio_inline',
				'options' => array(
					'default' => esc_html__( 'Default', 'keydesign' ),
					'on' => esc_html__( 'On', 'keydesign' ),
					'off' => esc_html__( 'Off', 'keydesign' ),
				),
				'default' => 'default',
			),
			array(
				'name' => esc_html__( 'Top padding', 'keydesign' ),
				'desc' => esc_html__( 'Specify the footer top padding value. Eg. 100px', 'keydesign' ),
				'id'   => 'keydesign_footer_top_padding',
				'type' => 'text_small',
			),
			array(
				'name' => esc_html__( 'Bottom padding', 'keydesign' ),
				'desc' => esc_html__( 'Specify the footer bottom padding value. Eg. 100px', 'keydesign' ),
				'id'   => 'keydesign_footer_bottom_padding',
				'type' => 'text_small',
			)
		)
	);

	$cmb->add_field( array(
		'id'   => '__tabs',
		'type' => 'tabs',
		'tabs' => $tabs_setting
	) );
}

if ( ! function_exists( 'cmb_show_field_for_pages' ) ) {
	function cmb_show_field_for_pages( $field ) {
		return 'page' === get_post_type( $field->object_id );
	}
}
