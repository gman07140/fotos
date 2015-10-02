<?php
/*
    uploadgal.php - adds pictures to gallery
*/

use Aws\S3\Exception\S3Exception;

require("../include/start.php");
require("../include/config.php");

// get info from url for the redirect (go back to filtered pics)
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

$valid_formats = array("jpg", "png", "gif", "zip", "bmp", "JPG", "PNG");
$count = 0;

// Uploading multiple files. **source: http://www.w3bees.com/2013/02/multiple-file-upload-with-php.html
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	// check which upload options were set
	if(isset($_POST['origin'])) {
		$loc = $_POST['origin'];
	}
	else {
		$loc = 7;
	}
	if(isset($_POST['cat'])) {
		$cat = $_POST['cat'];
	}
	else {
		$cat = 4;
	}
	if(isset($_POST['album'])) {
		$album = $_POST['album'];
	}
	else {
		$album = 1;
	}

	// Loop $_FILES to execute all files
	foreach ($_FILES["image"]["name"] as $f => $name)
	{     
	    if ($_FILES["image"]["error"][$f] == 4) 
	    {
	        continue; // Skip file if any error found
	    }
	    if ($_FILES["image"]["error"][$f] == 0) 
	    {	           
			if( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) )
			{
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else
	        { // No error found! Upload files 
	            $file_name = $_FILES["image"]["name"][$f];
	            $full_name = "https://s3-us-west-2.amazonaws.com/jlsimages/gallery/$file_name";
	            $tmp_name = $_FILES['image']['tmp_name'][$f];

	            $extension = explode('.', $name);
				$extension = strtolower(end($extension));

				// temp details
				$key = md5(uniqid());
				$tmp_file_name = "{$key}.{$extension}";
				$tmp_file_path = "files/{$tmp_file_name}";

				// move the file
				move_uploaded_file($tmp_name, $tmp_file_path);

				try{
					$s3->putObject([
						'Bucket' => $config['s3']['bucket'],
						'Key' => "gallery/{$name}",
						'Body' => fopen($tmp_file_path, 'rb'),
						'ACL' => 'public-read'
						]);

					//remove the file
					unlink($tmp_file_path);

				} catch(S3Exception $e) {
					echo "error uploading file";
				}

	            $numrows = query("SELECT gallerylink FROM gallery WHERE gallerylink= ?", $full_name);
	            $num = count($numrows);
	            if($num == 0)
	            {
	            	echo $loc;
	            	$upped = query("INSERT INTO gallery (gallerylink, cityid, category, albumid) VALUES(?, ?, ?, ?)", $full_name, $loc, $cat, $album);
		            $count++; // Number of successfully uploaded files
	            }
	            else
	            {
	            	$message[] = "$name is not a valid format";
					continue; // Skip invalid file formats
	            }
	        }
	    }
	}
	redirect($backurl);
}    
?>