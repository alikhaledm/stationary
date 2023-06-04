<?php
require_once("connect.php");
include("navbar.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>

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

  #hr-3 {
    border: 1px solid black;
    font-weight: bold;
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

  .h2 {
    color: black;
  }

  a {
    text-decoration: none;
    color: black;
  }

  a:hover {
    color: #f1ff2d;
    text-decoration: none;
  }

  .h2 {
    color: yellow;
  }

  .col-md-3 {
    left: 70px;
  }
</style>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="lineshop" style="padding-top:30;"></div>
      <div class="col-md-12 text-center" style="padding-bottom: 30;">
        <hr id="hr-3" style="width:90%;text-align:left;">
        <h2 style="color: #1f3b2c">
          PRODUCTS
        </h2>
        <hr id="hr-3" style="width:90%;text-align:left;">
      </div>
      <div class="lineshop"></div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div>
          <h2 class="h2">FILTER BY</h2>
        </div>
        <hr style="width:70%; margin-left:0">
        <div>
          <h5> CATEGORY</h5>
        </div>
        <hr style="width:70%; margin-left:0">
        <div><a href="">ALL</a></div>
        <div><a href="">Notebooks & Paper</a></div>
        <div><a href="">Art Supplies</a></div>
        <div><a href="">Writing Tools</a></div>
        <div><a href="">Binders & Folders</a></div>
        <div><a href="">Math & Scientific Tools</a></div>
        <div><a href="">Pencil Cases & Bags</a></div>
        <hr style="width:70%; margin-left:0">
        <div>
          <h5> LEAST PRICE</h5>
        </div>
        <hr style="width:70%; margin-left:0">
      </div>
      <div class="container">
        <br>
        <div class="form-group">
          <div class="input-group">
            <input type="text" name="search_text" id="search_text" placeholder="Search for Product" class="form-control" />
          </div>
        </div>
        <br />
        <div id="result"></div>
      </div>
    </div>
</body>

</html>
<script>
  $(document).ready(function() {
    load_data();

    function load_data(query) {
      $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
          query: query
        },
        success: function(data) {
          $('#result').html(data);
        }
      });
    }

    $('#search_text').keyup(function() {
      var search = $(this).val();
      if (search != '') {
        load_data(search);
      } else {
        load_data();
      }
    });
  });
</script>
</div>
<?php
include("footer.php");
?>