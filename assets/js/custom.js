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

  if( $('.footcol').length && $('#footer-copyright').length ) {
    var last_footer_col = $('.footcol .social-media');
    $('#footer-copyright').appendTo(last_footer_col);
  }


  var swiper = new Swiper(".swiper-events", {
    direction: "vertical",
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 8000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    on: {
      init: function () {
        // $('.events-section .swiper-pagination').prepend('<i class="arrow arrowUp"></i>');
        // $('.events-section .swiper-pagination').append('<i class="arrow arrowDown"></i>');
        // $('.arrow.arrowUp').click(function(){
        //   $('.swiper-button-prev').trigger('click');
        // });
        // $('.arrow.arrowDown').click(function(){
        //   $('.swiper-button-prev').trigger('click');
        // });
        $('.events-section .swiper-button-next, .events-section .swiper-button-prev').appendTo('.events-section .swiper-pagination');
      },
    }
  });

  swiper.on('slideChangeTransitionStart', function () {
    var eventType = $('.swiper-slide-active .event').attr('data-event-type');
    var eventColor = $('.swiper-slide-active .event').attr('data-color');
    if(eventType) {
      $('#circular-middle').show();
      $('#eventType').text(eventType);
      $('#eventType').attr('data-type',eventType);
      $('#circular-middle .bgcolor path').attr('style','fill:'+eventColor);
    } else {
      $('#circular-middle').hide();
    }
    
  });

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