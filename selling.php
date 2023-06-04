<?php
include("navbar.php")
  ?>
<html>
<title>Excess</title>
<title>Sell Excess Supplies</title>
<style>
  .cr {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .sell {
    display: block;
    margin-top: 10px;
    font-weight: bold;
    color: #333;
  }

  .a {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: none;
    border-bottom: 1px solid blue;
    border-radius: 0;

  }



  .termss {
    margin-top: 15px;
  }


  .termss p {
    margin-bottom: 10px;
    color: #555;
  }

  input[type="checkbox"] {
    margin-top: 10px;
  }
</style>
</head>

<body style="  font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: white;
    ">
  <h1 style=" text-align: center;
      margin-top: 50px;
      font-weight: bold;
      color: #333;">Sell/Donate Excess Supplies</h1>
  <div
    style="text-align: center; font-size: 100%; display: flex; justify-content: center; max-width: 700px; margin: 0 auto; padding: 20px;">
    <p>
      At Supplies Hub, we offer a unique opportunity for customers to sell their excess school supplies
      that they no longer need. This is a great way to recoup some of the costs of purchasing school
      supplies and to help other students in need.We believe that education should be accessible to all, and by coming
      together,
      we can create a more equitable and empowering educational experience for students
    </p>
  </div>

  <div class="cr">
    <form action="thankyou.php" method="post">
      <h2>Fill This Form</h2>

      <label for="name" class="sell">Name:</label>
      <input class="a" type="text" id="name" name="name" required>

      <label for="phone" class="sell">Phone Number:</label>
      <input class="a" type="tel" id="phone" name="phone" required>

      <label for="email" class="sell">Email:</label>
      <input class="a" type="email" id="email" name="email" required>

      <label for="address" class="sell">Address:</label>
      <textarea class="a" id="address" name="address" rows="3" required></textarea>

      <label for="product" class="sell">Product Name & Price:</label>
      <textarea class="a" id="product" name="product" rows="3" required></textarea>

      <label for="images" class="sell">Add Images Here:</label>
      <input type="file" id="images" name="images" accept="image/*" style=" margin-top: 5px;">

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
          <li>
            <p style="  margin-bottom: 10px;
      color: #555;">I agree to sell the product at the listed price.</p>
          </li>
          <li>
            <p style="  margin-bottom: 10px;
      color: #555;">I understand that the sale is final and non-refundable.</p>
          </li>
          <li>
            <p style="  margin-bottom: 10px;
      color: #555;">I agree to ship the product to the buyer within number of days after receiving payment.</p>
          </li>
        </ul>
      </div>

      <label class="sell">
        <input type="checkbox" required>
        I agree to the terms and conditions
      </label>

      <input type="submit" value="Submit" style=" background-color: black;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width:500px;">
    </form>
  </div>
  <script src="contactassets/java script/bootstrap.bundle.min.js"></script>
  <script src="contactassets/java script/all.min.js"></script>
  <script src="contactassets/java script/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>

<?php
include("footer.php")
  ?>