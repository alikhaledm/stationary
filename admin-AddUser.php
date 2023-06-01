<!DOCTYPE html>
<html lang="en">
<?php
require_once("connect.php");

if (isset($_POST['user'])) {
    $fnameuser = $_POST['fnameuser'];
    $lnameuser = $_POST['lnameuser'];
    $emailuser = $_POST['emailuser'];
    $pwduser = $_POST['pwduser'];
    $phoneuser = $_POST['phoneuser'];

    $query = "INSERT INTO usersclass (fname, lname, email, password, phone, acctype) VALUES ('$fnameuser', '$lnameuser', '$emailuser', '$pwduser', '$phoneuser', 'User')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script> alert('User Added') </script>";
    } else {
        echo "<script> alert('User not Added') </script>";
    }
} elseif (isset($_POST['parent'])) {
    $fnameparent = $_POST['fnameparent'];
    $lnameparent = $_POST['lnameparent'];
    $emailparent = $_POST['emailparent'];
    $pwdparent = $_POST['pwdparent'];
    $phoneparent = $_POST['phoneparent'];
    $namechild = $_POST['namechild'];
    $dobchild = $_POST['dobchild'];
    $emailchild = $_POST['emailchild'];
    $schoolchild = $_POST['schoolchild'];
    $gradechild = $_POST['gradechild'];
    $titleparent = $_POST['titleparent'];
    $areaparent = $_POST['areaparent'];
    $streetparent = $_POST['streetparent'];
    $cityparent = $_POST['cityparent'];
    $zipparent = $_POST['zipparent'];

    // Insert into users table
    $query = "INSERT INTO usersclass (fname, lname, email, password, phone, acctype) VALUES ('$fnameparent', '$lnameparent', '$emailparent', '$pwdparent', '$phoneparent', 'Parent')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        // Retrieve the parent ID
        $parentID = mysqli_insert_id($conn);

        // Insert into students table
        $query = "INSERT INTO students (dob, email, school, grade, parentid) VALUES ('$namechild', '$dobchild', '$emailchild', '$schoolchild', '$gradechild', '$parentID')";
        $result = mysqli_query($conn, $query);

        // Insert into addresses table
        $query2 = "INSERT INTO addresses (title, area, street, city, zip, userid) VALUES ('$titleparent', '$areaparent', '$streetparent', '$cityparent', '$zipparent', '$parentID')";
        $result2 = mysqli_query($conn, $query2);
        if ($result2) {
            echo "<script> alert('Parent Added') </script>";
        } else {
            echo "<script> alert('Address not Added') </script>";
        }
    } else {
        echo "<script> alert('Student not Added') </script>";
    }
} elseif (isset($_POST['student'])) {
    $fnamestudent = $_POST['fnamestudent'];
    $lnamestudent = $_POST['lnamestudent'];
    $emailstudent = $_POST['emailstudent'];
    $pwdstudent = $_POST['pwdstudent'];
    $phonestudent = $_POST['phonestudent'];
    $dobstudent = $_POST['dobstudent'];
    $emailstudent = $_POST['emailstudent'];
    $schoolstudent = $_POST['schoolstudent'];
    $gradestudent = $_POST['gradestudent'];
    $titlestudent = $_POST['titlestudent'];
    $areastudent = $_POST['areastudent'];
    $streetstudent = $_POST['streetstudent'];
    $citystudent = $_POST['citystudent'];
    $zipstudent = $_POST['zipstudent'];

    // Insert into users table
    $query = "INSERT INTO usersclass (fname, lname, email, password, phone, acctype) VALUES ('$fnamestudent', '$lnamestudent', '$emailstudent', '$pwdstudent', '$phonestudent', 'Student')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        // Retrieve the student ID
        $studentID = mysqli_insert_id($conn);

        // Insert into students table
        $query = "INSERT INTO students (name, dob, email, school, grade, parentid) VALUES ('$fnamestudent', '$dobstudent', '$emailstudent', '$schoolstudent', '$gradestudent', '$studentID')";
        $result = mysqli_query($conn, $query);

        // Insert into addresses table
        $query2 = "INSERT INTO addresses (title, area, street, city, zip, userid) VALUES ('$titlestudent', '$areastudent', '$streetstudent', '$citystudent', '$zipstudent', '$studentID')";
        $result2 = mysqli_query($conn, $query2);
        if ($result2) {
            echo "<script> alert('Student Added') </script>";
        } else {
            echo "<script> alert('Address not Added') </script>";
        }
    } else {
        echo "<script> alert('Student not Added') </script>";
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Database Records - Users</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <style>
        .centered {
            justify-content: center;
            align-content: center;
            display: flex;
            border: none;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include("admin-sidebar.php"); ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include("admin-topbar.php"); ?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4 text-center">Register New User</h3>
                    <div class="card shadow">
                        <form method="POST">
                            <div class="card-header py-3 text-nowrap d-flex justify-content-between align-items-center">
                                <p class="text-primary m-0 fw-bold">Add User</p>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>First Name*</th>
                                                <th>Last Name*</th>
                                                <th>Email*</th>
                                                <th>Password*</th>
                                                <th>Phone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type='text' name='fnameuser' class="form-control"></td>
                                                <td> <input name='lnameuser' type='text' class="form-control"></td>
                                                <td><input name='emailuser' type='email' class="form-control"></td>
                                                <td> <input name='pwduser' type='text' class="form-control"></td>
                                                <td><input name='phoneuser' type='text' class="form-control"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                        </form>
                    </div>
                    <div class="row">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                            <input type="submit" name="user" class="btn btn-success text-white mx-2" value="Insert User">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card shadow mt-3">
                <form method="POST">
                    <div class="card-header py-3 text-nowrap d-flex justify-content-between align-items-center">
                        <p class="text-primary m-0 fw-bold">Add Parent</p>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>First Name*</th>
                                        <th>Last Name*</th>
                                        <th>Email*</th>
                                        <th>Password*</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type='text' name='fnameparent' class="form-control"></td>
                                        <td> <input name='lnameparent' type='text' class="form-control"></td>
                                        <td><input name='emailparent' type='email' class="form-control"></td>
                                        <td> <input name='pwdparent' type='text' class="form-control"></td>
                                        <td><input name='phoneparent' type='text' class="form-control"></td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Child Name</th>
                                        <th>Child DOB</th>
                                        <th>Student Email</th>
                                        <th>School</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type='text' name='namechild' class="form-control"></td>
                                        <td> <input name='dobchild' type='text' class="form-control"></td>
                                        <td><input name='emailchild' type='email' class="form-control"></td>
                                        <td>
                                            <select name="schoolchild" class="form-control-select">
                                                <?php
                                                // Retrieve schools from the database
                                                $query = "SELECT * FROM school";
                                                $result = mysqli_query($conn, $query);

                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        // Output each school as an option
                                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                    }
                                                } else {
                                                    echo "<option value=''>No schools found</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>

                                        <td><input name='gradechild' type='text' class="form-control"></td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Address Title</th>
                                        <th>Area</th>
                                        <th>Street</th>
                                        <th>City</th>
                                        <th>Zip</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type='text' name='titleparent' class="form-control"></td>
                                        <td> <input name='areaparent' type='text' class="form-control"></td>
                                        <td><input name='streetparent' type='email' class="form-control"></td>
                                        <td> <input name='cityparent' type='text' class="form-control"></td>
                                        <td><input name='zipparent' type='text' class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                </form>
            </div>
            <div class="row">
                <div class="text-md-end dataTables_filter" id="dataTable_filter">
                    <input type="submit" name="parent" class="btn btn-success text-white mx-2" value="Insert Parent">
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid">
        <div class="card shadow mt-3 mb-5">
            <form method="POST">
                <div class="card-header py-3 text-nowrap d-flex justify-content-between align-items-center">
                    <p class="text-primary m-0 fw-bold">Add Student</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>First Name*</th>
                                    <th>Last Name*</th>
                                    <th>Email*</th>
                                    <th>Password*</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type='text' name='fnamestudent' class="form-control"></td>
                                    <td> <input name='lnamestudent' type='text' class="form-control"></td>
                                    <td><input name='emailstudent' type='email' class="form-control"></td>
                                    <td> <input name='pwdstudent' type='text' class="form-control"></td>
                                    <td><input name='phonestudent' type='text' class="form-control"></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>DOB</th>
                                    <th>Student Email</th>
                                    <th>School</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <input name='dobstudent' type='text' class="form-control"></td>
                                    <td><input name='emailstudent' type='email' class="form-control"></td>
                                    <td> <input name='schoolstudent' type='text' class="form-control"></td>
                                    <td><input name='gradestudent' type='text' class="form-control"></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Address Title</th>
                                    <th>Area</th>
                                    <th>Street</th>
                                    <th>City</th>
                                    <th>Zip</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type='text' name='titlestudent' class="form-control"></td>
                                    <td> <input name='areastudent' type='text' class="form-control"></td>
                                    <td><input name='streetstudent' type='email' class="form-control"></td>
                                    <td> <input name='citystudent' type='text' class="form-control"></td>
                                    <td><input name='zipstudent' type='text' class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>
            </form>
        </div>
        <div class="row">
            <div class="text-md-end dataTables_filter" id="dataTable_filter">
                <input type="submit" name="student" class="btn btn-success text-white mx-2" value="Insert Student">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>