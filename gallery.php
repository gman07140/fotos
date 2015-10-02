<?php

    // configuration
    require("../include/config.php");

    $photos = [];

    // if category id is selected...
    if (isset($_GET['categoryid']))
    {
        $catid = $_GET['categoryid'];
        $back = "&categoryid=".$catid;
        $pics = query("SELECT gallerylink, title, galleryid, descript, catname
                   FROM gallery, categories
                   WHERE category=? AND catid = category
                   GROUP BY gallerylink", $catid);

        $option_cat = $pics[0]['catname'];

        // set the album variables to defaults
        $albumid = 1;
        $option_alb = "choose album...";
    }

    // if album id is selected...
    elseif (isset($_GET['albumid']))
    {
        $albumid = $_GET['albumid'];
        $back = "&albumid=".$albumid;
        $pics = query("SELECT gallerylink, galleryid, title, descript, name
                   FROM gallery, albums
                   WHERE albumid=? AND albumid = id
                   GROUP BY gallerylink", $albumid);

        $option_alb = $pics[0]['name'];
        $count = count($pics);

        // set the category variables to defaults
        $catid = 4;
        $option_cat = "choose category...";
    }

    // if nothing is selected show all pics
    else
    {
        $back = "";
        $pics = query("SELECT gallerylink, cityid, title, galleryid, descript
        			   FROM gallery
        			   GROUP BY gallerylink");
    }

    // fill the photos array based on previous SQL done within the switch
    $photos = [];

    foreach ($pics as $pic)
    {
        $photos[] = [
        "galleryid" => $pic["galleryid"],
        "gallerylink" => $pic["gallerylink"],
        "title" => $pic["title"],
        "descript" => $pic["descript"]
        ];
    }

    // populate cities, categories, and albums arrays for select boxes
    $cities = [];

    $citys = query("SELECT cityid, city FROM cities");

    foreach ($citys as $city)
    {
        $cities[] = [
        "cityid" => $city["cityid"],
        "city" => $city["city"]
        ];
    }

    $cats = [];

    $catts = query("SELECT catid, catname FROM categories");

    foreach ($cats as $cat)
    {
        $catts[] = [
        "catid" => $cat["catid"],
        "catname" => $cat["catname"]
        ];
    }

    $albums = [];

    $albs = query("SELECT id, name FROM albums");

    foreach ($albs as $alb)
    {
        $albums[] = [
        "id" => $alb["id"],
        "name" => $alb["name"]
        ];
    }
          
    render("gallery_form.php", "adminheader.php", ["photos" => $photos, "cities" => $cities, "catts" => $catts, "albums" => $albums, 
                                                    "back" => $back, "option_cat" => $option_cat, "option_alb" => $option_alb, 
                                                    "catid" => $catid, "albumid" => $albumid, "title" => "Client_Pics"]);
?>