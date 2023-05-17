<?php
require_once("connect.php");
include("navbar.php");

$userid = $_SESSION['id'];
if (isset($_POST["query"])) {
    $userid = $_SESSION['id'];
}

$total = 0;

$getotal = "SELECT SUM(products.price) AS total_price FROM products INNER JOIN cart ON products.id = cart.productid WHERE cart.userid = $userid";
$result =  mysqli_query($conn, $getotal);
$tagID = mysqli_fetch_assoc($result);

if ($result) {
    $total = $tagID['total_price'];
}
?>

<head>
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

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
</style>

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
                        $selectProducts = "SELECT p.*, c.quantity FROM products p INNER JOIN cart c ON p.id = c.productid WHERE p.id = $rowData[productid]";
                        $result3 = mysqli_query($conn, $selectProducts);
                        if ($result3) {
                            while ($rowData2 = mysqli_fetch_assoc($result3)) {
                                echo '
                                <div class="row border-top border-bottom">
                                    <div class="row main align-items-center">
                                        <div class="col-2"><img class="img-fluid" src="images/Shop/products/' . $rowData2['photo'] . '"></div>
                                        <div class="col">
                                            <div class="row text-muted">' . $rowData2['category'] . '</div>
                                            <div class="row">' . $rowData2['pname'] . '</div>
                                        </div>
                                        <div class="col">Quantity: ' . $rowData2['quantity'] . '</div>
                                        <div class="col">$' . $rowData2['price'] . '<a href="removeCart.php?varname=' . $rowData2['id'] . '"><span class="close">&#10005;</span></a></div>
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
                    <div class="col text-right"><?php echo $total; ?></div>
                </div>
                <button class="btn" href="checkout.php">CHECKOUT</button>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>