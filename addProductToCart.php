<?php
require_once("connect.php");

$var_value = $_GET['varname'];
$productid = $var_value;
$userid = $_SESSION['id'];

// Check if the product already exists in the cart for the current user
$queryCart = "SELECT * FROM cart WHERE userid = $userid AND productid = $var_value";
$resultCart = mysqli_query($conn, $queryCart);

if (mysqli_num_rows($resultCart) > 0) {
    // Product already exists in the cart, update the quantity
    $queryUpdate = "UPDATE cart SET quantity = quantity + 1 WHERE userid = $userid AND productid = $var_value";
    $resultUpdate = mysqli_query($conn, $queryUpdate);

    if ($resultUpdate) {
        header('location: cart.php');
        exit();
    } else {
        echo "Failed to update the quantity in the cart.";
        exit();
    }
} else {
    // Product does not exist in the cart, add a new entry
    $queryInsert = "INSERT INTO cart (userid, productid, quantity) VALUES ('$userid', '$var_value', 1)";
    $resultInsert = mysqli_query($conn, $queryInsert);

    if ($resultInsert) {
        header('location: cart.php');
        exit();
    } else {
        echo "Failed to add the product to the cart.";
        exit();
    }
}
