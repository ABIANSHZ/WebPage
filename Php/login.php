<?php
include 'db.php';

class User {
    private $con;
    
    public function __construct($dbConnection) {
        $this->con = $dbConnection;
    }

    public function authenticate($email, $password) {
        $query = "SELECT ppassword FROM userdetails WHERE id = ?";
        if ($stmt = $this->con->prepare($query)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            $stored_password='';
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($stored_password);
                $stmt->fetch();
                if ($password === $stored_password) {
                    $stmt->close();
                    return true;
                }
            }
            $stmt->close();
        }
        return false;
    }
}

// Get the email and password from POST request
$email = $_POST['mail'] ;
$password = $_POST['password'];

// Instantiate the User class and call the authenticate method
$user = new User($con);
if ($user->authenticate($email, $password)) {
    echo 'true';
} else {
    echo 'false';
}
