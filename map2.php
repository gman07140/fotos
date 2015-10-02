<?php
  require("headers/adminheader.php");
?>
  
<div id="map-canvas" style="margin-left:235px;"></div>
<div class="container">

<div id="middle">
  <div class="form-group">
    <input autofocus class="form-control" type="text" name="address" placeholder="enter location here">
  </div>
  <div class="form-group">
    <input type="button" name="search" value="Locate" class="btn btn-default">
  </div>
</div>

<div id="address" class="push" style="color:#B2B2B2;" name="address"></div>

<div id="apex" style="display:none;">
  <input type="button" name="submit" value="Submit city">
</div>

<div id="lat" class="push" name="lat" style="display:none;"></div>
<div id="lng" class="push" name="lng" style="display:none;"></div>
<div id="progress" class="logtext"></div>
<a href="map2.php">reset map</a>
</div>
<div class="infobox-wrapper">
    <div id="infobox">
        The contents of your info box. It's very easy to create and customize.
    </div>
  </body>

  <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8kb9yqovVmnS3uXqZnYEgr0jGC6VX1sY">
    </script>
    <script type="text/javascript" src="java/gallerymap.js"></script>
</html>