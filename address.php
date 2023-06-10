<?php
include("spinner.php");
?>
<?php
require_once("connect.php"); ?>

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
$resultorder = mysqli_query($conn, $getAddress);



?>

<head>
    <title>My Address</title>
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
            <a href="address.php" style="color:#ebbf2f" class="customa">My Addresses</a> &nbsp; &nbsp; &nbsp;
            &nbsp;&nbsp;
            <a href="wallet.php" class="customa">My Wallet</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;

        </div>
        <hr>
    </div>

    <div class="container-account pt-3">
        <div class="row">
            <div class="col-md-6"><b style="font-size:20;">My Addresses</b></div>
        </div>
    </div>
    <div class="container-account" style="padding-bottom:100px;">
        <div class="row">
            <div class="col-md-12"><br>
                <?php
                if ($resultorder) {
                    while ($rowData3 = mysqli_fetch_assoc($resultorder)) {
                        $title = $rowData3['title'];
                        $city = $rowData3['city'];
                        $area = $rowData3['area'];
                        $zip = $rowData3['zip'];
                        $street = $rowData3['street'];
                        $addressid = $rowData3['id'];
                        $i = 1;

                        echo '<div class="details__user">
        <div class="row">
          <div class="col-9">
            <h6><b>' . $title . '</b></h6>
          </div>
          <div class="col">
            <a href="deleteaddress.php?address_id=' . $addressid . '" class="delete-btn">Delete Address</a>
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
      <br>';

                        // Assign the selected addressid to a session variable
                        $_SESSION['selected_addressid'] = $addressid;
                    }
                }
                ?>


                <a href="#" id="openAddressBox">
                    <button class="checkoutbtn">
                        <img width="16px" src="images/address.svg">&nbsp;<u>Add a new address</u>
                    </button>
                </a>

                <div id="addressBoxOverlay">
                    <div id="addressBox">
                        <button id="closeAddressBox">X</button>
                        <form action="process_address2.php" method="POST">

                            <div class="row">

                                <div class="col-6">
                                    <div> <label for="title">Address Title</label></div>
                                    <input type="text" name="address_title" placeholder="Title" required>
                                </div>

                                <div class="col-6">
                                    <div> <label for="name">Area:</label></div>
                                    <input type="text" name="area" placeholder="Area" required>
                                </div>


                                <div class="col-6">
                                    <div><label for="street">Street Address:</label></div>
                                    <input type="text" name="street" placeholder="Street" required>
                                </div>


                                <div class="col-6">
                                    <div><label for="city">City:</label></div>
                                    <input type="text" name="city" placeholder="City" required>
                                </div>


                                <div class="col-6">
                                    <div> <label for="state">State:</label></div>
                                    <input type="text" name="zip_code" placeholder="Zip Code" required>
                                </div>

                                <div class="col-12" style="padding-top:20;">
                                    <div></div>
                                    <button type="submit" class="addressbtn">Save Address</button>

                                </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .checkoutbtn {
            border: none;
            background-color: white;
            color: black;
            text-decoration: none;
        }

        .addressbtn {
            width: 190px;
            height: 35px;
            background-color: gold;
            color: white;
            border: none;
        }

        .addressbtn:hover {
            background-color: orange;
        }

        .addressform {
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .checkoutbtn:hover {
            color: gold;
        }

        #addressBoxOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
        }

        #addressBox {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }

        #closeAddressBox {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }
    </style>

    <script>
        document.getElementById("openAddressBox").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default anchor click behavior
            document.getElementById("addressBoxOverlay").style.display = "block";
        });

        document.getElementById("closeAddressBox").addEventListener("click", function () {
            document.getElementById("addressBoxOverlay").style.display = "none";
        });
    </script>

    </div>
    <br><br>
    <hr>



</body>

</html>

<?php
include("footer.php")
    ?>