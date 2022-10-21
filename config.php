<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "smartgrant"; /* Database name */

$data = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$data) {
  die("Connection failed: " . mysqli_connect_error());
}

?>