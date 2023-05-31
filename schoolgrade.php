<html>
<?php
require_once("connect.php");
session_start();

$sql = "SELECT * FROM userclass WHERE email = '" . $_SESSION['email'] . "'";
$result = mysqli_query($conn, $sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $childName = $_POST['childname'];
    $childAge = $_POST['childage'];
    $childemail = $_POST['childemail'];
    $childphoto = $_POST['childphoto'];
    $parentID = $_SESSION['id'];

    // Check if any input is empty and set it to NULL in the query if true
    $childName = empty($childName) ? "NULL" : "'$childName'";
    $childAge = empty($childAge) ? "NULL" : "'$childAge'";
    $childemail = empty($childemail) ? "NULL" : "'$childemail'";
    $childphoto = empty($childphoto) ? "NULL" : "'$childphoto'";

    $sql = "UPDATE student SET studentname=$childName, photo=$childphoto, dob=$childAge, studentemail=$childemail WHERE ParentId=$_SESSION[id]";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    }

    if ($result) {
        // Redirect to packages.php
        header("Location: schoolgrade1.php");
        exit(); // Make sure to exit after redirecting
    } else {
        // Print error message
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="schoolgradestyles.css">

</head>

<body>
    <script>
        // Add the fade-in class to the video container after a delay
        setTimeout(function() {
            var videoContainer = document.querySelector('.video-container');
            videoContainer.classList.add('fade-in');
        }, 6000); // Delay in milliseconds before adding the fade-in class
    </script>
    <center>
        <form method="post">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="padding-top:50;">Step 1: Enter Student's information</h1>
                        <?php
                        if ($_SESSION['acctype'] == "Student") {
                            if (empty($_SESSION['photo'])) {
                                echo '<img src="images/account/profile.png">';
                            } else {
                                echo '<img src="images/account/' . $_SESSION["photo"] . '';
                            }
                            echo '
                    <div class="col-md-12" style="padding-top:100;">
                    ' . $_SESSION['fname'] . ' ' . $_SESSION['lname'] .  '</div>
                    <div class="col-md-12 content">

                    <div class="col-md-12" style="padding-top:100;">
                    Email Provided By Your School:
                    ' . $_SESSION['studentemail'] . '</div>
                    <div class="col-md-12 content">

                    (' . floor((time() - strtotime($_SESSION['dob'])) / 31556926) . ' years old)<br><br>';
                        } else {
                            echo '
                    <img src="images/account/profile.png" alt="">
                    <input type="file" id="photo" name="childphoto" accept="image/*">
                </div>
                <div class="col-md-12" style="padding-top:10;">
                    Enter Student`s name
                </div>
                <div class="col-md-12 content">
                    <input type="text" name="childname"><br><br></div>
                <div class="col-md-12" required>
                <div class="col-md-12" style="padding-top:10;">
                Enter Student`s Email Provided By Their School
            </div>
            <div class="col-md-12 content">
                <input type="text" name="childemail"><br><br></div>
            <div class="col-md-12" required>
                    Enter Student`s Date Of Birth
                </div>
                <div class="col-md-12 content">
                    <input type="date" name="childage" required><br><br></div>
                <div class="col-md-12 content">
                    <input type="submit" value="Save">
                </div>
                ';
                        } ?>
                    </div>
        </form>
    </center>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>