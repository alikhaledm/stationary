<!DOCTYPE html>
<html lang="en">
<?php
require_once("connect.php");
include("navbar.php");
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Services - Brand</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap" />

  <style>
    .btn {
      background-color: #fbd334;
      border-radius: 0;
      border: 1px solid black;
    }

    .btn:hover {
      background-color: #fbd334;
      border-radius: 0;
      border: 1px solid black;
      color: black;
      opacity: 80%;
    }
  </style>

</head>

<body>
  <section class="py-5">
    <div class="container py-5">
      <div class="row mb-4 mb-lg-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
          <p class="fw-bold text-success mb-2">A Greener Future</p>
          <h3 class="fw-bold">Join us in promoting sustanibility</h3>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px">
        <div class="col mb-5">
          <img class="rounded img-fluid shadow" src="images/excess/donate.svg" />
        </div>
        <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
          <div>
            <h5 class="fw-bold">Donate Supplies&nbsp;</h5>
            <p class="text-muted mb-4">
              By donating your used stationary supplies, you empower education and inspire creativity. Every item you give helps students in need and promotes sustainable practices. Join the movement, make a positive impact.
            </p>
            <button class="btn shadow" type="button">
              Donate Here
            </button>
          </div>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px">
        <div class="col order-md-last mb-5">
          <img class="rounded img-fluid shadow" src="images/excess/sell.svg" />
        </div>
        <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
          <div>
            <h5 class="fw-bold">Sell Supplies&nbsp;</h5>
            <p class="text-muted mb-4">
              Do you have supplies you bought but never used? don't waste them! Sell them to us. Your supplies can find new owners who will benefit from them while allowing you to recoup your investment. It's a win-win reducing waste and helping others. Join us in creating a sustainable future and makeing a difference. </p>
            <button class="btn shadow" type="button">
              Start Selling
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/bold-and-bright.js"></script>
</body>
<?php
include("footer.php");
?>

</html>