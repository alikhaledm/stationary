<?php
require_once("connect.php");?>
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
            font-size:20px;
            font-weight :bold;
        }

        .customa:hover {
            color: #ebbf2f;
        }

        .customa:active {
            color: red;
        }

table{
        height: 300px;
        width: 100%;
    }  
        
    </style>

<body>
    <?php
    include("navbar.php");
    ?>
    
    <div class="container-account" id="fade-container">
        <div class="row">
            <div class="col-md-12">
            <div id="content">
            <div class="card text-bg-dark">
  <img src="images/account/1c.png" class="card-img" alt="..." >
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
                <a href="mystudents.php" class="customa" >My Students</a>
                
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
            <div class="col-md-12">Save your credit and debit card details for faster checkout.</div>
            <br><br>


   <table class="table">
    <tr>
        <td>Credit Card</td>  <td>Expiration Date</td>  <td></td>   
    </tr>
    <tr>
        <td><i class="fa-brands fa-cc-mastercard me-2"></i>Master Card (2751)  </td> <td>08/2024</td>   <td><i class="fa-solid fa-check me-2"></i>Default Card</td> <td><i class="fa-solid fa-chevron-down"></i></td>
    </tr>
    <tr>
        <td><i class="fa-brands fa-cc-visa me-2"></i>Visa(2831)</td><td>07/2025</td><td> <a href="" class="text-dark">Set as Defult</a></td><td><i class="fa-solid fa-chevron-down"></i></td>
    </tr>
    
  
 <script src="java script/all.min.js"></script> 
</body>
</html>