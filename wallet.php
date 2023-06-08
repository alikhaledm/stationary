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
        echo '<script>window.location.href = "wallet.php";</script>';
        exit();
    }

    // Insert the credit card details into the creditcard table
    $insertCardQuery = "INSERT INTO creditcard (userid, cardnumber, cardholdername, expirydate, cvv) VALUES ('$userid', '$ccn', '$chn', '$expdate', '$cvv')";
    $insertCardResult = mysqli_query($conn, $insertCardQuery);

    if ($insertCardResult) {
        echo "<script>window.location.href = 'wallet.php';</script>";
    } else {
        echo "Error: Unable to save credit card details.";
        // Handle the error appropriately
    }
}

if (isset($_POST['placeorder'])) {
}

?>
<html>

<head>
    <title>My wallet</title>
    <link rel="stylesheet" href="stylesacc.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">
</head>
<style>
    svg {
        cursor: pointer;
    }

    .acclink {
        text-decoration: none;
        color: black;
    }

    .customa {
        color: black;
        text-decoration: none;
        font-size: 20px;
        font-weight: bold;
    }

    .customa:hover {
        color: #ebbf2f;
    }

    .customa:active {
        color: red;
    }

    table {
        height: 300px;
        width: 100%;
    }
</style>

<body>


    <div class="container-account" id="fade-container">
        <div class="row">
            <div class="col-md-12">
                <div id="content">
                    <div class="card text-bg-dark">
                        <img src="images/account/1c.png" class="card-img" alt="...">
                        <div class="card-img-overlay">

                        </div>
                    </div>
                    <div>
                    </div>
                    <b style="font-size:25px; color:#ebbf2f;">
                        <?php
                        echo ucfirst($_SESSION['fname']);
                        echo "&nbsp;" . ucfirst($_SESSION['lname']);
                        ?>
                </div>
                </b>
            </div>
        </div>
    </div>


    <div class="container-account" id="fade-container">
        <div class="row">
            <div class="col-md-12">
                <div id="content">
                    <i class="fa-solid fa-camera"></i>
                    <img src="images/" alt="">
                    <p class="text-white">
                </div>
                </b>
            </div>
        </div>



        <hr style="height: 2px solid black">
        <div class="col-12 centercontainer">

            <a href="orders.php" class="customa">My Orders</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
            <a href="address.php" class="customa">My Addresses</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
            <a href="wallet.php" class="customa" style="color:#ebbf2f">My Wallet</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
            <a href="subscription.php" class="customa">My Subscriptions</a>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
            <a href="mystudents.php" class="customa">My Students</a>

        </div>
        <hr>
    </div>
    <div class="container-account pt-3">
        <div class="row">
            <div class="col-md-6"><b style="font-size:20;">My Wallet</b></div>
        </div>
    </div>
    <div class="container-account" style="padding-bottom:100px;">
        <div class="row">

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
         
              <div class="col-9" style="padding-top:30;">
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
                <h4><svg xmlns="http://www.w3.org/2000/svg" width="25" style="margin-right: 8px; margin-bottom:5px;"
                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg><b>Add New Card</b> </h4>
            </div>
            <form method="POST">
                <div class="form__cc" id="new-credit-card-container">
                    <div class="row">
                        <div class="field ">
                            <div class="title">Credit Card Number</div>
                            <input type="text" name="ccn" size="23" minlength="16" maxlength="16"
                                class="input txt text-validated" placeholder="1234 1234 1234 1234"
                                oninput="validateInput(this)" required />
                        </div>
                        <div class="field ">
                            <div class="title">CVV Code
                            </div>
                            <input type="text" name="cvv" class="input txt" size="13" min="3" maxlength="3"
                                placeholder="123" oninput="validateInput(this)" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="field ">
                            <div class="title">Name on Card
                            </div>
                            <!-- dont allow number to inputed on chn -->
                            <input type="text" oninput="validatetext(event)" name="chn" size="23" maxlength="35"
                                class="input txt" placeholder="John Doe" required />
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
                <input type="submit" class="btn action__submit" name="savecard" value="Save Card"
                    style="background:black;">
            </form>
        </div>

        <div class="col-md-12">Save your credit and debit card details for faster checkout.</div>
        <br><br>





        <script src="java script/all.min.js"></script>
</body>

</html>