
<?php
include("navbar.php")
  ?>
<html>
<title>Excess</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Sell Excess Supplies</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: white;
    }
    .cr {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
      color: #333;
    }
    
    input[type="text"],
    input[type="em"],
    input[type="tel"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: none;
      border-bottom: 1px solid blue;
      border-radius: 0;
      
    }
    
    input[type="file"] {
      margin-top: 5px;
    }
    
    .terms {
      margin-top: 15px;
    }
    
  
    .terms p {
      margin-bottom: 10px;
      color: #555;
    }
    
    input[type="checkbox"] {
      margin-top: 10px;
    }
    
    input[type="submit"] {
      background-color: black;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1 style=" text-align: center;
      margin-top: 50px;
      font-weight: bold;
      color: #333;">Sell/Donate Excess Supplies</h1>
      <div style="text-align: center; font-size: 100%; display: flex; justify-content: center; max-width: 700px; margin: 0 auto; padding: 20px;">
    <p>
      At Supplies Hub, we offer a unique opportunity for customers to sell their excess school supplies
      that they no longer need. This is a great way to recoup some of the costs of purchasing school 
      supplies and to help other students in need.We believe that education should be accessible to all, and by coming together,
       we can create a more equitable and empowering educational experience for students 
    </p>
  </div>
  
  <div class="cr">
    <form>
      <h2>Fill This Form</h2>
      
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required>
      
      <label for="email">Email:</label>
      <input type="email" id="em" name="email" required>
      
      <label for="address">Address:</label>
      <textarea id="address" name="address" rows="3" required></textarea>
      
      <label for="product">Product Name & Price:</label>
      <textarea id="product" name="product" rows="3" required></textarea>
      
      <label for="images">Add Images Here:</label>
      <input type="file" id="images" name="images" accept="image/*">
      
      <div class="terms">
        <h3 style=" margin-bottom: 10px;
      font-weight: bold;
      color: #333;">Terms and Conditions:</h3>
      <ul>

      <li>  <p style="  margin-bottom: 10px;
      color: #555;">I confirm that the product is brand new and unused.</p></li>
      <li>  <p style="  margin-bottom: 10px;
      color: #555;">I confirm that the picture provided is an accurate representation of the product.</p></li>
       <li> <p style="  margin-bottom: 10px;
      color: #555;">I agree to sell the product at the listed price.</p></li>
       <li> <p style="  margin-bottom: 10px;
      color: #555;">I understand that the sale is final and non-refundable.</p></li>
       <li> <p style="  margin-bottom: 10px;
      color: #555;">I agree to ship the product to the buyer within number of days after receiving payment.</p>
    </li>
</ul>  
    </div>
      
      <label>
        <input type="checkbox" required>
        I agree to the terms and conditions
      </label>
      
      <input type="submit" value="Submit">
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
</html>
