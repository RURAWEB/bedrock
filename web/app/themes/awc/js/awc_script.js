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


}); // ----------->  FIN (document).ready(function($)
