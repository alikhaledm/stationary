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

    .discard {
        width: 100;
        height: 35;
        background-color: white;
        color: black;
        border: none;
    }

    .discard:hover {
        background-color: black;
        color: white;
        border: none;

    }

    .update {
        width: 115;
        height: 35;
        background-color: black;
        color: white;
        opacity: 0.6;
        border: none;
    }

    .update:hover {
        background-color: black;
        color: white;
        border: none;
        opacity: 1;

    }

    .input {
        width: 70%;
        height: 35;

    }
</style>

<body>

    <div class="container-account" id="fade-container">
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




    <div class="container-account" id="fade-container2">
        <div class="row">
            <div class="col-md-2"><b style="font-size:18;">My
                    Orders</b></div>
            <div class="col-md-2"><b style="font-size:18;">My
                    Addresses</b></div>
            <div class="col-md-2"><b style="font-size:18;">My
                    Wallet</b></div>
            <div class="col-md-2"><b style="font-size:18;">My
                    Wishlist</b></div>
            <div class="col-md-2"><b style="font-size:18;">My
                    Subscription</b></div>
            <div class="col-md-2"><b style="font-size:16;">My
                    Account</b></div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#fade-container').hide().fadeIn(4000); // Change the duration (in milliseconds) as desired
        });

        $(document).ready(function () {
            $('#fade-container2').hide().fadeIn(4000); // Change the duration (in milliseconds) as desired
        });
    </script>


    <div class="container-account" style="padding-top:50;">
        <div class="row">
            <div class="col-md-6"><b style="font-size:20;">My Account</b></div>

            <div class="col-md-6"><button class="discard">Discard</button> <button class="update">Update Info</button>
            </div>



        </div>
    </div>
    <div class="container-account" style="padding-top:30; padding-bottom:100;">
        <div class="row">
            <div class="col-md-12">View and edit your personal info below.</div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="col-md-12">
                <div style="font-size:20;"><b>Account</b></div>
            </div>
            <div style="padding-top:10;" class="col-md-12">
                <div style="font-size:15;">Update your personal information.</div>
            </div>
            <div style="padding-top:10;" class="col-md-12">
                <div style="font-size:15;"><b>Login Email:</b></div>
            </div>
            <div class="col-md-12">
                <div style="font-size:15;">Yousefelfiky@gmail.com</div>
            </div>
            <div class="col-md-12">
                <div style="font-size:13;">Your Login email can't be changed</div>
            </div>

            <div style="padding-top:20;" class="col-md-6">
                <div style="font-size:20;">First Name</div>
            </div>
            <div style="padding-top:20;" class="col-md-6">
                <div style="font-size:20;">Last Name</div>
            </div>
            <div style="padding-top:20;" class="col-md-6">
                <div style="font-size:20;"><input class="input" type="text"></div>
            </div>
            <div style="padding-top:20;" class="col-md-6">
                <div style="font-size:20;"><input class="input" type="text"></div>
            </div>
            <div style="padding-top:20;" class="col-md-6">
                <div style="font-size:20;">Email *</div>
            </div>
            <div style="padding-top:20;" class="col-md-6">
                <div style="font-size:20;">Phone</div>
            </div>
            <div style="padding-top:20;" class="col-md-6">
                <div style="font-size:20;"><input class="input" type="text"></div>
            </div>
            <div style="padding-top:20;" class="col-md-6">
                <div style="font-size:20;"><input class="input" type="text"></div>
            </div>
            <div class="col-md-6"></div>
            <div style="padding-top:70;" class="col-md-6"><button class="discard">Discard</button> <button
                    class="update">Update Info</button>
            </div>

        </div>
    </div>




</body>

</html>

<?php
include("footer.php")
    ?>