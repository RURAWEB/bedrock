<?php

/**
 * ============================================================
 *   1. MENU ............................................ L.11
 *   2. AJOUT DU TITRE DANS LE HEADER ................... L.24
 *   3. SUPPRESSION EMOJIS ET COMMENTAIRES .............. L.31
 * ============================================================
*/

/**
 * -----------------------------------------------------------
 * 1. MENU
 * -----------------------------------------------------------
*/

/** --- A. Déclaration du menu --- */

function awc_enregistrer_menu() {
	register_nav_menus( array(
		'primary' => 'Menu Principal',
		'footer'  => 'Menu Footer',
	));
}
add_action( 'init', 'awc_enregistrer_menu' );

/** --- B. Ajout du logo dans le header --- */

function awc_wp_menu_items( $items, $args ) {
	$menu = wp_get_nav_menu_object($args->menu);

	if( $args->theme_location == 'primary' ) {
		$logo = get_field('logo-header', $menu);

		$logoHTML  = '<li class="menu-item-logo me-auto">';
			$logoHTML .= '<a href="'. home_url() .'">';
				if ($logo) {
					$logoHTML .= '<img src="'. $logo['url'] .'" alt="'. $logo['alt'] .'" />';
				}
			$logoHTML .= '</a>';
		$logoHTML .= '</li>';

		$items = $logoHTML . $items;
	}

	return $items;
}
add_filter('wp_nav_menu_items', 'awc_wp_menu_items', 10, 2);

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
