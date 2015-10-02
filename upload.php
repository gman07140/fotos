<?php
/*
    upload.php - adds pictures to a client's profile.  not to be seen in gallery
*/

use Aws\S3\Exception\S3Exception;

require("../include/start.php");
require("../include/config.php");

$valid_formats = array("jpg", "png", "gif", "zip", "bmp", "JPG", "PNG");
$count = 0;

// Uploading multiple files. **source: http://www.w3bees.com/2013/02/multiple-file-upload-with-php.html
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	// Loop $_FILES to exeicute all files
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
	            $full_name = "https://s3-us-west-2.amazonaws.com/jlsimages/images/$file_name";
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
						'Key' => "images/{$name}",
						'Body' => fopen($tmp_file_path, 'rb'),
						'ACL' => 'public-read'
						]);

					//remove the file
					unlink($tmp_file_path);

				} catch(S3Exception $e) {
					echo "error uploading file";
				}

	            $numrows = query("SELECT link FROM images WHERE userID= ? AND link= ?", $_SESSION["userid"], $full_name);
	            $num = count($numrows);
	            if($num == 0)
	            {
	            	$upped = query("INSERT INTO images (userID, link) VALUES(?, ?)", $_SESSION["userid"], $full_name);
		            $count++; // Number of successfully uploaded files
	            }
	            else
	            {
	            	$message[] = "user already has this pic";
					continue; // Skip invalid file formats
	            }
	        }
	    }
	}
	redirect("adminpics2.php?action&userid=".$_SESSION["userid"]."");
}    
?>