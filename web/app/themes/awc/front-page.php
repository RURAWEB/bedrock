<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<main>
		<?php
			get_template_part('template-parts/content', 'aideInstructions');
			get_template_part('template-parts/content', 'marques');

			the_content();
		?>
	</main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
