<style type="text/css">
<?php for($i=1; $i<=37; $i++) { $num=($i/100) * 3; $duration = number_format((float)$num, 2, '.', ''); ?>
.viewing .squiggy2 span.span<?php echo $i?> {transition-delay: <?php echo $duration?>s;visibility: visible;}
<?php } ?>
</style>
<div class="squiggy sq2">
  <div class="curvy squiggy2">
    <?php for($i=1; $i<=37; $i++) {
        echo '<span class="span'.$i.'" style="background-image:url('.get_template_directory_uri().'/squiggy/2/img/'.$i.'.png)"></span>';
      }
    ?>
  </div>
  <em>WANDER.</em>
</div>