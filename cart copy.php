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

    header("location: cart.php");
}

?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Shopping Cart - Brand</title>
    <link rel="stylesheet" href="cartassets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.reflowhq.com/v2/toolkit.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap" />
</head>

<body>
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
                                                    $cartId = $rowData['id'];
                                                    $quantity = $rowData['quantity'];
                                                    $productPrice = $rowData2['price'];

                                                    $prodtotal = $productPrice * $quantity;

                                                    // Truncate product name if more than 15 characters
                                                    $productName = strlen($rowData2['pname']) > 25 ? substr($rowData2['pname'], 0, 25) . ".." : $rowData2['pname'];

                                                    echo '
                                                    <div
                                                    class="ref-product"
                                                    data-id="1065684752"
                                                    data-quantity="2"
                                                  >
                                                    <div class="ref-product-col">
                                                      <div class="ref-product-wrapper">
                                                        <img
                                                          class="ref-product-photo"
                                                          src="images/Shop/products/' . $rowData2['photo'] . '""
                                                          alt="Vintage Clock"
                                                        />
                                                        <div class="ref-product-data">
                                                          <div class="ref-product-info">
                                                            <div>
                                                              <div class="ref-product-name">
                                                              ' . $productName . '
                                                              </div>
                                                              <div class="ref-product-category">Tech</div>
                                                              <div class="ref-product-variants"></div>
                                                              <div
                                                                class="ref-product-personalization-holder"
                                                              ></div>
                                                            </div>
                                                            <div
                                                              class="ref-product-price ref-mobile-product-price"
                                                            >
                                                            ' . number_format($productPrice, 2) . '
                                                            </div>
                                                          </div>
                                                          <div
                                                            class="ref-product-controls ref-mobile-product-controls"
                                                          >
                                                            <div class="ref-product-quantity">
                                                              <div
                                                                class="ref-quantity-container"
                                                                data-reflow-product="1065684752"
                                                                data-reflow-max-qty="999"
                                                                data-reflow-quantity="2"
                                                              >
                                                                <div class="ref-quantity-widget">
                                                                  <div class="ref-decrease">
                                                                    <span></span>
                                                                  </div>
                                                                  <input type="text" value="1" />
                                                                  <div class="ref-increase">
                                                                    <span></span>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="ref-product-qty-message"></div>
                                                            </div>
                                                            <div class="ref-product-remove">
                                                              <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                height="18"
                                                                width="18"
                                                                viewBox="0 0 48 48"
                                                              >
                                                                <path
                                                                  fill="currentColor"
                                                                  d="M13.05 42q-1.2 0-2.1-.9-.9-.9-.9-2.1V10.5H8v-3h9.4V6h13.2v1.5H40v3h-2.05V39q0 1.2-.9 2.1-.9.9-2.1.9Zm21.9-31.5h-21.9V39h21.9Zm-16.6 24.2h3V14.75h-3Zm8.3 0h3V14.75h-3Zm-13.6-24.2V39Z"
                                                                ></path>
                                                              </svg>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="ref-price-col">
                                                      <div class="ref-product-price">' . number_format($productPrice, 2) . '    </div>
                                                    </div>
                                                    <div class="ref-quantity-col">
                                                      <div class="ref-product-quantity">
                                                        <div
                                                          class="ref-quantity-container"
                                                          data-reflow-product="1065684752"
                                                          data-reflow-max-qty="999"
                                                          data-reflow-quantity="2"
                                                        >
                                                          <div class="ref-quantity-widget">
                                                            <div class="ref-decrease"><span></span></div>
                                                            <input type="text" value="1" />
                                                            <div class="ref-increase"><span></span></div>
                                                          </div>
                                                        </div>
                                                        <div class="ref-product-qty-message"></div>
                                                        <div class="ref-product-remove">Remove</div>
                                                      </div>
                                                    </div>
                                                    <div class="ref-total-col">
                                                      <div class="ref-product-total">
                                                        <div class="ref-product-total-sum">$18.98</div>
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
                                            <a href="https://google.com" target="_blank">Terms &amp; Conditions</a><a href="https://google.com" target="_blank">Privacy Policy</a><a href="https://google.com" target="_blank">Refund Policy</a>
                                        </div>
                                        <div class="ref-totals">
                                            <div class="ref-subtotal">Subtotal: $<?php echo number_format($total, 2); ?></div>
                                            <form class="ref-accept-terms" style="display: block">
                                                <label><input id="ref-terms-agreement" type="checkbox" data-state-src="accept-terms" required /><span class="ref-terms-agreement-text"><span>I agree to the </span><a href="https://google.com">Terms &amp; Conditions</a><span>, </span><a href="https://google.com">Privacy Policy</a><span> and </span><a href="https://google.com">Refund Policy</a></span></label>
                                            </form>

                                            <div class="ref-button ref-standard-checkout-button">
                                                Checkout
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
                                        success: function(response) {
                                            console.log(response);
                                            // You can update the UI here if needed
                                        }
                                    });
                                }
                            </script>

                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" />
                            < script src="https://cdn.reflowhq.com/v2/toolkit.min.js">
                                </script>
                                <script src="assets/js/bs-init.js"></script>
                                <script src="assets/js/bold-and-bright.js"></script>

</body>

</html>