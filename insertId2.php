<?php
error_reporting(0);

include("config.php");
include 'register.php';

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

}
?>
