<?php
include 'db.php';

$id = $_POST["id"];
$password = $_POST["password"];
$fullName = $_POST["fullName"];
$mobileNumber = $_POST["mobileNumber"];
$email = $_POST["emailAddress"];

// Insert user details into MySQL
$stmt = $conn->prepare("INSERT INTO userDetails (id, password, fullName) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $id, $password, $fullName);
$stmt->execute();
echo "MySQL: inserted successfully";

// Insert additional user details into MongoDB
$document = array(
    '_id' => $id,
    'password' => $password,
    'fullName' => $fullName,
    'mobileNumber' => $mobileNumber,
    'emailAddress' => $email
);
$collection->insertOne($document);
echo "MongoDB: inserted successfully";
?>
