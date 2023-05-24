<html>
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

//get address
$getAddress = "SELECT * FROM address WHERE userid = $userid";
$result4 = mysqli_query($conn, $getAddress);


?>

<head>
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="checkoutstyles.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <style>
    @media (min-width: 1025px) {
      .h-custom {
        height: 100vh !important;
      }
    }
  </style>
</head>

<body>
  <div class="container" style="padding:5vw;">
    <center>
      <h1><b>Complete Your Purchase</b></h1>
      <br><br>
    </center>
    <h2>Cart Summary</h2>
    <p>You Have 10 items In Your Cart</p>
    <br>
    <div class="card">
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

              // Truncate product name if more than 15 characters
              $productName = strlen($rowData2['pname']) > 25 ? substr($rowData2['pname'], 0, 25) . ".." : $rowData2['pname'];

              echo '
      <div class="card-body" >
        <div class="d-flex justify-content-between" >
          <div class="d-flex flex-row align-items-center">
            <div>
              <img src="images/Shop/products/' . $rowData2['photo'] . '"" alt="Shopping item" style="width: 60px; height: 60px">
            </div>
            <div>
              <h5 >' . $productName . '</h5>
            </div>
          </div>
              <input type="hidden" name="product_id" value="' . $productId . '" >
            <div>
              <h5 >$' . number_format($productPrice, 2) . ' <b>x' . $quantity . '</h5>
        </div>
        </div>
        </div>';
            }
          }
        }
      }
      ?>
    </div>
  </div>
  <center>
    <div class="row">
      <div class="col">TOTAL PRICE</div>
      <div class="col">$<?php echo number_format($total, 2); ?>
      </div>
  </center>
  <div class="container">
    <div class="payment">
      <div class="payment__title">
        Payment Method
      </div>
      <div class="payment__types">
        <div class="payment__type payment__type--cc active">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" style="margin-right:8px" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z" />
          </svg>Credit Card
        </div>
        <div class="payment__type payment__type">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" fill="currentColor" style="margin-right:8px" class="bi bi-cash" viewBox="0 0 16 16">
            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
            <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
          </svg>Cash On Delivery
        </div>
      </div>

      <div class="payment__info">
        <div class="payment__cc">
          <div class="payment__title">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" style="margin-right:4px" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
            </svg>Personal Information
          </div>
          <form>
            <div class="form__cc">
              <div class="row">
                <div class="field">
                  <div class="title">Credit Card Number
                  </div>
                  <input type="text" class="input txt text-validated" value="4542 9931 9292 2293" />
                </div>
                <div class="field small">
                  <div class="title">CVV Code
                    <span class="numberCircle">?</span>
                  </div>
                  <input type="text" class="input txt" size="11" />
                </div>
              </div>
              <div class="row">
                <div class="field">
                  <div class="title">Name on Card
                  </div>
                  <input type="text" class="input txt" />
                </div>
                <div class="field small">
                  <div class="title">Expiry Date
                  </div>
                  <select class="input ddl">
                    <option disabled selected hidden>mm</option>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                  </select>
                  <select class="input ddl">
                    <option disabled selected hidden>yy</option>
                    <option>23</option>
                    <option>24</option>
                    <option>25</option>
                    <option>26</option>
                    <option>27</option>
                    <option>28</option>
                    <option>29</option>
                    <option>30</option>
                    <option>31</option>
                    <option>32</option>
                    <option>33</option>
                    <option>34</option>
                    <option>35</option>
                  </select>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="payment__shipping">
          <div class="payment__title">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" style="margin-right: 8px;" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
              <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
            </svg> Shipping Information
          </div>
          <?php
          if ($result4) {
            while ($rowData3 = mysqli_fetch_assoc($result4)) {
              $title = $rowData3['title'];
              $city = $rowData3['city'];
              $area = $rowData3['area'];
              $zip = $rowData3['zip'];
              $street = $rowData3['street'];

              echo '<div class="details__user">
            <div class="row">
              <div class="col-1">
                <input type="radio" name="address" style="margin-top: 2px;">
              </div>
              <div class="col-9">
                <h6><b>' . $title . '</b></h6>
              </div>
              <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" onclick="myFunction()" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
              </div>
            </div>
            <div id="myDIV">
              <h6>' . $area . '</h6>
              <h6>' . $street . ' st,</h6>
              <h6>' . $city . '</h6>
              <h6>' . $zip . '</h6>
            </div>
          </div>
          <br>
          ';
            }
          }
          ?>
          <a href="">
            <div class="details__user">
              <div class="user__name">
                <input type="radio" name="address" style="margin-top: 2px; margin-right:5px;">
                Add New Shipping Address <svg xmlns="http://www.w3.org/2000/svg" width="18" style="margin-left:10" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
              </div>
            </div>
          </a>

        </div>
      </div>
    </div>
    <div class="container">
      <div class="actions">
        <div class="secure" style="margin-bottom: 12px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" fill="currentColor" class="bi bi-file-lock2" viewBox="0 0 16 16">
            <path d="M8 5a1 1 0 0 1 1 1v1H7V6a1 1 0 0 1 1-1zm2 2.076V6a2 2 0 1 0-4 0v1.076c-.54.166-1 .597-1 1.224v2.4c0 .816.781 1.3 1.5 1.3h3c.719 0 1.5-.484 1.5-1.3V8.3c0-.627-.46-1.058-1-1.224z" />
            <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
          </svg>
          <span>Secure Checkout</span>
        </div>
        <a href="thankyou.php" class="btn action__submit">Place your Order
        </a>

        <a href="cart.php" class="backBtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" style="margin-right: 5px;" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
          </svg>Back to Cart</a>

      </div>
      </section>
    </div>
  </div>
  <script>
    function myFunction() {
      var x = document.getElementById("myDIV");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
  </script>
</body>
<?php
include("footer.php")
?>

</html>