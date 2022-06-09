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