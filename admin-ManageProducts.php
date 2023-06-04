    <!DOCTYPE html>
    <html lang="en">
    <?php
    require_once("connect.php");

    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query execution failed: " . mysqli_error($conn));
    }

    if (isset($_POST['update'])) {
        $pids = isset($_POST['pid']) ? $_POST['pid'] : array(); // Retrieve the pid array

        // Retrieve the form input arrays
        $pnames = isset($_POST['pname']) ? $_POST['pname'] : array();
        $pdescs = isset($_POST['pdesc']) ? $_POST['pdesc'] : array();
        $photos = isset($_POST['photo']) ? $_POST['photo'] : array();
        $categories = isset($_POST['category']) ? $_POST['category'] : array();
        $prices = isset($_POST['price']) ? $_POST['price'] : array(); // Use $prices instead of $price

        $changesMade = false; // Flag to check if any changes were made

        foreach ($pids as $key => $pid) {
            $pname = isset($pnames[$key]) ? $pnames[$key] : '';
            $pdesc = isset($pdescs[$key]) ? $pdescs[$key] : '';
            $photo = isset($photos[$key]) ? $photos[$key] : '';
            $category = isset($categories[$key]) ? $categories[$key] : '';
            $price = isset($prices[$key]) ? $prices[$key] : ''; // Use $prices instead of $price

            // Check if any changes were made
            if ($pname != '' || $pdesc != '' || $photo != '' || $category != '' || $price != '') {
                $changesMade = true;

                // Update the record in the database
                $sql = "UPDATE products SET pname='$pname', pdesc='$pdesc', photo='$photo', category='$category', price='$price' WHERE id='$pid'";
                if ($conn->query($sql) !== TRUE) {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
        if (!$changesMade) {
            echo "No changes were made.";
        }
    } elseif (isset($_POST['delete'])) {
        $pids = isset($_POST['pid']) ? $_POST['pid'] : array(); // Retrieve the pid array

        foreach ($_POST['delete'] as $key => $delete) {
            $pid = $pids[$key];
            $sql = "DELETE FROM products WHERE id='$pid'";
            if ($conn->query($sql) !== TRUE) {
                echo "Error deleting record: " . $conn->error;
            }
        }
    }
    ?>

    <!-- Rest of your HTML code -->

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
                        <h3 class="text-dark mb-4 text-center">Available Products</h3>
                        <div class="card shadow">
                            <div class="card-header py-3 text-nowrap d-flex justify-content-between align-items-center">
                                <p class="text-primary m-0 fw-bold">Products Info</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md text-nowrap d-flex justify-content-between align-items-center">
                                        <div class="text-md-end dataTables_filter px-2" id="dataTable_filter">
                                            <label class="form-label"><input type="search" size="25" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label>
                                        </div>
                                        <div>
                                            <a href="admin-AddProducts.php"><button class="btn btn-primary text-white mx-2">Add New Product</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0" id="dataTable">
                                        <thead>
                                            <tr class="">
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Photo</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <form method="POST">
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td><input type='text' class='form-control' name='pname[]' size='40' value='" . $row['pname'] . "' disabled></td>";
                                                    echo "<td><input name='pdesc[]' type='text' class='form-control' size='70' value='" . $row['pdesc'] . "' disabled></td>";
                                                    echo "<td><input name='photo[]' type='text' class='form-control' value='" . $row['photo'] . "' disabled></td>";
                                                    echo "<td>
                                                <select name='category[]' class='form-select' disabled style='width:200px;'>
                                                <option value='Notebooks & Paper'" . ($row['category'] == 'Notebooks & Paper' ? 'selected' : '') . ">Notebooks & Paper</option>
                                                <option value='Writing Tools'" . ($row['category'] == 'Writing Tools' ? 'selected' : '') . ">Writing Tools</option>
                                                <option value='Art Supplies'" . ($row['category'] == 'Art Supplies' ? 'selected' : '') . ">Art Supplies</option>
                                                </select>
                                                </td>";
                                                    echo "<td><input size='5' class='form-control' name='price[]' type='text' value='" . $row['price'] . "' disabled></td>";
                                                    echo "<td><input type='text' name='pid[]' value='" . $row['id'] . "' hidden></td>";
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
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col">
                                        <?php
                                        $sqlCount = "SELECT COUNT(*) AS total FROM products";
                                        $resultCount = mysqli_query($conn, $sqlCount);
                                        $rowCount = mysqli_fetch_assoc($resultCount);
                                        ?>
                                        <p>Showing <B style="color:blue"><?php echo $rowCount['total']; ?></B> Products</p>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" name="update" class="btn btn-success text-white" value="Save Changes">
                                        </form>
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