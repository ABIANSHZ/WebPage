<?php
require 'db.php';

// Fetch POST data
$fullName = $_POST["fullName"];
$mobileNumber = $_POST["mobileNumber"];
$emailAddress = $_POST["emailAddress"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password for security

// Insert user details into MySQL using prepared statements
$stmt = $conn->prepare("INSERT INTO userDetails (fullName, mobileNumber, emailAddress, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $fullName, $mobileNumber, $emailAddress, $password);

// Execute the statement and check for errors
if ($stmt->execute()) {
    echo "User registered successfully";
} else {
    echo "Error: " . $stmt->error;
}

