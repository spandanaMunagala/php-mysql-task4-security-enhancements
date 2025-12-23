<?php
include "config.php";

if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields required";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email";
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "INSERT INTO users (name,email,password) VALUES (?,?,?)"
    );
    $stmt->bind_param("sss", $name, $email, $hash);

    if ($stmt->execute()) {
        echo "Registered successfully";
    } else {
        echo "Email already exists";
    }
}
?>

<form method="post">
  <input name="name" placeholder="Name" required><br>
  <input name="email" type="email" placeholder="Email" required><br>
  <input name="password" type="password" placeholder="Password" required><br>
  <button name="register">Register</button>
</form>
