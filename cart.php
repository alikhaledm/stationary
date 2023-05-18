<?php
require_once("connect.php");
include("navbar.php");

$userid = $_SESSION['id'];
if (isset($_POST["query"])) {
    $userid = $_SESSION['id'];
}

// Function to update cart quantity
function updateCartQuantity($cartId, $quantity)
{
    global $conn;
    $updateQuery = "UPDATE cart SET quantity = $quantity WHERE id = $cartId";
    mysqli_query($conn, $updateQuery);
}

// Remove item from cart
if (isset($_GET['remove'])) {
    $cartId = $_GET['remove'];
    $deleteQuery = "DELETE FROM cart WHERE id = $cartId";
    mysqli_query($conn, $deleteQuery);
    header("Location: cart.php");
    exit();
}

$total = 0;

$getotal = "SELECT SUM(products.price * cart.quantity) AS total_price FROM products INNER JOIN cart ON products.id = cart.productid WHERE cart.userid = $userid";
$result = mysqli_query($conn, $getotal);
$tagID = mysqli_fetch_assoc($result);

if ($result) {
    $total = $tagID['total_price'];
}

?>

<head>
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheer" href="cartstyles.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                <input type="hidden" name="cartId" value="' . $cartId . '">
                                <div class="quantity-input">
                                    <input type="number" id="quantity" name="quantity" min="1" value="' . $quantity . '">
                                    <button type="submit" name="updateQuantity" class="update-button"><i class="fa fa-check-circle"  id="checker" style="color:green;"></i></button>
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
                <script>
                    const checker = document.getElementById("checker");
                    checker.addEventListener("click", function() {
                        if (checker.checked) {
                            console.log("Checker is checked");

                            // Retrieve the quantity input value
                            const quantityInput = document.getElementById("quantity");
                            const newQuantity = quantityInput.value;

                            // Send the new quantity to the server using AJAX
                            const xhr = new XMLHttpRequest();
                            xhr.open("POST", "update_quantity.php", true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                    // Handle the response from the server
                                    console.log(xhr.responseText);
                                }
                            };
                            xhr.send("newQuantity=" + encodeURIComponent(newQuantity));
                        }
                    });
                </script>


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