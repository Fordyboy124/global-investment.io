<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = "Dankal@0002"; // Your MySQL password
$dbname = "signup_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

