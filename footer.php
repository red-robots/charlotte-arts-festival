

  <footer id="colophon" class="site-footer" role="contentinfo">
    
	</footer><!-- #colophon -->
	
<?php wp_footer(); ?>

<!-- <script src="http://remysharp.com/downloads/jquery.inview.js"></script> -->
<script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.6.0/polyfill.min.js" crossorigin="anonymous"></script>
<script nomodule src="https://polyfill.io/v3/polyfill.min.js?features=Object.assign%2CElement.prototype.append%2CNodeList.prototype.forEach%2CCustomEvent%2Csmoothscroll" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.4/dist/locomotive-scroll.min.js"></script>
<script>
    (function () {
      
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
          /* squiggy lines */
          // $('.viewing .squiggy1 span').each(function(k){
          //   var i = k+1;
          //   var duration = 80 * i;
          //   var target = $(this);
          //   setTimeout(function(){
          //     target.show();
          //   },duration);
          // });

        } else {
          $(this).removeClass('viewing');
        }
      });

    });
          
    })();


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
</script>

</body>
</html>
