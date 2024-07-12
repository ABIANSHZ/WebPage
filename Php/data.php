<?php
include 'db.php';
$id = $_POST["id"];
$password = $_POST["password"];
$stmt=$conn->prepare("INSERT INTO userDetails (id , password) VALUES (?,?)");
$stmt->bind_param("ss", $id,$password);
$stmt->execute();
echo "inserted successfully";
$document = array(
    '_id'=>$id,
    'password'=>$password
);
$collection->insertOne($document);
echo "inserted";