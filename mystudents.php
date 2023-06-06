<?php
require_once("connect.php");?>
<html>
<head>
    <title>My Students</title>
    <link rel="stylesheet" href="stylesacc.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">
</head>
    <style>
        svg {
            cursor: pointer;
        }

        .acclink {
            text-decoration: none;
            color: black;
        }

        .customa {
            color: black;
            text-decoration: none;
            font-size:20px;
            font-weight :bold;
        }

        .customa:hover {
            color: #ebbf2f;
        }

        .customa:active {
            color: red;
        }

        .centercontainer {
          width:100%;
   
        }

        .cardd {
        width: 300;
        height: 300;
        justify-content: center;
        align-items: center;
    }

    .carddsmall {
        width: 100;
        height: 200;
        justify-content: center;
        align-items: center;
    }

    .bfont {
        font-size: 25;
    }

    p {
        font-size: 15;
    }

    .bsmallerfont {
        font-size: 15;
    }

    .btnproductdetails {
        border: none;
        background-color: #FAD43D;
        border-radius: 2px;
        width: 150px;
        height: 40px;
    }

    .btnproductdetails:hover {
        background-color: orange;
        color: balck;
        border: none;
        width: 150px;
        height: 40px;
    }

    form {
  display: flex;
  flex-direction: column;
}

label, input, textarea {
  margin-bottom: 10px;
}

input[type="text"], input[type="email"], textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

select {
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: #fff;
  font-size: 16px;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url('down-arrow.png');
  background-position: right center;
  background-repeat: no-repeat;
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  cursor: pointer;
}

select:hover, select:focus {
  border-color: #333;
}

option {
  padding: 5px;
}

  
    </style>

<body>
    <?php
    include("navbar.php");
    ?>
    
    <div class="container-account" id="fade-container">
        <div class="row">
            <div class="col-md-12">
            <div id="content">
            <div class="card text-bg-dark">
  <img src="images/account/1c.png" class="card-img" alt="..." >
  <div class="card-img-overlay">
   
  </div>
</div>
     <div>
     </div>
            <b style="font-size:25px; color:#ebbf2f;">
            <?php
                echo ucfirst($_SESSION['fname']);
                echo "&nbsp;" . ucfirst($_SESSION['lname']);
                ?>
                </div>
                </b>
            </div>
        </div>
    </div>


    <div class="container-account" id="fade-container">
        <div class="row">
            <div class="col-md-12">
            <div id="content">
      <i class="fa-solid fa-camera"></i>
      <img src="images/" alt="">
      <p class="text-white">
                </div>
                </b>
            </div>
        </div>
  

    
        <hr style="height: 2px solid black">
        <div class="col-12 centercontainer">
          
        <a href="orders.php" class="customa">My Orders</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <a href="address.php" class="customa">My Addresses</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <a href="wallet.php" class="customa" >My Wallet</a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <a href="subscription.php" class="customa">My Subscriptions</a>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <a href="mystudents.php" class="customa" style="color:#ebbf2f">My Students</a>
                
            </div>
        <hr>
    </div>
    <div class="container-account pt-3">
        <div class="row">
            <div class="col-md-6"><b style="font-size:20;">My Students </b></div>
        </div>
    </div>
    <div class="container-account" style="padding-bottom:100px;">
        <div class="row">
            <div class="col-md-12">View favorite products you've saved to your wishlist.</div>
            <br><br><hr>
            <div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      
      <div class="card-body">
        <h5 class="card-title">My Student</h5><hr>
        <form>
          <div>
      <label for="name"><h6>Name:</h6></label>
      <input type="text" id="name" name="name"><br></div>
      <div>
      <label for="email"><h6>Email:</h6></label>
      <input type="email" id="email" name="email"><br></div>
      <div>
      <label for="schools"><h6>Choose Your School:</h6></label>
<select id="Schools" name="schools">
<option value="Choose Your sachool">Choose Your School</option>
  <option value="Malvern College">Malvern College</option>
  <option value="Eternity Schools of egypt">Eternity Schools of egypt</option>
  <option value="New Generation">New Generation</option>
  <option value="Cairo English School">Cairo English School</option>
  <option value="New Horizon">New Horizon</option>
  <option value="British And American">British And American</option>
  <option value="ETHOS">ETHOS</option>
</select>
  </div>
<br>
<div>
<label for="grade"><h6>Grade year:</h6></label>
<select id="grade" name="grade">
<option value="grade">Choose Your Grade level</option>
  <option value="1">Grade 1</option>
  <option value="2">Grade 2</option>
  <option value="3">Grade 3</option>
  <option value="4">Grade 4</option>
  <option value="5">Grade 5</option>
  <option value="6">Grade 6</option>
  <option value="7">Grade 7</option>
  <option value="8">Grade 8</option>
  <option value="9">Grade 9</option>
  <option value="10">Grade 10</option>
  <option value="11">Grade 11</option>
  <option value="12">Grade 12</option>
</select>
  </div>
<br>
    </form>
  </div>
</div>


    </form>
      
            
    </div>
    </div>

</body>
</html>