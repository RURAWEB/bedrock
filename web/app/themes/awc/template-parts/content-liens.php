<?php
  $lien   = get_field('lien');
?>

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
