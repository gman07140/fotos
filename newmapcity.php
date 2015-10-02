<?php
/*
    newmapcity.php - allows administrator to add new citys to the list from user input on map2.php
*/
    
    // configuration
	require("include/functions.php");

	$city = $_POST["address"];
	$lat = $_POST["lat"];
	$lng = $_POST["lng"];

	$sql = query("INSERT INTO cities (city, lat, lng) VALUES (?, ?, ?)", $city, $lat, $lng);

    echo ($city." added to cities!");
?>