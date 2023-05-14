<?php
session_start();

if (isset($_POST['id']) && !empty($_POST['id'])) {
  $productId = $_POST['id'];

  // Check if the product is already in the cart
  if (isset($_SESSION['cart'][$productId])) {
    // Increment the quantity if the product is already in the cart
    $_SESSION['cart'][$productId]['quantity']++;
  } else {
    // Add the product to the cart with quantity = 1
    $_SESSION['cart'][$productId]['quantity'] = 1;
    // Store other product details in the cart, e.g., name, price, etc.
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
</head>

<body>
  <h1>Cart</h1>

  <div>
    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
      <table>
        <thead>
          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($_SESSION['cart'] as $productId => $product) : ?>
            <tr>
              <td><?php echo $product['name']; ?></td>
              <td><?php echo $product['quantity']; ?></td>
              <td><?php echo $product['price']; ?></td>
              <td><?php echo $product['price'] * $product['quantity']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <a href="checkout.php">Proceed to Checkout</a>
    <?php else : ?>
      <p>Your cart is empty.</p>
    <?php endif; ?>
  </div>

</body>

</html>