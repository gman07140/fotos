<!DOCTYPE html>
<html>
  <head>   
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/themes/mobileTheme.css" />
        <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

  </head>
  <body>
    <div data-role="page" id="page1" data-theme="d">
      <div data-role="main" class="ui-content">
      <h3 style="text-align:center;">Feature picture</h3>
        <img height="300" src="pics/mobile_feature.jpg" style="position: relative; left: 45px; padding-bottom:30px;"/>
        <ul data-role="listview">

          <li data-role="list-divider">Albums</li>
          <?php foreach ($albums as $album): ?>
            <li><a href="gallery_client.php?action&albumid=<?= $album["id"]; ?>"><?= $album["name"]; ?></a></li>
          <?php endforeach ?>

        </ul>
      </div>
      <div data-role="footer">
        <h2>Arte, vida, fotografia</h2>
      </div>
    </div>
</body>
</html>