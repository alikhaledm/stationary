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
                    <h3 class="text-dark mb-4 text-center">Add New Product</h3>
                    <div class="card shadow">
                        <form method="POST">
                            <div class="card-header py-3 text-nowrap d-flex justify-content-between align-items-center">
                                <p class="text-primary m-0 fw-bold">Add Product Detail</p>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Product Name*</th>
                                                <th>Description*</th>
                                                <th>Category*</th>
                                                <th>Photo*</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> <input name='pname' type='text' class="form-control"></td>
                                                <td><input name='pdesc' type='text' class="form-control"></td>
                                                <td>
                                                    <select name='category' class='form-select'>
                                                        <option value='Notebooks & Paper'>Notebooks & Paper</option>
                                                        <option value='Writing Tools'>Writing Tools</option>
                                                        <option value='Art Supplies'>Art Supplies</option>
                                                        <option value='Binders & Folders'>Binders & Folders</option>
                                                        <option value='Math & Scientfic'>Math & Scientfic Tools</option>
                                                        <option value="Bags & Cases">Bags & Cases</option>
                                                        <option value="Other">Other</option>
                                                </td></select>
                                                <td><input name=' photo' type='text' class="form-control">
                                                </td>
                                                <td><input name='price' type='number' class="form-control"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                        </form>

                    </div>
                    <div class="row">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                            <input type="submit" class="btn btn-success text-white mx-2" value="Insert Product">
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="assets/js/bs-init.js"></script>
                <script src="assets/js/theme.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>