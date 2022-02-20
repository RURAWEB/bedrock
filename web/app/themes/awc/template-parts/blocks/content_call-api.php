<?php
  $titre  = get_field('titre-blockAPI');
  $notule = get_field('notule-blockAPI');
  $lien   = get_field('lien-blockAPI');
?>

<div class="redactionnel w-50 text-center mx-auto p-3">
  <?php if( $titre ) : ?>
    <h2 class="text-white"><?php echo $titre; ?></h2>
  <?php endif; ?>

  <?php if( $notule ) : ?>
    <p class="text-white"><?php echo $notule; ?></p>
  <?php endif; ?>
</div>

<div class="w-75 mx-auto p-3">
  <?php
    $urlAPI = 'https://jsonplaceholder.typicode.com/albums';
    $response = wp_remote_get(
      $urlAPI,
      $args = array()
    );

    $responseBody = wp_remote_retrieve_body( $response );
    $results = json_decode( $responseBody );

    if ( is_array( $results ) && ! is_wp_error( $results ) ) {
      $length = 0;
      foreach ( $results as $result ) {
        echo '<article class="mb-3">';
          echo '<div class="d-flex flex-row align-items-center justify-content-between bg-white rounded-3 p-3">';
            echo '<p class="user-'. $result->id .'">';
              echo $result->title;
            echo '</p>';

            echo '<a class="has-primaire-background-color text-white rounded-3 px-4 py-2" href="#">'. __('Lire', 'awc') .'</a>';
          echo '</div>';
        echo '</article>';

        if ( $length < 3 ) {
          $length++;
        } else {
          break;
        }
      }

    } else {
      echo '<article class="class="rounded-3 p-4 mb-3 bg-white">';
        echo '<p class="text-center">'. __('Non disponible', 'awc') .'</p>';
      echo '</article>';
    }
  ?>
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
