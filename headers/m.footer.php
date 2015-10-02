          <li data-role="list-divider">PESSOAS</li>
              <?php foreach ($albums as $album): ?>
                <li><a href="m.gallery.php?action&albumid=<?= $album['id']; ?>"><?= $album["name"]." - <i>".$album["alb_name"]; ?></i>
                <span class="ui-li-count"><?php $count = query("SELECT count(galleryid) AS count 
                                                                FROM gallery 
                                                                WHERE albumid = ?", $album['id']); echo $count[0]['count']; ?></span></a>
                </li>
              <?php endforeach ?>
          <li data-role="list-divider">CITIES</li>
              <?php foreach ($cities as $city): ?>
                <li><a href="m.gallery.php?action&cityid=<?= $city['cityid']; ?>"><?= $city["city"]; ?>
                <span class="ui-li-count"><?php $count = query("SELECT count(galleryid) AS count 
                                                                FROM gallery 
                                                                WHERE cityid = ? AND category <> 4", $city['cityid']); echo $count[0]['count']; ?></span></a>
                </li>
              <?php endforeach ?>
          <li data-role="list-divider">CORES</li>
                <li><a href="m.gallery.php?action&categoryid=3">Flores e contrastes
                <span class="ui-li-count"><?php $count = query("SELECT count(galleryid) AS count 
                                                                FROM gallery 
                                                                WHERE category = 3"); echo $count[0]['count']; ?></span></a>
                </li>
        </ul>
      </div>
    </div>
</body>
</html>