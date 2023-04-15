<?php
$conn = new mysqli("localhost", "root", "", "stationary");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
