<?php
/** 
    *select.php - handles client selected pictures
    *source - <https://www.daniweb.com/web-development/php/threads/101713/delete-multiple-rows-in-mysql-with-check-box> 
*/
    
// configuration
require("../include/config.php");

    $address = query("SELECT email, username, userID FROM users WHERE userID = ?", $_SESSION["userID"]);

    if (!empty($_POST['data']))
    {
        $images = $_POST['data'];
    }
    else
    {
        redirect("clientpics.php");
        exit();
        return false;
    }
    render("select_form.php", "clientheader.php", ["images" => $images, "address" => $address, "title" => "Confirmation"]);
?>