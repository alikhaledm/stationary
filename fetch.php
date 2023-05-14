<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

</body>

</html>


<?php
session_start();
require_once("connect.php");
if (isset($_POST["query"])) {
  $search = mysqli_real_escape_string($conn, $_POST["query"]);
  $query = "SELECT * FROM products WHERE pname LIKE '%" . $search . "%'";
} else {
  $query = "SELECT * FROM products ORDER BY id";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  echo "<div class='row myprods'>";
  $result->data_seek(0);
  while ($row = $result->fetch_assoc()) {
    $imageURL = 'images/Shop/products/' . $row["photo"];
    echo "<div style='margin-top: 3%' class='col-lg'>";
    echo    "<div class='card' style='width: 18rem;'>";
    echo        "<img src='" . $imageURL . " ' class='card-img-top' alt='...'>";
    echo        "<div class='card-body'>";
    echo          "<h5 class='card-title'>"  . $row['pname'] . "</h5>";
    echo          "<p class='card-text'>$ " . $row['price'] . "</p>";
    echo          "<a href='addProductToCart.php?varname=$row[id]' class='btn btn-primary'>Add to cart</a>";
    echo          "<br><br><a href='productdetails.php'>Details</a>";
    echo        "</div>";
    echo      "</div>";
    echo      "</div>";
  }
  echo "</div>";
} else {
  echo 'Data Not Found';
}

?>