<!DOCTYPE html>
<html lang="en">
<?php
require_once("connect.php");
include("navbar.php");
$userid = $_SESSION['id'];
if (isset($_POST["query"])) {
  $userid = $_SESSION['id'];
}
$total = 0;
$getotal = "SELECT SUM(products.price * cart.quantity) AS total_price FROM products INNER JOIN cart ON products.id = cart.productid WHERE cart.userid = $userid";
$result = mysqli_query($conn, $getotal);
$tagID = mysqli_fetch_assoc($result);
if ($result) {
  $total = $tagID['total_price'];
}
if (isset($_POST['update_quantity'])) {
  $productId = $_POST['product_id'];
  $newQuantity = $_POST['quantity'];
  $updateQuery = "UPDATE cart SET quantity = $newQuantity WHERE userid = $userid AND productid = $productId";
  $updateResult = mysqli_query($conn, $updateQuery);
}
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Shopping Cart - Brand</title>
  <link rel="stylesheet" href="cartstyles.css">
  <link rel="stylesheet" href="cartassets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.reflowhq.com/v2/toolkit.min.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <?php
  include("spinner.php");
  ?>
  <section class="py-5">
    <div class="container py-5">
      <div class="row mx-auto">
        <div class="col">
          <div data-reflow-type="shopping-cart">
            <div class="reflow-shopping-cart" style="display: block">
              <div class="ref-loading-overlay"></div>
              <div class="ref-message" style="display: none"></div>
              <div class="ref-cart" style="display: block">
                <div class="ref-heading">Shopping Cart</div>
                <div class="ref-th">
                  <div class="ref-product-col">Product</div>
                  <div class="ref-price-col">Price</div>
                  <div class="ref-quantity-col">Quantity</div>
                  <div class="ref-total-col">Total</div>
                </div>
                <div class="ref-cart-table">
                  <?php

                  $getProducts = "SELECT * FROM cart WHERE userid = $userid";
                  $result2 = mysqli_query($conn, $getProducts);
                  if ($result2) {
                    while ($rowData = mysqli_fetch_assoc($result2)) {
                      $productId = $rowData['productid'];
                      $selectProducts = "SELECT * FROM products WHERE id = $productId";
                      $result3 = mysqli_query($conn, $selectProducts);
                      if ($result3) {
                        while ($rowData2 = mysqli_fetch_assoc($result3)) {
                          $cartid = $rowData['id'];
                          $quantity = $rowData['quantity'];
                          $productPrice = $rowData2['price'];

                          $prodtotal = $productPrice * $quantity;

                          // Truncate product name if more than 15 characters
                          echo '
                          <div class="ref-product" data-id="1065684752" data-quantity="2">
                            <div class="ref-product-col">
                              <div class="ref-product-wrapper">
                                <img class="ref-product-photo" src="images/Shop/products/' . $rowData2['photo'] . '" alt="Vintage Clock" />
                                <div class="ref-product-data">
                                  <div class="ref-product-info">
                                    <div>
                                      <div class="ref-product-name">' . $rowData2['pname'] . '</div>
                                      <div class="ref-product-category">Tech</div>
                                      <div class="ref-product-variants"></div>
                                      <div class="ref-product-personalization-holder"></div>
                                    </div>
                                    <div class="ref-product-price ref-mobile-product-price">' . number_format($productPrice, 2) . '</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="ref-price-col">
                              <div class="ref-product-price">' . number_format($productPrice, 2) . '</div>
                            </div>
                            <div class="ref-quantity-col">
                                <form action="" method="POST" class="update-form">
                                <input type="hidden" name="product_id" value="' . $productId . '">
                                <div class="quantity-input">
                                <input type="number" style="width:20%;" name="quantity" class="quantity mt-2 px-2" min="1" value="' . $quantity . '" data-product-id="' . $productId . '">
                                <button type="submit" name="update_quantity" class="update-button"><i class="fa fa-check checker" style="color:black; width:0"></i></button>
                            </div>
                            </form>
                            </div>
                            <div class="ref-total-col">
                              <div class="ref-product-total">
                                <div class="ref-product-total-sum">
                                  ' . number_format($prodtotal, 2) . ' EGP
                                </div>
                              </div>
                            </div>
                          </div>';
                        }
                      }
                    }
                  }
                  ?>
                  <div class="ref-footer">
                    <div class="ref-links">
                      <a href="https://google.com" target="_blank">Terms &amp; Conditions</a><a
                        href="https://google.com" target="_blank">Privacy Policy</a><a href="https://google.com"
                        target="_blank">Refund Policy</a>
                    </div>
                    <div class="ref-totals">
                      <div class="ref-subtotal">Subtotal:
                        <?php echo number_format($total, 2); ?> EGP
                      </div>
                      <div class="ref-button ref-standard-checkout-button">
                        <a href="checkout.php" style="color:white"> Checkout </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <script>
                // AJAX request to update quantity
                function updateQuantity(productId, newQuantity) {
                  $.ajax({
                    type: "POST",
                    url: "update_quantity.php",
                    data: {
                      update_quantity: true,
                      product_id: productId,
                      quantity: newQuantity
                    },
                    success: function (response) {
                      console.log(response);
                      // You can update the UI here if needed
                    }
                  });
                }
              </script>
              </script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
              <script src="https://cdn.reflowhq.com/v2/toolkit.min.js"></script>
              <script src="assets/js/bs-init.js"></script>
              <script src="assets/js/bold-and-bright.js"></script>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>
<?php
include("footer.php")
  ?>