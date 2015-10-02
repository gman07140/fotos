<?php

    // configuration
    require("include/functions.php");

    $photos = [];

    if (isset($_GET['categoryid']))
    {
        $catid = $_GET['categoryid'];
        $pics = query("SELECT gallerylink, title, galleryid, descript, catname
                   FROM gallery, categories
                   WHERE category=? AND catid = category
                   GROUP BY gallerylink", $catid);

        $count = count($pics);

        foreach ($pics as $pic)
        {
            $photos[] = [
            "galleryid" => $pic["galleryid"],
            "gallerylink" => $pic["gallerylink"],
            "catname" => $pic["catname"],
            "descript" => $pic["descript"],
            "title" => $pic["title"]
            ];
        }
    }

    if (isset($_GET['cityid']))
    {
        $cityid = $_GET['cityid'];
        $pics = query("SELECT gallerylink, title, galleryid, descript, city, category
                   FROM gallery, cities
                   WHERE gallery.cityid=? AND gallery.cityid = cities.cityid AND category <> 4
                   GROUP BY gallerylink", $cityid);

        $count = count($pics);

        foreach ($pics as $pic)
        {
            $photos[] = [
            "galleryid" => $pic["galleryid"],
            "gallerylink" => $pic["gallerylink"],
            "city" => $pic["city"],
            "descript" => $pic["descript"],
            "title" => $pic["title"]
            ];
        }
    }

    // no title for albums.  the "see more" option would be strange
    if (isset($_GET['albumid']))
    {
        $albumid = $_GET['albumid'];
        $pics = query("SELECT gallerylink, galleryid, name
                   FROM gallery, albums
                   WHERE albumid=? AND albumid = id
                   GROUP BY gallerylink", $albumid);

        $count = count($pics);

        foreach ($pics as $pic)
        {
            $photos[] = [
            "galleryid" => $pic["galleryid"],
            "gallerylink" => $pic["gallerylink"],
            "name" => $pic["name"]
            ];
        }
    }

    render("gallery_form_client.php", "header.php", ["photos" => $photos, "title" => "Gallery"]);
?>