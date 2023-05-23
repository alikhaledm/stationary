<?php
include("navbar.php")
?>
<html>

<head>
  <title>School Supplies List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
</head>
<style>
  body {
    overflow-x: hidden;
  }

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

  #hr-banner {
    border: 2px solid black;
    font-weight: bold;
  }

  #hr-2 {
    border: 1px solid black;
    font-weight: bold;
  }

  /* Keyframes for the animation */
  @keyframes float {
    from {
      right: -200px;
    }

    to {
      right: 100%;
    }
  }

  /* Keyframes for the moving text */
  @keyframes move {
    0% {
      transform: translateX(0);
    }

    100% {
      transform: translateX(-50%);
    }
  }

  /* Keyframes for the animation */
  @keyframes float {
    from {
      right: -200px;
    }

    to {
      right: 100%;
    }
  }

  /* Keyframes for the moving text */
  @keyframes move {
    from {
      transform: translateX(100%);
    }

    to {
      transform: translateX(-100%);
    }
  }

  /* Styling for the banner */
  .floating-banner {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #f5f5f5;
    padding: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 9999;
  }

  /* Styling for the moving text */
  .moving-text {
    position: relative;
    animation: move 20s linear infinite;
  }

  /* Styling for the banner text */
  .floating-banner p {
    position: absolute;
    margin: 0;
    box-sizing: border-box;
  }


  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  .flip-card {
    background-color: transparent;
    border-radius: 5px;
    margin: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    display: inline-block;
    width: 400px;
    height: 400px;
    perspective: 1000px;
  }

  .flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.6s;
    transform-style: preserve-3d;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  }

  .flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
  }

  .flip-card-front,
  .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
  }

  .flip-card-front {
    background-color: #white;
    color: black;
  }

  .flip-card-back {
    background-color: LightGray;
    color: white;
    transform: rotateY(180deg);
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
</style>

<body>
  <img width="100%" height="300" src="images/Shop/hugesale.png" alt="">
  <hr id="hr-banner">
  <div class="banner-container">
    <div class="moving-text">
      <h3>
        <p>Free Shipping On All <span style="color: yellow;">Cairo</span> Orders Over <span style="color: red;">1000 EGP</span></p>
      </h3>
    </div>
  </div>
  <hr id="hr-banner">
  <br>
  <br>


  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center" style="padding-top: 50;">
        <h1>
          Lets Find What Your Looking For
        </h1>
        <hr id="hr-2" style="width:45%;text-align:left;margin-center:0">
      </div>
    </div>
    <br>

    <center>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/shop/shop1.jpg" alt="" width=100%; height=100%;>
          </div>
          <div class="flip-card-back">
            <h1></h1>
            <br><br><br><br><br><br>
            <button class=" btn-lg" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"> SCHOOL SUPPLY LIST </button>
            <br><br><br><br><br>
            <p>We are here to help you</p>
          </div>
        </div>
      </div>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/shop/shop2.jpg" alt="" width=100%; height=100%;>
          </div>
          <div class="flip-card-back" style="text-align:center;">
            <br><br><br><br><br><br>
            <button class=" btn-lg" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"> SHOP ALL STATIONERY </button>
            <br><br><br><br><br>
            <p>We are here to help you</p>
          </div>
        </div>
      </div>
    </center>

    <div class="container-fluid">
      <div class="row">
        <div class="lineshop"></div>
        <div class="col-md-12 text-center" style="padding-bottom: 30;">
          <hr id="hr-2" style="width:80%;text-align:left;margin-center:0">
          <h2>SHOP BY CATEGORIES</h2>
          <hr id="hr-2" style="width:80%;text-align:left;margin-center:0">
        </div>
        <div class="lineshop"></div>
      </div>
    </div>

    <div class="custom-div">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card">
            <img src="images/shop/note.jpg" class="card-img-top" alt="..." height="350">
            <div class="card-body">
              <h5 class="card-title">Notebooks & Paper</h5>
              <p class="card-text">Notebooks, Graph Papers, Sticky Notes, Printer Papers and Construction Papers</p>
            </div>
          </div>
          <br><br><br><br>
        </div>
        <div class="col">
          <div class="card">
            <img src="images/shop/arts.jpg" class="card-img-top" alt="..." height="350">
            <div class="card-body">
              <h5 class="card-title">Art Supplies</h5>
              <p class="card-text">Colored Pencils, Crayons, Paints, Paintbrushes, Sketches, Scissors and Glue</p>
            </div>

          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="images/shop/Writing Tools.jpg" class="card-img-top" alt="..." height="350">
            <div class="card-body">
              <h5 class="card-title">Writing Tools</h5>
              <p class="card-text">Pens, Pencils, Highlighters, Markers, and Erasers</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="images/shop/folders.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Binders & Folders</h5>
              <p class="card-text">Binders, Folders, Dividers, and Sheet Protectors for organizing and Storing Papers.s</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="images/shop/math.png" class="card-img-top" alt="..." height="350">
            <div class="card-body">
              <h5 class="card-title">Math & Scientific Tools</h5>
              <p class="card-text">Geometry Tools, compass, protractor, ruler, math workbooks and worksheets and scientific calculators</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="images/shop/cases.jpg" class="card-img-top" alt="..." height="350">
            <div class="card-body">
              <h5 class="card-title">Pencil Cases & Bags</h5>
              <p class="card-text">Pens, Pencils, Highlighters, Markers, and Erasers </p>&nbsp; &nbsp; &nbsp; &nbsp;
            </div>
          </div>
        </div>
      </div>

      <br><br><br><br><br><br>
</body>
<?php
include("footer.php")
<<<<<<< Updated upstream
?>

=======
  ?>
>>>>>>> Stashed changes
</html>