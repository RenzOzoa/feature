<?php
$servername = "localhost";
$username = "root";
$password = "root123456789";
$dbname = "hrm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
