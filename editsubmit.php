<?php
    /** 
    *source - <https://www.daniweb.com/web-development/php/threads/101713/delete-multiple-rows-in-mysql-with-check-box> 
    */
        
    // configuration
    require("../include/config.php");

    $city = $_POST['origin'];
    $descr = $_POST['descr'];
    $pic = $_POST['pic'];
    $cat = $_POST['cat'];
    $album = $_POST['album'];

    $sql = query("UPDATE gallery 
                  SET cityid=?, descript=?, category=?, albumid=? 
                  WHERE galleryid=?", $city, $descr, $cat, $album, $pic);

    if($sql !== false)
    {
        echo "changes saved!";
    }
    else
    {
        echo "failed to update!";
    }
?>