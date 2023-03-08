<?php

// Set the database credentials
$servername = "localhost:3306";
$username = "timo";
$password = "timo";
$dbname = "test_db";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>