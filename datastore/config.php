<?php
    
// Variables
$DB_SERVER = "";
$DB_USERNAME = "";
$DB_PASSWORD = "";
$DB_NAME = "";

// Create connection
$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// Test if connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>