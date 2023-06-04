<?php
require_once("connect.php");
include("navbar.php");

if ($_SESSION['acctype'] == "Student") {
    $sql = "SELECT name FROM userclass WHERE id = " . $_SESSION['id'];
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];

        $sql = "SELECT * FROM student";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $age = $row['dob'];
                $studentemail = $row['studentemail'];
                $school = $row['school_id'];
                $grade = $row['grade'];
            }
        }
    }
} elseif ($_SESSION['acctype'] == "Parent") {
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $studentname = $row['studentname'];
            $age = $row['dob'];
            $studentemail = $row['studentemail'];
            $school = $row['school_id'];
            $grade = $row['grade'];
        }
    }
}
$sql = "SELECT name FROM school WHERE id = $school";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $schoolname = $row['name'];
}

$sql = "SELECT name FROM grade WHERE id = $grade";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $gradename = $row['name'];
}
if ((empty($_SESSION['acctype'])) || ($_SESSION['acctype'] == 'User')) {
    error_reporting(0);
}
?>

<html>
<title>School Supplies List</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<style>
    .container-fluid-packages {
        width: 100%;
    }

    .card {
        width: 300px;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: inline-block;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-content {
        text-align: center;
    }

    h2 {
        color: #333;
        margin-top: 0;
    }

    p {
        color: #777;
    }


    .stylish-select {
        appearance: none;
        background-color: #f5f5f5;
        color: #333;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        width: 200px;
    }

    .stylish-select:focus {
        outline: none;
        border-color: #aaa;
        box-shadow: 0 0 5px #aaa;
    }

    .checkbox-container {
        margin-bottom: 10px;
    }

    .form-check-input {
        position: absolute;
        opacity: 0;
    }

    .form-check-label {
        position: relative;
        padding-left: 30px;
        cursor: pointer;
        font-size: 14px;
        color: #333;
    }

    .form-check-label:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        border: 2px solid #999;
        border-radius: 4px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
    }

    .form-check-input:checked+.form-check-label:before {
        background-color: #337ab7;
    }

    .form-check-label:after {
        content: "";
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        width: 4px;
        height: 8px;
        border: solid #fff;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .form-check-input:checked+.form-check-label:after {
        opacity: 1;

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
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="row left-row">';

                    <!-- Content for left-side column -->
                    <?php
                    if ($_SESSION['acctype'] == "Student") {
                        echo '
                    <div class="col-lg-12">
                        <b>Student Name: </b>' . $name . '
                    </div>
                    ';
                    } else {
                        echo '
                        <div class="col-lg-12">
                        <b>Student Name: </b>' . $studentname . '
                    </div>
                    <div class="col-lg-12">
                        <b>Age: </b>' . floor((time() - strtotime($age)) / 31556926) . '
                    </div>
                    <div class="col-lg-12">
                        <b>Student Email: </b>' . $studentemail . '
                    </div>
                    <div class="col-lg-12">
                        <b>School: </b>' . $schoolname . '
                    </div>
                    <div class="col-lg-12">
                        <b>Grade: </b>' . $gradename . '
                    </div>
                    <div class="col-lg-12">
                        <b>Supplies Availability: </b>Yes
                    </div>
                    ';
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-9">
                <!-- Right-side columns -->
                <div class="row">
                    <div class="col-lg-12 card mt-3">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="text-left">
                                    Notebooks
                                </div>
                                <div class="arrow-toggle ml-auto" onclick="toggleExpansion(this)">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body expandable-content">


                            <div class="checkbox-container">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="black-notebook" name="notebook" value="black" checked>
                                    <label class="form-check-label" for="black-notebook">
                                        Black Notebook
                                    </label>
                                </div>
                            </div>

                            <div class="checkbox-container">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="white-notebook" name="notebook" value="white" checked>
                                    <label class="form-check-label" for="white-notebook">
                                        White Notebook
                                    </label>
                                </div>
                            </div>

                            <div class="checkbox-container">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="red-notebook" name="notebook" value="red" checked>
                                    <label class="form-check-label" for="red-notebook">
                                        Red Notebook
                                    </label>
                                </div>
                            </div>




                        </div>
                    </div>

                    <div class="col-lg-12 card mt-3">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="text-left">
                                    This card can be expanded
                                </div>
                                <div class="arrow-toggle ml-auto" onclick="toggleExpansion(this)">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body expandable-content">
                            Right-side Content 1
                        </div>
                    </div>
                    <div class="col-lg-12 card mt-3">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="text-left">
                                    This card can be expanded
                                </div>
                                <div class="arrow-toggle ml-auto" onclick="toggleExpansion(this)">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body expandable-content">
                            Right-side Content 1
                        </div>
                    </div>
                    <div class="col-lg-12 card mt-3">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="text-left">
                                    This card can be expanded
                                </div>
                                <div class="arrow-toggle ml-auto" onclick="toggleExpansion(this)">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body expandable-content">
                            Right-side Content 1
                        </div>


                    </div>

                    <div class="col-lg-12 mt-3">

                        <a href="signup2.php"> <button class="btn">ADD TO CART</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function toggleExpansion(element) {
            $(element).toggleClass("expanded");
            $(element).parent().parent().siblings(".card-body.expandable-content").slideToggle();
        }
    </script>
</body>


<?php
include("footer.php")
?>