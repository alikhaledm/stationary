<!DOCTYPE html>
<html lang="en">
<?php
require_once("connect.php");

$sql = "SELECT * FROM usersclass";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query execution failed: " . mysqli_error($conn));
}

if (isset($_POST['update'])) {
    $userids = $_POST['userid']; // Add this line to retrieve the userids array

    // Retrieve the form input arrays
    $emails = isset($_POST['email']) ? $_POST['email'] : array();
    $fnames = isset($_POST['fname']) ? $_POST['fname'] : array();
    $lnames = isset($_POST['lname']) ? $_POST['lname'] : array();
    $acctypes = isset($_POST['acctype']) ? $_POST['acctype'] : array();
    $phones = isset($_POST['phone']) ? $_POST['phone'] : array();

    $changesMade = false; // Flag to check if any changes were made

    foreach ($userids as $key => $userid) {
        $email = isset($emails[$key]) ? $emails[$key] : '';
        $fname = isset($fnames[$key]) ? $fnames[$key] : '';
        $lname = isset($lnames[$key]) ? $lnames[$key] : '';
        $acctype = isset($acctypes[$key]) ? $acctypes[$key] : '';
        $phone = isset($phones[$key]) ? $phones[$key] : '';

        // Check if any changes were made
        if ($email != '' || $fname != '' || $lname != '' || $acctype != '' || $phone != '') {
            $changesMade = true;

            // Update the record in the database
            $sql = "UPDATE usersclass SET fname='$fname', lname='$lname', acctype='$acctype', email='$email', phone='$phone' WHERE id='$userid'";
            if ($conn->query($sql) !== TRUE) {
                echo "Error updating record: " . $conn->error;
            }
        }
    }

    if (!$changesMade) {
        echo "No changes were made.";
    }
} elseif (isset($_POST['delete'])) {
    $userids = $_POST['userid'];

    foreach ($_POST['delete'] as $key => $delete) {
        $userid = $userids[$key];
        $sql = "DELETE FROM usersclass WHERE id='$userid'";
        if ($conn->query($sql) !== TRUE) {
            echo "Error deleting record: " . $conn->error;
        }
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
                    <h3 class="text-dark mb-4 text-center">Registered Users</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 text-nowrap d-flex justify-content-between align-items-center">
                            <p class="text-primary m-0 fw-bold">User Info</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md text-nowrap d-flex justify-content-between align-items-center">
                                    <div class="text-md-end dataTables_filter px-2" id="dataTable_filter">
                                        <label class="form-label"><input type="search" size="25" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label>
                                    </div>
                                    <div class="px-2">
                                        <form method="POST">
                                            <input type="submit" name="update" class="btn btn-success text-white" value="Save Changes">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Details</th>
                                            <th>First Name - Last Name</th>
                                            <th>Email</th>
                                            <th>Account Type</th>
                                            <th>Phone</th>
                                            <th>Reg Date</th>
                                            <th>Orders</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $sqlOrders = "SELECT COUNT(*) AS ordersmade FROM orders WHERE userid = " . $row['id'];
                                            $resultOrders = mysqli_query($conn, $sqlOrders);
                                            $rowOrders = mysqli_fetch_assoc($resultOrders);
                                            echo "<tr>";
                                            echo "<td><button class='btn btn-primary'><img width='20' src='images/account/person-lines-fill.svg'></button></td>";
                                            echo "<td><input type='text' name='fname[]' size='8' value='" . $row['fname'] . "' disabled>&nbsp;&nbsp;";
                                            echo "<input name='lname[]' type='text' size='8' value='" . $row['lname'] . "' disabled></td>";
                                            echo "<td><input name='email[]' type='email' value='" . $row['email'] . "' disabled></td>";
                                            echo "<td>
                                                <select name='acctype[]' disabled style='height:30px; width:100px;'>
                                                <option value='Student'" . ($row['acctype'] == 'Student' ? 'selected' : '') . ">Student</option>
                                                <option value='Parent'" . ($row['acctype'] == 'Parent' ? 'selected' : '') . ">Parent</option>
                                                <option value='User'" . ($row['acctype'] == 'User' ? 'selected' : '') . ">User</option>
                                                </select></td>";
                                            echo "<td><input size='10' name='phone[]' type='text' value='" . $row['phone'] . "' disabled></td>";
                                            echo "<td class='pt-3'>" . $row['registerdate'] . "</td>";
                                            echo "<td class='centered pt-3'>" . $rowOrders['ordersmade'] . "</td>";
                                            echo "<td><input type='text' name='userid[]' value='" . $row['id'] . "' hidden></td>";
                                            echo "<td>";
                                            echo "<button type='button' class='btn btn-primary' onclick='enableEdit(this)'>";
                                            echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>";
                                            echo "<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>";
                                            echo "<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>";
                                            echo "</svg>";
                                            echo "</button>";
                                            echo "&nbsp;&nbsp;
                                                <button type='submit' class='btn btn-danger' name='delete[]'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='20' fill='currentColor' class='bi bi-person-dash' viewBox='0 0 16 16'>
                                                <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7ZM11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1Zm0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z'/>
                                                <path d='M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z'/>
                                                </svg>
                                                </button>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col">
                                    <?php
                                    $sqlCount = "SELECT COUNT(*) AS total FROM usersclass";
                                    $resultCount = mysqli_query($conn, $sqlCount);
                                    $rowCount = mysqli_fetch_assoc($resultCount);
                                    ?>
                                    <p>Showing <B style="color:blue"><?php echo $rowCount['total']; ?></B> Users</p>
                                </div>
                                <div class="col-auto">
                                    <a href="admin-AddUser.php"><button class="btn btn-primary text-white mx-2">Add New User</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="userForm" style="display: none;">
                <h4>Add New User</h4>
                <form method="POST">
                    <input type="text">
                    <button type="submit" class="btn btn-primary">Save User</button>
                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="assets/js/bs-init.js"></script>
            <script src="assets/js/theme.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                function enableEdit(button) {
                    var row = button.parentNode.parentNode;
                    var inputs = row.getElementsByTagName('input');
                    var select = row.querySelector('select');

                    for (var i = 0; i < inputs.length; i++) {
                        inputs[i].disabled = false;
                    }

                    select.disabled = false;
                }
            </script>
</body>

</html>