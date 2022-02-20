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

        <div id="banner-inner--search" class="bg-white text-center rounded-3 mt-5 py-5">
          <nav class="w-75 mx-auto mb-4">
            <div class="nav nav-tabs d-flex justify-content-between align-items-center border-0" id="nav-tab" role="tablist">
              <button class="nav-link border-0 rounded-0 fw-bold m-0 p-0" id="nav-codebarreEtiquette-tab" data-bs-toggle="tab" data-bs-target="#nav-codebarreEtiquette" type="button" role="tab" aria-controls="nav-codebarreEtiquette" aria-selected="false" data-key="cities">
  <?php _e('Code barre sur l\'étiquette', 'awc'); ?></button>
              <button class="nav-link border-0 rounded-0 fw-bold m-0 p-0 active" id="nav-modele-tab" data-bs-toggle="tab" data-bs-target="#nav-modele" type="button" role="tab" aria-controls="nav-modele" aria-selected="true" data-key="food"><?php _e('Modèle de cartouche', 'awc'); ?></button>
              <button class="nav-link border-0 rounded-0 fw-bold m-0 p-0" id="nav-codebarreBoite-tab" data-bs-toggle="tab" data-bs-target="#nav-codebarreBoite" type="button" role="tab" aria-controls="nav-codebarreBoite" aria-selected="false" data-key="animals"><?php _e('Code barre sur la boîte', 'awc'); ?></button>
            </div>
          </nav>

          <div class="tab-content w-75 mx-auto" id="nav-tabContent">
            <div class="tab-pane fade" id="nav-codebarreEtiquette" role="tabpanel" aria-labelledby="nav-codebarreEtiquette-tab">
              <span class="position-relative d-block mb-4"><?php _e('Entrez le numéro complet présent sous le code barre de l\'étiquette cartouche', 'awc'); ?></span>
            </div>

            <div class="tab-pane fade show active" id="nav-modele" role="tabpanel" aria-labelledby="nav-modele-tab">
              <span class="position-relative d-block mb-4"><?php _e('Entrez le modèle de votre cartouche', 'awc'); ?></span>
            </div>

            <div class="tab-pane fade" id="nav-codebarreBoite" role="tabpanel" aria-labelledby="nav-codebarreBoite-tab">
              <span class="position-relative d-block mb-4"><?php _e('Entrez le numéro complet présent sous le code barre de la boîte', 'awc'); ?></span>
            </div>

            <input id="autoComplete" class="rounded-3 border-0 p-4" type="search" tabindex="1">
            <button class="position-absolute has-primaire-background-color text-white border-0 rounded-3">Rechercher</button>
            <div class="selection"></div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>
