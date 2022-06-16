<?php /* UPCOMING EVENTS */ 
$show_count = ( get_field('upcoming_events_total_display') ) ? get_field('upcoming_events_total_display') : 10;
$events = tribe_get_events( [
  'posts_per_page' => $show_count,
  'start_date'     => 'now',
]);
$event_terms = array();
$eventDateList = array();
if($events) {
  foreach($events as $e) {
    $terms = wp_get_post_terms( $e->ID, Tribe__Events__Main::TAXONOMY );
    $start = tribe_get_start_date($e,null,'m.d.Y');
    if($start) {
      $eventDateList[$start] = $start;
    }
    if($terms) {
      foreach($terms as $term) {
        $color = get_field('category_color', $term);
        $catColor = ($color) ? $color:'#FFF';
        $term->textcolor = $catColor;
        $event_terms[$term->term_id] = $term;
      }
    }
  } 

  $section_title = get_field('upcoming_events_section_title');
  $viewBtn = get_field("upcoming_events_button");
  $btnTitle = (isset($viewBtn['title']) && $viewBtn['title']) ? $viewBtn['title'] : '';
  $btnLink = (isset($viewBtn['url']) && $viewBtn['url']) ? $viewBtn['url'] : '';
  $btnTarget = (isset($viewBtn['target']) && $viewBtn['target']) ? $viewBtn['target'] : '_self';
  ?>
  <section id="upcoming-events" class="section upcoming-events-section blue-bg" data-scroll-section data-persistent>
    <?php if ($event_title) { ?>
      <h2 id="events-title-secondary" class="rotated-title hidden" style="display:none!important;"><?php echo $event_title ?></h2>
    <?php } ?>
    <div class="section-inner-content" data-scroll data-scroll-speed="3.7">
      <?php if ( $section_title ) { ?>
      <header id="upcoming-events-heading" class="section-header">
        <div class="wrapper">
          <div class="flexwrap">
            <div class="fcol left">
              <h2 class="section-title"><?php echo $section_title ?></h2>
            </div>
            <div class="fcol right buttoncol">
              <div class="flex">
                <div id="slideNavs">
                  <a href="javascript:void(0)" class="customCaroNav prev" data-rel=".owl-prev"><span>previous</span></a>
                  <a href="javascript:void(0)" class="customCaroNav next" data-rel=".owl-next"><span>next</span></a>
                </div>
                <?php if ( $btnTitle && $btnLink ) { ?>
                <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="view-all-btn theme-btn"><span><?php echo $btnTitle ?></span></a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </header>
      <?php } ?>
      
      <div class="filter-action">
        <div class="filter-wrap">
          <?php if ($event_terms) { ?>
          <div class="filter-col fc-left">
            <label>Filter by type:</label>
            <div class="selections by-type owl-filter-bar">
              <a id="term-all" href="javascript:void(0)" data-term="all" data-owl-filter="*" class="item filter-All active"><span>All</span></a>
              <?php foreach ($event_terms as $term) { ?>
              <a href="javascript:void(0)" id="term-<?php echo $term->slug; ?>" data-term="<?php echo $term->slug; ?>" class="item cat_<?php echo $term->slug; ?>" data-owl-filter=".term-<?php echo $term->slug; ?>" style="color:<?php echo $term->textcolor; ?>"><span><?php echo $term->name; ?></span></a>
              <?php } ?>
            </div>
          </div>
          <?php } ?>

          <?php if ($eventDateList) { ?>
          <div class="filter-col fc-right">
            <label>Filter by date:</label>
            <div class="selections by-date">
              <span class="selectwrap">
                <select id="filterByDate" name="date">
                  <option value="-">SELECT DATE</option>
                  <?php foreach ($eventDateList as $date) { ?>
                  <option value="<?php echo $date ?>"><?php echo $date ?></option>
                  <?php } ?>
                </select>
              </span>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>

      <div class="upcoming-events-list">
        <!-- <div class="wrapper wrap-resizer">&nbsp;</div> -->
        <div class="inner-wrap">
          <div id="upcoming_events_carousel" data-total="<?php echo $show_count ?>" class="owl-carousel owl-theme">
            <?php foreach($events as $ev) { 
              $event_id = $ev->ID;
              $thumb_id = get_post_thumbnail_id($event_id);
              $img = wp_get_attachment_image_src($thumb_id,'full');
              $style = ($img) ? ' style="background-image:url('.$img[0].')"':'';
              $pagelink = get_permalink($event_id);
              $terms = wp_get_post_terms( $event_id, Tribe__Events__Main::TAXONOMY );
              $term = (isset($terms[0]) && $terms[0]) ? $terms[0] : '';
              $term_id = (isset($term->term_id) && $term->term_id) ? $term->term_id : '';
              $term_slug = (isset($term->slug) && $term->slug) ? $term->slug : '';
              $term_class = ($term_slug) ? ' term-'.$term_slug : '';
              $color = get_field('category_color', $term);
              $catColor = ($color) ? $color:'#FFF';

              $start = tribe_get_start_date($ev,null,'M d');
              $end = tribe_get_end_date($ev,null,'M d');
              $start_time = tribe_get_start_date($ev,null,'g:ia');
              $end_time = tribe_get_end_date($ev,null,'g:ia');
              $event_dates = $start;
              if($start!=$end) {
                $event_dates = ( array_filter(array($start,$end)) ) ? implode(' &ndash; ',array_filter(array($start,$end))) : '';
              }
              if($start_time || $end_time) {
                $st = str_replace(':00','',$start_time);
                $et = str_replace(':00','',$end_time);
                $times = ( array_filter(array($st,$et)) ) ? implode(' &ndash; ',array_filter(array($st,$et))) : '';
                if($event_dates) {
                  $event_dates .= ' | ' . $times;
                } 
              }
              $venue = tribe_get_venue($event_id);
              $event_start_format = tribe_get_start_date($event_id,null,'m.d.Y');
              ?>
              <div data-start="<?php echo $event_start_format ?>" data-termid="<?php echo $term_id ?>" data-term="<?php echo $term_slug ?>" class="item event project  upcoming-event-info<?php echo $term_class ?>">
                <a href="<?php echo $pagelink ?>" class="image">
                  <figure class="img-bg" <?php echo $style ?>>
                    <img src="<?php echo IMAGES_URL ?>/square.png" alt="" aria-hidden="true" />
                  </figure>
                </a>
                <h3><a href="<?php echo $pagelink ?>"><?php echo $ev->post_title ?></a></h3>
                <?php if ($term) { ?>
                <div class="term" style="color:<?php echo $catColor ?>"><?php echo $term->name ?></div>
                <?php } ?>
                <?php if ($event_dates || $venue) { ?>
                <div class="info">
                  <?php if ($event_dates) { ?>
                  <div class="date"><?php echo $event_dates ?></div>
                  <?php } ?>
                  <?php if ($venue) { ?>
                  <div class="loc"><?php echo $venue ?></div>
                  <?php } ?>
                </div>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>  
    </div>

  </section>
<?php } ?>