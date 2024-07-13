<?php
require '..\vendor\autoload.php';

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "test";

// MySQL connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "MySQL connection successful";
}

// MongoDB connection
$client = new MongoDB\Client("mongodb://localhost:27017/");
$db = $client->user;
$collection = $db->details;
echo "MongoDB connected";
?>

