<!DOCTYPE html>
<html lang="en">
<?php
require_once("connect.php");
?>
<head>
  <title>Services - Brand</title>
  <style>
    .btn {
      background-color:#EBBF2F;
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
.container2{


background-color:#FFFEF4;
height: 1080px;
width:1000px;
border-color: #fbd334;

}

  </style>
</head>
<body>
  <?php include("navbar.php");
  if (isset($_SESSION[''])) {
    echo '
        <div class="alert alert-warning alert-dismissible fade show" style="width: fit-content;" role="alert">
        <strong>Sign in to start selling or donating!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
  ?>
   <center>
  <div class="container2">
   
  
  <section class="py-5">
    <div class="container py-5">
      <div class="row mb-4 mb-lg-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
         
          <p class="fw-bold text-success mb-2" style="color-#0c0129;">A Greener Future</p>
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

            
              By donating your used stationary supplies, you empower education and inspire creativity. Every item you
              give helps students in need and promotes sustainable practices. Join the movement, make a positive impact.
            </p>
            <?php
            if (isset($_SESSION[''])) {
              echo '<a href="signin.php"><button class="btn shadow" type="button" >
              Donate Here
            </button></a>';
            } else {
              echo '<a href="donate.php"><button class="btn shadow" type="button"  style="background-color:#EBBF2F;" >
              Donate Here
            </button></a>';
            }
            ?>
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
              Do you have supplies you bought but never used? don't waste them! Sell them to us. Your supplies can find
              new owners who will benefit from them while allowing you to recoup your investment. It's a win-win
              reducing waste and helping others. Join us in creating a sustainable future and makeing a difference. </p>
            <?php
            if (isset($_SESSION[''])) {
              echo '<a href="signin.php"><button class="btn shadow" type="button" >
              Start Selling
            </button></a>';
            } else {
              echo '<a href="selling.php"><button class="btn shadow" type="button" style="background-color:#EBBF2F;">
              Start Selling
            </button></a>';
            }
            ?>

          </div>
        </div>
      </div>
    </div>
    </div></center>
  </section>
  


  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/bold-and-bright.js"></script>
</body>
<?php
include("footer.php");
?>

</html>