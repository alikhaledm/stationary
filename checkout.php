<html>
<?php
// ini_set('display_errors', 'Off');
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

//get creditcard
$getCreditCard = "SELECT * FROM creditcard WHERE userid = $userid";
$result5 = mysqli_query($conn, $getCreditCard);

// if user has more than 3 cards stored in db then dont allow him to save more
if (isset($_POST['savecard'])) {
  if (mysqli_num_rows($result5) >= 3) {
    echo '<script>alert("You can only save 3 cards.")</script>';
    echo '<script>window.location.href = "checkout.php";</script>';
    exit();
  }
}

// insert credit card
if (isset($_POST['savecard'])) {
  $ccn = $_POST['ccn'];
  $chn = $_POST['chn'];
  $cvv = $_POST['cvv'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $expdate = $month . "/" . $year;

  //if $expdate is not numbers then ask user to enter valid expiry date and exit and refresh page
  if (!is_numeric($month) || !is_numeric($year)) {
    echo '<script>alert("Please enter a valid expiry date.")</script>';
    echo '<script>window.location.href = "checkout.php";</script>';
    exit();
  }

  // Insert the credit card details into the creditcard table
  $insertCardQuery = "INSERT INTO creditcard (userid, cardnumber, cardholdername, expirydate, cvv) VALUES ('$userid', '$ccn', '$chn', '$expdate', '$cvv')";
  $insertCardResult = mysqli_query($conn, $insertCardQuery);

  if ($insertCardResult) {
    header("location: checkout.php");
  } else {
    echo "Error: Unable to save credit card details.";
    // Handle the error appropriately
  }
}

if (isset($_POST['placeorder'])) {
}

?>

<head>
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="checkoutstyles.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <style>
    @media (min-width: 1025px) {
      .h-custom {
        height: 100vh !important;
      }
    }

    hr {
      background-color: black;
    }

    /* Parent Container */
    .content_img {
      position: absolute;
      height: 200px;
      float: left;
    }

    .echo {
      font-weight: lighter;
      color: grey;
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
            <svg xmlns="http://www.w3.org/2000/svg" width="32" style="padding-bottom: 7px; padding-right: 7px;" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
              <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
            </svg>
            <h4><b> My Saved Cards</b></h4>
          </div>
          <div class="container" style="width: 82.5%; margin-left:0; padding-left:0;">
            <?php
            if ($result5) {
              // check if creditcard table in db is empty
              if (mysqli_num_rows($result5) == 0) {
                echo '<div class="echo">You have no saved cards.</div>';
              }
              while ($rowData4 = mysqli_fetch_assoc($result5)) {
                $cardholdername = $rowData4['cardholdername'];
                $cardnumber = $rowData4['cardnumber'];
                $expiry = $rowData4['expirydate'];
                $code = $rowData4['cvv'];

                // replace the first 12 characters of $cardnumber with X and also - between every 4 characters
                $cardnumber = substr_replace($cardnumber, str_repeat("X", 12), 0, 12);
                $cardnumber = substr_replace($cardnumber, " ", 4, 0);
                $cardnumber = substr_replace($cardnumber, " ", 9, 0);
                $cardnumber = substr_replace($cardnumber, " ", 14, 0);

                // remove the last 2 characters from expiry
                $expiry = substr($expiry, 0, -3);

                echo '<div class="details__user">
            <div class="row">
              <div class="col-1">
                <input type="radio" name="card" style="margin-top: 2px;" oninput="validateInput(this)">
              </div>
              <div class="col-9">
                <h6><b>Card Number: ' . $cardnumber . '</b></h6>
              </div>
              <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
              </div>
            </div>
            <div id="myDIV">
              <h6><b>Card Holder Name: </b>' . $cardholdername . '</h6>
              <h6><b>Expiry Date: </b>' . $expiry . '</h6>
              <h6><b>CVV: </b>' . $code . '</h6>
              </div>
              </div>
            <br>';
              }
            }
            ?>
            <hr>
            <h4><svg xmlns="http://www.w3.org/2000/svg" width="25" style="margin-right: 8px; margin-bottom:5px;" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
              </svg><b>Add New Card</b> </h4>
          </div>
          <form method="POST">
            <div class="form__cc" id="new-credit-card-container">
              <div class="row">
                <div class="field ">
                  <div class="title">Credit Card Number</div>
                  <input type="text" name="ccn" size="23" minlength="16" maxlength="16" class="input txt text-validated" placeholder="1234 1234 1234 1234" oninput="validateInput(this)" required />
                </div>
                <div class="field ">
                  <div class="title">CVV Code
                  </div>
                  <input type="text" name="cvv" class="input txt" size="13" min="3" maxlength="3" placeholder="123" oninput="validateInput(this)" required />
                </div>
              </div>
              <div class="row">
                <div class="field ">
                  <div class="title">Name on Card
                  </div>
                  <!-- dont allow number to inputed on chn -->
                  <input type="text" oninput="validatetext(event)" name="chn" size="23" maxlength="35" class="input txt" placeholder="John Doe" required />
                </div>
                <div class="field ">
                  <div class="title">Expiry Date
                  </div>
                  <select class="input ddl" name="month" required="required">
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
                  <select class="input ddl" name="year" required>
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
            <br>
            <input type="submit" class="btn action__submit" name="savecard" value="Save Card" style="background:black;">
          </form>
        </div>
        <div class="payment__shipping">
          <div class="payment__title">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" style="padding-bottom: 7px; padding-right: 7px;" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
              <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
            </svg>
            <h4><B>My Saved Addresses</B></h4>
          </div>
          <?php
          if ($result4) {
            while ($rowData3 = mysqli_fetch_assoc($result4)) {
              $title = $rowData3['title'];
              $city = $rowData3['city'];
              $area = $rowData3['area'];
              $zip = $rowData3['zip'];
              $street = $rowData3['street'];
              $i = 1;

              echo '<div class="details__user">
            <div class="row">
              <div class="col-1">
                <input type="radio" name="address" style="margin-top: 2px;">
              </div>
              <div class="col-9">
                <h6><b>' . $title . '</b></h6>
              </div>
              <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
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
                <svg xmlns="http://www.w3.org/2000/svg" width="30" style="padding-right: 8px;" fill="currentColor" class="bi bi-building-add" viewBox="0 0 16 16">
                  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z" />
                  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1V1Z" />
                  <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                </svg>
                Add New Shipping Address
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
        <a href="thankyou.php"><button class="btn action__submit" style="background-color: #fbd334;" name="placeorder"> Place your Order</button>
        </a>

        <a href="cart.php" class="backBtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" style="margin-right: 5px;" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
          </svg>Back to Cart</a>

      </div>
      </section>
    </div>
  </div>
  <script>
    function toggleNewCreditCard() {
      var container = document.getElementById("new-credit-card-container");
      var inputs = container.getElementsByTagName("input");
      var texts = container.getElementsByTagName("h6");

      if (inputs[0].checked) {
        // Enable inputs and remove grayed out style
        for (var i = 0; i < inputs.length; i++) {
          inputs[i].disabled = false;
        }
        for (var i = 0; i < texts.length; i++) {
          texts[i].classList.remove("grayed-out");
        }
      } else {
        // Disable inputs and add grayed out style
        for (var i = 0; i < inputs.length; i++) {
          inputs[i].disabled = true;
        }
        for (var i = 0; i < texts.length; i++) {
          texts[i].classList.add("grayed-out");
        }
      }
    }

    function validateInput(input) {
      // Remove any non-digit characters
      input.value = input.value.replace(/\D/g, '');
    }

    // Function to validate input and allow only text
    function validatetext(event) {
      var input = event.target;

      // Remove any non-alphabetic characters
      input.value = input.value.replace(/[^a-zA-Z]/g, '');

      // Prevent the input of numbers
      if (!isNaN(input.value)) {
        input.value = '';
      }
    }
  </script>
</body>
<?php
include("footer.php")
?>

</html>