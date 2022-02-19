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

}); // ----------->  FIN (document).ready(function($)
