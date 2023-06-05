<html>
<?php
require_once("connect.php");
include("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $studentemail = $_POST['email'];
  $studentdob = $_POST['dob'];
  $school = $_POST['schools'];
  $grade = $_POST['grades'];

  if ($_SESSION['acctype'] == 'Student') {
    $studentid = $_SESSION['id'];

    $sql = "UPDATE student SET studentemail='$studentemail', dob='$studentdob', school_id='$school', grade='$grade' WHERE studentid='$studentid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo '<script>alert("Student updated successfully.");</script>';
    } else {
      echo '<script>alert("Failed to update student.");</script>';
    }
  } elseif ($_SESSION['acctype'] == 'Parent') {
    $parentid = $_SESSION['id'];

    $sql = "SELECT studentname FROM student WHERE userid=$parentid";
    $result = mysqli_query($conn, $sql);
    $childName = mysqli_fetch_assoc($result);

    if (empty($childName)) {
      $childdob = implode(',', $_SESSION['childdob']);
      $childemail = implode(',', $_SESSION['childemail']);
      $childschool = implode(',', $_SESSION['childschool']);
      $childgrade = implode(',', $_SESSION['childgrade']);

      $childName = $_POST['childname'];
      $_SESSION['childname'] = $childName;

      $sql = "INSERT INTO student (studentname, dob, studentemail, school_id, grade, userid) VALUES ('$childName', '$studentdob', '$studentemail', '$school', '$grade', {$_SESSION['id']})";
      $resultParent = mysqli_query($conn, $sql);

      $_SESSION['childname'] = $childName;
      $_SESSION['childdob'] = $studentdob;
      $_SESSION['childemail'] = $studentemail;
      $_SESSION['childschool'] = $school;
      $_SESSION['childgrade'] = $grade;

      if (!$resultParent) {
        echo '<script>alert("Failed to add student.");</script>';
      } else {
        echo '<script>alert("Student added successfully.");</script>';
      }

      $sql = "SELECT * FROM supplies_list WHERE school_id=$school AND grade=$grade";
      $resultlist = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($resultlist);

      $_SESSION['childlistid'] = $row['id'];
      $_SESSION['listname'] = $row['listname'];
      $_SESSION['listprice'] = $row['total_price'];
      $_SESSION['listpdf'] = $row['pdf'];

      if (!$resultlist) {
        echo '<script>alert("Failed to retrieve list.");</script>';
      } else {
        echo '<script>alert("List retrieved successfully.");</script>';
      }
    } elseif (!is_array($_SESSION['childname']) && (!empty($_SESSION['childname']))) {
      // Convert childname session variable to an array
      $_SESSION['childname'] = array($_SESSION['childname']);
      $_SESSION['childdob'] = array($_SESSION['childdob']);
      $_SESSION['childemail'] = array($_SESSION['childemail']);
      $_SESSION['childschool'] = array($_SESSION['childschool']);
      $_SESSION['childgrade'] = array($_SESSION['childgrade']);

      $_SESSION['childname'][] = $_POST['childname'];
      $_SESSION['childdob'][] = $_POST['dob'];
      $_SESSION['childemail'][] = $_POST['email'];
      $_SESSION['childschool'][] = $_POST['schools'];
      $_SESSION['childgrade'][] = $_POST['grades'];

      // Insert the new child into the database
      $childName = $_POST['childname'];
      $childDob = $_POST['dob'];
      $childEmail = $_POST['email'];
      $childSchool = $_POST['schools'];
      $childGrade = $_POST['grades'];

      $sql = "INSERT INTO student (studentname, userid, studentemail, dob, school_id, grade) VALUES ('$childName', '$parentid', '$childEmail', '$childDob', '$childSchool', '$childGrade')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo '<script>alert("Student added successfully.");</script>';
      } else {
        echo '<script>alert("Failed to add student.");</script>';
      }

      $sql = "SELECT * FROM supplies_list WHERE school_id='$childSchool' AND grade='$childGrade'";
      $resultlist = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($resultlist);

      $_SESSION['childlistid'] = $row['id'];
      $_SESSION['listname'] = $row['listname'];
      $_SESSION['listprice'] = $row['total_price'];
      $_SESSION['listpdf'] = $row['pdf'];

      if (!$resultlist) {
        echo '<script>alert("Failed to retrieve list.");</script>';
      } else {
        echo '<script>alert("List retrieved successfully.");</script>';
      }
    } elseif (is_array($_SESSION['childname'])) {
      // Add the new child name to the existing array
      $_SESSION['childname'][] = $_POST['childname'];

      // Insert the new child into the database
      $childName = $_POST['childname'];
      $sql = "INSERT INTO student (studentname, userid, studentemail, dob, school_id, grade) VALUES ('$childName', '$parentid', '$studentemail', '$studentdob', '$school', '$grade')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo '<script>alert("Student added successfully.");</script>';
      } else {
        echo '<script>alert("Failed to add student.");</script>';
      }

      // Rest of the code to handle other session variables and database operations
      // ...
    }
  }
}
?>

