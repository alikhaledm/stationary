<?php
require_once("connect.php");
include("navbar.php");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $productName = $_POST['name'];
  $pickupDate = $_POST['pdate'];
  $pdesc = $_POST['pdesc'];
  $quantity = $_POST['quantity'];


  // Check if file upload is successful
  if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $imageName = $_FILES['img']['name'];

    // Insert data into the "excess" table
    $userID = $_SESSION['id'];
    $sql = "INSERT INTO excess (type, product_name, product_photo, prod_desc, quantity, pickup_date, userid)
            VALUES ('Sale Request', '$productName', '$imageName', '$pdesc', '$quantity', '$pickupDate', $userID)";

    if (mysqli_query($conn, $sql)) {
      // Data insertion successful
      echo '<script>window.location.href = "thanksell.php";</script>';
      exit(); // Terminate the script after redirection
    } else {
      // Data insertion failed
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    // File upload error
    echo "Error uploading the image: " . $_FILES['img']['error'];
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Excess</title>
  <style>
    .cr {
      max-width: 700px;
      margin: 200px auto;
      /* Add margin to create space above and below the container */
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .sell {
      display: block;
      margin-top: 20px;
      font-weight: bold;
      color: #333;
    }

    .a {
      width: 100%;
      margin-top: 5px;
      margin-bottom: 15px;
      border: none;
      border-bottom: 1px solid grey;
      border-radius: 0;
    }

.container2{


background-color:#FFFEF4;
height: 1080px;
width:1250px;


}


  </style>
  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById('image-preview');
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</head>

<body style="font-family: Arial, sans-serif; background-color: white;">
  <div class="container">
  <div class="container2">
    <div class="row">
      <div class="col-6">
        <div class="cr">
         
          <form method="post" enctype="multipart/form-data">
            <h2><b>Add Product Details</b></h2>
            <br>

            <label for="name" class="sell">Product Name:</label>
            <input class="a" type="text" id="pname" name="name" required>

            <label for="product" class="sell">Product Description:</label>
            <textarea class="a" id="product" name="pdesc" required></textarea>

            <label for="quantity" class="sell">Quantity:</label>
            <input class="a" type="number" id="quantity" name="quantity" required>

            <img id="image-preview" style="max-width: 30%; margin-top: 10px;" />
            <label for="images" class="sell">Add Image Here:</label>
            <input type="file" id="images" name="img" accept="image/*" style="margin-top: 5px;" onchange="previewImage(event)">

            <label for="quantity" class="sell">Select Pickup Date:</label>
            <input class="a" type="date" id="quantity" name="pdate" required>
            <div class="termss">
              <h3 style=" margin-bottom: 10px;
      font-weight: bold;
      color: #333;">Terms and Conditions:</h3>
              <ul>

                <li>
                  <p style="  margin-bottom: 10px;
      color: #555;">I confirm that the product is brand new and unused.</p>
                </li>
                <li>
                  <p style="  margin-bottom: 10px;
      color: #555;">I confirm that the picture provided is an accurate representation of the product.</p>
                </li>
              </ul>
            </div>

            <label class="sell">
              <input type="checkbox" required>
              I agree to the terms and conditions
            </label>
            <center>
              <input type="submit" value="Submit" style="background-color:#EBBF2F;
      color: #fff;
      padding: 10px 0px 10px 0px;
      margin-top: 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 400px;">
            </center>
          </form>
        </div>
      </div>
      <div class="col-6" style="margin-top: 50;">
        <img src="images/excess/sell.png" alt="">
      </div>
    </div>
  </div>

  <script src="contactassets/java script/bootstrap.bundle.min.js"></script>
  <script src="contactassets/java script/all.min.js"></script>
  <script src="contactassets/java script/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<?php
include("footer.php");
?>