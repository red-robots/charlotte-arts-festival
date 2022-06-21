<section id="plan-visit-section" class="section plan-visit-section" data-scroll-section data-persistent>
  <header class="section-title-center green">
    <div class="inner">
      <h2>Plan Your Visit</h2>
    </div>
  </header>

  <?php  
  $style1 = ' style="background-image:url('.IMAGES_URL.'/demo/8.jpg)"';
  $style2 = ' style="background-image:url('.IMAGES_URL.'/demo/1.jpg)"';
  ?>
  <div class="section-content">
    <div class="flexwrap">
      <div class="fcol f-left">
        <a href="#" class="large-photo-block" data-scroll>
          <figure class="img-bg" <?php echo $style1 ?>>
            <span class="caption">
              <span class="title">Day of Play</span>
            </span>
            <img src="<?php echo IMAGES_URL ?>/square.png" alt="" aria-hidden="true" />
          </figure>
          <span class="rotated-large-title"><span>DAY &</span></span>
        </a>
      </div>
      <div class="fcol f-right">
        <a href="#" class="large-photo-block" data-scroll>
          <figure class="img-bg" <?php echo $style2 ?>>
            <span class="caption">
              <span class="title">Night of Light</span>
            </span>
            <img src="<?php echo IMAGES_URL ?>/square.png" alt="" aria-hidden="true" />
          </figure>
          <span class="rotated-large-title"><span>NIGHT</span></span>
        </a>
      </div>
    </div>
  </div>
</section>