<?php

ini_set("display_errors", true);
error_reporting(E_ALL);
	require("app/start.php");

	$objects = $s3->getIterator("ListObjects", [
			'Bucket' => $config['s3']['bucket']
		]);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listing</title>
</head>
<body>
<table>
	<thead>
		<tr>
			<th>File</th>
			<th>Download</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($objects as $object)
	{?>
		<tr>

			<td><?php echo $s3->getObjectUrl($config['s3']['bucket'], $object['Key']); ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</body>
</html>