<?php
/*
    newalb.php - allows administrator to add new album from admin gallery
*/
    
    // configuration
	require("include/functions.php");

	$album = $_POST["new_alb"];

	$sql = query("INSERT INTO albums (name) VALUES (?)", $album);

    echo ($album." added to albums!");
?>