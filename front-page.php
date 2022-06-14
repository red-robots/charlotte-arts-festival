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

            <?php  
            $heroText = get_field('home_hero_text');
            $heroVideo = get_field('hero_video');
            $heroDate = get_field('hero_event_date');
            $hd = ($heroDate) ? date_intervals_info($heroDate) : '';
            $ctr_Month = (isset($hd['months']) && $hd['months']) ? $hd['months'] : '0';
            $ctr_Days = (isset($hd['days']) && $hd['days']) ? $hd['days'] : '0';
            $ctr_Hours = (isset($hd['hours']) && $hd['hours']) ? $hd['hours'] : '0';

            if($heroVideo || $heroText) { ?>
            <section id="home-hero">
              <?php if ( isset($heroVideo['mp4']) || isset($heroVideo['ogg']) ) { ?>
              <div class="video-container">
                <video id="video" autoplay muted loop id>
                  <?php if ( isset($heroVideo['mp4']) && ($heroVideo['mp4']) ) { ?>
                    <source src="<?php echo $heroVideo['mp4'] ?>" type="video/mp4">
                  <?php } ?>
                  <?php if ( isset($heroVideo['ogg']) && ($heroVideo['ogg']) ) { ?>
                    <source src="<?php echo $heroVideo['ogg'] ?>" type="video/ogg">
                  <?php } ?>
                  <p>Your browser doesn't support HTML5 video. <a href="<?php echo $video; ?>">Download</a> the video instead.</p>
                </video>
              </div>
              <?php } ?>
              

              <div id="home-banner" class="home-banner">

                <?php if ( isset($heroText['top']) || isset($heroText['middle']) ||  isset($heroText['bottom']) ) { ?>
                <div class="banner-text">
                  <div class="inner">
                    <?php if ( (isset($heroText['top'])) && $heroText['top']) { ?>
                    <div class="t1"><?php echo $heroText['top'] ?></div>
                    <?php } ?>
                    <?php if ( (isset($heroText['middle'])) && $heroText['middle']) { ?>
                    <div class="t2"><?php echo $heroText['middle'] ?></div>
                    <?php } ?>
                    <?php if ( (isset($heroText['bottom'])) && $heroText['bottom']) { ?>
                    <div class="t3" style="animation-delay:.6s"><?php echo $heroText['bottom'] ?></div>
                    <?php } ?>
                  </div>
                </div>
                <?php } ?>

                <?php if ($heroDate) { ?>
                <div id="countdown" class="animated fadeIn" style="animation-delay:1s">
                  <div id="vline"><span></span></div>
                  <div class="timer">
                    <div class="counttype month">
                      <div class="text">MONTHS</div>
                      <div class="count"><?php echo $ctr_Month ?></div>
                    </div>

                    <div class="counttype days">
                      <div class="text">DAYS</div>
                      <div class="count"><?php echo $ctr_Days ?></div>
                    </div>

                    <div class="counttype hours">
                      <div class="text">HOURS</div>
                      <div class="count"><?php echo $ctr_Hours ?></div>
                    </div>
                  </div>
                </div>
                <?php } ?>

              </div>

            </section>
            <?php } ?>
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
    $event_column_left_image = get_field('event_column_left_image');
    $event_bg_img = ($event_column_left_image) ? ' style="background-image:url('.$event_column_left_image['url'].')"' : '';
    $event_circular_text = get_field('event_circular_text');
    $featuredEvents = tribe_get_events( [
       'start_date'     => 'now',
       'posts_per_page' => 10,
       'featured'       => true,
    ] );
    ?>

    <section id="events-section" class="section c-section -fixed events-section" data-scroll-section data-persistent>
      <?php if ($event_title) { ?>
        <h2 id="events-title" class="rotated-title"><?php echo $event_title ?></h2>
      <?php } ?>
      <div class="section-content">
        <div class="flex-wrap">
          <div class="flexcol fleft"<?php echo $event_bg_img ?>></div>
          <div class="flexcol fright">

            <div class="circular-text">
              <span id="circular"><?php echo $event_circular_text ?></span>
              <span id="circular-middle">
                <span id="eventType" data-type="">T</span>
                <span class="bgcolor"><?php include( locate_template('assets/images/category.svg') ); ?></span>
              </span>
            </div>

            <div class="featured-events">
              
              <?php if ($featuredEvents) { ?>
              <div class="swiper swiper-events">
                <div class="swiper-wrapper">

                  
                  <?php foreach ($featuredEvents as $ev) { 
                    $event_id = $ev->ID;
                    $pagelink = get_permalink($event_id);
                    $excerpt = ($ev->post_content) ? shortenText(strip_tags($ev->post_content),120,' ',"...") : ''; 
                    $terms = wp_get_post_terms( $event_id, Tribe__Events__Main::TAXONOMY );
                    $term = (isset($terms[0]) && $terms[0]) ? $terms[0] : '';
                    $categoryName = (isset($term->name) && $term->name) ? $term->name : '';
                    $firstCharacter = ($categoryName) ? strtoupper(substr($categoryName, 0, 1)) : '';
                    $color = get_field('category_color', $term);
                    $catColor = ($color) ? $color:'#CCC';
                    ?>
                    <div class="swiper-slide">
                      <div class="event" data-event-type="<?php echo $firstCharacter ?>" data-color="<?php echo $catColor ?>">
                        <h2 class="title"><?php echo $ev->post_title ?></h2>
                        <?php if ( $categoryName ) { ?>
                          <div class="tag"><span style="color:<?php echo $catColor ?>"><?php echo $categoryName ?></span></div>
                        <?php } ?>
                        <div class="info">
                          <div class="date">Sep 23 – Oct 1 | 3pm – 9pm</div>
                          <div class="loc">Location Name Here</div>
                        </div>

                        <div class="summary"> 
                          <p><?php echo $excerpt ?></p>
                        </div>

                        <div class="cta-button">
                          <a href="<?php echo $pagelink ?>" class="button"><span>More Info</span></a>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  

                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
              </div>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="upcoming-events" class="section upcoming-events-section blue-bg" data-scroll-section data-persistent>
      <div class="wrapper" data-scroll data-scroll-speed="3.7">
        <h2 class="section-title">Explore upcoming events</h2>
        <div class="filter-action">
          <div class="filter-wrap">
            <div class="filter-col fc-left">
              <label>Filter by type:</label>
              <div class="selections by-type">
                <a href="#" class="_A_ active"><span>All</span></a>
                <a href="#" class="_P_"><span>Participatory</span></a>
                <a href="#" class="_T_"><span>Ticketed</span></a>
                <a href="#" class="_F_"><span>Free</span></a>
              </div>
            </div>
            <div class="filter-col fc-right">
              <label>Filter by date:</label>
              <div class="selections by-date">
                <select name="date">
                  <option value="-">SELECT DATE</option>
                  <option value="06.15.2022">06.15.2022</option>
                  <option value="06.25.2022">06.25.2022</option>
                  <option value="07.05.2022">07.05.2022</option>
                  <option value="07.15.2022">07.15.2022</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


<?php
get_footer();
