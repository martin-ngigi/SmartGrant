<?php
error_reporting(0);
/**

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


or



CREATE TABLE IF NOT EXISTS `images2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  `username2` varchar(100) NOT NULL,
  `id_Num` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
**/

$msg = "";

$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "./image/" . $filename;

$db = mysqli_connect("localhost", "root", "", "smartgrant");

// Get all the submitted data from the form
$sql = "INSERT INTO image (filename) VALUES ('$filename')";

// Execute query
mysqli_query($db, $sql);

// Now let's move the uploaded image into the folder: image
if (move_uploaded_file($tempname, $folder)) {
	echo "<h3> Image uploaded successfully!</h3>";
} else {
	echo "<h3> Failed to upload image!</h3>";
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		#content{
			width: 50%;
			justify-content: center;
			align-items: center;
			margin: 20px auto;
			border: 1px solid #cbcbcb;
		}
		form{
			width: 50%;
			margin: 20px auto;
		}

		#display-image{
			width: 100%;
			justify-content: center;
			padding: 5px;
			margin: 15px;
		}
		img{
			margin: 5px;
			width: 350px;
			height: 250px;
		}

	</style>
</head>

<body>
	<div id="content">
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
			</div>
		</form>
	</div>
	<div id="display-image">
		<?php
		$query = " select * from image ";
		$result = mysqli_query($db, $query);

		while ($data = mysqli_fetch_assoc($result)) {
		?>
			<img src="./image/<?php echo $data['filename']; ?>">

		<?php
		}
		?>
	</div>
</body>

</html>
