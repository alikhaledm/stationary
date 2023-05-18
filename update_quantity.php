<?php
require_once("connect.php");
session_start();
// Get the new quantity from the AJAX request
$newQuantity = $_POST['newQuantity'];

// Update the quantity in the database for the selected product
$productid = $rowData2['productid']; // Assuming you have the product ID
$sql = "UPDATE cart SET quantity = $newQuantity WHERE id = $productid";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    echo "Quantity updated successfully";
} else {
    echo "Error updating quantity: " . mysqli_error($conn);
}
