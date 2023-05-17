<?php
include("navbar.php")
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
    .container-account {
        padding-left: 50;
        padding-right: 50;
        width: 60%;
        margin-right: auto;
        margin-left: auto;
    }

    .smallimage {
        align-items: center;
        justify-content: center;
    }
</style>

<body>

    <div class="container-account">
        <div class="row">
            <div class="col-md-12">
                <img width="100%" height="300" src="images/account/background.jpg" alt="">
                <div class="small-image" style="position: absolute; top: 60%; left: 5%;">

                    <img class="smallimage" width="100" height="100" src="images/account/profile.png" alt="">
                    <b style="padding-left:10; font-size:23;">Ali Khaled</b>

                </div>
            </div>

        </div>
    </div>

    <div class="container-account">
        <div class="row" style="padding-left:35;">
            <div class="col-md-2"><b style="font-size:17;">My
                    Orders</b></div>
            <div class="col-md-2"><b style="font-size:17;">My
                    Addresses</b></div>
            <div class="col-md-2"><b style="font-size:17;">My
                    Wallet</b></div>
            <div class="col-md-2"><b style="font-size:17;">My
                    Wishlist</b></div>
            <div class="col-md-2"><b style="font-size:17;">My
                    Subscription</b></div>
            <div class="col-md-2"><b style="font-size:17;">My
                    Account</b></div>
        </div>
    </div>

    <div class="container-account" style="padding-top:50; padding-bottom:50;">
        <div class="row" style="padding-left:35;">
            <div class="col-md-4"><b style="font-size:20;">My Account</b></div>

            <div style="padding-left:280;" class="col-md-4"><button>Discard</button></div>
            <div class="col-md-4"><button>Update Info</button></div>


        </div>
    </div>




</body>

</html>

<?php
include("footer.php")
    ?>