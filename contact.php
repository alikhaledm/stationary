<?php
require_once("connect.php") ?>


<?php
include("spinner.php");
?>

<?php
include("navbar.php")
  ?>
<!DOCTYPE html>

<html lang="en">


<style>
  .contactsalpha {
    font-size: 30px;
    color: #f5d142;

  }

  .contactsbeta {

    font-size: 40px;
    color: black;
  }

  .containercontact {
    background-color: #f5f7fa;

  }



  .contactssmall {

    color: #f5d142;
  }

  .btncontact {
    width: 100%;
    background-color: gold;
    color: white;
  }

  .btncontact:hover {
    background-color: orange;
    color: black;
  }

  .centered {
    justify-content: center;
    align-items: center;
    display: flex;

  }
</style>

<body>


  <style>
    .activecontact {
      color: gold;
    }
  </style>


  <section class="py-5">
    <div class="container-fluid imagecontainer containercontact py-5">
      <div class="row centered">
        <div class="col-md-6 col-xl-6 ">
          <p class="fw-bold mb-2 contactsalpha">Contacts</p>
          <h2 class="fw-bold contactsbeta">How You Can Reach Us</h2>
        </div>
      </div>
      <div class="row d-flex justify-content-center">


        <div class="col-md-6 d-flex justify-content-center justify-content-xl-start">
          <div class="d-flex flex-wrap flex-md-column justify-content-md-start align-items-md-start h-100">
            <div class="d-flex align-items-center p-3">
              <div
                class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                  class="bi bi-telephone">
                  <path
                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                  </path>
                </svg>
              </div>
              <div class="px-2">
                <h6 class="fw-bold mb-0 contactssmall">Phone Number</h6>
                <p class="text-muted mb-0">+201000086123</p>
              </div>
            </div>
            <div class="d-flex align-items-center p-3">
              <div
                class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                  class="bi bi-envelope">
                  <path fill-rule="evenodd"
                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z">
                  </path>
                </svg>
              </div>
              <div class="px-2">
                <h6 class="fw-bold mb-0 contactssmall">Email</h6>
                <p class="text-muted mb-0">supplieshub@gmail.com</p>
              </div>
            </div>
            <div class="d-flex align-items-center p-3">
              <div
                class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                  class="bi bi-pin">
                  <path
                    d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354zm1.58 1.408-.002-.001.002.001zm-.002-.001.002.001A.5.5 0 0 1 6 2v5a.5.5 0 0 1-.276.447h-.002l-.012.007-.054.03a4.922 4.922 0 0 0-.827.58c-.318.278-.585.596-.725.936h7.792c-.14-.34-.407-.658-.725-.936a4.915 4.915 0 0 0-.881-.61l-.012-.006h-.002A.5.5 0 0 1 10 7V2a.5.5 0 0 1 .295-.458 1.775 1.775 0 0 0 .351-.271c.08-.08.155-.17.214-.271H5.14c.06.1.133.191.214.271a1.78 1.78 0 0 0 .37.282z">
                  </path>
                </svg>
              </div>
              <div class="px-2">
                <h6 class="fw-bold mb-0 contactssmall">Location</h6>
                <p class="text-muted mb-0">Sheraton, Heliopolis</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container-fluid mb-5">
    <div class="row">
      <div class="col-lg-12">
        <div class="google-map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3451.9563763313276!2d31.371153475087887!3d30.095435674897956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458161683934e59%3A0x4567a95d150917ef!2sArab%20Academy%20for%20Science%2C%20Technology%20%26%20Maritime%20Transport%20-%20Engineering%20Building%20B%2C%20Sheraton%20Al%20Matar%2C%20El%20Nozha%2C%20Cairo%20Governorate%204471314!5e0!3m2!1sen!2seg!4v1683561867960!5m2!1sen!2seg"
            width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>

  <?php [include "footer.php"] ?>

  <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>