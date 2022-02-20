<?php
  $titre2  = get_field('titre-section2');
  $notule2 = get_field('notule-section2');
  $lien2   = get_field('lien-section2');
?>

<section id="marques" class="w-75 py-5 mx-auto">
  <div class="text-center mx-auto">
    <?php if ($titre2) : ?>
      <h1 class="w-50 my-5 mx-auto"><?php echo $titre2; ?></h1>
    <?php endif; ?>

    <?php if ($notule2) : ?>
      <p class="w-75 mx-auto px-5"><?php echo $notule2; ?></p>
    <?php endif; ?>
  </div>

  <?php
    get_template_part('template-parts/content', 'galerie');
    //get_template_part('template-parts/content', 'liens');
  ?>

  <div class="text-center mx-auto">
    <?php
      if ($lien2) :
        $link_url    = $lien2['url'];
        $link_title  = $lien2['title'];
        $link_target = $lien2['target'] ? $lien2['target'] : '_self';
    ?>
      <a class="button border border-1 has-primaire-background-color text-white rounded-3 my-5 mx-auto px-4 py-2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
    <?php endif; ?>
  </div>
</section>
