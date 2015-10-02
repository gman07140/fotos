<?php
	require("m.base.php");
?>

  <body>
    <div data-role="page" id="page1" data-theme="d">
      <div data-role="main" class="ui-content">
      <h3 style="text-align:center; margin-top:-10px;"><?php echo $photos[0]['name']; ?></h3>
      <h3 style="text-align:center; margin-top:-10px;"><?php echo $photos[0]['city']; ?></h3>
      <h3 style="text-align:center; margin-top:-10px;"><?php echo $photos[0]['catname']; ?></h3>
        <ul class="galm">
          <?php foreach ($photos as $photo): ?>
            <li><img src="<?= $photo["thumblink"]?>" height="165" alt=""/></li>
          <?php endforeach ?>

        </ul>
        <ul data-role="listview">
          <li data-role="list-divider">CONTACT</li>
          <li><a href="m.contact.php">Contato/sobre mim</a></li>
<?php
    require("headers/m.footer.php");
?>