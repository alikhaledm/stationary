<?php
include("navbar.php");
?>
<html>
<title>School Supplies List</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<style>
    .card {
        width: 300;
        height: 300;
        justify-content: center;
        align-items: center;
    }

    .cardsmall {
        width: 100;
        height: 200;
        justify-content: center;
        align-items: center;
    }

    .bfont {
        font-size: 30;
    }

    p {
        font-size: 20;
    }

    .bsmallerfont {
        font-size: 20;
    }

    .btnproductdetails {
        border: none;
        background-color: #FAD43D;
        border-radius: 2px;
        width: 150px;
        height: 40px;
    }

    .btnproductdetails:hover {
        background-color: orange;
        color: balck;
        border: none;
        width: 150px;
        height: 40px;
    }

    .centered {
        display: flex;
        align-items: center;
        justify-content: center;
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

<body>
    <div class="container" style="padding-bottom:100; padding-top:100;">
        <div class="row">
            <div class="col-md-6 centered">
                <div class="card">
                    <img width="200" height="200" src="images/shop/products/blue_pen.jpg" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <b class="bfont"> Blue Pen</b><br>
                <hr>

                <div class="bsmallerfont">Type: Zebra<br>Durablity: 4,000 words
                </div> $ 2.99
                <div style="padding-top:100;">
                    <br><button class="btnproductdetails">Add to cart</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <hr>

    <div class="container" style="padding-bottom:100; padding-top:100;">
        <div class="row">
            <div class="col-md-12 centered" style="padding-bottom:50;">

                <h1> Suggested products</h1>
            </div>

            <div class="col-md-4 centered">
                <div class="card">
                    <a href="productdetails.php">
                        <img width="100%" height="200" src="images/shop/products/notebook.jpeg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-4 centered">
                <div class="card">
                    <a href="productdetails.php">
                        <img width="100%" height="200" src="images/shop/products/pencils.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-4 centered">
                <div class="card">
                    <a href="productdetails.php">
                        <img width="100%" height="200" src="images/shop/products/calculator.jpg" alt="">
                    </a>
                </div>
            </div>

            <div class="col-md-4 centered">
                <h3>Notebook</h3>
            </div>
            <div class="col-md-4 centered">
                <h3>Pencils</h3>
            </div>
            <div class="col-md-4 centered">
                <h3>Calculator</h3>
            </div>


        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div style="padding-top:245;"></div>
    <hr>

</body>

<?php
include("footer.php")
    ?>