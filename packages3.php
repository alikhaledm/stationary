<?php
require_once("connect.php");
include("navbar.php");
?>
<html>
<title>packages</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
</head>
<style>
  .video-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
  }

  .video-container video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .container {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .left-column {
    flex: 1;
    padding-right: 20px;
  }

  .right-column {
    flex: 1;
    padding-left: 20px;
  }

  form {
    display: flex;
    flex-direction: column;
  }

  label,
  input,
  textarea {
    margin-bottom: 10px;
  }

  input[type="text"],
  input[type="email"],
  textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .container {

    display: flex;
    justify-content: center;
    align-items: center;
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

  select:hover,
  select:focus {
    border-color: #333;
  }

  option {
    padding: 5px;
  }

  .form-check-label-boy {

    padding-right: 10%;
  }

  .first-btn {
    height: 80%;
    font-size: 20px;
    background-color: ;
    color: black;
  }

  button {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: lightgray;
    color: white;
    border: none;
    cursor: pointer;
  }
</style>

<body>
  <div class="video-container">
    <video autoplay loop muted preload="auto" controlsList="nodownload" id="myVideo" onclick="startVideo()">
      <source src="images/packages/steps.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
  <br>
  <hr><br>

  <div class="container">
    <div class="left-column">
      <img src="images/packages/step1.png" alt="Image" width="110%">
    </div>
    <div class="right-column">
      <form>
        <label for="name">
          <h5>Name:</h5>
        </label>
        <input type="text" id="name" name="name">
        <label for="email">
          <h5>Email:</h5>
        </label>
        <input type="email" id="email" name="email">
        <label for="schools">
          <h5>Choose Your School:</h5>
        </label>
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
        <br>
        <label for="grade">
          <h5>Grade year:</h5>
        </label>
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
        <button onclick="scrollToBottom()">Step two</button>

        <div id="bottom"></div>
      </form>
    </div>
  </div>

  <hr>
  <div class="container">
    <div class="left-column">
      <form>
        <h2>
          <center>Your package is ready now you can view and edit it if you want</center>
        </h2><br>
        <div class="container">
          <button type="button" class="btn btn-circle btn-xl" id="openModalButton" data-bs-toggle="button">
            <p>Check Your Package</p>
          </button>
        </div>
      </form>

      <!-- Div Displayed in A modal -->
      <div class="modal-overlay" id="modal">
        <div class="modal-content">
          <button class="close-button" aria-label="Close" onclick="closeModal()">&#x2716;</button>
          <main>
            <section class="supplies-list">
              <h2 style="color:#ebbf2f;">Supply List</h2><br>
              <hr>
              <ul>
                <li>
                  <h3><img src="..." class="img-thumbnail" alt="..."> Ballpoint Pens</h3>
                  <p>Black ink, pack of 12</p>
                  <p class="price">400 EGP</p>
                  <hr>
                </li>
                <li>
                  <h3><img src="..." class="img-thumbnail" alt="..."> Highlighters</h3>
                  <p>Assorted colors, pack of 6</p>
                  <p class="price">350 EGP</p>
                  <hr>
                </li>
                <li>
                  <h3><img src="..." class="img-thumbnail" alt="..."> Notebooks</h3>
                  <p>Wide-ruled, 80 sheets</p>
                  <p class="price">1000 EGP</p>
                  <hr>
                </li>
                <li>
                  <h3><img src="..." class="img-thumbnail" alt="..."> Stapler</h3>
                  <p>Includes 1000 staples</p>
                  <p class="price">760 EGP</p>
                  <hr>
                </li>
                <li>
                  <h3><img src="..." class="img-thumbnail" alt="..."> Notebooks</h3>
                  <p>Wide-ruled, 80 sheets</p>
                  <p class="price">1000 EGP</p>
                  <hr>
                </li>
              </ul>
              <div class="total">
                <h5>Total Price: 22</h5>
              </div>
            </section>
          </main>
        </div>
      </div>
      <hr>

      <!-- Second Step CSS -->
      <style>
        .modal-overlay {
          position: fixed;
          top: 30%;
          left: 30%;
          width: 50%;
          height: 50%;
          background-color: rgba(0, 0, 0, 0.5);
          display: none;
          justify-content: center;
          align-items: center;
        }

        .modal-content {
          background-color: #fff;
          padding: 20px;
          border-radius: 5px;
          max-height: 80vh;
          overflow-y: auto;
        }

        .close-button {
          position: fixed;
          top: 15%;
          right: 20%;
          width: 5%;
          background: none;
          border: none;
          font-size: 1.2em;
          color: #ebbf3f;
          cursor: pointer;
          padding: 0;
          padding: 0%;
          border-radius: 5px;
        }

        .close-button:focus {
          outline: none;
        }

        .close-button:hover {
          color: #ebbf3f;
        }

        .total {
          margin-top: 20px;
        }

        .btn-circle.btn-xl {
          width: 70%;
          height: 35%;
          padding: 20px 40px;
          border-radius: 35px;
          font-size: 24px;
          background-color: #ccc;
          color: #fff;
          box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
          cursor: pointer;
        }
      </style>

      <!-- Second Step JS -->
      <script>
        function openModal() {
          var modal = document.getElementById("modal");
          modal.style.display = "flex";
        }

        function closeModal() {
          var modal = document.getElementById("modal");
          modal.style.display = "none";
        }

        var openButton = document.getElementById("openModalButton");
        openButton.addEventListener("click", openModal);

        var modal = document.getElementById("modal");
        modal.addEventListener("click", function (event) {
          if (event.target === modal) {
            closeModal();
          }
        });

        function scrollToBottom() {
          window.scrollBy(0, 5);
        }
      </script>

    </div>
    <div class="right-column">
      <img src="images/packages/step2.png" alt="Image" width="110%">
    </div>
  </div>
  <hr>

  <div class="container">
    <div class="left-column">
      <img src="images/packages/step3.png" alt="Image" width="110%">
    </div>
    <div class="right-column">
      <form>
        <h2>
          <center>Take a look at the Checkout to Receive your Package with the Best Quality and Price</center>
        </h2><br>
        <div class="container">
          <a href="checkout.php" class="btn btn-circle btn-xl" data-bs-toggle="button">
            <button type="submit" name="checkout" style="background-color:transparent;">Checkout</button>
          </a>
        </div>
      </form>
    </div>
  </div>
  <script>
    function startVideo() {
      var video = document.getElementById("myVideo");
      video.play();
    }
  </script>
</body>
<?php
include("footer.php")
  ?>

</html>