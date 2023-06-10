<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
    .rectangular-bar {
        display: flex;
        align-items: center;
        width: 80%;
        height: 40px;
        border: 2px solid black;
    }

    .left-side,
    .right-side {
        width: 40px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .minus-sign,
    .plus-sign {
        font-size: 20px;
        cursor: pointer;
    }

    .middle-section {
        flex-grow: 1;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .number {
        font-size: 16px;
    }
    </style>
</head>

<body>
    <div id="productContainer">
        <?php
        require_once("connect.php");

        // Initialize the shopping cart array in the session
if (!isset($_SESSION['Scart'])) {
  $_SESSION['Scart'] = array();
}
        if (isset($_POST["query"])) {
            $search = mysqli_real_escape_string($conn, $_POST["query"]);
            $query = "SELECT * FROM products WHERE pname LIKE '%" . $search . "%'";
        } elseif (isset($_GET['filter'])) {
            $filter = $_GET['filter'];

            if ($filter == 'lowestprice') {
                $query = "SELECT * FROM products ORDER BY price ASC";
            } elseif ($filter == 'highestprice') {
                $query = "SELECT * FROM products ORDER BY price DESC";
            } else {
                $query = "SELECT * FROM products WHERE category='$filter'";
            }
        } 
        else {
            // Default behavior: Display all products
            $query = "SELECT * FROM products";
        }

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='row myprods'>";
            while ($row = mysqli_fetch_assoc($result)) {
                // Display product details here
                $imageURL = 'images/Shop/products/' . $row["photo"];
                echo "<div class='col-md-4'>";
                echo "<div class='card mb-4 border-0'>";
                echo "<a href='productdetails.php'><img src='" . $imageURL . " ' class='card-img-top'  alt='...'><a/>";
                echo "<div class='card-body'>";
                echo "<center><h5 class='card-title'>" . $row['pname'] . "</h5></center>";
                echo "<center><p class='card-text pb-2'>" . $row['price'] . " EGP</p></center>";
                echo "<div class='rectangular-bar' >
                          <div class='left-side'>
                            <span class='minus-sign' onclick='decrease(0)'>-</span>
                          </div>
                          <div class='middle-section'>
                            <span id='value-0' class='number'>1</span>
                          </div>
                          <div class='right-side'>
                            <span class='plus-sign' onclick='increase(0)'>+</span>
                          </div>
                        </div>
                        <br>";
                echo "<a href='addProductToCart.php?varname=$row[id]' class='btn'  id='btnn'>Add to cart</a>";
                echo "<br><br><a href='productdetails.php' class='btn btn2' >More Details</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>
    </div>

    <script>
    $(document).ready(function() {
        // Handle category filter selection
        $(".category-filter").click(function(e) {
            e.preventDefault();
            var filter = $(this).data('filter');
            filterProducts(filter);
        });

        // Function to retrieve and display filtered products using AJAX
        function filterProducts(filter) {
            $.ajax({
                type: "GET",
                url: "fetch.php",
                data: {
                    filter: filter
                },
                success: function(response) {
                    $("#productContainer").html(response);
                }
            });
        }
    });
    </script>

    <style>
    /* div el kebera */
    .myprods {
        display: flex;
    }

    /* ------ */

    /* div el card */
    .card {
        /* background-color: red; */
        height: 600px;
        align-items: center;

    }

    /* ------ */

    /* card img */
    .card-img-top {
        object-fit: cover;
        height: 300px;
        width: 300px;
        background-color: white;
    }

    /* ------------ */

    /* goz2 2aly shayel el asamy wel btn */
    .card-body {
        width: 100%;

    }

    /* product  name  */
    .card-title {
        color: #0c0129;
    }

    /* --------------- */

    /* price */
    .card-text {
        color: #0c0129;
        font-size: 23px;
    }

    /* --------- */

    /* qunatity */
    .rectangular-bar {
        width: 100%;
        background-color: white;
        border-color: #0c0129;
        color: #0c0129;
        border-style: solid;
        border-width: 1px;
        border-radius: 10px;
    }

    /* ----- */

    /* add to card */
    .btn {
        width: 100%;

        border-radius: 10px;
        background-color: white;
        border-color: #0c0129;
        color: #0c0129;
    }

    .btn:hover {
        background-color: #ebbf2f;
        color: white;
        border-radius: 10px;
    }

    /*  */

    /* ----------- */
    .btn2 {
        width: 100%;
        border-radius: 10px;
        background-color: #0c0129;
        border-color: white;
        color: white;
    }

    .btn2:hover {
        background-color: white;
        color: #0c0129;
        border-color: #0c0129;
        border-radius: 10px;
    }

    /*  */
    </style>
</body>

</html>