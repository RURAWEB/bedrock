<?php

/**
 * ============================================================
 *   1. DECLARATION DU MENU ............................. L.11
 *   2. AJOUT DU TITRE DANS LE HEADER ................... L.24
 *   3. SUPPRESSION EMOJIS ET COMMENTAIRES .............. L.31
 * ============================================================
*/

/**
 * -----------------------------------------------------------
 * 1. DECLARATION DU MENU
 * -----------------------------------------------------------
*/
function awc_enregistrer_menu() {
	register_nav_menus( array(
		'primary'  => 'Menu Principal',
		'footer'   => 'Menu Footer',
	));
}
add_action( 'init', 'awc_enregistrer_menu' );

/**
 * -----------------------------------------------------------
 * 2. AJOUT DU TITRE DANS LE HEADER
 * -----------------------------------------------------------
*/
add_theme_support( 'title-tag' );

/**
 * -----------------------------------------------------------
 * 3. SUPPRESSION EMOJIS ET COMMENTAIRES
 * -----------------------------------------------------------
*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

add_filter( 'comments_open', '__return_false', 20, 2 );        // fermeture des pings & des commentaires
add_filter( 'pings_open', '__return_false', 20, 2 );           // fermeture des pings & des commentaires
add_filter( 'comments_array', '__return_empty_array', 10, 2 ); // masquage des commentaires existants
