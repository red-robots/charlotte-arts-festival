jQuery(document).ready(function ($) {  

    /* circular text */
    if( $('#circular') ) {
      new CircleType(document.getElementById('circular'));
    }

    document.documentElement.classList.add('is-loaded');
    document.documentElement.classList.remove('is-loading');

    setTimeout(() => {
        document.documentElement.classList.add('is-ready');
    },300)

    let options = {
        el: document.querySelector('#js-scroll'),
        smooth: true,
        getSpeed: true,
        getDirection: true,
        repeat: true
    }

    const scroll = new LocomotiveScroll(options);

    var stickyElem = document.querySelector('#hometabs');
    var currStickyPos = stickyElem.getBoundingClientRect().top + window.pageYOffset;

    scroll.on('scroll', func => {
      var homerow1_top = $('#homerow1').offset().top;
      //var banner_height = $('.banner-text').height();
      var window_top = $(window).scrollTop() - 0;
      if (window_top > homerow1_top) {
        $('#tabs-top').show();
      } else {
        $('#tabs-top').hide();
      }

      homerow1_width();

      var fixeElHeight = $('#imagecol').height() - 200;

      $('#fixed-elements').css('height', fixeElHeight + 'px' );

      $('.grid-item figure').each(function(){
        if ($(this).isInViewport()) {
          $(this).addClass('viewing');
        } else {
          $(this).removeClass('viewing');
        }
      });

      $('.section').each(function(){
        if ($(this).isInViewport()) {
          $(this).addClass('viewing');
          // if( $(this).hasClass('upcoming-events-section') ) {
          //   $('#events-title').appendTo('.upcoming-events-section');
          // } else {
          //   $('#events-title').appendTo('.featured-events-section');
          // }

          // if( $(this).hasClass('featured-events-section') ) {
          //   $('#events-title').removeClass('hidden');
          // } else {
          //   $('#events-title').addClass('hidden');
          // }
        } else {
          $(this).removeClass('viewing');
          // if( $('.featured-events-section #events-title').length==0 ) {
          //   $('#events-title').appendTo('.featured-events-section');
          // }
        }
      });

      /* Viewing Squiggy */
      $('.squiggy').each(function(){
        if ($(this).isInViewport()) {
          $(this).addClass('viewing');
        } else {
          $(this).removeClass('viewing');
        }
      });

      if( $('.featured-events').isInViewport() ) {
        $('.featured-events').addClass('viewing');
        //$('#events-title').addClass('sticky');
      } else {
        $('.featured-events').removeClass('viewing');
        //$('#events-title').removeClass('sticky');
      }

      if( $('.featured-events').isInViewport() || $('.upcoming-events-section').isInViewport() ) {
        $('#events-title').addClass('animated fadeIn sticky');
      } else {
        $('#events-title').removeClass('animated fadeIn sticky');
      }


      /* Viewing Circular Text */
      if( $('.circular-text').isInViewport() ) {
        $('.circular-text').addClass('viewing');
        $('#events-title-mobile').addClass('move-down');
      } else {
        $('.circular-text').removeClass('viewing');
        $('#events-title-mobile').removeClass('move-down');
      }

      // if( $('#upcoming-events').isInViewport() ) {
      //   $('#events-title-mobile').addClass('move-down');
      // } else {
      //   $('#events-title-mobile').removeClass('move-down');
      // }

    });

    loop_squiggy2();
    function loop_squiggy2() {
      var count_squiggy2 = $('.squiggy2 span').length;
      var total = parseInt(count_squiggy2) + 1;
      var INTERVAL = 1;
      //var delay = INTERVAL * 50;
      var counter = parseInt( 1, 10 );
      setInterval( function() {
        var ctr = counter++;
        if(ctr==total) {
          counter = 1;
        }
        var i=1;
        $('.squiggy2 span').each(function(){
          if(i==ctr) {
            $(this).addClass('active');
          } else {
            $(this).removeClass('active');
          }
          i++;
        });
      }, 80 );

    }


    function homerow1_width() {
      var hrow1_width = $('#homerow1 .c-sections_infos_text').width();
      $('#homerow1 .c-sections_infos_text .text').css('width',hrow1_width+'px');
    }

    $.fn.isInViewport = function() {
      var elementTop = $(this).offset().top;
      var elementBottom = elementTop + $(this).outerHeight();
      var viewportTop = $(window).scrollTop();
      var viewportBottom = viewportTop + $(window).height();
      return elementBottom > viewportTop && elementTop < viewportBottom;
    };

    if( $('#homerow1 .has-squiggy').length ) {
      $('#homerow1 .has-squiggy').next().addClass('next');
    }

}); 





