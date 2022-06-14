<?php if ( isset($homeGallery) && $homeGallery ) { ?>
<div class="images grid grid-no-js" id="imagecol">

  <?php  
  $animatedText = get_field('gallery_animated_text');
  $title1 = ( isset($animatedText['title1']) && $animatedText['title1'] ) ? $animatedText['title1'] : '';
  $title1_text = ( isset($title1['title']) && $title1['title'] ) ? $title1['title'] : '';
  $title1_img = ( isset($title1['assign_to_image']) && $title1['assign_to_image'] ) ? $title1['assign_to_image'] : '';

  $title2 = ( isset($animatedText['title2']) && $animatedText['title2'] ) ? $animatedText['title2'] : '';
  $title2_text = ( isset($title2['title']) && $title2['title'] ) ? $title2['title'] : '';
  $title2_img = ( isset($title2['assign_to_image']) && $title2['assign_to_image'] ) ? $title2['assign_to_image'] : '';
  $count = count($homeGallery);
  ?>

  <?php $ctr=1; foreach ($homeGallery as $img) { 
    $img_class = '';
    $graphic1 = '';
    $graphic2 = '';
    $has_squiggy = '';
    if($title1_text && $title1_img) {
      /* SQUIGGY1 */ 
      if($title1_img==$ctr) {
        $img_class .= ' has-text has-squiggy';
        ob_start();
        include( locate_template('squiggy/1/action.php') );
        $graphic1 = ob_get_contents();
        ob_end_clean();
      }
    }

    if($title2_text && $title2_img) {
      /* SQUIGGY2 */ 
      if($title2_img==$ctr) {
        $img_class .= ' has-text has-squiggy';
        ob_start();
        include( locate_template('squiggy/2/action.php') );
        $graphic2 = ob_get_contents();
        ob_end_clean();
      }
    }
    $d = $ctr + 1;
    $duration = number_format($d/10,1);
    $img_class .= ( $ctr % 4 == 0 ) ? ' middle':'';
    $img_class .= ($graphic2) ? ' next':'';
    $img_class .= ( $ctr % 2 == 0 ) ? ' even':' odd';
    $img_class .= ($count==$ctr) ? ' last':'';
    if( ($count-1) ==  ($ctr) ) {
      $img_class .= ' before_last ';
    }
  ?>
  <div class="grid-item img<?php echo $ctr.$img_class?>">
    <figure class="fig1" data-scroll data-scroll-speed="3" data-scroll-repeat data-scroll-target="#imagecol">
      <?php echo $graphic1.$graphic2; ?>
      <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>" style="transition-delay: <?php echo $duration ?>s;">
    </figure>
  </div>
  <?php $ctr++; } ?>

</div>
<?php } ?>


