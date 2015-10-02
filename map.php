<?php
    // configuration
	require("include/functions.php");

	$sql = query("SELECT * FROM cities");

    echo json_encode($sql);

?>