<?php
require_once("connect.php");?>
<html>
<head>
    <title>My Subscriptions</title>
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
                <a href="address.php"  class="customa">My Addresses</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <a href="wallet.php" class="customa">My Wallet</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <a href="subscription.php" style="color:#ebbf2f" class="customa">My Subscriptions</a>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <a href="mystudents.php" class="customa">My Students</a>
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
            <br><br><hr>

<div class="container mt-5 me-5">

  <div class="comp2">
    <h2>My subsciriptions</h2>
    <p>view and manage the subsciriptions you've purchased.</p>

  </div>
   <hr>

<!--<table class="table"> 

    <tr>
        <td>Beginner</td>  <td>Expires:May 23,2023</td>  <td></td>   <td></td>
    </tr>
    <tr>
        <td><ul>
            <li>$15.00 per month</li>
            <li>Payments completed: 3 of 6</li>
            <li>Last payment:May 23, 2023</li>
            <li>Next payment:May 23, 2023 </li>
            <li>Payment method: Visa****9126</li>
          </ul>    </td>  <td>Start date: May 23, 2023</td>  <td></td>   <td></td>
    </tr>
    <tr>
        <td>Pro</td><td>Expries: May 23, 2023</td>

    </tr>
        <tr>
            <td>VIP</td><td>Expries: May 23, 2023</td>

        </tr>
        
    </table>-->  

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Beginner</th>
            <th scope="col">Expires:May 23,2023</th>
            <th scope="col"></th>
            <th scope="col">ACTIVE</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><p>$15.00 per month</p><p>Payments completed: 3 of 6</p><p>Last payment:May 23, 2023</p><p>Payment method: Visa****9126</p></td>
            <td><p>Expries: May 23, 2023</p><p>start date: May 27, 2023</p></td>
            <td></td>
            <td>ACTIVE</td>
          </tr>

          <tr>
            <td>pro</td>
            <td>Expires:May 23,2023</td>
            <td></td>
            <td>ACTIVE</td>
          </tr>
          <tr>
            <td>VIP</td>
            <td>Expires:May 23,2023</td>
            <td></td>
            <td>EXPIRED</td>
          </tr>
        </tbody>
      </table>

    
      <style>
   
    
      </style>
  </div>
   

</div>
</body>
</html>

<?php
include("footer.php")
?>