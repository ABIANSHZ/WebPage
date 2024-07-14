<?php
require 'db.php';

// Fetch POST data
$usernameOrEmail = $_POST["usernameOrEmail"];
$password = $_POST["password"];

// Validate username or email and retrieve hashed password from database
$stmt = $conn->prepare("SELECT userId, password FROM userDetails WHERE emailAddress = ? OR mobileNumber = ?");
$stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($userId, $hashedPassword);
    $stmt->fetch();

    // Verify password
    if (password_verify($password, $hashedPassword)) {
        session_start();
        $_SESSION["userId"] = $userId; // Store user ID in session

        echo "Login successful";
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
}

