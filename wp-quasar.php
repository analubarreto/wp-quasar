<?php
  /**
   * Plugin name: Quasar WP
   * Description: Quasar with WordPress
   */

  // Register Scripts to use
   function func_load_quasar() {
     // scripts
    wp_register_script( 'wpvue_vuejs', 'https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js');
    wp_register_script( 'wpvue_quasar', 'https://cdn.jsdelivr.net/npm/quasar@1.14.7/dist/quasar.umd.modern.min.js');
    wp_register_script( 'my_quasarcode', plugin_dir_url( __FILE__ ).'quasarcode.js', 'wpvue_vuejs', true );

    // styles
    wp_register_style( 'roboto_font', 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' );
    wp_register_style( 'eva_icons', 'https://cdn.jsdelivr.net/npm/eva-icons@^1.0.0/style/eva-icons.css' );
    wp_register_style( 'animate_css', 'https://cdn.jsdelivr.net/npm/animate.css@^4.0.0/animate.min.css' );
    wp_register_style( 'quasar_css', 'https://cdn.jsdelivr.net/npm/quasar@1.14.7/dist/quasar.min.css' );

   }
   add_action('wp_enqueue_scripts', 'func_load_quasar');

  // Add shortcode
  function func_wp_quasar() {
    // Add Quasar and Vue
    wp_enqueue_script('wpvue_vuejs');
    wp_enqueue_script('wpvue_quasar');
    wp_enqueue_script('my_quasarcode');

    // Add styles
    wp_enqueue_style('roboto_font');
    wp_enqueue_style('eva_icons');
    wp_enqueue_style('animate_css');
    wp_enqueue_style('quasar_css');

    $str = "<div id='app'>"
    ."Message from Vue: {{ message }}"
    ."</div>";
    return $str;
  }

  add_shortcode( 'wpquasar', 'func_wp_quasar' );
?>