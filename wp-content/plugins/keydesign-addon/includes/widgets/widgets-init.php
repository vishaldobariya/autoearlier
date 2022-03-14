<?php

  function keydesign_register_widgets() {
    require_once dirname( __FILE__ ) . '/class-widget-banner.php';
    require_once dirname( __FILE__ ) . '/class-widget-recent-posts.php';
    require_once dirname( __FILE__ ) . '/class-widget-social-icons.php';

    register_widget( 'KD_Widget_Banner' );
    register_widget( 'KD_Widget_Recent_Posts_Thumbnails' );
    register_widget( 'KD_Widget_Social_Icons' );
  }

  add_action( 'widgets_init', 'keydesign_register_widgets' );
