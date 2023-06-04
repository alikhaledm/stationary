<?php
require_once("connect.php");
include("navbar.php");
?>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="stylesacc.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body>
  <form method="post" enctype="multipart/form-data">
    <div class="container-account" id="fade-container">
      <div class="row">
        <div class="col-md-12">
          <img width="100%" height="300" src="images/account/background.jpg" alt="">
          <div class="small-image" style="position: absolute; top: 50%; left: 5%;">
            <b style="padding-left:10; font-size:23;">
              <?php
              echo ucfirst($_SESSION['fname']);
              echo "&nbsp;" . ucfirst($_SESSION['lname']);
              ?>
            </b>
          </div>
        </div>
      </div>
    </div>
    <div class="container-account" id="fade-container2">
      <div class="row">
        <div class="col-md-3"><b style="font-size:18;">My
            Account</b></div>
        <div class="col-md-3"><b style="font-size:18;">My
            Addresses</b></div>
        <div class="col-md-3"><b style="font-size:18;">My
            Wallet</b></div>
        <div class="col-md-3"><b style="font-size:18;">My
            My Orders</b></div>
        <div class="col-md-3"><b style="font-size:18;">My
          </b>My Students</div>
      </div>
      <div class="container mt-5 me-5">

        <div class="comp2">
          <h2>My orders</h2>
          <p>view your order history or check the status of a recent order.</p>

        </div>
        <hr>

        <div id="comp3">
          <div id="startBrowse" class="text-center">

            <p> you haven't placed any order yet.</p>
            <button class="btn btn-warning">add new address</button>

          </div>
        </div>

        <hr>

      </div>



      <!--END  component 2-->