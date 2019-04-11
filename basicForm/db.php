<?php
$servername = "xxxxxx";
$username = "xxxxx";
$password = "xxxxxx";
$dbname = "xxxxxx";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ");
}

?>