<html>
<?php
include("navbar.php");
?>

<head>
  <link rel="stylesheet" href="contactassets/css/all.min.css">
  <link rel="stylesheet" href="contactassets/css/bootstrap.min.css">
  <link rel="stylesheet" href="contactassets/css/stylesheet.css">
</head>

<body>
  <!--STAR CONTACT-->
  <div class="container">
    <div id="contact">

      <div id="contactImage">
        <img src="images/project-8.jpg">

        <div id="contContent">
          <h1 class="">Contact</h1>
          <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus!<br>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          <div id="icons">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin-in"></i>
          </div>
        </div>
      </div>

    </div>


  </div>

  <!--END CONTACT-->


  <!--start CONTACTFORM-->

  <div id="contactForm">
    <div class="container" id="">

      <div class="row">
        <div class="col-md-6">
          <h2>Contact details</h2>
          <p>500 terry francie St</p>
          <p>San Fransisco, CA94158</p>
          <p>123-456-7890</p>
          <p>INFO@mysite.com</p>
        </div>

        <div class="col-md-6">
          <form>
            <div id="formcont" class="d-flex justify-content-between align-items-center ">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">first name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">second name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">massege</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          </form>

        </div>

      </div>
    </div>

  </div>
  <!--END CONTACTFORM-->
  <!--start MAP-->
  <div class="container mb-5">
    <div class="google-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3451.9563763313276!2d31.371153475087887!3d30.095435674897956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458161683934e59%3A0x4567a95d150917ef!2sArab%20Academy%20for%20Science%2C%20Technology%20%26%20Maritime%20Transport%20-%20Engineering%20Building%20B%2C%20Sheraton%20Al%20Matar%2C%20El%20Nozha%2C%20Cairo%20Governorate%204471314!5e0!3m2!1sen!2seg!4v1683561867960!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
  <!--END MAP-->
  <script src="contactassets/java script/bootstrap.bundle.min.js"></script>
  <script src="contactassets/java script/all.min.js"></script>
  <script src="contactassets/java script/main.js"></script>
</body>
<?php
include("footer.php");
?>

</html>