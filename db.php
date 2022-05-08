<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lms";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
//echo"connected";
// Cifheck connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}?>