<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
  <style>
    .rectangular-bar {
      display: flex;
      align-items: center;
      width: 200px;
      height: 40px;
      border: 2px solid black;
    }

    .left-side,
    .right-side {
      width: 40px;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .minus-sign,
    .plus-sign {
      font-size: 20px;
      cursor: pointer;
    }

    .middle-section {
      flex-grow: 1;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .number {
      font-size: 16px;
    }

    .minus-sign:hover,
    .plus-sign:hover {
      background-color: gray;
    }
  </style>

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
    echo "<div style='margin-top: 3%' class='col-lg-4'>";
    echo "<div class='card' style='width: 18rem;'>";
    echo "<a href='productdetails.php'><img src='" . $imageURL . " ' class='card-img-top' alt='...'><a/>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>" . $row['pname'] . "</h5>";
    echo "<p class='card-text'>$ " . $row['price'] . "</p>";
    echo "<div class='rectangular-bar'>
    <div class='left-side'>
      <span class='minus-sign' onclick='decrease(0)'>-</span>
    </div>
    <div class='middle-section'>
      <span id='value-0' class='number'>1</span>
    </div>
    <div class='right-side'>
      <span class='plus-sign' onclick='increase(0)'>+</span>
    </div>
  </div>
  <br>";

    echo "<a href='addProductToCart.php?varname=$row[id]' class='btn btn-primary'>Add to cart</a>";
    echo "<br><br><a href='productdetails.php'>Details</a>";
    echo "</div>";
    echo "</div>";
  }
  echo "</div>";
} else {
  echo 'Data Not Found';
}

?>
<script>
  var barData = [{
    value: 0
  },
  {
    value: 0
  },
  {
    value: 0
  }
  ];

  function increase(index) {
    var currentValue = barData[index].value;
    barData[index].value = currentValue + 1;
    updateNumberElement(index);
  }

  function decrease(index) {
    var currentValue = barData[index].value;
    if (currentValue > 1) {
      barData[index].value = currentValue - 1;
      updateNumberElement(index);
    }
  }

  function updateNumberElement(index) {
    var numberElement = document.getElementById('value-' + index);
    numberElement.textContent = barData[index].value;

    var minusSign = document.getElementsByClassName('minus-sign')[index];
    if (barData[index].value > 1) {
      minusSign.style.display = 'inline-block';
    } else {
      minusSign.style.display = 'none';
    }
  }
</script>