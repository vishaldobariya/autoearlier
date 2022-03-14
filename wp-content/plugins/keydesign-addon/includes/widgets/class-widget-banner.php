<?php
class KD_Widget_Banner extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_banner',
			'description'                 => __( 'Display a banner with button link.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'kd-banner', __( 'Banner' ), $widget_ops );
		$this->alt_option_name = 'widget_banner_button';

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
	}

	public function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
	}

	public function print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.color-picker' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Banner' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$subtitle = ( ! empty( $instance['subtitle'] ) ) ? $instance['subtitle'] : '';

		$text_color = ( ! empty( $instance['text_color'] ) ) ? $instance['text_color'] : '#fff';

		$button_text = ( ! empty( $instance['button_text'] ) ) ? $instance['button_text'] : '';

		$button_link = ( ! empty( $instance['button_link'] ) ) ? $instance['button_link'] : '';

		$new_window = isset( $instance['new_window'] ) ? $instance['new_window'] : false;

		$background_image = ( ! empty( $instance['background_image'] ) ) ? $instance['background_image'] : '';

		$top_padding = ( ! empty( $instance['top_padding'] ) ) ? absint( $instance['top_padding'] ) : '';

		$bottom_padding = ( ! empty( $instance['bottom_padding'] ) ) ? absint( $instance['bottom_padding'] ) : '';

		?>

		<?php
			$wrapper_style = $widget_style = '';

			if ( $top_padding ) {
				$wrapper_style .= 'padding-top: '.$top_padding.'px;';
			}

			if ( $bottom_padding ) {
				$wrapper_style .= 'padding-bottom: '.$bottom_padding.'px;';
			}

			if ( $background_image ) {
				$widget_style .= 'background-image: url('.$background_image.');';
			}

			if ( $new_window ) {
				$button_target = '_blank';
			} else {
				$button_target = '_self';
			}

			$wrapper_style_escaped = $wrapper_style ? 'style="' . esc_attr( $wrapper_style ) . '"' : '';
			$widget_style_escaped = $widget_style ? 'style="' . esc_attr( $widget_style ) . '"' : '';
		?>

		<?php echo $args['before_widget']; ?>
		<div class="sidebar-banner-widget" <?php echo $widget_style_escaped; ?>>
			<div class="sidebar-banner-widget-wrapper" <?php echo $wrapper_style_escaped; ?>>
				<?php if ( $title ) : ?>
					<h5 <?php if ( $text_color ) { echo 'style="color:'.$text_color.';"'; } ?>><?php echo $title; ?></h5>
				<?php endif; ?>
				<?php if ( $subtitle ) : ?>
					<span class="banner-widget-subtitle" <?php if ( $text_color ) { echo 'style="color:'.$text_color.';"'; } ?>><?php echo $subtitle; ?></span>
				<?php endif; ?>
				<?php if ( '' != $button_text && '' != $button_link ) : ?>
					<a class="tt_button tt_primary_button btn_primary_color hover_solid_secondary banner-widget-button" href="<?php echo $button_link; ?>" target="<?php echo $button_target; ?>"><?php echo $button_text; ?></a>
				<?php endif; ?>
			</div>
		</div>
		<?php
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['subtitle'] = sanitize_text_field( $new_instance['subtitle'] );
		$instance['text_color'] = sanitize_text_field( $new_instance['text_color'] );
		$instance['button_text'] = sanitize_text_field( $new_instance['button_text'] );
		$instance['button_link'] = sanitize_text_field( $new_instance['button_link'] );
		$instance['new_window'] = isset( $new_instance['new_window'] ) ? (bool) $new_instance['new_window'] : false;
		$instance['background_image'] = sanitize_text_field( $new_instance['background_image'] );
		$instance['top_padding'] = (int) $new_instance['top_padding'];
		$instance['bottom_padding'] = (int) $new_instance['bottom_padding'];
		return $instance;
	}

	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$subtitle = isset( $instance['subtitle'] ) ? esc_attr( $instance['subtitle'] ) : '';
		$text_color = isset( $instance['text_color'] ) ? esc_attr( $instance['text_color'] ) : '';
		$button_text = isset( $instance['button_text'] ) ? esc_attr( $instance['button_text'] ) : '';
		$button_link = isset( $instance['button_link'] ) ? esc_attr( $instance['button_link'] ) : '';
		$new_window = isset( $instance['new_window'] ) ? (bool) $instance['new_window'] : false;
		$background_image = isset( $instance['background_image'] ) ? esc_attr( $instance['background_image'] ) : '';
		$top_padding = isset( $instance['top_padding'] ) ? absint( $instance['top_padding'] ) : '';
		$bottom_padding = isset( $instance['bottom_padding'] ) ? absint( $instance['bottom_padding'] ) : '';
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Subtitle:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo $subtitle; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'text_color' ); ?>"><?php _e( 'Text color:' ); ?></label>
		<input class="color-picker" id="<?php echo $this->get_field_id( 'text_color' ); ?>" name="<?php echo $this->get_field_name( 'text_color' ); ?>" type="text" value="<?php echo $text_color; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button text:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo $button_text; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'button_link' ); ?>"><?php _e( 'Button link:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'button_link' ); ?>" name="<?php echo $this->get_field_name( 'button_link' ); ?>" type="text" value="<?php echo $button_link; ?>" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $new_window ); ?> id="<?php echo $this->get_field_id( 'new_window' ); ?>" name="<?php echo $this->get_field_name( 'new_window' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'new_window' ); ?>"><?php _e( 'Open in new window?' ); ?></label></p>

		<p><label for="<?php echo $this->get_field_id( 'background_image' ); ?>"><?php _e( 'Background image:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'background_image' ); ?>" name="<?php echo $this->get_field_name( 'background_image' ); ?>" type="text" value="<?php echo $background_image; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'top_padding' ); ?>"><?php _e( 'Box top padding:' ); ?></label>
		<input class="small-text" id="<?php echo $this->get_field_id( 'top_padding' ); ?>" name="<?php echo $this->get_field_name( 'top_padding' ); ?>" type="number" step="1" min="1" value="<?php echo $top_padding; ?>" size="5" /></p>

		<p><label for="<?php echo $this->get_field_id( 'bottom_padding' ); ?>"><?php _e( 'Box bottom padding:' ); ?></label>
		<input class="small-text" id="<?php echo $this->get_field_id( 'bottom_padding' ); ?>" name="<?php echo $this->get_field_name( 'bottom_padding' ); ?>" type="number" step="1" min="1" value="<?php echo $bottom_padding; ?>" size="5" /></p>
		<?php
	}
}
