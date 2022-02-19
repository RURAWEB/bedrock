<?php get_header(); ?>

<?php
	if (have_posts()) : while (have_posts()) : the_post();

	$banner  = get_field('bg-section1');
	$titre1  = get_field('titre-section1');
	$notule1 = get_field('notule-section1');

	$titre2  = get_field('titre-section2');
	$notule2 = get_field('notule-section2');
	$galerie = get_field('galerie-section2');
	$lien2   = get_field('lien-section2');

	$size    = 'full';
?>
	<main>
		<section id="aide-instructions" class="w-100">
			<?php if ($banner) : ?>
				<div id="banner" class="position-relative d-flex justify-content-center align-items-center w-100 h-100">
					<figure>
						<img class="position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100" src="<?php echo $banner['url']; ?>" alt="<?php echo $banner['alt']; ?>" />
					</figure>

					<div id="banner-inner" class="position-relative text-center w-50">
						<?php if ($titre1) : ?>
							<p class="hn w-75 text-white mx-auto"><?php echo $titre1; ?></p>
						<?php endif; ?>

						<?php if ($notule1) : ?>
							<p class="w-75 text-white mx-auto"><?php echo $notule1; ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</section>

		<section id="marques" class="w-75 py-5 mx-auto">
			<div class="text-center mx-auto">
				<?php if ($titre2) : ?>
					<h1 class="w-50 my-5 mx-auto"><?php echo $titre2; ?></h1>
				<?php endif; ?>

				<?php if ($notule2) : ?>
					<p class="w-75 mx-auto px-5"><?php echo $notule2; ?></p>
				<?php endif; ?>
			</div>

			<?php if ($galerie) : ?>
				<div id="slider" class="d-flex align-items-center gap-5">
					<?php foreach( $galerie as $gal ): ?>
						<div>
							<?php echo wp_get_attachment_image( $gal, $size ); ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="text-center mx-auto">
				<?php
					if ($lien2) :
				    $link_url    = $lien2['url'];
				    $link_title  = $lien2['title'];
				    $link_target = $lien2['target'] ? $lien2['target'] : '_self';
				?>
					<a class="button has-primaire-background-color text-white rounded-3 my-5 mx-auto px-4 py-2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>
		</section>

		<?php the_content(); ?>
	</main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
