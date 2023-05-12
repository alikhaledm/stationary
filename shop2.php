<?php
include("navbar.php")
?>
<html>
<title>School Supplies List</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>

  <div class="container-fluid2" style="position:relative;">
    <img width="100%" height="350" src="images/Shop/sale.avif" alt="">
    <div class="inner-container3 text-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); max-width: 100%; word-wrap: break-word; padding-top: 15px; height:100;">
      <b>HUGE SALE</b>
    </div>
    <div class="inner-container4 text-center" style="position: absolute; top: 65%; left: 50%; transform: translate(-50%, -50%); max-width: 80%; word-wrap: break-word; height:50;">
      Get 30% OFF
    </div>
  </div>


  <style>
    @media (max-width: 800px) {

      .inner-container3,
      .inner-container4 {
        top: 40%;
      }
    }
  </style>



  <div class="container">
    <div class="row">

      <div class="col-md-12 text-center" style="padding-top: 50;">
        <h1>
          Lets Find What Your Looking For</h1>
      </div>
    </div>





    <div class="container-fluid" style="padding-bottom: 150px;">








      <div class="row g-1">

        <div class="col-md-6 text-center" style="padding-top: 50px; padding-left: 50px;"><img style="max-width: 100%;" width="430px" height="245px" src="images/supplies-list-1.jpg" alt="">
          <button class="custombtn2" style="position: absolute; top: 55%; left: 55%; transform: translate(-50%, -50%);">Fulfill School
            Supplies
            List</button>
        </div>

        <div class="col-md-6 text-center" style="padding-top: 50px; padding-right:50px;"><img style="max-width: 100%;" width="430px" height="245px" src="images/supplies-list-2.jpg" alt="">

          <button class="custombtn2" style="position: absolute; top: 55%; left: 45%; transform: translate(-50%, -50%);">Fulfill School
            Supplies
            List</button>


        </div>
      </div>

    </div>

  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="lineshop"></div>
      <div class="col-md-12 text-center" style="padding-bottom: 30;">
        <h2>SHOP BY CATEGORIES</h2>
      </div>
      <div class="lineshop"></div>
    </div>
  </div>



</body>

<hr>

<?php
include("footer.php")
?>

</html>