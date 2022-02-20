<?php
  $titre  = get_field('titre-blockPosts');
?>

<section id="qualite" class="w-50 text-center mx-auto p-3">
  <?php if( $titre ) : ?>
    <h2><?php echo $titre; ?></h2>
  <?php endif; ?>
</section>

<?php
  $args = array(
    'post_type'    => 'motscles',
    'showposts'    => 4,
  );

  $motscles = new WP_Query( $args );
  if( $motscles->have_posts() ) :
?>
  <section id="mots-cles" class="w-100 d-flex flex-wrap align-items-center justify-content-between gap-4 mt-4">
    <?php
      while( $motscles->have_posts() ) : $motscles->the_post();
        the_content();
      endwhile; wp_reset_postdata();
    ?>
  </section>
<?php endif; ?>

</div>
