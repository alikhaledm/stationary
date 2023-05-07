<?php
include("navbar.php");
include("connect.php");


?>
<html>
<title>School Supplies List</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>


  <div class="my-container">

    <div class="cover-photo parallax">

      <div class="inner-container" style="padding-left: 40; padding-top: 10;">

        <div class="mainfont" style="padding-bottom: 15;">Fulfill Your School<br> Supply List Demands</div>

        <input type="submit" value="Start now" class="custombtn text-center">
      </div>
    </div>
  </div>

  </div>






  <div class="container-fluid" style="padding-top: 50;">
    <div class="row">
      <div class="line" style="padding-top: 50;"></div>
      <div class="col-md-12 text-center" style="padding-bottom: 50;">
        <h2>SHOP BY CATEGORIES</h2>
      </div>
      <div class="line" style="padding-top: 50;"></div>
    </div>
  </div>

  <div class="container-fluid" style="padding-bottom: 150px;">




    <div class="row">
      <div class="col-md-6">
        <div style="position: relative;"> <!-- Adds a relative position to the div -->
          <div class="zoom-in-container">
            <img width="900" height="450px" style="max-width: 100%; padding-bottom:50; padding-right:20;" src="images/supplies-list-1.jpg" alt="">

            <button class="custombtn2" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Shop Stationery</button> <!-- Adds a button with absolute position and centers it -->
          </div>
        </div>
      </div>








      <div class="col-md-6">
        <div style="position: relative;">
          <div class="zoom-in-container2">
            <img width="900" height="450px" style="max-width: 100%; padding-bottom:50; padding-left:20;" src="images/supplies-list-2.jpg" alt="">
            <button class="custombtn2" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Fulfill School Supplies List</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>OUR PARTNERED SCHOOLS</h1>
        <hr><br>
      </div>
    </div>
  </div>

  <div class="container-fluid" style="padding-bottom: 100px;">

    <div class="row bordered-row">
      <div class="col-md-3 text-center"><img src="images/Schools/school1.jpg" alt=""></div>
      <div class="col-md-3 text-center"><img src="images/Schools/school2.jpg" alt=""></div>
      <div class="col-md-3 text-center"><img src="images/Schools/school3.jpg" alt=""></div>
      <div class="col-md-3 text-center"><img src="images/Schools/school4.jpg" alt=""></div>
    </div>
    <div class="row bordered-row">
      <div class="col-md-3 text-center"><img src="images/Schools/school5.jpg" alt=""></div>
      <div class="col-md-3 text-center"><img src="images/Schools/school6.jpg" alt=""></div>
      <div class="col-md-3 text-center"><img src="images/Schools/school7.jpg" alt=""></div>
      <div class="col-md-3 text-center"><img src="images/Schools/school8.jpg" alt=""></div>
    </div>
  </div>




  <script>
    $(window).scroll(function() {
      $('.bordered-row').each(function() {
        var bottom_of_object = $(this).offset().top + $(this).outerHeight();
        var bottom_of_window = $(window).scrollTop() + $(window).height();
        if (bottom_of_window > bottom_of_object) {
          $(this).animate({
            'opacity': '1'
          }, 10);
        }
      });
    });
  </script>








</body>
<hr>

<?php
include("footer.php")
?>

<script>
  window.addEventListener("scroll", function() {
    var element = document.querySelector(".zoom-in-container");
    var position = element.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;

    if (position < windowHeight * 0.3) {
      element.classList.add("zoom-in");
    } else {
      element.classList.remove("zoom-in");
    }
  });
</script>

<script>
  window.addEventListener("scroll", function() {
    var element = document.querySelector(".zoom-in-container2");
    var position = element.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;

    if (position < windowHeight * 0.3) {
      element.classList.add("zoom-in");
    } else {
      element.classList.remove("zoom-in");
    }
  });
</script>

</html>