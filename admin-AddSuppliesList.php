<!DOCTYPE html>
<html lang="en">
<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lname = $_POST['lname'];
    $school = $_POST['school'];
    $grade = $_POST['grade'];
    $price = $_POST['price'];
    $products = $_POST['product'];
    $categories = $_POST['category'];
    $quantities = $_POST['quantity'];
    $pdf = $_POST['pdf'];

    $query = "INSERT INTO supplies_list (listname, school_id, grade, total_price, pdf) VALUES ('$lname', '$school', '$grade', '$price', '$pdf')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $listid = mysqli_insert_id($conn);

        if (count($products) > 0) {
            for ($i = 0; $i < count($products); $i++) {
                $product = $products[$i];
                $category = $categories[$i];
                $quantity = $quantities[$i];

                $query = "INSERT INTO supplylistitems (supplylistid, productid, prodcategory, quantity) VALUES ('$listid', '$product', '$category', '$quantity')";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "<script>alert('Failed to insert product data!');</script>";
                    break;
                }
            }
        }

        if ($result) {
            echo "<script>alert('Supply list added successfully!');</script>";
        } else {
            echo "<script>alert('Supply list failed to add!');</script>";
        }
    } else {
        echo "<script>alert('Supply list failed to add!');</script>";
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
                                                <td><input type="text" name="pdf" class="form-control"></td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>
                                                    <button type="button" class="btn btn-none py-0" style="height: 1; color:green;" onclick="duplicateRow()"><svg xmlns="http://www.w3.org/2000/svg" width="22" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg></button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="row1">
                                                <td>
                                                    <select name="product[]" class="form-select">
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
                                                <td><select name="category[]" class="form-select" required>
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
                                                <td><input type='text' name='quantity[]' class="form-control" required></td>
                                            </tr>
                                            <tr>
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
                <script>
                    function duplicateRow() {
                        var lastRow = document.getElementById("row1");
                        var clonedRow = lastRow.cloneNode(true);
                        lastRow.parentNode.insertBefore(clonedRow, lastRow.nextSibling);
                    }
                </script>


</body>

</html>