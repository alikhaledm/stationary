<?php
require_once("connect.php"); ?>





<?php
// ini_set('display_errors', 'Off');
require_once("connect.php");
include("navbar.php");

$userid = $_SESSION['id'];
if (isset($_POST["query"])) {
    $userid = $_SESSION['id'];
}


//get address
$getorders = "SELECT * FROM orders WHERE userid = $userid";
$resultorder = mysqli_query($conn, $getorders);



?>





<html>

<head>
    <title>orders</title>
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
</style>

<body>
    <?php
    include("spinner.php");
    ?>


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

            <a href="orders.php" class="customa" style="color:#ebbf2f">My Orders</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
            <a href="address.php" class="customa">My Addresses</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
            <a href="wallet.php" class="customa">My Wallet</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
        </div>
        <hr>
    </div>
    <div class="container-account pt-3">
        <div class="row">
            <div class="col-md-6"><b style="font-size:20;">My orders</b></div>
        </div>
    </div>
    <div class="container-account" style="padding-bottom:100px;">
        <div class="row">
            <div class="col-md-12">View your order history or check the status of a recent order.</div>
            <br><br>
            <hr>

            <div class="card border-dark">
                <div class="row card-header text-bg-secondary">
                    <div class="col-md-6">
                        <h4>Order</h4>
                    </div>
                    <div class="col-md-2">#1</div>

                </div>





                <?php
                if ($resultorder) {
                    while ($rowData3 = mysqli_fetch_assoc($resultorder)) {
                        $orderid = $rowData3['id'];
                        $orderdate = $rowData3['date'];
                        $addressid = $rowData3['addressid'];
                        $i = 1;

                        echo '<div class="details__user" style="padding-top:20;">
                        <div class="card-body bg-transparent ">
                        <div id="text" style="display:none;">
                            <h5 class="card-title">Products Ordered:</h5> <h6><b>Order ID: ' . $orderid . '</b></h6>
                            <hr>
                            <h5 class="card-title">Products Total Price:</h5>
                            <hr>
                            <h5 class="card-title">Deliverd to:</h5><h6>Address ID: ' . $addressid . '</h6>
                            <hr>
                            <p class="card-text">Date: </p> <h6>' . $orderdate . ' st,</h6>
                        </div>
                        <center>
                            <button type="button" id="show-button" class="btn">More Details</button>
                            <br>
                        </center>
        <div class="row">
          <div class="col-9">
            
          </div>
          <div class="col">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
          </div>
        </div>
        
      </div>
      <br>';

                        // Assign the selected addressid to a session variable
                        $_SESSION['selected_addressid'] = $addressid;
                    }
                }
                ?>







                <script>
                    // Get references to the button and text elements
                    const showButton = document.getElementById('show-button');
                    const text = document.getElementById('text');

                    // Add click event listener to the button
                    showButton.addEventListener('click', () => {
                        // Toggle the display of the text element
                        if (text.style.display === 'none') {
                            text.style.display = 'block';
                            showButton.textContent = 'Hide';
                        } else {
                            text.style.display = 'none';
                            showButton.textContent = 'More Details';
                        }
                    });
                </script>


                <center>
                    <br>
                    <div class="card-footer text-body-secondary border-dark  bg-transparent">2 days ago</div>
                </center>
            </div>
        </div>
    </div>
    </div>

</body>

</html>

<?php
include("footer.php")
    ?>