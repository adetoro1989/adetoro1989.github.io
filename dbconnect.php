<?php
// db_connect.php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";   // XAMPP default has empty password for root
$db_name = "tunji";

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");  // ensure proper encoding
?>