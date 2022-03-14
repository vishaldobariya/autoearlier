<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var array $atts
 * @var $content - shortcode content
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Basic_Grid $this
 */
$this->post_id = false;
$this->items = array();
$css = $el_class = '';
$posts = $filter_terms = array();
$this->buildAtts( $atts, $content );

$css = isset( $atts['css'] ) ? $atts['css'] : '';
$el_class = isset( $atts['el_class'] ) ? $atts['el_class'] : '';

$class_to_filter = 'vc_grid-container vc_clearfix wpb_content_element ' . $this->shortcode;
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

if ( 'true' === $this->atts['btn_add_icon'] ) {
	vc_icon_element_fonts_enqueue( $this->atts['btn_i_type'] );
}

$this->buildGridSettings();

if ( isset( $this->atts['style'] ) && 'pagination' === $this->atts['style'] ) {
	wp_enqueue_script( 'twbs-pagination' );
	wp_enqueue_script( 'vc_pageable_owl-carousel' );
}

if ( ! empty( $atts['page_id'] ) ) {
	$this->grid_settings['page_id'] = (int) $atts['page_id'];
}

wp_enqueue_script( 'vc_grid-js-imagesloaded' );
wp_register_script( 'vc_grid_keydesign', vc_asset_url( 'js/dist/vc_grid.min.js' ), array(
			'jquery-core',
			'underscore',
			'vc_waypoints',
		), WPB_VC_VERSION, true );
wp_enqueue_script( 'vc_grid_keydesign' );

wp_enqueue_script( 'vc_masonry' );


$animation = isset( $this->atts['initial_loading_animation'] ) ? $this->atts['initial_loading_animation'] : 'zoomIn';

// Used for preload first page
if ( ! vc_is_page_editable() ) {
	$haystack = array(
		'load-more',
		'lazy',
		'all',
	);
	if ( in_array( $this->atts['style'], $haystack, true ) && in_array( $this->settings['base'], array( 'vc_basic_grid' ), true ) ) {
		$this->atts['max_items'] = 'all' === $this->atts['style'] || $this->atts['items_per_page'] > $this->atts['max_items'] ? $this->atts['max_items'] : $this->atts['items_per_page'];
		$this->buildItems();
	}
}

$output = '
<div class="vc_grid-container-wrapper vc_clearfix"' . ( ! empty( $atts['el_id'] ) ? ' id="' . esc_attr( $atts['el_id'] ) . '"' : '' ) . '>
	<div class="' . esc_attr( $css_class ) . '" data-initial-loading-animation="' . esc_attr( $animation ) . '" data-vc-' . esc_attr( $this->pagable_type ) . '-settings="' . esc_attr( wp_json_encode( $this->grid_settings ) ) . '" data-vc-request="' . esc_attr( apply_filters( 'vc_grid_request_url', admin_url( 'admin-ajax.php' ) ) ) . '" data-vc-post-id="' . esc_attr( get_the_ID() ) . '" data-vc-public-nonce="' . esc_attr( vc_generate_nonce( 'vc-public-nonce' ) ) . '">
		' . $this->renderItems() . '
	</div>
</div>';

return $output;