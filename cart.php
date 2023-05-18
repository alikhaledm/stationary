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

// Update quantity if the checker is checked
if (isset($_POST['update_quantity'])) {
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];

    $updateQuery = "UPDATE cart SET quantity = $newQuantity WHERE userid = $userid AND productid = $productId";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "Quantity updated successfully.";
    } else {
        echo "Error updating quantity: " . mysqli_error($conn);
    }
}
?>

<html>

<head>
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="cartstyles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

        // Event listener for the checkbox
        const checker = document.getElementById('checker');
        const quantityInput = document.getElementById('quantity');

        checker.addEventListener('change', function() {
            const productId = quantityInput.dataset.productId;
            const newQuantity = this.checked ? quantityInput.value : 1;
            updateQuantity(productId, newQuantity);
        });
    </script>
</head>

<body>
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted"> 3 items</div>
                    </div>
                </div>

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

                                echo '
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center" style="padding:0;">
                        <div class="col-2"><img class="img-fluid" src="images/Shop/products/' . $rowData2['photo'] . '"></div>
                        <div class="col">
                            <div class="row text-muted">' . $rowData2['category'] . '</div>
                            <div class="row">' . $rowData2['pname'] . '</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form action="" method="POST" class="update-form">
                                    <input type="hidden" name="product_id" value="' . $productId . '">
                                    <div class="quantity-input">
                                        <input type="number" name="quantity" id="quantity" min="1" value="' . $quantity . '" data-product-id="' . $productId . '">
                                        <button type="submit" name="update_quantity" class="update-button"><i class="fa fa-check-circle" id="checker" style="color:green;"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col">$' . ($productPrice * $quantity) . '</div>
                        <div class="col"><a href="cart.php?remove=' . $cartId . '"><span class="close">&#10005;</span></a></div>
                    </div>
                </div>';
                            }
                        }
                    }
                }
                ?>

                <div class="back-to-shop"><a href="products.php">&leftarrow;<span class="text-muted">Back to shop</span></a></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <form>
                    <p>SHIPPING</p>
                    <select>
                        <option class="text-muted">In Egypt Delivery - EGP50.00</option>
                        <option class="text-muted">International Shipping - EGP350.00</option>
                    </select>
                    <p>GIVE CODE</p>
                    <input id="code" placeholder="Enter your code">
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">$<?php echo number_format($total, 2); ?></div>
                </div>
                <button class="btn" href="checkout.php">CHECKOUT</button>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>