<?php
require '..\vendor\autoload.php';
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
    echo "connection error";
else
    echo "connection successful";
$client = new MongoDB\Client("mongodb://localhost:27017/");
$db = $client->user;
$collection = $db->details;
echo "mongodb connected";
