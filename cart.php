<?php
require_once("connect.php");
include("navbar.php");

$userid = $_SESSION['id'];
if (isset($_POST["query"])) {
    $userid = $_SESSION['id'];
}

$total = 0;

<<<<<<< Updated upstream
$getotal = "SELECT SUM(products.price * cart.quantity) AS total_price FROM products INNER JOIN cart ON products.id = cart.productid WHERE cart.userid = $userid";
=======
$getotal = "SELECT SUM(products.price) AS total_price FROM products INNER JOIN cart ON products.id = cart.productid WHERE cart.userid = $userid";
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="cartstyles.css">
=======
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
>>>>>>> Stashed changes

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

<<<<<<< Updated upstream
=======
<style>
    .title {
        margin-bottom: 5vh;
    }

    .card {
        margin: auto;
        margin-top: 20px;
        max-width: 950px;
        width: 90%;
        box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border: transparent;
    }

    @media(max-width:767px) {
        .card {
            margin: 3vh auto;
        }
    }

    .cart {
        background-color: #fff;
        padding: 4vh 5vh;
    }

    @media(max-width:767px) {
        .cart {
            padding: 4vh;
        }
    }

    .summary {
        background-color: #ddd;
        padding: 4vh;
        color: rgb(65, 65, 65);
    }


    .summary .col-2 {
        padding: 0;
    }

    .summary .col-10 {
        padding: 0;
    }

    .row {
        margin: 0;
    }

    .title b {
        font-size: 1.5rem;
    }

    .main {
        margin: 0;
        padding: 2vh 0;
        width: 100%;
    }


    a {
        padding: 0 1vh;
    }

    .close {
        margin-left: auto;
        font-size: 0.7rem;
    }

    img {
        width: 3.5rem;
    }

    .back-to-shop {
        margin-top: 4.5rem;
    }

    h5 {
        margin-top: 4vh;
    }

    hr {
        margin-top: 1.25rem;
    }

    form {
        padding: 2vh 0;
    }

    select {
        border: 1px solid rgba(0, 0, 0, 0.137);
        border-radius: 5px;
        padding: 1.5vh 1vh;
        margin-bottom: 4vh;
        outline: none;
        width: 100%;
        background-color: rgb(247, 247, 247);
    }

    input {
        border: 1px solid rgba(0, 0, 0, 0.137);
        padding: 1vh;
        margin-bottom: 4vh;
        outline: none;
        width: 100%;
        background-color: rgb(247, 247, 247);
    }

    input:focus::-webkit-input-placeholder {
        color: transparent;
    }

    .btn {
        background-color: yellow;
        color: white;
        width: 100%;
        font-size: 0.7rem;
        margin-top: 4vh;
        padding: 1vh;
    }

    .btn:focus {
        box-shadow: none;
        outline: none;
        box-shadow: none;
        color: white;
        -webkit-box-shadow: none;
        -webkit-user-select: none;
        transition: none;
    }

    .btn:hover {
        color: white;
    }

    a {
        color: black;
    }

    a:hover {
        color: black;
        text-decoration: none;
    }

    #code {
        border-radius: 5px;
        background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
        background-repeat: no-repeat;
        background-position-x: 95%;
        background-position-y: center;
    }

    /* For WebKit browsers (Chrome, Safari) */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background-color: white;
    }

    ::-webkit-scrollbar-thumb {
        background-color: gray;
    }

    /* For Firefox */
    ::-moz-scrollbar {
        width: 10px;
    }

    ::-moz-scrollbar-track {
        background-color: #f1f1f1;
    }

    ::-moz-scrollbar-thumb {
        background-color: #888;
    }

    /* For Internet Explorer and Microsoft Edge */
    /* Note: Microsoft Edge supports the -ms-overflow-style property */
    /* to customize the scroll bar, but it's not widely supported */
    /* in other versions of IE. */
    /* Therefore, this code may not work in all IE versions. */
    /* It's recommended to test it in your target browsers. */
    .scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #888 #f1f1f1;
    }
</style>

>>>>>>> Stashed changes
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

                <div class="back-to-shop"><a href="products.php">&leftarrow;<span class="text-muted">Back to
                            shop</span></a></div>
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
<<<<<<< Updated upstream
                    <div class="col text-right">$<?php echo number_format($total, 2); ?></div>
=======
                    <div class="col text-right">
                        <?php echo $total; ?>
                    </div>
>>>>>>> Stashed changes
                </div>
                <button class="btn" href="checkout.php">CHECKOUT</button>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>