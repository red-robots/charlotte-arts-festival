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

      $('#fixed-elements').css('height', $('#imagecol').height() + 'px' );

      // if ($('#fixed-elements').isInViewport()) {
      //   $('#fixed-elements').addClass('viewing');
      // } else {
      //   $('#fixed-elements').removeClass('viewing');
      // }

      

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
        } else {
          $(this).removeClass('viewing');
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
        $('#events-title').addClass('sticky');
      } else {
        $('.featured-events').removeClass('viewing');
        $('#events-title').removeClass('sticky');
      }

      /* Viewing Circular Text */
      if( $('.circular-text').isInViewport() ) {
        $('.circular-text').addClass('viewing');
      } else {
        $('.circular-text').removeClass('viewing');
      }

    });


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

    // jQuery(document).ready(function($){
    //   var div_top = $('#home-banner').offset().top;
    //   $(window).scroll(function() {
    //       var window_top = $(window).scrollTop() - 0;
    //       if (window_top > div_top) {
    //           if (!$('#hometabs').is('.sticky')) {
    //               $('#hometabs').addClass('sticky');
    //           }
    //       } else {
    //           $('#hometabs').removeClass('sticky');
    //       }
    //   });
    // })
}); 