<?php
  $titre  = get_field('titre-blockAPI');
  $notule = get_field('notule-blockAPI');
  $lien   = get_field('lien-blockAPI');
?>

<div class="w-50 text-center mx-auto p-3">
  <?php if( $titre ) : ?>
    <h2 class="text-white"><?php echo $titre; ?></h2>
  <?php endif; ?>

  <?php if( $notule ) : ?>
    <p class="text-white"><?php echo $notule; ?></p>
  <?php endif; ?>
</div>

<div class="w-75 p-3">
</div>

<?php //get_template_part('../content', 'liens'); ?>

<div class="text-center mx-auto">
  <?php
    if ($lien) :
      $link_url    = $lien['url'];
      $link_title  = $lien['title'];
      $link_target = $lien['target'] ? $lien['target'] : '_self';
  ?>
    <a class="button has-primaire-background-color text-white rounded-3 my-5 mx-auto px-4 py-2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
  <?php endif; ?>
</div>
