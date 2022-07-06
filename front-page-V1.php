<?php get_header(); ?>

  <div class="o-scroll" id="js-scroll" data-scroll-container>
    <div id="hero" data-scroll-section>
        <div class="page-content">

            <header id="masthead" class="site-header" role="banner">
              <div class="wrapper wide">
                <?php if( get_custom_logo() ) { ?>
                  <span id="site-logo" class="animated fadeInDown">
                    <?php the_custom_logo(); ?>
                  </span>
                <?php } else { ?>
                  <a href="<?php echo get_site_url() ?>" id="site-logo" class="animated fadeInDown">
                   <img src="<?php echo IMAGES_URL ?>/logo.png" alt="<?php echo get_bloginfo('name') ?>">
                 </a>
                <?php } ?>
              </div>  
            </header>

            
            <?php include( locate_template('parts/hero.php') ); ?>

        </div>
    </div>

    <?php 
      $homeTabs = get_field('home_tabs'); 
      $homeGallery = get_field('home_gallery'); 
      $gallery_text = get_field('gallery_text'); 
    ?>
    <?php if ($homeTabs) { ?>
    <div id="tabs-top">
      <?php include( locate_template('parts/home-tabs.php') ); ?>
    </div>
    <?php } ?>
    

    <section id="homerow1" class="section c-section -fixed" data-scroll-section data-persistent>
        <?php if ($homeTabs) { ?>
          <div class="hometabs-container">
            <?php include( locate_template('parts/home-tabs.php') ); ?>
          </div>
        <?php } ?>
        <div class="full-width blue-section" id="fixed-elements">
          <div class="wrapper wide">
            <div class="flexcol">
                <?php if ($gallery_text) { ?>
                <div class="col-left">
                    <div class="c-section_infos" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
                        <div class="c-section_infos_inner" data-scroll data-scroll-offset="200">
                            <div class="c-sections_infos_text">
                              <div class="text"> 
                                <?php echo $gallery_text ?>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if ($homeGallery) { ?>
                <div class="col-right">
                  <?php include( locate_template('parts/home-gallery.php') ); ?>
                </div>
                <?php } ?>
            </div>
          </div>
        </div>
    </section>


    <?php /* EVENTS */ 
    $event_title = get_field('event_column_left_title');
    ?>
    <?php if ($event_title) { ?>
      <h2 id="events-title" class="rotated-title"><?php echo $event_title ?></h2>
    <?php } ?>
    <div class="section-outer-wrap section-same-title">
      <?php include( locate_template('parts/home-featured-events.php') ); ?>
      <?php include( locate_template('parts/home-upcoming-events.php') ); ?>
    </div>
      

    <?php include( locate_template('parts/home-plan-visit.php') ); ?>  


    <?php include( locate_template('parts/footer_content.php') ); ?>  
    

  </div>

  <script>
    jQuery(document).ready(function($){

      var swiper = new Swiper(".swiper-events", {
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
        breakpoints: { 
          320: {        
            direction: "horizontal",
          },  
          640: {        
            direction: "horizontal",
          },
          1025: {        
            direction: "vertical",
          }   
        },
        on: {
          init: function () {
            $('.events-section .swiper-button-next, .events-section .swiper-button-prev').appendTo('.events-section .swiper-pagination');
          },
        }
      });


      if( $(window).width <= 1024 ) {

      }



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


        carousel_wrap_resizer();
        $(window).on('orientationchange resize',function(){
          carousel_wrap_resizer();
        });
        function carousel_wrap_resizer() {
          if( $('.wrap-resizer').length ) {
            var screenWidth = $(window).width();
            var resizerWidth = $('.wrap-resizer').width();
            var leftWidth = (screenWidth - resizerWidth) / 2;
            //$('#upcoming_events_carousel').css('transform','translateX('+leftWidth+'px)');
            $('#upcoming_events_carousel').css('left',leftWidth+'px');
          }
        }

      //INIT
      var show_at_most = $('#upcoming_events_carousel').attr('data-total');
      let loop_option = (show_at_most>3) ? true : false;

      // var owl = $('#upcoming_events_carousel.owl-carousel').owlCarousel({
      //           center:false,
      //           loop:loop_option,
      //           margin:10,
      //           nav:true,
      //           responsive:{
      //               0:{
      //                   items:1
      //               },
      //               600:{
      //                   items:3
      //               },
      //               1000:{
      //                   items:4
      //               }
      //           }
      //         });


        var owl = $('#upcoming_events_carousel.owl-carousel').owlCarousel({
          center:false,
          loop:loop_option,
          margin:30,
          nav:true,
          responsive:{
            0:{
              items:1
            },
            600:{
              items:3
            },
            1000:{
              items:4
            }
          }
        });

      $( '.owl-filter-bar' ).on( 'click', '.item', function() {
        $('#upcoming_events_carousel').addClass('filtered');
        var $item = $(this);  
        var filter = $item.data( 'owl-filter' );
        owl.owlcarousel2_filter( filter );
        owl.owlCarousel('destroy');
        var count = $(filter).length;
        let loopStat = (count>2) ? true : false;
        //let numItems = (count>4) ? 5 : 4;

        if(filter=="*") {
          owl.owlCarousel({
            loop:true,
            margin:20,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
          });
        } else {
          owl.owlCarousel({
            loop:loopStat,
            margin:20,
            nav:true,
            responsive:{
              0:{
                  items:1
              },
              600:{
                  items:2
              },
              1000:{
                  items:4
              }
            }
          });
        }
        
      });


      $('select#filterEventType').on('change',function(){
        $('#filterByDate').val('*');
        $('#upcoming_events_carousel').addClass('filtered');
        var selectedType = $(this).val();
        if(selectedType=='*') {
          $('#term-all').trigger('click');
        } else {
          var filterByType = '.term-'+selectedType;
          owl.owlcarousel2_filter( filterByType );
          owl.owlCarousel('destroy');
          var count = $(filterByType).length;
          let loopStat = (count>3) ? true : false;
          owl.owlCarousel({
            loop:loopStat,
            margin:20,
            nav:true,
            responsive:{
              0:{
                  items:1
              },
              600:{
                  items:2
              },
              1000:{
                  items:4
              }
            }
          });
        }
      });
        

      $('select#filterByDate').on('change',function(){
        $('#upcoming_events_carousel').addClass('filtered');
        var selectedDate = $(this).val();
        $('#filterEventType').val('*');
        if(selectedDate=='*') {
          $('#term-all').trigger('click');
        } else {
          var filterByDate = '.event[data-start="'+selectedDate+'"]';
          owl.owlcarousel2_filter( filterByDate );
          owl.owlCarousel('destroy');
          var count = $(filterByDate).length;
          let loopStat = (count>3) ? true : false;
          owl.owlCarousel({
            loop:loopStat,
            margin:20,
            nav:true,
            responsive:{
              0:{
                  items:1
              },
              600:{
                  items:2
              },
              1000:{
                  items:4
              }
            }
          });
        }
      });

      $(document).on('click','.customCaroNav',function(e){
        e.preventDefault();
        var carouselNav = $(this).attr('data-rel');
        $(carouselNav).trigger('click');
      });
      
    });
  </script>
<?php
get_footer();
