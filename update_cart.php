<?php
session_start();

// Check if the product ID and new quantity are provided
if (isset($_POST["product_id"]) && isset($_POST["quantity"])) {
  $productID = $_POST["product_id"];
  $newQuantity = $_POST["quantity"];

  // Update the quantity of the product in the cart
  if (isset($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as &$item) {
      if ($item["id"] === $productID) {
        $item["quantity"] = $newQuantity;
        break;
      }
    }
  }
}
