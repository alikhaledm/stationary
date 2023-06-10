<?php
include("spinner.php");
?>
<?php

require_once("connect.php");

// Retrieve the address ID from the query parameters or form data
$addressId = $_GET['address_id']; // Assuming the address ID is passed as a query parameter in the URL

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

// Prepare and execute the SQL query to delete the address record from the database
$query = "DELETE FROM address WHERE id = '$addressId' AND userid = '$userId'";
$result = $conn->query($query);

// TODO: Close the database connection
$conn->close();

// Redirect the user back to the checkout page or any other desired page
header("Location: address.php");
exit();

?>