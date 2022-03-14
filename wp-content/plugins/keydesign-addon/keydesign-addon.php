<?php
/*
	Plugin Name: KeyDesign Addon
	Plugin URI: https://www.keydesign-themes.com/
	Description: KeyDesign Core Plugin for Sway Theme
	Version: 4.7
	Author: KeyDesign
	Author URI: https://www.keydesign-themes.com/
	Text Domain: keydesign
*/

define( 'KEYDESIGN_PLUGIN_PATH', dirname(__FILE__) );
define( 'KEYDESIGN_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

		/* Load admin area */
		require_once ( trailingslashit( KEYDESIGN_PLUGIN_PATH ) . 'includes/admin/admin-init.php' );

		/* Import OCDI files */
		require_once ( trailingslashit( KEYDESIGN_PLUGIN_PATH ) . 'includes/admin/ocdi/one-click-demo-import.php' );

		/* Theme demo import config */
		require_once ( trailingslashit( KEYDESIGN_PLUGIN_PATH ) . 'includes/admin/theme-demo-config.php' );

		/* Theme rsedux  */
		require_once ( trailingslashit( KEYDESIGN_PLUGIN_PATH ) . 'includes/redux-extensions/extensions-init.php' );

		/* Metaboxes */
		require_once ( trailingslashit( KEYDESIGN_PLUGIN_PATH ) . 'includes/meta-boxes/metaboxes-init.php');

		/* Widgets */
		require_once ( trailingslashit( KEYDESIGN_PLUGIN_PATH ) . 'includes/widgets/widgets-init.php');

		/* Custom menu meta fields */
		require_once ( trailingslashit( KEYDESIGN_PLUGIN_PATH ) . 'includes/admin/wp-custom-menu-meta.php' );

		/* WPBakery Page Builder compatibility */
		require_once ( trailingslashit( KEYDESIGN_PLUGIN_PATH ) . 'includes/wpbakery-extend/wpbakery-init.php');

	/* Allow SVG icon upload */
	add_filter( 'upload_mimes', 'keydesign_svg_upload' );
	function keydesign_svg_upload( $mimes ){
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	if ( ! function_exists( 'kd_output_post_socials' ) ) {
		function kd_output_post_socials() {
			$redux_ThemeTek = get_option( 'redux_ThemeTek' );
			$socials_sharing_content = '<div class="blog-social-sharing">';
			if (isset($redux_ThemeTek['tek-blog-social-sharing-buttons']) && $redux_ThemeTek['tek-blog-social-sharing-buttons']['1'] == '1') {
				$socials_sharing_content .= '
				  <a class="btn-facebook" target="_blank" href="//www.facebook.com/sharer/sharer.php?u='.get_permalink().'" title="'.apply_filters( 'blog_share_facebook', esc_html__("Share on Facebook", "keydesign") ).'"><i class="fab fa-facebook-f"></i></a>';
			}
			if (isset($redux_ThemeTek['tek-blog-social-sharing-buttons']) && $redux_ThemeTek['tek-blog-social-sharing-buttons']['2'] == '1') {
				$socials_sharing_content .= '
				  <a class="btn-twitter" target="_blank" href="//twitter.com/share?url='.get_permalink().'" title="'.apply_filters( 'blog_share_twitter', esc_html__("Share on Twitter", "keydesign") ).'"><i class="fab fa-twitter"></i></a>';
			}
			if (isset($redux_ThemeTek['tek-blog-social-sharing-buttons']) && $redux_ThemeTek['tek-blog-social-sharing-buttons']['3'] == '1') {
				$socials_sharing_content .= '
				  <a class="btn-pinterest" target="_blank" href="https://pinterest.com/pin/create/link/?url='.get_permalink().'" title="'.apply_filters( 'blog_share_pinterest', esc_html__("Share on Pinterest", "keydesign") ).'"><i class="fab fa-pinterest"></i></a>';
			}
			if (isset($redux_ThemeTek['tek-blog-social-sharing-buttons']) && $redux_ThemeTek['tek-blog-social-sharing-buttons']['4'] == '1') {
				$socials_sharing_content .= '
				  <a class="btn-linkedin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url='.get_permalink().'" title="'.apply_filters( 'blog_share_linkedin', esc_html__("Share on LinkedIn", "keydesign") ).'"><i class="fab fa-linkedin-in"></i></a>';
			}
			$socials_sharing_content .= '</div>';
			echo $socials_sharing_content;
		}
	}
	add_filter( 'sway_post_after_main_content', 'kd_output_post_socials', 20, 0 );

	function kd_style_loader_tag_filter( $html, $handle ) {
	    if ( strpos( $handle, 'im-fonts-woff' ) !== false ) {
	        return str_replace("rel='stylesheet'", "rel='preload' as='font' type='font/woff2' crossorigin='anonymous'", $html);
	    }
	    return $html;
	}
	add_filter('style_loader_tag', 'kd_style_loader_tag_filter', 10, 2);


	function kd_remove_type_attr( $tag, $handle ) {
		if ( strpos( $handle, 'im-fonts-woff' ) !== false ) {
    	return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
		}
		return $tag;
	}
	add_filter('style_loader_tag', 'kd_remove_type_attr', 10, 2);


if ( ! class_exists( 'KEYDESIGN_ADDON_CLASS' ) ) {
	class KEYDESIGN_ADDON_CLASS {
		function __construct() {
			add_action( 'admin_init', array( $this, 'init_addon' ) );
			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
			$this->elements_folder	=	plugin_dir_path( __FILE__ ).'includes/wpbakery-extend/elements';
			$this->params_dir = plugin_dir_path( __FILE__ ).'includes/wpbakery-extend/params';
			add_action( 'after_setup_theme', array( $this, 'integrate_with_vc' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'keydesign_load_front_scripts' ) );
			add_action( 'vc_load_iframe_jscss', array( $this, 'keydesign_load_front_editor_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'keydesign_load_admin_scripts') );
			add_action( 'init', array( $this, 'keydesign_init_portfolio_cpt' ) );
			$this->keydesign_templates();
		}

		public function init_addon() {
			if ( defined( 'WPB_VC_VERSION' ) ) {
				if ( version_compare( 6.4, WPB_VC_VERSION, '>' ) ) {
					add_action( 'admin_notices', array( $this, 'admin_version_notice' ) );
					add_action( 'network_admin_notices', array( $this, 'admin_version_notice' ) );
				}
			} else {
				add_action( 'admin_notices', array( $this, 'admin_activation_notice' ) );
				add_action( 'network_admin_notices', array( $this, 'admin_activation_notice' ) );
			}
		}

		public function admin_version_notice() {
			$is_multisite = is_multisite();
			$is_network_admin = is_network_admin();
			if ( ( $is_multisite && $is_network_admin ) || !$is_multisite ) {
				echo '<div class="error">
					<p>'.__('The','keydesign').' <strong>Keydesign Addon</strong> '.__('plugin requires','keydesign').' <strong>WPBakery Page Builder</strong> '.__('version 6.4 or greater.','keydesign').'</p>
				</div>';
			}
		}

		public function admin_activation_notice() {
			$is_multisite = is_multisite();
			$is_network_admin = is_network_admin();
			if ( ( $is_multisite && $is_network_admin) || !$is_multisite ) {
				echo '<div class="error">
					<p>'.__('The','keydesign').' <strong>KeyDesign Addon</strong> '.__('plugin requires','keydesign').' <strong>WPBakery Page Builder</strong> '.__('plugin installed and activated.','keydesign').'</p>
				</div>';
			}
		}

		public function load_textdomain() {
			$lang_dir = plugin_dir_path( __FILE__ ) . '/languages/';
			load_plugin_textdomain( 'keydesign', false, $lang_dir );
		}

		public function keydesign_templates() {
			if ( class_exists('WPBakeryShortCode') ) {
				$KeyDesignTemplates = new KeyDesign_Vc_Templates_Panel_Editor();
				return $KeyDesignTemplates->init();
			}
		}

		public function keydesign_init_portfolio_cpt() {
			if ( function_exists( 'sway_get_option' ) ) {
				if ( sway_get_option( 'tek-portfolio-cpt' ) ) {
					require_once ( trailingslashit( KEYDESIGN_PLUGIN_PATH ) . 'includes/portfolio-init.php' );
				}
			}
		}

		public function integrate_with_vc() {
			if ( class_exists( 'WPBakeryShortCode' ) ) {
				foreach ( glob( $this->elements_folder."/*.php" ) as $elem ) {
					require_once( $elem );
				}
				foreach (glob( $this->params_dir."/*.php" ) as $param ) {
					require_once( $param );
				}
			}
		}

		public function keydesign_load_front_editor_scripts() {
			wp_enqueue_script( 'masonry' );
			wp_enqueue_script( 'kd_easypiechart_script', plugins_url('assets/js/jquery.easypiechart.min.js', __FILE__), array('jquery') );
			wp_enqueue_script( 'kd_easytabs_script', plugins_url('assets/js/jquery.easytabs.min.js', __FILE__), array('jquery') );
			wp_enqueue_script( 'kd_countdown_script', plugins_url('assets/js/jquery.countdown.js', __FILE__), array('jquery') );
			wp_enqueue_script( 'kd_countto', plugins_url('assets/js/kd_countto.js', __FILE__), array('jquery') );
			wp_enqueue_script( 'kd_front_editor', plugins_url('assets/js/kd_addon_front.js', __FILE__), array('jquery'),'2' );
		}

		public function keydesign_load_front_scripts() {

			// Register & Load plug-in main style sheet
			wp_register_style( 'kd-addon-style', plugins_url('assets/css/kd_vc_front.css',  __FILE__), array('keydesign-style') );
			wp_enqueue_style( 'kd-addon-style' );

			// Owl Carousel
			wp_register_script( 'kd_owlcarousel_script', plugins_url('assets/js/owl.carousel.min.js', __FILE__), array('jquery') );
			wp_enqueue_script ( 'kd_owlcarousel_script' );

			// Easy Tabs
			wp_register_script( 'kd_easytabs_script', plugins_url('assets/js/jquery.easytabs.min.js', __FILE__), array('jquery') );

	    // Countdown
			wp_register_script( 'kd_countdown_script', plugins_url('assets/js/jquery.countdown.js', __FILE__), array('jquery') );

			// Pie Chart
			wp_register_script( 'kd_easypiechart_script', plugins_url('assets/js/jquery.easypiechart.min.js', __FILE__), array('jquery') );

			// Register & Load Photoswipe
			wp_register_style( 'photoswipe', plugins_url('assets/css/photoswipe.css', __FILE__), 'all' );
			wp_register_script( 'photoswipejs', plugins_url('assets/js/photoswipe.min.js', __FILE__), array('jquery') );

			// Progressbar
			wp_register_script( 'kd_progressbar', plugins_url('assets/js/kd_progressbar.js', __FILE__), array('jquery') );

			// Counter
			wp_register_script( 'kd_countto', plugins_url('assets/js/kd_countto.js', __FILE__), array('jquery') );

			// Particles
			wp_register_script( 'kd_particles', plugins_url('assets/js/particles.min.js', __FILE__), array('jquery') );

			// Image comparison
			wp_register_script( 'jquery_mobile_vmouse', plugins_url('assets/js/jquery.mobile.vmouse.min.js', __FILE__), array('jquery') );
			wp_register_script( 'kd_image_comparison', plugins_url('assets/js/image-comparison-slider.js', __FILE__), array('jquery_mobile_vmouse') );


			// FontAwesome font pack resources
			wp_register_style( 'font-awesome', plugins_url( 'assets/css/font-awesome.min.css', __FILE__) );

			// Plugin Front End Script
			wp_register_script( 'kd_addon_script', plugins_url('assets/js/kd_addon_script.js', __FILE__), array('jquery') );
			wp_enqueue_script ( 'kd_addon_script' );
		}

		public function keydesign_load_admin_scripts() {
			wp_enqueue_style( 'keydesign-iconsmind', plugins_url('assets/css/iconsmind.min.css', __FILE__));
			wp_enqueue_style( 'kd_addon_backend_style', plugins_url('assets/admin/css/kd_vc_backend.css', __FILE__));
			wp_enqueue_script( 'kd_addon_backend_script', plugins_url('assets/admin/js/kd_addon_backend.js', __FILE__), array( 'wp-color-picker' ), false, true);
		}

	}
}
// Finally initialize code
new KEYDESIGN_ADDON_CLASS();
