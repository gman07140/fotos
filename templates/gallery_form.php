<div class="form-group">
  <input class="r5" type="submit" id="show" value="Collapse"><input class="r5" type="submit" id="options" value="Upload pics"><input type="submit" id="filter_cat" class="r5" value="Filter"><input type="submit" id="album_show" value="New album">
</div>

<div id="upload_ops" style="display:none;">
<form action="<?='uploadgal.php?action'.$back ?>" method="post" name="myForm" enctype="multipart/form-data">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" multiple="multiple" name="image[]" type="file"/><?php echo str_repeat('&nbsp;', 4); ?>
        </div>
      <div class="form-group">
          <select name="origin" id="origin" class="form-control">                                  
          <option value="7" selected disabled="disabled"><?= "choose location..."; ?></option>
              <?php foreach($cities as $citie) { ?>
              <option value="<?= $citie['cityid'] ?>"><?= $citie['city'] ?></option>
              <?php } ?>
          </select><br /> 
        </div>
        <div class="form-group">
          <select name="cat" id="cat" class="form-control">                                  
          <option style="display:none;" value="<?= $catid ?>" selected><?= $option_cat; ?></option>
              <?php foreach($catts as $catt) { ?>
              <option value="<?= $catt['catid'] ?>"><?= $catt['catname'] ?></option>
              <?php } ?>
          </select><br />
        </div>
        <div class="form-group">
          <select name="album" id="album" class="form-control">                                  
          <option style="display:none;" value="<?= $albumid ?>" selected><?= $option_alb; ?></option>
              <?php foreach($albums as $album) { ?>
              <option value="<?= $album['id'] ?>"><?= $album['name'] ?></option>
              <?php } ?>
          </select><br />
        </div>
        <button type="submit" class="btn btn-default">Upload</button>
    </fieldset>
</form>
</div>

<div id="filter" style="display:none;">
  <div class="form-group">
    <select name="filtercat" id="filtercat" class="form-control">                                  
    <option style="display:none;" value="<?= $catid ?>" selected><?= $option_cat; ?></option>
          <?php foreach($catts as $catt) { ?>
          <option value="<?= $catt['catid'] ?>"><?= $catt['catname'] ?></option>
          <?php } ?>
    </select><br />
  </div>
  <div style="padding-bottom:9px;" class="white">- or -</div>
  <div class="form-group">
    <select name="filteralb" id="filteralb" class="form-control">                                  
    <option style="display:none;" value="<?= $albumid ?>" selected><?= $option_alb; ?></option>
        <?php foreach($albums as $album) { ?>
        <option value="<?= $album['id'] ?>"><?= $album['name'] ?></option>
        <?php } ?>
    </select><br />
  </div>
</div>

<div id="albums" style="display:none;">
  <form id="newalbum" method="post" name="newalbum" action="newalb.php">
    <div class="form-group">
      <input class="form-control" type="text" name="new_alb" placeholder="New album name">
    </div>
    <button type="submit" id="newalb" class="btn btn-default">Submit</button>
    <div class="white" id="progress"></div>
  </form>
</div>

<form name="form3" method="post" action="<?='deletegal.php?action'.$back ?>">
    <div style="float:center;" class="form-group" id="remove">
        <input class="btn btn-default" name="deletepic" type="submit" id="deletepic" value="Remove">
    </div>
    <div id="wrapper">
        <div id="content">
            <ul>
                <?php foreach ($photos as $photo): ?>
                    <li><a class="fancybox" rel="group" title="<?= $photo["descript"] ?>" href="<?= $photo["gallerylink"]?>"$><img src=        
                              "<?= $photo["gallerylink"]?>" height="120" alt=""/></a>

                            <div class="detail">
                              <input name="data[]" type="checkbox" id="data" value="<?php echo $photo['galleryid']; ?>">
                              <?php echo('<a id="logtext" href="editpics.php?action&galleryid='.$photo["galleryid"].$back.'">Edit</a>');?>
                            </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</form>

<script type="text/javascript" src="java/gallery.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="/java/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="/java/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/java/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<script type="text/javascript">
    $(document).ready(function($) {
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