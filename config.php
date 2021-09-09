<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="wookoo-quiz";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// $dir_name = dirname("https://www.2045.wookoo.in/SRSadmin/catImg");
$dir_name = dirname("http://localhost/wookoo-quiz-new/SRSadmin/catImg/img");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>