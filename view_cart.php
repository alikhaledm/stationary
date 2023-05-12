<?php
session_start();
require_once("connect.php");

// Check if the cart is empty
if (empty($_SESSION['cart'])) {
  echo "Your cart is empty.";
  // You can also provide a link to redirect the user back to the products page or any other desired action
  exit();
}

// Retrieve the cart items from the session
$cartItems = $_SESSION['cart'];

// Fetch the product details from the database for the items in the cart
$productIds = array_keys($cartItems);
$productIdsString = implode(',', $productIds);

$query = "SELECT * FROM products WHERE id IN ($productIdsString)";
$result = mysqli_query($conn, $query);

// Create an associative array to store the fetched product details
$products = array();
while ($row = mysqli_fetch_assoc($result)) {
  $productId = $row['id'];
  $products[$productId] = $row;
}

// Calculate the total price of all items in the cart
$totalPrice = 0;

echo "<table>";
echo "<tr><th>Product</th><th>Quantity</th><th>Price</th><th>Actions</th></tr>";

foreach ($cartItems as $productId => $quantity) {
  $product = $products[$productId];
  $productName = $product['pname'];
  $productPrice = $product['price'];
  $subtotal = $productPrice * $quantity;
  $totalPrice += $subtotal;

  echo "<tr>";
  echo "<td>$productName</td>";
  echo "<td>$quantity</td>";
  echo "<td>$subtotal</td>";
  echo "<td><a href='remove_from_cart.php?productId=$productId'>Remove</a></td>";
  echo "</tr>";
}

echo "</table>";

echo "<p>Total Price: $totalPrice</p>";

// You can provide a link to proceed to the checkout page or any other desired action
echo "<a href='checkout.php'>Proceed to Checkout</a>";
