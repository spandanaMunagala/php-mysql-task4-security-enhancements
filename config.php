<?php
$conn = new mysqli("localhost", "root", "", "secure_app");

if ($conn->connect_error) {
    die("Database connection failed");
}
?>
