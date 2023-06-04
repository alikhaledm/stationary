<?php
require_once("connect.php") ?>
<html>
<?php
require_once("connect.php");
?>
<title>School Supplies List</title>

<link rel="stylesheet" href="styles.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

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

  .btnstart {
    background-color: #FBD53E;
    width: 400px;
    height: 60px;
  }

  .btnstartmobile {
    background-color: #FBD53E;
    width: 400px;
    height: 100px;
    font-size: 30;
    border-radius: 5px;
  }

  .btnstartmobile:hover {
    background-color: orange;
    border: none;
  }

  .btnstart:hover {
    background-color: orange;
  }

  .centered {
    display: flex;
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
    padding-top: 50;
    justify-content: center;
    align-items: center;
    font-size: 50;
    font-weight: bolder;
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



  .parallax {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
  }

  .my-container {
    width: 91.7%;

    position: relative;
    margin-right: auto;
    margin-left: auto;
  }

  .containernew {
    justify-content: center;
    align-items: center;
    width: 75%;
    display: flex;
    margin: 0 auto;
    /* Add this line to center the container horizontally */
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

  .servicebody {
    width: 75%;
    background-color: #F9F9FF;
    box-shadow: 1px;
    border-radius: 1px;
  }

  .servicecard {

    margin: 0 auto;
    /* Add this line to center the container horizontally */
    background-color: white;
    width: 100%;
    height: 100%;
    border-radius: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  }

  .servicecard:hover {
    background-color: #FBDF73;
    transition: 2s;
  }

  .slide-container {
    opacity: 0;
    transform: translateY(-30px);
    animation: slide-in 1.5s ease forwards;
  }

  @keyframes slide-in {
    0% {
      opacity: 0;
      transform: translateX(-30000px);
    }

    100% {
      opacity: 1;
      transform: translateX(0);
    }
  }


  .containerfluidcustom {
    width: 100%;

  }

  body {
    overflow-x: hidden;
  }

  .carouselbtn {
    font-size: 20px;
    border: none;
    background-color: transparent;

  }

  .carousel-caption {
    position: absolute;
    top: 50%;
    left: 30%;
    transform: translate(-50%, -50%);
    width: 100%;
    color: #fff;
  }

  .carouselfont1 {
    font-size: 40px;
    color: #2F4668;
    font-weight: bolder;
  }

  .carouselfont2 {
    font-size: 25px;
    color: #2F4668;
    font-weight: bold;
  }

  .carouselfont3 {
    font-size: 20px;
    color: black;
    font-weight: bolder;
  }


  .containerbody {

    padding-bottom: 20px;
    position: relative;
    width: 100%;
    justify-content: center;
    display: flex;
    align-items: center;
    /* Adjust the maximum width as desired */
  }




  .image-wrapper {
    position: relative;
    display: inline-block;
  }

  .image-wrapper img {
    max-width: 100%;
    height: auto;
  }

  .content-overlay {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translate(10%, -50%);

    /* Adjust the padding as desired */
    /* Adjust the background color and opacity as desired */
  }

  .content-overlay h2 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .content-overlay p {
    font-size: 16px;
  }

  .custombtn2 {
    background-color: transparent;
    font-size: 20px;
    height: 35px;
    color: black;

    border: none;
  }

  .custombtn3 {
    background-color: transparent;
    font-size: 20px;
    height: 35px;
    color: black;

    border: none;
  }


  .bodyfont1 {
    font-size: 35;
    color: #2F4668;
    font-weight: bolder;
  }

  .bodyfont2 {
    font-size: 30px;
    color: #2F4668;
    font-weight: bold;
  }

  .bodyfont3 {
    font-size: 35;
    color: #2F4668;
    font-weight: bolder;
  }
</style>


<body>


  <?php
  include("navbar.php");
  ?>

  <div class="containerfluidcustom">
    <div class="row">
      <div class="col-lg-12">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" style="width:100%; height:100%;"
          data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
              <div class="carousel-background">
                <img width="100%" height="600px" src="images/supplieslist1.png" alt="">
              </div>
              <div class="carousel-caption d-md-block">
                <div class="carouselfont1">Select School, Get Supplies</div>
                <div class="carouselfont2">
                  Explore our One-Click Solution<br> for All Your School Supply Needs</div><br>
                <a href="startnowintro.php"><button class="carouselbtn carouselfont3">Start Now <img width="20"
                      height="20" src="images/forward.svg"> </button></a>
              </div>
            </div>

            <div class="carousel-item" data-bs-interval="5000">
              <div class="carousel-background" style="background-color:black;">
                <img width="100%" height="600px" src="images/carousel2.png" alt="">
              </div>
              <div class="carousel-caption d-md-block">
                <div class="carouselfont1">School Supplies Made Easy</div>
                <div class="carouselfont2">Get Your School Supplies in Minutes:<br> Select, Order, and Relax</div>
                <br><a href="startnowintro.php"><button class="carouselbtn carouselfont3">Start Now <img width="20"
                      height="20" src="images/forward.svg"> </button></a>
              </div>
            </div>

            <div class="carousel-item" data-bs-interval="5000">
              <div class="carousel-background" style="background-color:black;">
                <img width="100%" height="600px" src="images/carousel3.png" alt="">
              </div>
              <div class="carousel-caption d-md-block">
                <div class="carouselfont1">Wide Range Of Products</div>
                <div class="carouselfont2">Your School Supply Paradise: Everything You Want, All in One Store</div>
                <br>
                <a href="startnowintro.php"><button class="carouselbtn carouselfont3">Start Now <img width="20"
                      height="20" src="images/forward.svg"> </button></a>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>










  <div class="containerbody">
    <div class="row">

      <div class="col-lg-6 col-sm-12" style="padding-top:20;">

        <div class="image-wrapper">
          <img style="width:100%;" src="images/card2.png" alt="Image">
          <div class="content-overlay">
            <div></div>
            <div class="bodyfont3">Discover Your Gathered<br> Supplies List
            </div>
            <div class="bodyfont2" style="padding-top:17px;">Get Your Supplies List Now!
            </div>
            <div style="padding-top:24px;">
              <a href="startnowintro.php"><button class="custombtn3"> Grab Your List <img width="15" height="15"
                    src="images/forward.svg"></button></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-sm-12" style="padding-top:20;">

        <div class="image-wrapper">
          <img style="width:100%;" src="images/card4.png" alt="Image">
          <div class="content-overlay">
            <div class="bodyfont1">Explore Our Stationery<br> Shop
            </div>
            <div class="bodyfont2" style="padding-top:17px;">Shop Stationery Now!
            </div>

            <div style="padding-top:24px;"><a href="startnowintro.php"><button class="custombtn2"> Shop Stationery<img
                    width="15" height="15" src="images/forward.svg">
                </button></a></div>
          </div>
        </div>

      </div>




    </div>

  </div>




  <center>
    <div class="containernew servicebody" style="padding-top:20;">
      <div class="row" style=" padding-bottom:100px;">
        <div class="col-md-12" style="font-size:40px; color:#FBD53E;">
          <center>OUR SERVICES</center><br>
        </div>
        <div class="col-lg-3 col-sm-12" style="padding-top:50;">

          <div class="servicecard" style="font-size:32;">
            <div style="display:flex; justify-content:center; align-items:center; padding-top: 10%;"><img width="100"
                height="100" src="images/services/supplies.svg" alt=""></div>
            <div style="display:flex; justify-content:center; align-items:center; font-size: 30; color: #2F4668;">
              Supplies List
            </div>

            <div style="display:flex; justify-content:center; align-items:center; font-size: 18; color: #2F4668;">
              Select Your School And<br> Grade With Few<br> Clicks Now!

            </div>
            <div class="centered"><button class="carouselbtn">Learn
                More</button></div>


          </div>
        </div>
        <div class="col-lg-3 col-sm-12" style="padding-top:50;">

          <div class="servicecard" style="font-size:32;">
            <div style="display:flex; justify-content:center; align-items:center; padding-top: 10%;"><img width="100"
                height="100" src="images/services/stationery.svg" alt=""></div>
            <div style="display:flex; justify-content:center; align-items:center; font-size: 30; color: #2F4668;">
              Excess Selling
            </div>
            <div style="display:flex; justify-content:center; align-items:center; font-size: 18; color: #2F4668;">
              Make a change by selling<br> extra inventory for a<br> worthwhile cause

            </div>

            <div class="centered"><button class=" carouselbtn">Learn
                More</button></div>





          </div>
        </div>
        <div class="col-lg-3 col-sm-12" style="padding-top:50;">

          <div class="servicecard" style="font-size:32;">
            <div style="display:flex; justify-content:center; align-items:center; padding-top: 10%; "><img width="100"
                height="100" src="images/services/donate.svg" alt=""></div>
            <div style="display:flex; justify-content:center; align-items:center; font-size: 30; color: #2F4668;">
              Donations
            </div>
            <div style="display:flex; justify-content:center; align-items:center; font-size: 18; color: #2F4668;">
              Make a shift by contributing<br> your excess paper goods <br>to our mission
            </div>
            <div class="centered"><button class="carouselbtn">Learn
                More</button></div>


          </div>
        </div>
        <div class="col-lg-3 col-sm-12" style="padding-top:50;">

          <div class="servicecard" style="font-size:32;">
            <div style="display:flex; justify-content:center; align-items:center; padding-top: 10%; "><img width="100"
                height="100" src="images/services/shop.svg" alt=""></div>
            <div style="display:flex; justify-content:center; align-items:center; font-size: 30; color: #2F4668;">
              Stationery Shop
            </div>
            <div style="display:flex; justify-content:center; align-items:center; font-size: 18; color: #2F4668;">
              Explore perfection in school<br> supplies at our hub Get<br> what you need!


            </div>
            <div class="centered"><button class="carouselbtn">Learn
                More</button></div>


          </div>
        </div>
      </div>
    </div>
  </center>
  <center>
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>OUR PARTNERS</h1>
          <hr><br>
        </div>
      </div>
    </div>

  </center>

  <div class="containerfluid" style="padding-bottom: 100px;">

    <div class="row bordered-row centered">
      <div class="col-lg-3 col-sm-12 text-center"><img width="120" src="images/Schools/school1.jpg" alt=""></div>
      <div class="col-lg-3 col-sm-12 text-center"><img width="120" src="images/Schools/school2.jpg" alt=""></div>
      <div class="col-lg-3 col-sm-12 text-center"><img width="80" src="images/Schools/school3.jpg" alt=""></div>
      <div class="col-lg-3 col-sm-12 text-center"><img width="120" src="images/Schools/school4.jpg" alt=""></div>
    </div>
    <div class="containerschoolshidden">
      <div class="row bordered-row centered">
        <div class="col-lg-3 col-sm-0 text-center"><img width="120" src="images/Schools/school5.jpg" alt=""></div>
        <div class="col-lg-3 col-sm-0 text-center"><img width="80" src="images/Schools/school6.jpg" alt=""></div>
        <div class="col-lg-3 col-sm-0 text-center"><img width="120" src="images/Schools/school7.jpg" alt=""></div>
        <div class="col-lg-3 col-sm-6 text-center"><img width="120" src="images/Schools/school8.jpg" alt=""></div>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function () {
      if ($(window).width() <= 999) {
        $('.mobile').removeClass('hidden').addClass('visible');
      }
    });

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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <?php
  include("footer.php")
    ?>
</body>

</html>