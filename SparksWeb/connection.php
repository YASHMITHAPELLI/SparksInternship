<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$database= "sparkle";
$bud = new mysqli($servername, $username, $password, $database);
if ($bud->connect_error) {
  die("Connection failed: " . $bud->connect_error);
}
// echo "Connected successfully";
?>