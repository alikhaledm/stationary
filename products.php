<?php
require_once("connect.php");
include("navbar.php");

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

?>

<html>
<title>School Supplies List</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
  .bar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 200px;
    height: 40px;
    border: 1px solid #000;
  }

  .number {
    font-size: 18px;
    font-weight: bold;
    margin: 0 10px;
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

  <div class=container-fluid>
    <div class=row>
      <div class=col-md-2>
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

      <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <div class="col">
            <div>
              <img src="images\Shop\products\<?php echo $row['photo']; ?>" style="width:200px" alt="Product Image">
              <h5><?php echo $row['pname']; ?></h5>
              <p><?php echo $row['pdesc']; ?></p>
              <p>$ <?php echo $row['price']; ?></p>
              <a href="cart.php?id=<?php echo $row['id']; ?>">Add to Cart</a>
              <br><a href="product.php?id=<?php echo $row['id']; ?>">More</a>
            </div>
          </div>
        <?php endwhile; ?>
      </div>



</body>

</html>