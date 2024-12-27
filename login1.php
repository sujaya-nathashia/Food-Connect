<?php
// Database credentials
$servername = "localhost"; // Replace with your server name if different
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "food_donations"; // Replace with your database name

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
