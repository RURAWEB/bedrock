<?php
  $banner  = get_field('bg-section1');
  $titre1  = get_field('titre-section1');
  $notule1 = get_field('notule-section1');
?>

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
