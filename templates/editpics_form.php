<div class="wrapper">
<div id="container">
    <img src="<?= $picinfo[0]["gallerylink"]?>" style="width:20%;height:20%;padding-bottom:15px;" alt=""/>
</div>
<form id="myForm" action="editsubmit.php" method="post">
  <fieldset>
    <div class="form-group">
        <input type="hidden" name="pic" value="<?= $picinfo[0]['galleryid'] ?>"/>
    </div>
    <div class="form-group">
        <select name="origin" id="origin" class="form-control">                                  
        <option value="<?php echo $picinfo[0]['cityid']; ?>" selected><?php                        
            if($picinfo[0]['cityid'] == 7)
            {echo "choose location...";} 
            else 
            {echo $picinfo[0]["city"];} ?></option>
            <?php foreach($cities as $citie) { ?>
                <option value="<?= $citie['cityid'] ?>"><?= $citie['city'] ?></option>
            <?php } ?>
        </select><br />
    </div>
    <div class="form-group">
        <select name="cat" id="cat" class="form-control">                                  
        <option value="<?php echo $picinfo[0]['category']; ?>" selected><?php                        
            if($picinfo[0]['category'] == null)
            {echo "choose category...";}
            else 
            {echo $picinfo[0]["catname"];} ?></option>
            <?php foreach($categories as $category) { ?>
                <option value="<?= $category['catid'] ?>"><?= $category['catname'] ?></option>
            <?php } ?>
        </select>
        <select name="album" id="album" class="form-control">                                  
        <option value="<?php echo $picinfo[0]['albumid']; ?>" selected><?php                        
            if($picinfo[0]['albumid'] == null)
            {echo "album...";} 
            else 
            {echo $picinfo[0]["name"];} ?></option>
            <?php foreach($albums as $album) { ?>
                <option value="<?= $album['id'] ?>"><?= $album['name'] ?></option>
            <?php } ?>
        </select><br />
    </div>
    <div class="form-group">
        <textarea autofocus class="form-control" name="descr" type="text" cols="85" rows="3" placeholder="enter description"><?= $picinfo[0]['descript'] ?></textarea><br />
    </div>
    <div class="form-group">
        <button id="submit">Submit</button>
        <div class="white" id="success"></div>
        <a href="<?= $backurl ?>">back</a>
    </div>
  </fieldset>
</form>
<script type="text/javascript" src="java/edit.js"></script>