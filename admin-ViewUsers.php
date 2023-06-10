<!DOCTYPE html>
<html lang="en">
<?php
require_once("connect.php");

$sql = "SELECT * FROM usersclass";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query execution failed: " . mysqli_error($conn));
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        include("admin-sidebar.php");
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h3 class="text-dark mb-4 text-center mt-5">Registered Users</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 text-nowrap d-flex justify-content-between align-items-center">
                            <p class="text-primary m-0 fw-bold">User Info</p>
                            <a href="admin-ManageUsers.php" style="display:flex; text-decoration: none;">
                                <button class="btn btn-danger">Manage</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <div class="text-md-start dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Account Type</th>
                                            <th>Phone</th>
                                            <th>Register Date</th>
                                            <th>Orders</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                            <td>" . $row['fname'] . " " . $row['lname'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['acctype'] . "</td>";
                                            echo "<td>" . $row['phone'] . "</td>";
                                            echo "<td>" . $row['registerdate'] . "</td>";

                                            // select number of orders made by this user
                                            $sqlOrders = "SELECT COUNT(*) AS ordersmade FROM orders WHERE userid = " . $row['id'];
                                            $resultOrders = mysqli_query($conn, $sqlOrders);
                                            $rowOrders = mysqli_fetch_assoc($resultOrders);
                                            echo "<td>" . $rowOrders['ordersmade'] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <!-- count the number of rows from the query and input it into variable -->
                                    <?php
                                    $sqlCount = "SELECT COUNT(*) AS total FROM usersclass";
                                    $resultCount = mysqli_query($conn, $sqlCount);
                                    $rowCount = mysqli_fetch_assoc($resultCount);
                                    ?>
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing <b style="color:blue"><?php echo $rowCount['total']; ?></b> Users</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>