<html>
<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $school = $_POST['schools'];
    $grade = $_POST['grades'];
    if ($_SESSION['acctype'] == 'Student') {
        $studentid = $_SESSION['id'];

        $sql = "UPDATE student SET school_id='$school', grade='$grade' WHERE studentid='$studentid'";
        $resultstudent = mysqli_query($conn, $sql);
    } elseif ($_SESSION['acctype'] == 'Parent') {
        $studentid = $_SESSION['childid'];
        $parentid = $_SESSION['id'];

        $sql = "UPDATE student SET school_id='$school', grade='$grade' WHERE ParentId ='$parentid'";
        $resultstudent = mysqli_query($conn, $sql);
    }
    // Update the student table with the school ID and grade

    if ($resultstudent) {
        // Redirect to packages.php
        header("Location: packages.php");
        exit(); // Make sure to exit after redirecting
    } else {
        // Print error message
        echo "Error: " . mysqli_error($conn);
    }
    if ((empty($_SESSION['acctype'])) || ($_SESSION['acctype'] == 'User')) {
        error_reporting(0);
        header("Location: packages.php");
    }
}

?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .centered {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .centered2 {
            display: flex;
            justify-content: center;
        }

        input {
            background-color: white;
            height: 50%;
            width: 40%;
        }


        .introbutton {
            border: none;
            width: 250;
            opacity: 0.7;
            background-color: #FBD334;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            transition-duration: 0.5s;
            cursor: pointer;
            border-radius: 10px;
            outline: none;
            /* Remove outline on button click */
        }

        .introbutton:hover {
            outline: none;
            /* Remove outline on button click */
            opacity: 1;
            background-color: orange;
            border: none;
        }

        @keyframes flipIn {
            0% {
                opacity: 0;
                transform: translateX(-100%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .centeredtop {
            justify-content: center;
        }

        .centered-content {
            animation: flipIn 1s;
        }

        @keyframes flipButton {
            0% {
                opacity: 0;
                transform: translateX(-100%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
    <script>
        // Add the fade-in class to the video container after a delay
        setTimeout(function () {
            var videoContainer = document.querySelector('.video-container');
            videoContainer.classList.add('fade-in');
        }, 6000); // Delay in milliseconds before adding the fade-in class
    </script>
</head>

<body>
    <?php include("startvideo.php");
    ?>
    <center>
        <form method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="padding-top:50px;">Step 1: What School Do You Attend?</h1>
                    </div>
                    <div class="col-md-12" style="padding-top:20px;">
                        Select Student's School
                        <select name="schools">
                            <?php
                            $query = "SELECT * FROM school";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $name = $row['name'];

                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12" style="padding-top:20px;">
                        Select Student's Grade
                        <select name="grades">
                            <?php
                            $sqlgrade = "SELECT * FROM grade";
                            $resultgrade = mysqli_query($conn, $sqlgrade);

                            if (mysqli_num_rows($resultgrade) > 0) {
                                while ($row = mysqli_fetch_assoc($resultgrade)) {
                                    $gradeid = $row['id'];
                                    $gradename = $row['name'];
                                    echo '<option value="' . $gradeid . '">' . $gradename . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 mb-0" style="padding-top:20px; height:150px;">
                        <input type="submit" value="Save" class="mb-0">
                    </div>
                </div>
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
</body>

</html>