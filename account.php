<?php
require_once("connect.php");

// Assuming the form data is submitted via POST and the input fields have the same names as the column names in the table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if button = delete then delete user from db
    if (isset($_POST['delete'])) {
        echo '
    <script>
    var result = window.confirm("Are you sure?");

    if (result) {
        window.location.href = "deleteacc.php"; // Redirect to the deleteacc.php file for actual deletion
    } else {
        window.location.href = "account.php"; // Redirect back to the account.php page
    }
    </script>';
    } else {
        // Retrieve the form data
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        // Construct the SQL query
        $sql = "UPDATE usersclass SET";

        // Add each column update based on the input values
        $updates = array();

        if (!empty($fname)) {
            $updates[] = "fname = '$fname'";
        }
        if (!empty($lname)) {
            $updates[] = "lname = '$lname'";
        }
        if (!empty($email)) {
            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format.";
                exit;
            }

            // Check if the email already exists in the database
            $checkEmailQuery = "SELECT * FROM usersclass WHERE email = '$email'";
            $emailResult = mysqli_query($conn, $checkEmailQuery);

            if (mysqli_num_rows($emailResult) > 0) {
                echo "This email address is already associated with an account.";
                exit;
            }

            $updates[] = "email = '$email'";
        }
        if (!empty($password)) {
            // You should hash the password before storing it in the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $updates[] = "password = '$hashedPassword'";
        }
        if (!empty($phone)) {
            $updates[] = "phone = '$phone'";
        }
        // Check if any updates are available
        if (count($updates) > 0) {
            $sql .= " " . implode(", ", $updates);
            $sql .= " WHERE email = '{$_SESSION['email']}'";

            // Execute the query
            if (mysqli_query($conn, $sql)) {
                // Update successful

                // Fetch the updated user data from the database
                $selectQuery = "SELECT * FROM usersclass WHERE email = '{$_SESSION['email']}'";
                $result = mysqli_query($conn, $selectQuery);

                if (mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);

                    // Update the session data with the new values
                    $_SESSION['fname'] = $user['fname'];
                    $_SESSION['lname'] = $user['lname'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['phone'] = $user['phone'];

                    echo "Profile updated successfully.";
                }
            } else {
                echo "Error updating profile: " . mysqli_error($conn);
            }
        } else {
            echo "No changes to update.";
        }
    }
}
// Fetch the user's current profile data
$selectQuery = "SELECT * FROM usersclass WHERE email = '{$_SESSION['email']}'";
$result = mysqli_query($conn, $selectQuery);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>My Account</title>
    <link rel="stylesheet" href="stylesacc.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    </head>
    <style>
        
        svg {
            cursor: pointer;
        }

        .acclink {
            text-decoration: none;
            color: black;
        }

        a {
    color: yellow;
    text-decoration: none;
  }
  a:hover {
    color: #ebbf2f;
  }
 
    </style>

<body>
    <?php
    include("navbar.php");
    ?>

    
    <div class="container-account" id="fade-container">
        <div class="row">
            <div class="col-md-12">
            <div id="content">
            <div class="card text-bg-dark">
  <img src="images/account/1c.png" class="card-img" alt="..." >
  <div class="card-img-overlay">
   
  </div>
</div>
     <div>
     </div>
            <b style="font-size:25px; color:#ebbf2f;">
            <?php
                echo ucfirst($_SESSION['fname']);
                echo "&nbsp;" . ucfirst($_SESSION['lname']);
                ?>
                </div>
                </b>
            </div>
        </div>
    </div>

    <div class="container-account centered" id="fade-container2">
        <hr style="height: 2px solid black">
        <div class="row text-center" style="font-size:20px;">
            <div class="col-sm"><a href="orders.php" class="acclink"><b>My Orders</b></a></div>
            <div class="col-sm"><a href="address.php" class="acclink"><b>My Addresses</b></a></div>
            <div class="col-sm"><a href="wallet.php" class="acclink"><b>My Wallet</b></a></div>
            <div class="col-sm"><a href="subscription.php" class="acclink"><b>My Subscriptions</b></a></div>
            <div class="col-sm"> <a href="mystudents.php" class="acclink"><b>My Students</b></a></div>
        </div>
        <hr>
    </div>

    <div class="container-account pt-3">
        <div class="row">
            <div class="col-md-6"><b style="font-size:20;">My Account Details</b></div>
        </div>
    </div>
    <div class="container-account" style="padding-bottom:100px;">
        <div class="row">
            <div class="col-md-12">View and edit your personal info below.</div>
            <div class="col-md-12">
                <hr>
                <form method="post">
            </div>
            <div style="padding-top:10px;" class="col-md-12">
                <div style="font-size:15px;"><b>Email: </b> <?php echo $_SESSION['email'] ?></div>
            </div>
            <div style="padding-top:10px;" class="col-md-12">
                <div style="font-size:15px;"><b>Account Type: </b> <?php echo $_SESSION['acctype'] ?></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;">First Name</div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;">Last Name</div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;"><input class="form-control input" type="text" name="fname" placeholder="<?php echo $_SESSION['fname'] ?>"></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;"><input class="form-control input" type="text" name="lname" placeholder="<?php echo $_SESSION['lname'] ?>"></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;">Email</div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;">Password</div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;"><input class="form-control input" type="text" name="email" placeholder="<?php echo $_SESSION['email'] ?>"></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;"><input class="form-control input" type="password" name="password" placeholder="********"></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;">Phone No.</div>
                <div style="font-size:20px; padding-top:10px;"><input class="form-control input" type="text" name="phone" placeholder="<?php echo $_SESSION['phone'] ?>"></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
            
            </div>
            <div style="padding-top:70px;" class="col-md-6">
            <hr>
                <input type="submit" class="btn btn-secondary" value="Save Changes">
                <input type="submit" class="btn btn-warning" name="delete" value="Delete My Account">
            </div>
        </div>
        </form>
    </div>

</body>

</html>

<?php
include("footer.php")
?>