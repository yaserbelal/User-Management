<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($conn->query("INSERT INTO users (name, email,password) VALUES ('$name', '$email','$password')") === TRUE) {
        header("Location: index.php");
    }
}

$conn->close();
?>