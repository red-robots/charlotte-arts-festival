<?php get_header(); ?>

  <div class="o-scroll" id="js-scroll" data-scroll-container>
    <div id="hero" data-scroll-section>
        <div class="page-content">

            <header id="masthead" class="site-header" role="banner">
              <div class="wrapper wide">
                 <a href="<?php echo get_site_url() ?>" id="site-logo" class="animated fadeInDown">
                   <img src="<?php echo IMAGES_URL ?>/logo.png" alt="<?php echo get_bloginfo('name') ?>">
                 </a>
              </div>  
            </header>

            <section id="home-hero">
              <div class="video-container">
                <video id="video" autoplay muted loop id>
                  <source src="<?php echo ASSETS_URL; ?>/images/demo/home-video.mp4" type="video/mp4">
                  <source src="<?php echo ASSETS_URL; ?>/images/demo/home-video.ogg" type="video/ogg">
                  <p>Your browser doesn't support HTML5 video. <a href="<?php echo $video; ?>">Download</a> the video instead.
                  </p>
                </video>
              </div>

              <div id="home-banner" class="home-banner">
                <div class="banner-text">
                  <div class="inner">
                    <div class="t1">CHARLOTTE INTERNATIONAL</div>
                    <div class="t2"><span class="animate-bottom-top-up" style="animation-delay:.4s">ARTS</span> <span class="animate-bottom-top-up" style="animation-delay:.9s">FESTIVAL</span></div>
                    <div class="t3" style="animation-delay:.4s">9.16 - 10.2 2022</div>
                  </div>
                </div>
                <div id="countdown" class="animated fadeIn" style="animation-delay:1s">
                  <div id="vline"><span></span></div>
                  <div class="timer">
                    <div class="counttype month">
                      <div class="text">MONTHS</div>
                      <div class="count">5</div>
                    </div>

                    <div class="counttype days">
                      <div class="text">DAYS</div>
                      <div class="count">145</div>
                    </div>

                    <div class="counttype hours">
                      <div class="text">HOURS</div>
                      <div class="count">3430</div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
        </div>
    </div>

    <div id="tabs-top">
      <?php get_template_part('parts/home-tabs');  ?>
    </div>

    <section id="homerow1" class="c-section -fixed" data-scroll-section data-persistent>
        <div class="hometabs-container">
          <?php get_template_part('parts/home-tabs');  ?>
        </div>
        <div class="full-width blue-section" id="fixed-elements">
          <div class="wrapper wide">
            <div class="flexcol">
                <div class="col-left">
                    <div class="c-section_infos" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
                        <div class="c-section_infos_inner" data-scroll data-scroll-offset="200">
                            <div class="c-sections_infos_text">
                              <div class="text"> 
                                <p>The Charlotte International Arts Festival will span the entirety of Uptown and feature spectacular live performances, conversations with thought leaders, immersive art installations, and an abundance of inspired creations.</p>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-right">
                  <div class="images grid grid-no-js" id="imagecol">
                    <div class="grid-sizer"></div>
                    <div class="grid-item img1 right has-squiggy">
                      <figure class="fig1" data-scroll data-scroll-speed="3" data-scroll-repeat data-scroll-target="#imagecol">
                        <?php /* SQUIGGY1 */ include( locate_template('squiggy/1/action.php') ); ?>
                        <img src="<?php echo IMAGES_URL ?>/demo/1.jpg" alt="" style="transition-delay: 0.2s;">
                      </figure>
                    </div>
                    <div class="grid-item img2 left has-squiggy-next next">
                      <figure class="fig2" data-scroll data-scroll-speed="3" data-scroll-repeat data-scroll-target="#imagecol">
                        <img src="<?php echo IMAGES_URL ?>/demo/2.jpg" alt="" style="transition-delay: 0.3s;">
                      </figure>
                    </div>
                    <div class="grid-item img3 right next">
                      <figure class="fig3" data-scroll data-scroll-speed="3" data-scroll-repeat data-scroll-target="#imagecol">
                        <img src="<?php echo IMAGES_URL ?>/demo/3.jpg" alt="" style="transition-delay: 0.4s;">
                      </figure>
                    </div>
                    <div class="grid-item img4 middle next">
                      <figure class="fig4" data-scroll data-scroll-speed="3" data-scroll-repeat data-scroll-target="#imagecol">
                        <img src="<?php echo IMAGES_URL ?>/demo/4.jpg" alt="" style="transition-delay: 0.5s;">
                      </figure>
                    </div>
                    <div class="grid-item img5 has-text has-squiggy">
                      <figure class="fig5" data-scroll data-scroll-speed="3" data-scroll-repeat data-scroll-target="#imagecol">
                        <?php /* SQUIGGY2 */ include( locate_template('squiggy/2/action.php') ); ?>
                        <img src="<?php echo IMAGES_URL ?>/demo/7.jpg" alt="">
                      </figure>
                    </div>
                    <div class="grid-item img6 left has-squiggy-next next">
                      <figure class="fig6" data-scroll data-scroll-speed="3" data-scroll-repeat data-scroll-target="#imagecol">
                        <img src="<?php echo IMAGES_URL ?>/demo/6.jpg" alt="">
                      </figure>
                    </div>
                    <div class="grid-item img7 right next">
                      <figure class="fig3" data-scroll data-scroll-speed="3" data-scroll-target="#imagecol">
                        <img src="<?php echo IMAGES_URL ?>/demo/5.jpg" alt="">
                      </figure>
                    </div>
                    <div class="grid-item img8 next before-last">
                      <figure class="fig5" data-scroll data-scroll-speed="3" data-scroll-repeat data-scroll-target="#imagecol">
                        <img src="<?php echo IMAGES_URL ?>/demo/8.jpg" alt="">
                      </figure>
                    </div>
                    <div class="grid-item img9 next last">
                      <figure class="fig5" data-scroll data-scroll-speed="3.7" data-scroll-repeat data-scroll-target="#imagecol">
                        <img src="<?php echo IMAGES_URL ?>/demo/9.jpg" alt="">
                      </figure>
                    </div>
                    <div class="grid-item grid-item--width2"></div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </section>

    <section id="homerow2" class="c-section -fixed events-section" data-scroll-section data-persistent>
    </section>

  </div>


<?php
get_footer();
