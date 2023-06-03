<html>
<?php
require_once("connect.php");
// errors off
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM userclass WHERE email = '" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $sql);

    $childName = $_POST['childname'];
    $childAge = $_POST['childage'];
    $childemail = $_POST['childemail'];
    $parentID = $_SESSION['id'];

    // Check if any input is empty and set it to NULL in the query if true
    $childName = empty($childName) ? "NULL" : "'$childName'";
    $childAge = empty($childAge) ? "NULL" : "'$childAge'";
    $childemail = empty($childemail) ? "NULL" : "'$childemail'";

    $sql = "UPDATE student SET studentname=$childName, dob=$childAge, studentemail=$childemail WHERE ParentId=$_SESSION[id]";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE parent SET ChildId = (SELECT studentid FROM student WHERE ParentId = '$parentID') WHERE ParentId = '$parentID'";
    $result = mysqli_query($conn, $sql);

    // save childid in session
    $sql = "SELECT studentid FROM student WHERE ParentId = '$parentID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['childid'] = $row['childid'];

    if ($_SESSION['acctype'] == 'Student') {
        $studentid = $_SESSION['id'];
        $studentemail = $_POST['studentemailstudent'];
        $studentdob = $_POST['dobstudent'];

        $sql = "UPDATE student SET studentemail='$studentemail', dob='$studentdob' WHERE studentid='$studentid'";
        $result = mysqli_query($conn, $sql);
    }

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
                            echo '
                    <div class="col-md-12" style="padding-top:100;">
                    Welcome, ' . $_SESSION['fname'] . ' ' . $_SESSION['lname'] .  '!</div>
                    <div class="col-md-12 content">

                    <div class="col-md-12" style="padding-top:100;">
                    Email Provided By Your School:
                    </div><div class="col-md-12 content">
                    <input type="text" name="studentemailstudent">
                    <div class="col-md-12 content">
                    Date Of Birth </div>
                    <div class="col-md-12 content">
                    <input type="date" name="dobstudent" required></div>
                    <div class="col-md-12 content">
                    <input type="submit" value="Save">
                    </div>
                    ';
                        } elseif ($_SESSION['acctype'] == "Parent") {
                            echo '

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
                        } else {
                            echo '<h5>
                            Introducing an exclusive feature for our student and parent account holders! Get a sneak peek of the remarkable capabilities our platform offers by checking out a sample profile below. Sign up now to unlock the full potential of our services and join our educational community!</h5>                            
                            <div class="col-md-12" style="padding-top:10;">
                                Enter Student`s name
                            </div>
                            <div class="col-md-12 content">
                                <input type="text" placeholder="John Doe" disabled><br><br></div>
                            <div class="col-md-12">
                            <div class="col-md-12" style="padding-top:10;">
                            Enter Student`s Email Provided By Their School
                        </div>
                        <div class="col-md-12 content">
                            <input type="text" placeholder="Johndoe@example.edu" disabled><br><br></div>
                        <div class="col-md-12">
                                Enter Student`s Date Of Birth
                            </div>
                            <div class="col-md-12 content">
                                <input type="text" placeholder="2000/12/23" disabled><br><br></div>
                            <div class="col-md-12 content">
                                <a href="schoolgrade1.php"><button>Next</button></a>
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