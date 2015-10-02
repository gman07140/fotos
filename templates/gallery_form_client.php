<div class="headertitle">
    <h1><?php echo $photos[0]['catname']; ?></h1>
    <h1><?php echo $photos[0]['city']; ?></h1>
    <h1><?php echo $photos[0]['name']; ?></h1>
</div>
<div id="content">
  <ul>
    <?php foreach ($photos as $photo): ?>
      <li><a class="fancybox" rel="group" title="<?= $photo["descript"]?>" href="<?= $photo["gallerylink"]?>"$><img src=        
             "<?= $photo["gallerylink"]?>" height="202" alt=""/></a>
      </li>
    <?php endforeach ?>
  </ul>
</div>

<script type="text/javascript" src="java/gallery.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="/java/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="/java/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/java/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
    $(".fancybox").fancybox({
        padding: 2, // or whatever, 0 = nothing
    'nextEffect': 'elastic',
    'prevEffect': 'elastic',
    'nextSpeed': 'slow'
    });
}); // ready
</script>
<!-- Make the border gray -->
<style type="text/css">
.fancybox-skin {
 background-color: #808080; /* or whatever */
}
</style>