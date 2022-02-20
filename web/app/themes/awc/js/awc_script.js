$(document).ready(function($) {

  // Tiny Slider
  if ( $('#slider').length > 0 ) {
    const slider = tns({
      container: '#slider',
      items: 6,
      controls: false,
      center: true,
      nav: false,
      arrowKeys: true,
      mouseDrag: true,
      autoplay: true,
      autoplayButtonOutput: false,
      speed: 400
    });
  }

  // Réduction du header au scroll
  $(window).scroll(function () {
    if ($(this).scrollTop() > 150) {
      $( 'header' ).addClass( 'header-reduit' );
      $( 'header' ).removeClass( 'py-5' );
      $( 'header' ).addClass( 'py-4' );
      $( 'header' ).addClass( 'bg-white' );
    } else {
      $( 'header' ).removeClass( 'header-reduit' );
      $( 'header' ).removeClass( 'py-4' );
      $( 'header' ).addClass( 'py-5' );
      $( 'header' ).removeClass( 'bg-white' );
    }
  });

  // Transformer h1 en h3 selon la page
  if ( $('.home #mots-cles').length > 0 ) {
    $( '.home #mots-cles article h1' ).each(function(index, elt) {
      let textH1 = $( this ).text();
      $( elt ).replaceWith('<h3 class="text-white">' + textH1 + '</h3>');
    });
  }

}); // ----------->  FIN (document).ready(function($)
