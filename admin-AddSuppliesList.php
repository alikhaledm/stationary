<!DOCTYPE html>
<html lang="en">
<?php
require_once("connect.php");
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pname = $_POST['pname'];
    $pdesc = $_POST['pdesc'];
    $category = $_POST['category'];
    $photo = $_POST['photo'];
    $price = $_POST['price'];

    $query = "INSERT INTO products (pname, pdesc, category, photo, price) VALUES ('$pname', '$pdesc', '$category', '$photo', '$price')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script> alert('Product Added') </script>";
    } else {
        echo "<script> alert('Product not Added') </script>";
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Database Records - Add Products</title>
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
                    <h3 class="text-dark mb-4 text-center">Add New Supply List</h3>
                    <div class="card shadow">
                        <form method="POST">
                            <div class="card-header py-3 text-nowrap d-flex justify-content-between align-items-center">
                                <p class="text-primary m-0 fw-bold">Add Supply List Details</p>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>List Name</th>
                                                <th>School</th>
                                                <th>Grade</th>
                                                <th>Price</th>
                                                <th>PDF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type='text' name='lname' class="form-control" required></td>
                                                <td>
                                                    <select name="school" class="form-select" required>
                                                        <option value="">No school selected</option>
                                                        <?php
                                                        $query = "SELECT * FROM school";
                                                        $result = mysqli_query($conn, $query);

                                                        if ($result && mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td><select name="grade" class="form-select" required>
                                                        <option value="">No grade selected</option>
                                                        <?php
                                                        $query = "SELECT * FROM grade";
                                                        $result = mysqli_query($conn, $query);

                                                        if ($result && mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select></td>
                                                <td> <input name='price' type='text' class="form-control" required></td>
                                                <td><input type="file" name="upload" accept="application/pdf,application/vnd.ms-excel" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Quantity</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="product" class="form-select">
                                                        <option value="">No product selected</option>
                                                        <?php
                                                        $query = "SELECT * FROM products";
                                                        $result = mysqli_query($conn, $query);

                                                        if ($result && mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='" . $row['id'] . "'>" . $row['pname'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td><select name="category" class="form-select" required>
                                                        <option value="">No category selected</option>
                                                        <option value="Health & Hygiene Kit">Health & Hygiene Kit</option>
                                                        <option value="Academic Kit">Academic Kit</option>
                                                        <option value="Essentials">General</option>
                                                        <option value="English">English</option>
                                                        <option value="Mathematics">Mathematics</option>
                                                        <option value="Science">Science</option>
                                                        <option value="Social Studies">Social Studies</option>
                                                        <option value="French">French</option>
                                                        <option value="Arabic">Arabic</option>
                                                        <option value="Art Supplies">Art Supplies</option>
                                                        <option value="Religion">Religion</option>
                                                        <option value="Electives">Electives</option>
                                                        <option value="Music">Music</option>
                                                        <option value="PE">PE</option>
                                                    </select></td>
                                                <td><input type='text' name='namechild' class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                        </form>

                    </div>
                    <div class="row">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                            <input type="submit" class="btn btn-success text-white mx-2" value="Insert List">
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="assets/js/bs-init.js"></script>
                <script src="assets/js/theme.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>