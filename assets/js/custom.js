/**
 *	Custom jQuery Scripts
 *	Date Modified: 06.01.2022
 *	Developed by: Lisa DeBona
 */
jQuery(document).ready(function ($) {  

  // $('.grid').masonry({
  //   itemSelector: '.grid-item',
  //   columnWidth: '.grid-sizer',
  //   percentPosition: true
  // });

  move_footer_copyright();
  $(window).on('orientationchange resize',function(){
    move_footer_copyright();
  });
  
  function move_footer_copyright() {
    if( $(window).width() > 1024 ) {
      if( $('.footcol').length && $('#footer-copyright').length ) {
        var last_footer_col = $('.footcol .social-media');
        $('#footer-copyright').appendTo(last_footer_col);
      }
    } else {
      $('#footer-copyright').appendTo('#copyright-mobile');
    }
  }


  setTimeout(function(){
    startCountDown(3000);
  },1000);

  //startCountDown(3000);
  function startCountDown(duration) {
    $('.count').each(function () {
      $(this).prop('Counter',0).animate({
          Counter: $(this).text()
      }, {
          duration: duration,
          easing: 'swing',
          step: function (now) {
              $(this).text(Math.ceil(now).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
          }
      });
    });
  }

  

}); 