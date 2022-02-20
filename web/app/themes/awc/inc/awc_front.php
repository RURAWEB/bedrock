<?php

/**
 * ============================================================
 *   1. MENU ............................................ L.13
 *      A. DÉCLARATION DU MENU .......................... L.19
 *      B. AJOUT DU CONTENU DANS LE HEADER & LE FOOTER .. L.30
 *   2. AJOUT DU TITRE DANS LE HEADER ................... L.82
 *   3. SUPPRESSION EMOJIS ET COMMENTAIRES .............. L.89
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
		'footer1' => 'Menu Footer gauche',
		'footer2' => 'Menu Footer droite',
	));
}
add_action( 'init', 'awc_enregistrer_menu' );

/** --- B. Ajout du contenu dans le header & le footer --- */

function awc_wp_menu_items( $items, $args ) {
	$menu = wp_get_nav_menu_object($args->menu);

	if ( $args->theme_location == 'primary' ) {
		$logo = get_field('logo-header', $menu);

		if ($logo) {
			$logoHTML  = '<li class="menu-item-logo me-auto">';
			$logoHTML .= '<a href="'. home_url() .'">';
			$logoHTML .= '<img src="'. $logo['url'] .'" alt="'. $logo['alt'] .'" />';
			$logoHTML .= '</a>';
			$logoHTML .= '</li>';
		}

		$langueHTML  = '<li class="menu-item-langue">';
		$langueHTML .= '<span class="active position-relative py-5">FR</span>';
		$langueHTML .= '<ul class="sous-menu d-none position-absolute bg-white mt-2 py-3">';
		$langueHTML .= '<li class="my-1 px-4"><span class="fr">FR</span></li>';
		$langueHTML .= '<li class="my-1 px-4"><span class="en">EN</span></li>';
		$langueHTML .= '<li class="my-1 px-4"><span class="es">ES</span></li>';
		$langueHTML .= '<li class="my-1 px-4"><span class="de">DE</span></li>';
		$langueHTML .= '</ul>';
		$langueHTML .= '</li>';

		$items = $logoHTML . $items . $langueHTML;
	}

	if ( $args->theme_location == 'footer1' || $args->theme_location == 'footer2') {
		$logo   = get_field('logo-footer', $menu);
		$notule = get_field('notule-footer', $menu);

		if ($logo) {
			$logoHTML  = '<li class="menu-item-logo mb-4">';
			$logoHTML .= '<img src="'. $logo['url'] .'" alt="'. $logo['alt'] .'" />';
			$logoHTML .= '</li>';
		}

		if ($notule) {
			$notuleHTML  = '<li class="menu-item-notule">';
			$notuleHTML .= '<p class="text-white">'. $notule .'</p>';
			$notuleHTML .= '</li>';
		}

		$items = $logoHTML . $notuleHTML . $items;
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
