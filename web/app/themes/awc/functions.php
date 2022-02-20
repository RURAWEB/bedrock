<?php

/**
 * ============================================================
 *   1. DECLARATION SCRIPTS ET STYLES ................... L.10
 *   2. DECLARATION DES INC/FUNCTIONS ................... L.35
 * ============================================================
*/

/**
 * -----------------------------------------------------------
 * 1. DECLARATION DES SCRIPTS & STYLES
 * -----------------------------------------------------------
*/
function awc_script_global() {
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true );

	if (!is_admin()) {
		wp_enqueue_style( 'bootstrap_style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), 'all' );

		wp_enqueue_style( 'awc_style', get_template_directory_uri() . '/style.css?v=1.0', array(), true, 'all' );
		//wp_enqueue_style( 'awc_style-min', get_template_directory_uri() . '/style.min.css?v=1.0', array(), true, 'all' );

		wp_enqueue_style( 'slider_style', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css', array(), 'all' );

		wp_enqueue_script( 'bootstrap_script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), true );
		wp_enqueue_script( 'awc_script', get_template_directory_uri() . '/js/awc_script.js?v1.0', array( 'jquery' ), true );
		wp_enqueue_script( 'slider_script', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', array( 'jquery' ), true );
	}
}
add_action( 'wp_enqueue_scripts', 'awc_script_global' );

function awc_admin_styles() {
	wp_enqueue_style( 'admin_style', get_template_directory_uri() . '/css/awc_admin.css?v=1.0', array(), 'all' );
}
add_action('admin_print_styles', 'awc_admin_styles', 11);

/**
 * -----------------------------------------------------------
 * 2. DECLARATION DES INC/FUNCTIONS
 * -----------------------------------------------------------
*/
require_once get_template_directory() . '/inc/awc_admin.php';
require_once get_template_directory() . '/inc/awc_images.php';
require_once get_template_directory() . '/inc/awc_cpt.php';

require_once get_template_directory() . '/inc/awc_front.php';
require_once get_template_directory() . '/inc/awc_register-blocks.php';
