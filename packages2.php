<?php
require_once("connect.php");
include("navbar.php");
?>
<html>
<title>packages</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
</head>
<style>
  .container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    max-width: 90%;
    max-height: 500%;
    background: linear-gradient(to bottom, #f6f6ff, white);
  }

  .photo {
    flex-basis: 70%;
    padding: 20px;
  }

  .photo img {
    width: 100%;
    height: auto;
  }

  .text-box {
    flex-basis: 50%;
    margin: ;
    padding: 150px;
    color: black;
    animation-name: move;
    animation-duration: 2s;
    animation-iteration-count: infinite;
  }

  @keyframes move {
    0% {
      transform: translateX(0);
    }

    50% {
      transform: translateX(50px);
    }

    100% {
      transform: translateX(0);
    }
  }


  h2 {
    font-size: 2em;
    margin-bottom: 10%;
  }

  p {
    font-size: 1.5em;
    line-height: 1.5;
  }
</style>

<body>

  <div class="container">
    <div class="photo">
      <img src="images/packages/8.png" alt="...">
    </div>
    <div class="text-box">
      <h2>HURRY AND GET YOUR PACKAGE NOW</h2>
      <a href="packages3.php" class="btn" role="button" data-bs-toggle="button">
        <p>Start Now &nbsp; <img width="20" height="20" src="images/forward.svg"></p>
      </a>
    </div>
  </div>

</body>

</html>