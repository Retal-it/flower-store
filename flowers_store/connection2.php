<?php
$conn = mysqli_connect('127.0.0.1:3307', "root", "", "flowers_store");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>