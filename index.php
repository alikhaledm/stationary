<?php
include("navbar.php")
  ?>
<html>
<title>School Supplies List</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
  /* For WebKit browsers (Chrome, Safari) */
  ::-webkit-scrollbar {
    width: 10px;
  }

  ::-webkit-scrollbar-track {
    background-color: white;
  }

  ::-webkit-scrollbar-thumb {
    background-color: gray;
  }

  /* For Firefox */
  ::-moz-scrollbar {
    width: 10px;
  }

  ::-moz-scrollbar-track {
    background-color: #f1f1f1;
  }

  ::-moz-scrollbar-thumb {
    background-color: #888;
  }

  /* For Internet Explorer and Microsoft Edge */
  /* Note: Microsoft Edge supports the -ms-overflow-style property */
  /* to customize the scroll bar, but it's not widely supported */
  /* in other versions of IE. */
  /* Therefore, this code may not work in all IE versions. */
  /* It's recommended to test it in your target browsers. */
  .scrollbar {
    scrollbar-width: thin;
    scrollbar-color: #888 #f1f1f1;
  }


  @media (max-width:999px) {
    .my-container {
      width: 100%;
    }
  }

  @media (max-width:999px) {
    .card {
      display: none;
    }
  }




  @media (max-width:1640px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 40%;
      width: 35%;

    }
  }

  @media (min-width:1550px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 40%;
      width: 30%;

    }
  }

  @media (max-width:1379px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 40%;
      width: 40%;

    }
  }

  @media (max-width:1208px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 40%;
      width: 46%;

    }
  }

  @media (max-width:1132px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 40%;
      width: 50%;

    }
  }





  @media (min-height:1200px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 40%;

      height: 40%;
    }
  }


  @media (max-height:1201px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 30%;

      height: 45%;
    }
  }

  @media (max-height:1015px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 30%;

      height: 55%;
    }
  }

  @media (max-height:830px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 20%;

      height: 60%;
    }
  }

  @media (max-height:740px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 20%;
      height: 65%;
    }
  }

  @media (max-height:700px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 20%;
      height: 70%;
    }
  }

  @media (max-height:650px) {
    .card {
      opacity: 90%;
      background-color: white;
      left: 10%;
      top: 20%;
      height: 75%;
    }
  }








  .cardmobile {
    display: flex;
    background-color: white;
    justify-content: center;
    align-items: center;
  }

  .btnstart {
    background-color: #FBD53E;
    border: none;
    width: 400px;
    height: 60px;
  }

  .btnstartmobile {
    background-color: #FBD53E;
    border: none;
    width: 450px;
    height: 100px;
    font-size: 30;
  }

  .btnstartmobile:hover {
    background-color: orange;
    border: none;
    width: 300px;
    height: 100px;
    font-size: 40;
  }

  .btnstart:hover {
    background-color: orange;
    border: none;
  }

  .centered {

    justify-content: center;
    align-items: center;
  }

  .centeredmobile {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .mobile {
    display: none;
    opacity: 0;
    transition: opacity 3s ease-in-out;
    /* Initially hide the div on all devices */
  }

  .mobile.visible {
    opacity: 1;
  }

  @media (max-width: 999px) {
    .mobile {
      display: block;
      /* Show the div only on mobile devices */
    }
  }

  @media (max-width:999px) {
    .my-container {
      display: none;
    }
  }

  .mainfontmobile {
    margin-top: 4;
    justify-content: center;
    align-items: center;
    font-size: 50;
  }

  .paddingmobile {
    display: flex;
    justify-content: center;
    align-items: center;

  }

  .bordered-row {
    border-bottom: 1px solid #ccc;
  }

  .bordered-row .col-lg-3 {
    border-right: 1px solid #ccc;
  }

  .bordered-row .col-lg-3:last-child {
    border-right: none;
  }

  .bordered-row {
    opacity: 0;
    transition: opacity 1s ease-in-out;
  }

  .bordered-row.fade-in {
    opacity: 1;
  }





  .bordered-row {
    border-bottom: 1px solid #ccc;
  }

  .bordered-row .col-sm-6 {
    border-right: 1px solid #ccc;
  }

  .bordered-row .col-sm-6:last-child {
    border-right: 1px;
  }

  .bordered-row {
    opacity: 0;
    transition: opacity 1s ease-in-out;
  }

  .bordered-row.fade-in {
    opacity: 1;
  }




  .my-container {
    width: 90%;

    position: relative;
    margin-right: auto;
    margin-left: auto;
  }

  .my-container .cover-photo {
    background-image: url("images/school-supplies-list\ new.png");
    background-position: center;
    position: static;
    top: 0;
    left: 0;
    height: 570px;
    max-width: 100%;
  }
</style>

<body>
  <div class="my-container">
    <div class="cover-photo parallax">
      <div class="card centered">
        <div class="mainfont" style="padding-bottom:20;"><b>Fulfill Your School<br> Supply List Demands</b></div>
        <?php if (!isset($_SESSION['id'])) {
          echo '<a href="startnowintro.php"><button class="btnstart">Start Now</button></a>';
        } else {
          echo '<a href="startnowintro(signedin).php"><button class="btnstart">Start Now</button></a>';
        }
        ?>
        <div style="padding-bottom:5 ;"></div>
      </div>
    </div>
  </div>


  </div>
  <div class="container-fluid" style="padding-top: 100;">
    <div class="row">
      <div class="col-md-12">
        <div class="mobile hidden" style="padding-bottom: 200;">
          <div class="cardmobile">
            <div class="mainfontmobile">Fulfill Your School Supplies List Demands</div>
          </div>
          <div class="col-md-12 centeredmobile" style="padding-top: 20;">
            <a href="startnowintro.php"><button class="btnstartmobile">Start Now</button></a>
            <script>
              $(document).ready(function () {
                if ($(window).width() <= 999) {
                  $('.mobile').removeClass('hidden').addClass('visible');
                }
              });
            </script>
          </div>
        </div>



      </div>
    </div>
    <div class="line" style="padding-top: 50;"></div>
    <div class="col-md-12 text-center" style="padding-bottom: 50;">
      <h2>SHOP BY CATEGORIES</h2>
    </div>
    <div class="line" style="padding-top: 50; padding-bottom:50;"></div>
  </div>
  </div>

  <div class="container-fluid" style="padding-bottom: 150px;">
    <div class="row">
      <div class="col-md-6 col1">
        <div style="position: relative;">
          <div class="zoom-in-container">
            <img width="900" height="450px" style="max-width: 100%; padding-bottom:50;" src="images/supplies-list-1.jpg"
              alt="">
            <button class="custombtn2"
              style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Shop
              Stationery</button>
          </div>
        </div>
      </div>

      <div class="col-md-6 col2">
        <div style="position: relative;">
          <div class="zoom-in-container2">
            <img width="900" height="450px" style="max-width: 100%; padding-bottom:50;" src="images/supplies-list-2.jpg"
              alt="">
            <button class="custombtn2"
              style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Fulfill School Supplies
              List</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      function adjustColumnWidth() {
        if ($(window).width() <= 999) {
          $('.col1, .col2').removeClass('col-md-6').addClass('col-md-12 paddingmobile');
        } else {
          $('.col1, .col2').removeClass('col-md-12').addClass('col-md-6 paddingmobile');
        }
      }

      // Adjust column width on initial page load
      adjustColumnWidth();

      // Adjust column width on window resize
      $(window).resize(function () {
        adjustColumnWidth();
      });
    });
  </script>

  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>OUR PARTNERED SCHOOLS</h1>
        <hr><br>
      </div>
    </div>
  </div>

  <div class="container-fluid" style="padding-bottom: 100px;">

    <div class="row bordered-row centered">
      <div class="col-lg-3 col-sm-6 text-center"><img width="120" src="images/Schools/school1.jpg" alt=""></div>
      <div class="col-lg-3 col-sm-6 text-center"><img width="120" src="images/Schools/school2.jpg" alt=""></div>
      <div class="col-lg-3 col-sm-6 text-center"><img width="80" src="images/Schools/school3.jpg" alt=""></div>
      <div class="col-lg-3 col-sm-6 text-center"><img width="120" src="images/Schools/school4.jpg" alt=""></div>
    </div>
    <div class="row bordered-row centered">
      <div class="col-lg-3 col-sm-6 text-center"><img width="120" src="images/Schools/school5.jpg" alt=""></div>
      <div class="col-lg-3 col-sm-6 text-center"><img width="80" src="images/Schools/school6.jpg" alt=""></div>
      <div class="col-lg-3 col-sm-6 text-center"><img width="120" src="images/Schools/school7.jpg" alt=""></div>
      <div class="col-lg-3 col-sm-6 text-center"><img width="120" src="images/Schools/school8.jpg" alt=""></div>
    </div>
  </div>




  <script>
    $(window).scroll(function () {
      $('.bordered-row').each(function () {
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
  window.addEventListener("scroll", function () {
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
  window.addEventListener("scroll", function () {
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