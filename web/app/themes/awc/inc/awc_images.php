<?php

/**
 * ============================================================
 *   1. GESTION DES IMAGES .............................. L.11
 *   2. SUPPRESSION DES ACCENTS DES IMAGES UPLOADÉES .... L.23
 *   3. GESTION DES SRCSET .............................. L.30
 * ============================================================
*/

/**
 * -----------------------------------------------------------
 * 1. GESTION DES IMAGES
 * -----------------------------------------------------------
*/
function awc_autorisation_import( $mime_types ) {
	$mime_types['svg'] = 'image/svg+xml';

	return $mime_types;
}
add_filter( 'upload_mimes', 'awc_autorisation_import', 1, 1 );

/**
 * -----------------------------------------------------------
 * 2. SUPPRESSION DES ACCENTS DES IMAGES UPLOADÉES
 * -----------------------------------------------------------
*/
add_filter( 'sanitize_file_name', 'remove_accents' );

/**
 * -----------------------------------------------------------
 * 3. GESTION DES SRCSET
 * -----------------------------------------------------------
*/
