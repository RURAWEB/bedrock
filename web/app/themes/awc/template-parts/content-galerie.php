<?php
  $galerie = get_field('galerie');
  $size    = 'full';

  if ($galerie) :
?>
  <div id="slider" class="d-flex align-items-center gap-5">
    <?php foreach( $galerie as $gal ): ?>
      <div>
        <?php echo wp_get_attachment_image( $gal, $size ); ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
