<?php
require_once("connect.php") ?>
<html>

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
  .shoptitle {
    font-size: 50px;
    justify-content: center;
    align-items: center;
    display: flex;
    padding-top: 50px;
    color: black;
    font-style: italic;
  }

  .line {
    border-top: 1px solid black;
    width: 15%;
  }

  .line2 {
    border-top: 1px solid black;
    width: 70%;
  }

  .line3 {
    border-top: 2px solid black;
    width: 2%;
  }

  .centered {
    justify-content: center;
    align-items: center;
    display: flex;
  }

  .shopmainbtn {
    background-color: white;
    border: none;
    height: 80px;
    width: 260px;
    opacity: 0.9;
    border-radius: 5px;
  }

  .shopmainbtn:hover {
    opacity: 1;
  }

  .shopbetafont {
    font-size: 30px;
    font-weight: bold;
  }

  .shopsmallfont {
    font-size: 22px;
  }

  .formcontrol {
    width: 40%;
    justify-content: center;
    align-items: center;
    display: flex;
  }

  .shopdropdown {
    width: 185;
    height: 30px;
  }

  .formbtn {
    width: 185px;
    height: 30px;
    border: none;
    background-color: #FBD334;
    color: white;
  }

  .formbtn:hover {
    background-color: orange;
  }
</style>

<body>
  <?php
  include("navbar.php")
    ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <img width="100%" height="300px" src="images/supplies-list-2.jpg" alt="">
      </div>
      <div class="col-lg-12">
        <div class="shoptitle">Let's Find What You're Looking For</div>
      </div>
      <div class="col-lg-12" style="padding-top:50;">
        <div class="line"></div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-6" style="padding-top:70;">
        <div style="position:relative;" class="centered"><img style="width:100%; height:600px;"
            src="images/shop/shop1.jpg" alt="">
          <div style="position:absolute;">
            <a href="products.php"><button class="shopmainbtn"> SHOP ALL STATIONERY</button>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-6" style="padding-top:70;">
        <div style="position:relative;" class="centered"><img style="width:100%; height:600px;"
            src="images/shop/shop2.jpg" alt="">
          <div style="position:absolute;"> <a href="products.php"><button class="shopmainbtn"> SHOP ALL
                STATIONERY</button></div></a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12 centered" style="padding-top:60px">
    <div class="line2"></div>
  </div>


  <div class="col-lg-12 centered" style="padding-top:30px">
    <div class="shopbetafont">Shop By Category</div>
  </div>


  <div class="col-lg-12 centered" style="padding-top:30px">
    <div class="line2"></div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-sm-6" style="padding-top:70;">
        <div class="centered card"><img style="width:100%; height: 400px;" src="images/shop/note.jpg" alt="">
          <div class="card-body">
            <h5 class="card-title">Notebooks & Paper</h5>
            <p class="card-text">Notebooks, Graph Papers, Sticky Notes, Printer Papers and Construction
              Papers</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6" style="padding-top:70;">
        <div class="centered card"><img style="width:100%; height: 400px;" src="images/shop/arts.jpg" alt="">
          <div class="card-body">
            <h5 class="card-title">Art Supplies</h5>
            <p class="card-text">Colored Pencils, Crayons, Paints, Paintbrushes, Sketches, Scissors and Glue
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6" style="padding-top:70;">
        <div class="centered card"><img style="width:100%; height: 400px;" src="images/shop/Writing Tools.jpg" alt="">
          <div class="card-body">
            <h5 class="card-title">Writing Tools</h5>
            <p class="card-text">Pens, Pencils, Highlighters, Markers, and Erasers &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;</p>

          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6" style="padding-top:70;">
        <div class="centered card"><img style="width:100%; height: 400px;" src="images/shop/folders.jpg" alt="">
          <div class="card-body">
            <h5 class="card-title">Binders & Folders</h5>
            <p class="card-text">Binders, Folders, Dividers, and Sheet Protectors for organizing and Storing
              Papers.s
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6" style="padding-top:70;">
        <div class="centered card"><img style="width:100%; height: 400px;" src="images/shop/math.png" alt="">
          <div class="card-body">
            <h5 class="card-title">Math & Scientific Tools</h5>
            <p class="card-text">Geometry Tools, compass, protractor, ruler, math workbooks and worksheets
              and
              scientific calculators</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6" style="padding-top:70;">
        <div class="centered card"><img style="width:100%; height: 400px;" src="images/shop/cases.jpg" alt="">
          <div class="card-body">
            <h5 class="card-title">Pencil Cases & Bags</h5>
            <p class="card-text">Pens, Pencils, Highlighters, Markers, and Erasers </p>&nbsp; &nbsp; &nbsp;
            &nbsp;
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="container centered formcontrol" style="padding-bottom:115px;">
    <div class="row">
      <div class="col-lg-12 centered" style="padding-top:100px">
        <div class="shopbetafont">Can't Find What You're Looking For?</div>
      </div>
      <div class="col-lg-12 centered" style="padding-top:10px">
        <div class="line3"></div>
      </div>
      <div class="col-lg-12 centered" style="padding-top:30px">
        <div class="shopsmallfont">Send us a message and we`ll do our best <div class="centered">to stock all your
            stationery needs!
          </div>

        </div>
      </div>


      <div class="col-lg-4 col-sm-12" style="padding-top: 30px;">
        <div class="shopinput">
          <div class="shopsmallfont" style="padding-bottom:10px">Name</div>
          <input type="text" name="" id="">
        </div>
      </div>
      <div class="col-lg-4 col-sm-12" style="padding-top: 30px;">
        <div class="shopinput">
          <div class="shopsmallfont" style="padding-bottom:10px">Email</div>
          <input type="text" name="" id="">
        </div>
      </div>
      <div class="col-lg-4 col-sm-12" style="padding-top: 30px;">
        <div class="shopinput">
          <div class="shopsmallfont" style="padding-bottom:10px">Category</div>
          <select class="shopdropdown">
            <option value="math">Math</option>
            <option value="art">Art</option>
            <option value="musical">Musical</option>
            <option value="writing">Writing</option>
            <option value="notebooks">Notebooks</option>
          </select>

        </div>
      </div>

      <div class="col-lg-8 col-sm-12" style="padding-top: 30px;">
        <div class="shopinput">
          <div class="shopsmallfont" style="padding-bottom:10px">Description</div>
          <input type="text" name="" id="">
        </div>
      </div>

      <div class="col-lg-4 col-sm-12" style="padding-top: 30px;">
        <div class="shopinput" style="padding-top:5;">

          <div class="shopsmallfont" style="padding-bottom:30px"></div>
          <button class="formbtn">Send</button>

        </div>
      </div>

    </div>



  </div>




</body>
<?php
include("footer.php")
  ?>

</html>