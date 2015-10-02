<?php

    // configuration
    require("../include/config.php");
    
    $pic = $_GET["galleryid"];
    if (isset($_GET['categoryid']))
    {
        $part = $_GET['categoryid'];
        $backurl = "gallery.php?action&categoryid=".$part;
    }
    if (isset($_GET['albumid']))
    {
        $part = $_GET['albumid'];
        $backurl = "gallery.php?action&albumid=".$part;
    }

    $picinfo = query("SELECT gallerylink, galleryid, gallery.cityid AS cityid, city, albumid, name, title, descript, category, catid, catname
                    FROM gallery, cities, categories, albums
                    WHERE gallery.cityid = cities.cityid AND albumid = albums.id AND category = catid AND galleryid = ?", $pic);

    $cityid = $picinfo[0]['cityid'];
    $catid = $picinfo[0]['catid'];
    $albumid = $picinfo[0]['albumid'];

    $cities = [];

    $citys = query("SELECT cityid, city FROM cities WHERE cityid <> ?", $cityid);

    foreach ($citys as $city)
    {
        $cities[] = [
        "cityid" => $city["cityid"],
        "city" => $city["city"]
        ];
    }

    $categories = [];

    $cats = query("SELECT catid, catname FROM categories WHERE catid <> ?", $catid);

    foreach ($cats as $cat)
    {
        $categories[] = [
        "catid" => $cat["catid"],
        "catname" => $cat["catname"]
        ];
    }

    $albums = [];

    $albs = query("SELECT id, name FROM albums WHERE id <> ?", $albumid);

    foreach ($albs as $alb)
    {
        $albums[] = [
        "id" => $alb["id"],
        "name" => $alb["name"]
        ];
    }

    render("editpics_form.php", "adminheader.php", ["picinfo" => $picinfo, "cities" => $cities, "cityid" => $cityid, "backurl" => $backurl,
        "categories" => $categories, "catid" => $catid, "albumid" => $albumid, "albums" => $albums, "title" => "Edit"]);
?>