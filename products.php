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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
    crossorigin="anonymous"></script>
  </script>
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
  <div class="container-fluid">
    <div class="row">
      <div class="lineshop" style="padding-top:30;"></div>
      <div class="col-md-12 text-center" style="padding-bottom: 30;">
        <h2>SHOP</h2>
      </div>
      <div class="lineshop"></div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1">
        <div style="font-size:30;">FILTER BY<br></div>
        <hr>
        <div style="font-size:15;">CATEGORY</div><br>
        <div><B><a href="">ALL</a></div>
        <div><a href="">Best Sellers</a></div>
        <div><a href="">KIDS ART</a></div>
        <div><a href="">SALE</a></div>
        <hr><a href="">LEAST PRICE</a></b>
        <HR>
      </div>
      <div class="container">
        <br>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Search :</span>
            <input type="text" name="search_text" id="search_text" placeholder="Search for Product"
              class="form-control" />
          </div>
        </div>
        <br />
        <div id="result"></div>

      </div>

</body>


</html>
<script>
      $(document).ready(function () {
        load_data();

      function load_data(query) {
        $.ajax({
          url: "fetch.php",
          method: "POST",
          data: {
            query: query
          },
          success: function (data) {
            $('#result').html(data);
          }
        });
    }
      $('#search_text').keyup(function () {
      var search = $(this).val();
      if (search != '') {
        load_data(search);
      } else {
        load_data();
      }
    });
  });
</script>
<?php
include("footer.php");
?>