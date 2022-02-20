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

  // Ajouter un fond de couleur sur le parent au hover sur l'enfant
  if ( $('#questions-faq').length > 0 ) {
    $( '#questions-faq article a' ).on( 'mouseover', function() {
      $( this ).parent().addClass( 'is-hover' );
    }).on( 'mouseout', function() {
      $( this ).parent().removeClass( 'is-hover' );
    })
  }

  // Init autoComplete
  if ( $('#autoComplete').length > 0 ) {
    $( '.nav.nav-tabs button' ).each(function(index) {
      $(this).on('click', function() {
        console.log($(this).data('key'));
      });
    });

    const autoCompleteJS = new autoComplete({
      data: {
        src: async () => {
          try {
            const source = await fetch('https://tarekraafat.github.io/autoComplete.js/demo/db/generic.json');
            const data = await source.json();

            document.getElementById('autoComplete').setAttribute('placeholder', autoCompleteJS.placeHolder);

            return data;
          } catch (error) {
            return error;
          }
        },
        keys: ['food', 'cities', 'animals'],
        cache: true,
        filter: (list) => {
          const filteredResults = Array.from(new Set(list.map((value) => value.match))).map((food) => {
            return list.find((value) => value.match === food);
          });

          return filteredResults;
        },
      },
      placeHolder: 'Ex : 3255556743467',
      resultsList: {
        noResults: true,
        maxResults: 15,
        tabSelect: true,
      },
      resultItem: {
        element: (item, data) => {
          item.style = "display: flex; justify-content: space-between;";
          item.innerHTML = `<span style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">${data.match}</span>
          <span style="display: flex; align-items: center; font-size: 13px; font-weight: 100; text-transform: uppercase; color: rgba(0,0,0,.2);">${data.key}</span>`;
        },
        highlight: false,
      },
    });

    autoCompleteJS.input.addEventListener("selection", function (event) {
      const feedback = event.detail;
      const selection = feedback.selection.value[feedback.selection.key];

      autoCompleteJS.input.value = selection;
    });
  }

}); // ----------->  FIN (document).ready(function($)