<head>
  <title>packages</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <video id="myVideo" onclick="startVideo()">
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
      <form method="POST" id="bottom">
        <?php
        if ($_SESSION['acctype'] == "Parent") {
          if (empty($childName)) {
            include("packagesform.php");
          }
          // if parent has 1 student
          elseif (!is_array($_SESSION['childname']) && (!empty($_SESSION['childname']))) {
            echo '<h5>Are You Looking For ' . $_SESSION['childname'] . '`s Supply list?</h5>
            <span class="pointer" style="color:black;" class="bg-transparent" onclick="scrollToElement()">&bull;&nbsp;Yes</span>
            <span class="pointer" onclick="toggleDropdown()">&bull;&nbsp;No i want to add a new student</span>
            <div id="dropdownContainer" class="dropdown-container">
            ';
            include("packagesform.php");
            echo '</div>';
          }
          // if parent has more than 1 student
          else {
            $parentid = $_SESSION['id'];

            $sql = "SELECT * FROM student WHERE userid=$parentid"; // Modified query to select all columns
            $result = mysqli_query($conn, $sql);

            echo '
            <h5>Select from your students &darr;</h5>
            <select name="Student">';
            while ($row = mysqli_fetch_array($result)) {
              echo '<option value="' . $row['studentid'] . '">' . $row['studentname'] . '</option>'; // Corrected column names
            }
            echo '</select><br><b>Or,</b><br>
            <span class="pointer" onclick="toggleDropdown()">&bull;&nbsp; Click Here To Add Student</span>
            <div id="dropdownContainer" class="dropdown-container">';
            include("packagesform.php");
            echo '</div>';
          }
        }
        ?>

        <div></div>
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
            <p id="targetElement">Check Your Package</p>
          </button>
        </div>
      </form>

      <!-- Div Displayed in A modal -->
      <div class="modal-overlay" id="modal">
        <div class="modal-content">
          <button class="close-button" aria-label="Close" onclick="closeModal()">&#x2716;</button>
          <main>
            <section class="supplies-list">
              <?php
              if (empty($_SESSION['childlistid'])) {
                error_reporting(0);
                ini_set('display_errors', FALSE);

                echo "<h2 style='background-color:transparent; text-align:center;'>Please Enter Student Details To Display Their Assigned Supply List</h2>";
              } else {
                echo '<h2 style="color:#ebbf2f;">Supply List</h2>Code: <b><a href="pdfs/' . $_SESSION["listname"] . '.pdf">' . $_SESSION["listname"] . '</a></b>
              <hr>
              <ul>';
                $sql = "SELECT s.prodcategory, p.pname FROM supplylistitems s INNER JOIN products p ON s.productid = p.id WHERE s.supplylistid = {$_SESSION['childlistid']}";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                  $groupedProducts = array(); // Associative array to store products grouped by category

                  while ($rowdata = mysqli_fetch_assoc($result)) {
                    $category = $rowdata['prodcategory'];
                    $productName = $rowdata['pname'];

                    // Check if the category exists in the array
                    if (!array_key_exists($category, $groupedProducts)) {
                      // If category does not exist, create an empty array for the category
                      $groupedProducts[$category] = array();
                    }

                    // Add the product to the respective category array
                    $groupedProducts[$category][] = $productName;
                  }

                  // Display the grouped products
                  foreach ($groupedProducts as $category => $products) {
                    echo '<li><span style="font-size:25px;">' . $category . '</span>';
                    echo '<ol>';
                    foreach ($products as $product) {
                      echo '<li>' . $product . '</li>';
                      echo '<hr>';
                    }
                    echo '</ol></li></ul>';
                  }
                }
                echo '
              <div class="total">
                <h5>Total Price: ' . $_SESSION['listprice'] . ' EGP</h5>
              </div>
              ';
              }
              ?>
            </section>
          </main>

        </div>
      </div>
      <hr>

      <!-- Second Step CSS -->
      <style>
        .dropdown-container {
          display: none;
        }

        .pointer {
          cursor: pointer;
        }

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
        function scrollToElement() {
          var element = document.getElementById("targetElement");
          element.scrollIntoView({
            behavior: "smooth"
          });
        }

        function toggleDropdown() {
          var dropdownContainer = document.getElementById("dropdownContainer");
          if (dropdownContainer.style.display === "none") {
            dropdownContainer.style.display = "block";
          } else {
            dropdownContainer.style.display = "none";
          }
        }

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
        modal.addEventListener("click", function(event) {
          if (event.target === modal) {
            closeModal();
          }
        });
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
          <a href="cart.php" class="btn btn-circle btn-xl" data-bs-toggle="button">
            <p>Checkout</p>
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