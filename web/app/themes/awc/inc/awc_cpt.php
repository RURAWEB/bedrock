<?php

/**
 * ============================================================
 *   1. MOTS CLÉS ....................................... L.10
 *   2. BLOCS RÉUTILISABLES ............................. L.50
 * ============================================================
*/

/**
 * -----------------------------------------------------------
 * 1. MOTS CLÉS
 * -----------------------------------------------------------
*/
function awc_cpt_motscles() {
	$plurielCPT   = 'mots clés';
	$singulierCPT = 'mot clé';

	$labels = array(
		'name'                => 'Mots clés',
		'singular_name'       => 'Mots clés',
		'menu_name'           => 'Mots clés',
		'all_items'           => 'Tous les ' . $plurielCPT,
		'view_item'           => 'Voir les ' . $plurielCPT,
		'add_new_item'        => 'Ajouter un ' . $singulierCPT,
		'add_new'             => 'Ajouter un ' . $singulierCPT,
		'edit_item'           => 'Modifier le ' . $singulierCPT,
		'update_item'         => 'Mettre à jour ' . $singulierCPT,
		'search_items'        => 'Rechercher un ' . $singulierCPT,
		'not_found'           => 'Non trouvé',
		'not_found_in_trash'  => 'Non trouvé dans la corbeille',
	);

	$args = array(
		'label'               => 'conseils',
		'description'         => '',
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-heart',
		'show_in_rest'        => true,
		'supports'            => array('title', 'editor', 'custom-fields', 'revisions'),
		'hierarchical'        => false,
		'menu_position'       => 20,
		'public'              => true,
		'has_archive'         => false,
	);
	register_post_type('motscles', $args );
}
add_action('init', 'awc_cpt_motscles' );

/**
 * -----------------------------------------------------------
 * 2. BLOCS REUTILISABLES
 * -----------------------------------------------------------
*/
function awc_cpt_blocs_reutilisables() {
  add_menu_page(
		'Blocs réutilisables',
		'Blocs GUT',
		'edit_posts',
		'edit.php?post_type=wp_block',
		'',
		'dashicons-editor-table',
		23
	);
}
add_action( 'admin_menu', 'awc_cpt_blocs_reutilisables' );
