<?php
include("navbar.php");
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
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
</style>

<body>
  <!--STAR CONTACT-->
  <div class="container">
    <div id="contact">

      <div id="contactImage">
        <img src="images/canvas.png" width=70%>

        <div id="contContent">
          <h1 class="">Contact</h1>
          <p class=""> Contact Our Team!<br> Email Address: supplieshub@gmail.com</p>
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
          <p>Sheraton Heliopolis </p>
          <p>Cairo, Egypt</p>
          <p>01288998854</p>
          <p>supplieshub@gmail.com</p>
        </div>

        <div class="col-md-6">
          <form>
            <div id="formcont" class="d-flex justify-content-between align-items-center ">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Second Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Message</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div> <button class="btn btn-warning w-100">Send Message</button></div>
          </form>

        </div>

      </div>
    </div>

  </div>
  <!--END CONTACTFORM-->
  <!--start MAP-->
  <div class="container mb-5">
    <div class="google-map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3451.9563763313276!2d31.371153475087887!3d30.095435674897956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458161683934e59%3A0x4567a95d150917ef!2sArab%20Academy%20for%20Science%2C%20Technology%20%26%20Maritime%20Transport%20-%20Engineering%20Building%20B%2C%20Sheraton%20Al%20Matar%2C%20El%20Nozha%2C%20Cairo%20Governorate%204471314!5e0!3m2!1sen!2seg!4v1683561867960!5m2!1sen!2seg"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
  <!--END MAP-->
  <script src="contactassets/java script/bootstrap.bundle.min.js"></script>
  <script src="contactassets/java script/all.min.js"></script>
  <script src="contactassets/java script/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
<?php
include("footer.php");
?>

</html>