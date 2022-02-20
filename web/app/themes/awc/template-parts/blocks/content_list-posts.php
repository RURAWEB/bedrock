<?php
  $titre  = get_field('titre-blockPosts');
?>

<div class="w-50 text-center mx-auto p-3">
  <?php if( $titre ) : ?>
    <h2><?php echo $titre; ?></h2>
  <?php endif; ?>
</div>

<div class="w-75 p-3">
</div>
