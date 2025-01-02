<?php
// Database connecting
$host = "localhost";
$username = "root";        
$password = "";           
$dbname = "slaite exam apply";

$conn = new mysqli($host, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
