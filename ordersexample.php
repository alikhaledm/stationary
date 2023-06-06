<?php
require_once("connect.php");
include("navbar.php");?>
<html>
    <style>
        .centered {
         justify-content:center;
            align-items:center;
            display:flex;
        }

      
        .orderfont {
            font-size:20px;
        }

        .cutoma {
            color: yellow;
            text-decoration: none;
        }

        .cutoma:hover {
            color: orange;
        }

        .cutoma:active {
            color: red;
        }


    </style>
    <body>
    <div class="container-account centered" id="fade-container2">
        <hr style="height: 2px solid black">
        <div class="row text-center" style="font-size:20px;">
            <div class="col-sm"><a href="orders.php" class="acclink"><b>My Orders</b></a></div>
            <div class="col-sm"><a href="address.php" class="acclink"><b>My Addresses</b></a></div>
            <div class="col-sm"><a href="wallet.php" class="acclink"><b>My Wallet</b></a></div>
            <div class="col-sm"><a href="wishlist.php" class="acclink"><b>My Wishlist</b></a></div>
            <div class="col-sm"><a href="subscription.php" class="acclink"><b>My Subscriptions</b></a></div>
        </div>
        <hr>
    </div>
    </body>
</html>