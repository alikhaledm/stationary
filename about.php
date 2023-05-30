<?php
include("navbar.php")
  ?>
<html>
<title>About Us</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">

<head>
  <style>
    h1 {
      font-family: "Avenir Light", sans-serif;
      font-size: 40px;
      text-align: center;
    }

    h2 {
      text-align: center;
      font-size: 40px;
    }

    .center-align {
      text-align: center;
      font-size: 100%;
    }

    .paragraph-container {
      display: flex;
      justify-content: center;
    }

    p {
      max-width: 700px;

    }

    /* For WebKit browsers (Chrome, Safari) */
    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      background-color: white;
    }

    ::-webkit-scrollbar-thumb {
      background-color: gray;
    }

    /* For Firefox */
    ::-moz-scrollbar {
      width: 10px;
    }

    ::-moz-scrollbar-track {
      background-color: #f1f1f1;
    }

    ::-moz-scrollbar-thumb {
      background-color: #888;
    }

    /* For Internet Explorer and Microsoft Edge */
    /* Note: Microsoft Edge supports the -ms-overflow-style property */
    /* to customize the scroll bar, but it's not widely supported */
    /* in other versions of IE. */
    /* Therefore, this code may not work in all IE versions. */
    /* It's recommended to test it in your target browsers. */
    .scrollbar {
      scrollbar-width: thin;
      scrollbar-color: #888 #f1f1f1;

    }

    .paragraph-container {
      display: flex;
      justify-content: center;
      max-width: 700px;
      margin: 0 auto;
      padding: 20px;
    }

    .true-sign-list {
      list-style-type: none;
      padding-left: 0;
      text-align: left;
    }

    .true-sign-list li::before {
      content: "\2714";
      margin-right: 5px;
      color: black;
    }
  </style>
</head>

<body>
  <h1>About Us</h1>
  <hr style="height: 3px;
        width: 50px;
        background-color: #FFC300;
        border: none;
        margin: 15px auto;
        margin-bottom:0;">

  <div class="center-align paragraph-container">
    <p>
      Welcome to our online stationery shop! <br>
      We are not your typical store for school supplies; we are a platform that believes in sustainability and giving
      back to the community.
      <br> Our Company is committed to reducing waste and promoting reuse. At the end of each school year, we collect
      used items from parents, carefully inspecting, cleaning, and reselling them. Any unsold items are donated to
      charitable organizations, ensuring a positive impact. Join us in making education sustainable and accessible for
      all."
    </p>
  </div>

  <div style="text-align: center;">
    <img src="images/bground.jpg" alt="About Us" style="max-width: 1500px;">
  </div>
  <br><br>
  <h2>Our Story</h2>
  <hr style="height: 3px;
        width: 50px;
        background-color: #FFC300;
        border: none;
        margin: 20px auto;
        margin-bottom:0;">

  <div class="center-align paragraph-container">
    <p>
      Our story began with a shared passion for creating innovative solutions.<br>
      We embarked on this journey with a vision to make a positive impact in the world. Through perseverance,
      dedication, and a strong belief in our mission, Today, our goal is to support parents by providing a convenient
      and hassle-free way to purchase school supplies. We understand the challenges parents face when it comes to
      preparing their children for school. We believe in simplifying the back-to-school shopping experience, saving
      parents valuable time and effort.
    </p>
  </div>


  <h1>Our Friends</h1>
  <hr style="height: 3px;
        width: 30px;
        background-color: #FFC300;
        border: none;
        margin: 20px auto;
        margin-bottom:1px;">

  <div class="center-align paragraph-container">
    <ul class="true-sign-list">
      <li>School Districts</li>
      <hr>
      <li>Post-Secondary Institutes</li>
      <hr>
      <li>Public & Private Enterprises</li>
      <hr>
      <li>Non-Government Organizations</li>
      <hr>
      <li>Community Groups</li>
      <hr>
    </ul>
  </div>
  <h1>What We Do</h1>
  <hr style="height: 3px;
        width: 50px;
        background-color: #FFC300;
        border: none;
        margin: 20px auto;
        margin-bottom:1px;">

  <div class="center-align paragraph-container">
    <div style="width: 50%; text-align: left; padding-right: 20px;">
      <h3>Providing Everything You Need for School</h3>
    </div>
    <div style="width: 50%; text-align: left;">
      <p>
        From pencils and notebooks to backpacks and calculators,
        we offer a wide range of school supplies to meet all your academic needs.
        Our goal is to ensure that students have access to high-quality,
        reliable, and affordable supplies for a successful learning experience.
      </p>
    </div>
  </div>

  <br> <br>
  <hr>
</body>
<?php
include("footer.php")
  ?>

</html>