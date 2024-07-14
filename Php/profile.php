<?php
require 'db.php';

// Start session to retrieve user ID
session_start();
if (!isset($_SESSION["userId"])) {
    echo "User not logged in";
    exit;
}

$userId = $_SESSION["userId"];

// Fetch user details from MySQL
$stmt = $conn->prepare("SELECT fullName, mobileNumber, emailAddress FROM userDetails WHERE userId = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($fullName, $mobileNumber, $emailAddress);
$stmt->fetch();

$userDetails = array(
    'fullName' => $fullName,
    'mobileNumber' => $mobileNumber,
    'emailAddress' => $emailAddress
);

echo json_encode($userDetails); // Return user details as JSON

