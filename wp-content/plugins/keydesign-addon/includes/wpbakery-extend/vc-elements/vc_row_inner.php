<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css
 * @var $el_id
 * @var $equal_height
 * @var $content_placement
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row_Inner
 */
$el_class = $equal_height = $content_placement = $css = $el_id = $full_width = $contained_wrapper_start = $contained_wrapper_end = $kd_fixed_background = $kd_background_image_position = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );
$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_inner',
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
	vc_shortcode_custom_css_class( $css_tablet_landscape ),
	vc_shortcode_custom_css_class( $css_tablet_portrait ),
	vc_shortcode_custom_css_class( $css_mobile ),
);
if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_row-has-fill';
}

if ( vc_shortcode_custom_css_has_property( $css, array(
		'padding-top',
	) )
) {
	$css_classes[] = 'vc_row-has-padding-top';
}

if ( vc_shortcode_custom_css_has_property( $css, array(
		'padding-bottom',
	) )
) {
	$css_classes[] = 'vc_row-has-padding-bottom';
}

if ( ! empty( $kd_background_overlay ) ) {
	$css_classes[] = 'vc_row-main-color-overlay';
}

if ( ! empty( $kd_fixed_background ) ) {
	$css_classes[] = 'vc_row-fixed-bg';
}

if ( ! empty( $kd_background_image_position ) ) {
	$css_classes[] = $kd_background_image_position;
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $atts['rtl_reverse'] ) ) {
	$css_classes[] = 'vc_rtl-columns-reverse';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

if ( ! empty( $full_width ) ) {
	if ( 'inner_row_contained' === $full_width ) {
		$css_classes[] = 'vc_inner_row-contained';
		$contained_wrapper_start = '<div class="container">';
		$contained_wrapper_end = '</div>';
	}
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= $contained_wrapper_start;
$output .= wpb_js_remove_wpautop( $content );
$output .= $contained_wrapper_end;
$output .= '</div>';
$output .= $after_output;

echo $output;
