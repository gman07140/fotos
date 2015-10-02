<?php
	require("include/functions.php");

    $photos = [];

    if (isset($_GET['albumid']))
    {
        $albumid = $_GET['albumid'];
        $pics = query("SELECT thumblink, galleryid, name
                   FROM gallery, albums
                   WHERE albumid=? AND albumid = id
                   GROUP BY thumblink", $albumid);

        $count = count($pics);

        foreach ($pics as $pic)
        {
            $photos[] = [
            "galleryid" => $pic["galleryid"],
            "thumblink" => $pic["thumblink"],
            "name" => $pic["name"]
            ];
        }
    }

    if (isset($_GET['cityid']))
    {
        $cityid = $_GET['cityid'];
        $pics = query("SELECT thumblink, title, galleryid, descript, city, category
                   FROM gallery, cities
                   WHERE gallery.cityid=? AND gallery.cityid = cities.cityid AND category <> 4
                   GROUP BY thumblink", $cityid);

        $count = count($pics);

        foreach ($pics as $pic)
        {
            $photos[] = [
            "galleryid" => $pic["galleryid"],
            "thumblink" => $pic["thumblink"],
            "city" => $pic["city"],
            "descript" => $pic["descript"],
            "title" => $pic["title"]
            ];
        }
    }

    if (isset($_GET['categoryid']))
    {
        $catid = $_GET['categoryid'];
        $pics = query("SELECT thumblink, title, galleryid, descript, catname
                   FROM gallery, categories
                   WHERE category=? AND catid = category
                   GROUP BY thumblink", $catid);

        $count = count($pics);

        foreach ($pics as $pic)
        {
            $photos[] = [
            "galleryid" => $pic["galleryid"],
            "thumblink" => $pic["thumblink"],
            "catname" => $pic["catname"],
            "descript" => $pic["descript"],
            "title" => $pic["title"]
            ];
        }
    }

    // populate cities, categories, and albums arrays for listview items
    $albums = [];

    $albs = query("SELECT id, name, alb_name FROM albums WHERE id <> 1 ORDER BY id DESC");

    foreach ($albs as $alb)
    {
        $albums[] = [
        "id" => $alb["id"],
        "name" => $alb["name"],
        "alb_name" => $alb["alb_name"]
        ];
    }

    $cities = [];

    $citys = query("SELECT cityid, city FROM cities WHERE cityid <> 7");

    foreach ($citys as $city)
    {
        $cities[] = [
        "cityid" => $city["cityid"],
        "city" => $city["city"]
        ];
    }
?>

<!DOCTYPE html>
<html>
  <head>   
  		<title>Arte, Vida, Fotografia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/themes/mobileTheme.css" />
        <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
        <link href="/css/contact.css" rel="stylesheet"/>

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

  </head>