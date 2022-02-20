<?php

/**
 * ============================================================
 *   1. ENREGISTRER LES BLOCS ........................... L.12
 *      A. CALL API ..................................... L.22
 *      B. LIST POSTS ................................... L.34
 *      C. RENDER BLOCKS ................................ L.50
 * ============================================================
*/

/**
 * -----------------------------------------------------------
 * 1. ENREGISTRER LES BLOCS
 * -----------------------------------------------------------
*/
if (function_exists( 'get_field' )) {

  function awc_acf_init_block() {
    if (function_exists( 'acf_register_block' )) {

      /** --- A. CALL API --- */

    	acf_register_block_type( array(
        'name'              => 'call-api',
        'title'             => __('Call API - Questions'),
        'render_callback'   => 'my_acf_block_render_callback',
        'category'          => 'atelier conception web',
        'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" width="29.7mm" height="17.21mm" viewBox="0 0 84.19 48.79"><path d="M85,16.06c-.23,6.93-.49,13.87-.66,20.8-.09,3.8,0,7.61,0,11.79H76.07l-.82-4.87c-10.81,6-21.35,6.81-31.15-1.31-6.52-5.4-8.85-12.28-7.66-21.15h7.64c.39,11,5.26,17.4,13.9,18.32,7.7.82,14.6-4.31,16.41-12.2,2-8.57-2.63-14.46-14.78-18.88V0L75.15,4.48l1.57-3.39H85Z" transform="translate(-0.81)"/><path d="M23.3,48.79c-11.74-.1-21-6.84-22-16.44-1-10.13-.23-20.43-.23-30.91H9V23.91c0,9.69,2.23,12.41,11.07,16.56C21.87,41.3,22.08,45.39,23.3,48.79Z" transform="translate(-0.81)"/></svg>',
        'keywords'          => array( 'questions', 'call api', 'api', 'atelier conception web' ),
        'mode'              => 'edit'
      ) );

      /** --- B. LIST POSTS --- */

  		acf_register_block_type( array(
        'name'              => 'list-posts',
        'title'             => __('Liste des posts WP'),
        'render_callback'   => 'my_acf_block_render_callback',
        'category'          => 'atelier conception web',
        'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" width="29.7mm" height="17.21mm" viewBox="0 0 84.19 48.79"><path d="M85,16.06c-.23,6.93-.49,13.87-.66,20.8-.09,3.8,0,7.61,0,11.79H76.07l-.82-4.87c-10.81,6-21.35,6.81-31.15-1.31-6.52-5.4-8.85-12.28-7.66-21.15h7.64c.39,11,5.26,17.4,13.9,18.32,7.7.82,14.6-4.31,16.41-12.2,2-8.57-2.63-14.46-14.78-18.88V0L75.15,4.48l1.57-3.39H85Z" transform="translate(-0.81)"/><path d="M23.3,48.79c-11.74-.1-21-6.84-22-16.44-1-10.13-.23-20.43-.23-30.91H9V23.91c0,9.69,2.23,12.41,11.07,16.56C21.87,41.3,22.08,45.39,23.3,48.79Z" transform="translate(-0.81)"/></svg>',
        'keywords'          => array( 'liste des posts', 'articles', 'atelier conception web' ),
        'mode'              => 'edit'
      ) );

    }
  }
  add_action( 'acf/init', 'awc_acf_init_block' );

  /** --- C. RENDER BLOCKS --- */

  function my_acf_block_render_callback( $block ) {
    $slug = str_replace( 'acf/', '', $block['name'] );
    if( file_exists(get_theme_file_path( "/template-parts/blocks/content_{$slug}.php" )) ) {
      include(get_theme_file_path( "/template-parts/blocks/content_{$slug}.php" ));
    }
  }

}
