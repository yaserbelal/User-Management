<?php
require_once 'connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    if ($conn->query("DELETE FROM users WHERE id=$id") === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid user ID.";
    exit();
}

$conn->close();
?>