<?php

/**
 * ============================================================
 *   1. REGLAGES GUTENBERG .............................. L.15
 *   2. EPURATION MENUS ET NOTICES ...................... L.37
 *   		A. MASQUER LES MESSAGES ET VERSIONS ............. L.43
 *   		B. MENUS & DASHBORD ............................. L.78
 *			C. ADMIN_BAR .................................... L.90
 *   3. SUPPRESSION DES COMMENTAIRES DES POST TYPES ..... L.102
 *   4. SECURISATION DU WP-LOGIN ........................ L.117
 * ============================================================
*/

/**
 * -----------------------------------------------------------
 * 1. REGLAGES GUTENBERG
 * -----------------------------------------------------------
*/
function awc_reglages_gutenberg() {
	add_theme_support( 'editor-color-palette', array(
		array( 'name'  => ( 'primaire' ),   'slug'  => 'primaire',   'color' => '#8835b0' ),
		array( 'name'  => ( 'secondaire' ), 'slug'  => 'secondaire', 'color' => '#a5a5a5' ),
		array( 'name'  => ( 'input' ),      'slug'  => 'input',      'color' => '#efefef' ),
		array( 'name'  => ( 'typo' ),       'slug'  => 'typo',       'color' => '#6e6e6e' ),
		array( 'name'  => ( 'background' ), 'slug'  => 'background', 'color' => '#23252f' ),
		array( 'name'  => ( 'blanc' ), 	    'slug'  => 'blanc',      'color' => '#ffffff' ),
	));

	add_theme_support( 'align-wide' );         // ajoute la class .alignwide ou .alignfull
	add_theme_support( 'custom-line-height' ); // prise en charge de l'interlignage
	add_theme_support( 'responsive-embeds' );  // prise en charge du responsive pour les embeds
	add_theme_support( 'custom-spacing' );     // ajout du control d'espacement sur certains blocs
}
add_action( 'after_setup_theme', 'awc_reglages_gutenberg' );

/**
 * -----------------------------------------------------------
 * 2. EPURATION MENUS ET NOTICES
 * -----------------------------------------------------------
*/

/** --- A. MASQUER LES MESSAGES ET VERSIONS --- */

/** masquer le message de bienvenue */
remove_action( 'welcome_panel', 'wp_welcome_panel' );

/** masquer la version WP dans les metas */
remove_action( 'wp_head', 'wp_generator' );

/** masquer la version WP dans les RSS */
add_filter( 'the_generator', '__return_empty_string' );

/** masquer la version WP dans les styles & scripts */
function awc_masquer_versionWP_styles_scripts($src) {
	if (strpos( $src, 'ver=' )) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'style_loader_src', 'awc_masquer_versionWP_styles_scripts', 9999 );
add_filter( 'script_loader_src', 'awc_masquer_versionWP_styles_scripts', 9999 );

/** masquer la version WP dans le footer de l'administration */
function awc_masquer_versionWP() {
	remove_filter('update_footer', 'core_update_footer');
}
add_action('admin_menu', 'awc_masquer_versionWP');

/** masquer les notices pour les users non admin */
function awc_masquer_notices() {
	if (!current_user_can( 'administrator' )) {
		remove_all_actions( 'admin_notices' );
	}
}
add_action( 'admin_head', 'awc_masquer_notices', 1 );

/** --- B. MENUS & DASHBORD --- */

/** masquer des onglets de l'admin WP */
function awc_masquer_onglets_admin() {
	remove_menu_page( 'edit-comments.php' );
	remove_submenu_page( 'options-general.php', 'options-discussion.php' );
	remove_submenu_page( 'options-general.php', 'options-media.php' );
	remove_submenu_page( 'index.php', 'index.php' );
	remove_submenu_page( 'index.php', 'update-core.php' );
}
add_action( 'admin_menu', 'awc_masquer_onglets_admin', 999 );

/** --- C. ADMIN_BAR ---  */

/** masquer des éléments de la barre d'administration */
function awc_masquer_elts_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
	$wp_admin_bar->remove_menu( 'new-content' );
	$wp_admin_bar->remove_menu( 'comments' );
	$wp_admin_bar->remove_menu( 'customize' );
}
add_action( 'wp_before_admin_bar_render', 'awc_masquer_elts_admin_bar' );

/**
 * -----------------------------------------------------------
 * 3. SUPPRESSION DES COMMENTAIRES DES POST TYPES
 * -----------------------------------------------------------
*/

add_action('admin_init', function() {
	foreach (get_post_types() as $post_type) {
		if (post_type_supports( $post_type, 'comments' )) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}
});

/**
 * -----------------------------------------------------------
 * 4. SECURISATION DU WP-LOGIN
 * -----------------------------------------------------------
*/
function awc_errorsLogin() { //  masquer les indices d'erreurs
	return 'Erreur !';
}
add_filter( 'login_errors', 'awc_errorsLogin' );

remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 ); //  interdire la connexion par mail
