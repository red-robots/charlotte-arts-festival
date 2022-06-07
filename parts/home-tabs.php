<?php  
$tabs = array(
  array(
    'link'=>'#',
    'color'=>'#eb5222',
    'title'=>'About',
  ),
  array(
    'link'=>'#',
    'color'=>'#f7b92e',
    'title'=>'Plan Your Visit'
  ),
  array(
    'link'=>'#',
    'color'=>'#0aa4b5',
    'title'=>'Events'
  )
);
$tab_count = count($tabs);
?>
<section id="hometabs" class="hometabs count-<?php echo $tab_count ?>">
  <div class="outer-wrap">
    <div class="wrapper">
      <div class="inner animated fadeInUp">
        <?php foreach ($tabs as $tab) { 
          $bgcolor = (isset($tab['color']) && $tab['color']) ? $tab['color'] : '#e9e9e9';
        ?>
        <div class="tab">
          <a href="<?php echo $tab['link'] ?>" style="background:<?php echo $bgcolor ?>"><span><?php echo $tab['title'] ?></span></a>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>







