<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="language" content="fr-FR">
	<meta name="author" content="Atelier Web Conception">
	<meta name="robots" content="index,follow">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header class="w-75 py-5 mx-auto">
		<?php
			wp_nav_menu( array(
				'menu_class'     => 'd-flex flex-row align-items-center gap-4',
				'theme_location' => 'primary'
			) );
		?>
	</header>
