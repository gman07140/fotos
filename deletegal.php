<?php
    
    /** 
    *source - <https://www.daniweb.com/web-development/php/threads/101713/delete-multiple-rows-in-mysql-with-check-box> 
    */
        
    // configuration
    require("../include/config.php");

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

    // Check if delete button active, start this 
    if($_POST['deletepic'])
    {
        $id = $_POST['data'];
        $count = count($id);
        for($i = 0; $i < $count; $i++)
        {
            //echo "<br> value = ".$id[$i]."Jumlah = ".$count ;
            $sql = query("DELETE FROM gallery WHERE galleryid='$id[$i]'");
        }
    }
    // if successful refresh page
    redirect($backurl);
?>
