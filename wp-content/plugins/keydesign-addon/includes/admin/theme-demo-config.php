<?php

if ( ! function_exists( 'keydesign_demo_import_files' ) ) {
  function keydesign_demo_import_files() {
    return array(
      array(
        'import_file_name'             => 'Branding Agency',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/branding-agency/branding-agency-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/branding-agency/branding-agency-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/branding-agency.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/branding-agency/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Business',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/business/business-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/business/business-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/business.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/business/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Corporate',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/corporate/corporate-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/corporate/corporate-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/corporate.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/corporate/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Digital Agency',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/digital-agency/digital-agency-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/digital-agency/digital-agency-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/digital-agency.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/digital-agency/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'IT Service',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/it-service/it-service-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/it-service/it-service-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/it-service.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/it-service/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Mobile App',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/mobile-app/mobile-app-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/mobile-app/mobile-app-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/mobile-app.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/mobile-app/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'SEO Agency',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/seo-agency/seo-agency-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/seo-agency/seo-agency-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/seo-agency.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/seo-agency/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Software',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/software/software-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/software/software-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/software.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/software/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Startup',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/startup/startup-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/startup/startup-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/startup.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/startup/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Organic Food',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/organic-food/organic-food-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/organic-food/organic-food-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/organic-food.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/organic-food/',
        'import_notice'                => 'This demo requires the WooCommerce plugin to be installed and activated.',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Industrial',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/industrial/industrial-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/industrial/industrial-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/industrial.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/industrial/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Kindergarten',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/kindergarten/kindergarten-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/kindergarten/kindergarten-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/kindergarten.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/kindergarten/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Insurance',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/insurance/insurance-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/insurance/insurance-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/insurance.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/insurance/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Yoga',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/yoga/yoga-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/yoga/yoga-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/yoga.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/yoga/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'SaaS',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/saas/saas-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/saas/saas-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/saas.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/saas/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Consulting',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/consulting/consulting-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/consulting/consulting-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/consulting.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/consulting/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Web Design Agency',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/web-design-agency/web-design-agency-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/web-design-agency/web-design-agency-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/web-design-agency.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/web-design-agency/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Beauty Salon',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/beauty-salon/beauty-salon-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/beauty-salon/beauty-salon-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/beauty-salon.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/beauty-salon/',
        'import_notice'                => 'This demo requires the WooCommerce plugin to be installed and activated.',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Cleaning',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/cleaning/cleaning-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/cleaning/cleaning-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/cleaning.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/cleaning/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Moving',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/moving/moving-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/moving/moving-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/moving.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/moving/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Architecture',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/architecture/architecture-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/architecture/architecture-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/architecture.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/architecture/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Renewable Energy',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/renewable-energy/renewable-energy-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/renewable-energy/renewable-energy-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/renewable-energy.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/renewable-energy/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Auto Service',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/auto-service/auto-service-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/auto-service/auto-service-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/auto-service.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/auto-service/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Marketing',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/marketing/marketing-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/marketing/marketing-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/marketing.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/marketing/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'NGO',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/ngo/ngo-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/ngo/ngo-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/ngo.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/ngo/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Home Decor',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/home-decor/home-decor-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/home-decor/home-decor-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/home-decor.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/home-decor/',
        'import_notice'                => 'This demo requires the WooCommerce plugin to be installed and activated.',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Transport',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/transport/transport-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/transport/transport-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/transport.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/transport/',
        'has_slider'                   => true,
        'slider_name'                  => 'transport',
      ),
      array(
        'import_file_name'             => 'Hair Salon',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/hair-salon/hair-salon-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/hair-salon/hair-salon-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/hair-salon.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/hair-salon/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Catering',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/catering/catering-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/catering/catering-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/catering.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/catering/',
        'import_notice'                => 'This demo requires the WooCommerce plugin to be installed and activated.',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Gardener',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/gardener/gardener-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/gardener/gardener-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/gardener.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/gardener/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Fast Food',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/fast-food/fast-food-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/fast-food/fast-food-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/fast-food.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/fast-food/',
        'import_notice'                => 'This demo requires the WooCommerce plugin to be installed and activated.',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Veterinary',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/veterinary/veterinary-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/veterinary/veterinary-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/veterinary.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/veterinary/',
        'import_notice'                => 'This demo requires the WooCommerce plugin to be installed and activated.',
        'has_slider'                   => true,
        'slider_name'                  => 'veterinary',
      ),
      array(
        'import_file_name'             => 'Lawyer',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/lawyer/lawyer-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/lawyer/lawyer-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/lawyer.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/lawyer/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Dentist',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/dentist/dentist-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/dentist/dentist-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/dentist.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/dentist/',
        'has_slider'                   => true,
        'slider_name'                  => 'dentist',
      ),
      array(
        'import_file_name'             => 'Wedding Planner',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/wedding-planner/wedding-planner-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/wedding-planner/wedding-planner-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/wedding-planner.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/wedding-planner/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Workspace',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/workspace/workspace-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/workspace/workspace-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/workspace.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/workspace/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Single Product',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/single-product/single-product-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/single-product/single-product-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/single-product.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/single-product/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Covid 19',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/covid-19/covid-19-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/covid-19/covid-19-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/covid-19.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/covid-19/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Real Estate',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/real-estate/real-estate-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/real-estate/real-estate-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/real-estate.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/real-estate/',
        'has_slider'                   => true,
        'slider_name'                  => 'real-estate',
      ),
      array(
        'import_file_name'             => 'Restaurant',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/restaurant/restaurant-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/restaurant/restaurant-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/restaurant.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/restaurant/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Financial Advisor',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/financial-advisor/financial-advisor-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/financial-advisor/financial-advisor-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/financial-advisor.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/financial-advisor/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Medical',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/medical/medical-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/medical/medical-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/medical.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/medical/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Fashion Shop',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/fashion-shop/fashion-shop-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/fashion-shop/fashion-shop-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/fashion-shop.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/fashion-shop/',
        'import_notice'                => 'This demo requires the WooCommerce plugin to be installed and activated.',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Bakery',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/bakery/bakery-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/bakery/bakery-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/bakery.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/bakery/',
        'import_notice'                => 'This demo requires the WooCommerce plugin to be installed and activated.',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Handyman',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/handyman/handyman-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/handyman/handyman-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/handyman.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/handyman/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Online Tutoring',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/online-tutoring/online-tutoring-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/online-tutoring/online-tutoring-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/online-tutoring.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/online-tutoring/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Accounting',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/accounting/accounting-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/accounting/accounting-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/accounting.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/accounting/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Influencer',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/influencer/influencer-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/influencer/influencer-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/influencer.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/influencer/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Bike Shop',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/bike-shop/bike-shop-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/bike-shop/bike-shop-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/bike-shop.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/bike-shop/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Psychology',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/psychology/psychology-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/psychology/psychology-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/psychology.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/psychology/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Crypto',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/crypto/crypto-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/crypto/crypto-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/crypto.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/crypto/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Political',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/political/political-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/political/political-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/political.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/political/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Brewery',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/brewery/brewery-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/brewery/brewery-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/brewery.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/brewery/',
        'has_slider'                   => true,
        'slider_name'                  => 'brewery',
      ),
      array(
        'import_file_name'             => 'Construction',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/construction/construction-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/construction/construction-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/construction.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/construction/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Landing Page',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/landing-page/landing-page-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/landing-page/landing-page-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/landing-page.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/landing-demo/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Photography',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/photography/photography-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/photography/photography-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/photography.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/photography/',
        'has_slider'                   => true,
        'slider_name'                  => 'photography',
      ),
      array(
        'import_file_name'             => 'eBook',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/ebook/ebook-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/ebook/ebook-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/ebook.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/ebook/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Fitness',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/fitness/fitness-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/fitness/fitness-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/fitness.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/fitness/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Electronics Repair',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/electronics-repair/electronics-repair-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/electronics-repair/electronics-repair-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/electronics-repair.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/electronics-repair/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Optometrist',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/optometrist/optometrist-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/optometrist/optometrist-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/optometrist.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/optometrist/',
        'has_slider'                   => true,
        'slider_name'                  => 'optometrist',
      ),
      array(
        'import_file_name'             => 'SaaS 2',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/saas-2/saas-2-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/saas-2/saas-2-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/saas-2.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/saas-2/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Tailor',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/tailor/tailor-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/tailor/tailor-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/tailor.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/tailor/',
        'has_slider'                   => true,
        'slider_name'                  => 'tailor',
      ),
      array(
        'import_file_name'             => 'Virtual Event',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/virtual-event/virtual-event-demo-content.xml',
        'local_import_innerpages_file' => plugin_dir_path( __FILE__ ) . 'demos/general/website-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/virtual-event/virtual-event-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/virtual-event.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/virtual-event/',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'bbPress Forum',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/bbpress-forum/bbpress-forum-demo-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/bbpress-forum/bbpress-forum-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/bbpress-forum.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/bbpress/forums/',
        'import_notice'                => 'This demo requires the bbPress plugin to be installed and activated.',
        'has_slider'                   => false,
      ),
      array(
        'import_file_name'             => 'Lifestyle Blog',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/lifestyle-blog/lifestyle-blog-demo-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/lifestyle-blog/lifestyle-blog-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/lifestyle-blog.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/blog-classic/',
        'has_slider'                   => true,
        'slider_name'                  => 'lifestyle-blog-slider',
      ),
      array(
        'import_file_name'             => 'Technology Blog',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/technology-blog/technology-blog-demo-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/technology-blog/technology-blog-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/technology-blog.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/blog-modern/',
        'has_slider'                   => true,
        'slider_name'                  => 'tech-blog-slider',
      ),
      array(
        'import_file_name'             => 'Food Blog',
        'categories'                   => array( 'Demos' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demos/food-blog/food-blog-demo-content.xml',
        'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demos/general/widgets.wie',
        'local_import_redux'           => array(
          array(
            'file_path'   => plugin_dir_path( __FILE__ ) . 'demos/food-blog/food-blog-theme-options.json',
            'option_name' => 'redux_ThemeTek',
          ),
        ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/food-blog.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/blog-grid/',
        'has_slider'                   => true,
        'slider_name'                  => 'food-blog-slider',
      ),

      array(
        'import_file_name'             => 'Dentist Slider',
        'categories'                   => array( 'Sliders' ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/sliders/dentist-slider.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/dentist/',
        'has_slider'                   => true,
        'slider_name'                  => 'dentist',
        'slider_only'                   => true,
      ),

      array(
        'import_file_name'             => 'Real Estate Slider',
        'categories'                   => array( 'Sliders' ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/sliders/real-estate-slider.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/real-estate/',
        'has_slider'                   => true,
        'slider_name'                  => 'real-estate',
        'slider_only'                   => true,
      ),

      array(
        'import_file_name'             => 'Transport Slider',
        'categories'                   => array( 'Sliders' ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/sliders/transport-slider.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/transport/',
        'has_slider'                   => true,
        'slider_name'                  => 'transport',
        'slider_only'                   => true,
      ),

      array(
        'import_file_name'             => 'Veterinary Slider',
        'categories'                   => array( 'Sliders' ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/sliders/veterinary-slider.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/veterinary/',
        'has_slider'                   => true,
        'slider_name'                  => 'veterinary',
        'slider_only'                   => true,
      ),

      array(
        'import_file_name'             => 'Brewery Slider',
        'categories'                   => array( 'Sliders' ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/sliders/brewery-slider.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/brewery/',
        'has_slider'                   => true,
        'slider_name'                  => 'brewery',
        'slider_only'                   => true,
      ),

      array(
        'import_file_name'             => 'Photography Slider',
        'categories'                   => array( 'Sliders' ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/sliders/photography-slider.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/photography/',
        'has_slider'                   => true,
        'slider_name'                  => 'photography',
        'slider_only'                   => true,
      ),

      array(
        'import_file_name'             => 'Optometrist Slider',
        'categories'                   => array( 'Sliders' ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/sliders/optometrist-slider.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/optometrist/',
        'has_slider'                   => true,
        'slider_name'                  => 'optometrist',
        'slider_only'                   => true,
      ),

      array(
        'import_file_name'             => 'Tailor Slider',
        'categories'                   => array( 'Sliders' ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/sliders/tailor-slider.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/tailor/',
        'has_slider'                   => true,
        'slider_name'                  => 'tailor',
        'slider_only'                   => true,
      ),

      array(
        'import_file_name'             => 'Food Blog Slider',
        'categories'                   => array( 'Sliders' ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/sliders/food-blog-slider.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/blog-grid/',
        'has_slider'                   => true,
        'slider_name'                  => 'food-blog-slider',
        'slider_only'                   => true,
      ),

      array(
        'import_file_name'             => 'Lifestyle Blog Slider',
        'categories'                   => array( 'Sliders' ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/sliders/lifestyle-blog-slider.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/blog-classic/',
        'has_slider'                   => true,
        'slider_name'                  => 'lifestyle-blog-slider',
        'slider_only'                   => true,
      ),

      array(
        'import_file_name'             => 'Tech Blog Slider',
        'categories'                   => array( 'Sliders' ),
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'screenshots/sliders/technology-blog-slider.jpg',
        'preview_url'                  => 'https://www.swaytheme.com/blog-modern/',
        'has_slider'                   => true,
        'slider_name'                  => 'tech-blog-slider',
        'slider_only'                   => true,
      ),

    );
  }
}
add_filter( 'pt-ocdi/import_files', 'keydesign_demo_import_files' );

// Automatically assign "Front page", "Posts page" and menu locations after the importer is done
// Import Revolution Slider if plugin is active
if ( ! function_exists( 'keydesign_demo_after_import' ) ) {
  function keydesign_demo_after_import( $selected_import ) {

    if ( isset( $selected_import['categories'] ) && $selected_import['categories'] != '' ) {
      $import_categories = $selected_import['categories'];
    }

    if ( in_array( "Demos", $import_categories ) ) {
    	// Assign menus to their locations.
    	$main_menu = get_term_by( 'name', 'Main menu', 'nav_menu' );
      $footer_menu = get_term_by( 'name', 'Footer menu', 'nav_menu' );
      $topbar_menu = get_term_by( 'name', 'Topbar menu', 'nav_menu' );

    	set_theme_mod( 'nav_menu_locations', array(
    			'header-menu' => $main_menu->term_id,
          'footer-menu' => $footer_menu->term_id,
          'topbar-menu' => $topbar_menu->term_id,
    		)
    	);

    	// Assign front page and posts page (blog page)
      $front_page_name = 'Home ' . $selected_import['import_file_name'];
    	$front_page_id = get_page_by_title( $front_page_name );
    	$blog_page_id  = get_page_by_title( 'Blog' );

    	update_option( 'show_on_front', 'page' );
    	update_option( 'page_on_front', $front_page_id->ID );
    	update_option( 'page_for_posts', $blog_page_id->ID );

      // Configure permalinks
      global $wp_rewrite;
    	$wp_rewrite->set_permalink_structure( '/%postname%/' );
      flush_rewrite_rules();
    }

    // Import Slider Revolution
    if ( class_exists( 'RevSlider' ) ) {
      if ( $selected_import['has_slider'] ) {
        $slider_array = array( plugin_dir_path( __FILE__ ) . 'demos/revslider/'.$selected_import['slider_name'].'.zip' );

        $slider = new RevSlider();

        foreach( $slider_array as $filepath ){
          $slider->importSliderFromPost( true, true, $filepath );
        }

        echo ' Slider processed';
      }
    }
  }
}
add_action( 'pt-ocdi/after_import', 'keydesign_demo_after_import' );

// Remove default widgets on demo import
if ( ! function_exists( 'keydesign_before_widgets_import' ) ) {
  function keydesign_before_widgets_import( $selected_import ) {
    if ( $selected_import['slider_only'] == false ) {
      update_option( 'sidebars_widgets', array( 'wp_inactive_widgets' => array() ) );
    }
  }
}
add_action( 'pt-ocdi/before_widgets_import', 'keydesign_before_widgets_import' );

// Disable generation of smaller images (thumbnails) during the content import
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

// Disable the branding notice
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
?>
