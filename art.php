<?php
require_once("connect.php");
include("navbar.php")
    ?>
<html>
<title>School Supplies List</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">


<style>
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

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="lineshop" style="padding-top:30;"></div>
            <div class="col-md-12 text-center" style="padding-bottom: 30;">
                <h2>SHOP</h2>
            </div>
            <div class="lineshop"></div>
        </div>
    </div>

    <div class=container-fluid>
        <div class=row>
            <div class=col-md-1>
                <div style="font-size:30;">FILTER BY<br></div>
                <hr>
                <div style="font-size:15;">CATEGORY</div><br>
                <div><B><a href="">ALL</a></div>
                <div><a href="">Best Sellers</a></div>
                <div><a href="">KIDS ART</a></div>
                <div><a href="">SALE</a></div>
                <hr><a href="">LEAST PRICE</a></b>
                <HR>


            </div>

            <div class="col-md-3 text-center" style="padding-top: 50px; padding-left:250px;"><img
                    style="max-width: 100%;" width="330px" height="200px" src="images/supplies-list-1.jpg" alt="">
                <BR><a href="cart.php"><button>Add to Cart</button></a>
                <div class="bar">
                    <button onclick="decrease(0)">-</button>
                    <span class="number" id="value-0">0</span>
                    <button onclick="increase(0)">+</button>
                </div>

            </div>

            <div class="col-md-3 text-center" style="padding-top: 50px; padding-left:250px;"><img
                    style="max-width: 100%;" width="330px" height="200px" src="images/supplies-list-1.jpg" alt="">
                <BR><a href="cart.php"><button>Add to Cart</button></a>
                <div class="bar">
                    <button onclick="decrease(1)">-</button>
                    <span class="number" id="value-1">0</span>
                    <button onclick="increase(1)">+</button>
                </div>


            </div>

            <div class="col-md-3 text-center" style="padding-top: 50px; padding-left:250px;"><img
                    style="max-width: 100%;" width="330px" height="200px" src="images/supplies-list-1.jpg" alt="">
                <BR><a href="cart.php"><button>Add to Cart</button></a>
                <div class="bar">
                    <button onclick="decrease(2)">-</button>
                    <span class="number" id="value-2">0</span>
                    <button onclick="increase(2)">+</button>
                </div>

            </div>

            <script>
                var barData = [{
                    value: 0
                },
                {
                    value: 0
                },
                {
                    value: 0
                }
                ];

                function increase(index) {
                    var currentValue = barData[index].value;
                    barData[index].value = currentValue + 1;
                    updateNumberElement(index);
                }

                function decrease(index) {
                    var currentValue = barData[index].value;
                    if (currentValue > 0) {
                        barData[index].value = currentValue - 1;
                        updateNumberElement(index);
                    }
                }

                function updateNumberElement(index) {
                    var numberElement = document.getElementById("value-" + index);
                    numberElement.textContent = barData[index].value;
                }
            </script>



        </div>

    </div>



    <div class=container-fluid>
        <div class=row>
            <div class=col-md-1>

            </div>

            <div class="col-md-3 text-center" style="padding-top: 50px; padding-left:250px;"><img
                    style="max-width: 100%;" width="330px" height="200px" src="images/supplies-list-1.jpg" alt="">
                <BR><a href="cart.php"><button>Add to Cart</button></a>

            </div>

            <div class="col-md-3 text-center" style="padding-top: 50px; padding-left:250px;"><img
                    style="max-width: 100%;" width="330px" height="200px" src="images/supplies-list-1.jpg" alt="">
                <BR><a href="cart.php"><button>Add to Cart</button></a>

            </div>

            <div class="col-md-3 text-center" style="padding-top: 50px; padding-left:250px;"><img
                    style="max-width: 100%;" width="330px" height="200px" src="images/supplies-list-1.jpg" alt="">
                <BR><a href="cart.php"><button>Add to Cart</button></a>

            </div>


        </div>

    </div>


    <div class=container-fluid>
        <div class=row>
            <div class=col-md-1>

            </div>

            <div class="col-md-3 text-center" style="padding-top: 50px; padding-left:250px;"><img
                    style="max-width: 100%;" width="330px" height="200px" src="images/supplies-list-1.jpg" alt="">
                <BR><a href="cart.php"><button>Add to Cart</button></a>

            </div>

            <div class="col-md-3 text-center" style="padding-top: 50px; padding-left:250px;"><img
                    style="max-width: 100%;" width="330px" height="200px" src="images/supplies-list-1.jpg" alt="">
                <BR><a href="cart.php"><button>Add to Cart</button></a>

            </div>

            <div class="col-md-3 text-center" style="padding-top: 50px; padding-left:250px;"><img
                    style="max-width: 100%;" width="330px" height="200px" src="images/supplies-list-1.jpg" alt="">
                <BR><a href="cart.php"><button>Add to Cart</button></a>

            </div>



        </div>

    </div>


    <script>
        $(document).ready(function () {

            load_data();

            function load_data(query) {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
            $('#search_text').keyup(function () {
                var search = $(this).val();
                if (search != '') {
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });
    </script>


</body>


</html>

<?php
include("footer.php")
    ?>