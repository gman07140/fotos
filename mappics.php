<?php
/*
	mappics.php - takes 'cityid' from gallerymap.js (when user clicks on city) and returns all pics taken in that city
*/

    // configuration
	require("include/functions.php");

	$id = $_POST["cityid"];

	$sql = query("SELECT DISTINCT gallerylink AS linkys, city 
				FROM gallery, cities 
				WHERE category <> 4 AND gallery.cityid = cities.cityid AND gallery.cityid=?", $id);

	echo json_encode($sql);

?>