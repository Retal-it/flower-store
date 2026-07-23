<?php
include('connection.php');

$password = password_hash("123456", PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$name = "admin";
$email = "admin@gmail.com";

$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
    header("Location: index.php");
exit();
} else {
    echo "Error";
}
?>