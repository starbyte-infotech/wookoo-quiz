<?php
$servername = "localhost";
$username = "sagar";
$password = "zzbGwnQBM6isyJUF";
$database="quiz_master";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// $dir_name = dirname("https://www.2045.wookoo.in/SRSadmin/catImg");
$dir_name = dirname("https://wookoo.in/SRSadmin/catImg/img");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>