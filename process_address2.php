<?php


require_once("connect.php");

// Retrieve the form data
$area = $_POST['area'];
$street = $_POST['street'];
$city = $_POST['city'];
$zipCode = $_POST['zip_code'];
$title = $_POST['address_title'];

// Retrieve the user ID from the session
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
} else {
    // Redirect the user to the login page or display an error message
    // if the user is not logged in or authenticated.
    // Replace "login.php" with the actual login page URL.
    header("Location: signin.php");
    exit();
}

// TODO: Perform any necessary validation on the form inputs

// Prepare and execute the SQL query to insert the address data into the database
$query = "INSERT INTO address (title, area, street, city, zip, userid) VALUES ('$title', '$area', '$street', '$city', '$zipCode', '$userId')";
$result = $conn->query($query);

// TODO: Close the database connection
$conn->close();

// Redirect the user back to checkout.php
header("Location: address.php");
exit();


?>