<?php

// Theme JS & CSS
function theme_styles_scripts() {
    // Theme Style Sheet
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    // Custom JS file
    wp_enqueue_script( 'flaglertavern-script', get_stylesheet_directory_uri() . '/assets/js/flaglertavern.js', array( 'jquery' ) );
    // FontAwesome
    wp_enqueue_style( 'fontawesome-style', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css' );
    // OWFont - Weather Icons
    wp_enqueue_style( 'owfont-style', get_stylesheet_directory_uri() . '/assets/css/owfont-regular.css' );
    // Google Web Fonts
    //wp_enqueue_style( 'opensans-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' );
    wp_enqueue_style( 'opensans-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,700' );
    // Bootstrap CSS
    wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );
    // Bootstrap JS
    wp_enqueue_script( 'bootstrap-script', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_styles_scripts' );


// Add Responsive Style Sheet Last (999 meaning load 999th in position)
function theme_responsive_styles() {
    wp_enqueue_style( 'responsive-styles', get_stylesheet_directory_uri() . '/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_responsive_styles', 999 );


// Remove Auto Paragraphs
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

// Remove WP Version Number
remove_action('wp_head', 'wp_generator');

// Get WP Nav Menu to work with Bootstrap Nav Menu
if ( ! function_exists( 'wpt_setup' ) ):
    function wpt_setup() {  
        register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
    } endif;
add_action( 'after_setup_theme', 'wpt_setup' );
require_once('wp-bootstrap-navwalker.php');

?>