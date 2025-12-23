<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

echo "Welcome User<br>";
echo "Role: " . $_SESSION['role'];

if ($_SESSION['role'] === 'admin') {
    echo "<br><a href='admin.php'>Admin Panel</a>";
}
echo "<br><a href='logout.php'>Logout</a>";
?>
