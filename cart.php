<?php
require_once("connect.php");
include("navbar.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>My Cart</title>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />

  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</head>

<body>
  <?php
  $userid = $_SESSION['id'];
  if (isset($_POST["query"]))
    $userid = $_SESSION['id'];

  $total = 0;

  $getotal = "SELECT SUM(products.price) from products inner join cart on productid WHERE products.id = cart.productid;";
  $result =  mysqli_query($conn, $getotal);
  $tagID = mysqli_fetch_assoc($result);

  if ($result) {
    $total = implode($tagID);
  }

  echo ' <div class="container"><div class="row myprod">';

  $getProducts = "SELECT * from cart  WHERE userid = $userid";

  $result2 =  mysqli_query($conn, $getProducts);
  if ($result2) {
    while ($rowData = mysqli_fetch_assoc($result2)) {
      $selectProducts = "SELECT * from products where id = $rowData[productid]";
      $result3 =  mysqli_query($conn, $selectProducts);
      if ($selectProducts) {
        while ($rowData2 = mysqli_fetch_assoc($result3)) {
          echo "<div style='margin-top: 3%' class='col-lg'>";
          echo    "<div class='card' style='width: 18rem;'>";
          echo        "<img src='" . $rowData2['photo'] . " ' class='card-img-top' alt='...'>";
          echo        "<div class='card-body'>";
          echo          "<h5 class='card-title'>"  . $rowData2['pname'] . "</h5>";
          echo          "<p class='card-text'>" . $rowData2['price'] . "</p>";
          echo          "<a href='removeCart.php?varname=$rowData2[id]' class='btn btn-primary'>Remove From Cart</a>";
          echo        "</div>";
          echo      "</div>";
          echo      "</div>";
        }
      }
    }
  }
  ?>
  </div>
  <?php
  if (isset($_SESSION['id']))
    echo '<a href="checkout.php" class="btn btn-primary" style="margin-top: 3%;">Checkout(' . $total . ')</a>';
  ?>
</body>

</html>