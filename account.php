<?php
require_once("connect.php");
include("navbar.php");

// Assuming the form data is submitted via POST and the input fields have the same names as the column names in the table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

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
    if (!empty($dob)) {
        $updates[] = "dob = '$dob'";
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
            $user = mysqli_fetch_assoc($result);

            // Update the session variables with the new values
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['lname'] = $user['lname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['dob'] = $user['dob'];
            $_SESSION['photo'] = $user['photo'];

            echo "User information updated successfully.";
        } else {
            // Error occurred during update
            echo "Error updating user information: " . mysqli_error($conn);
        }
    } else {
        echo "No fields were provided for update.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<html>
<title>School Supplies List</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="stylesacc.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<form method="post">

    <div class="container-account" id="fade-container">
        <div class="row">
            <div class="col-md-12">
                <img width="100%" height="300" src="images/account/background.jpg" alt="">
                <div class="small-image" style="position: absolute; top: 60%; left: 5%;">

                    <?php
                    // Check if the user has uploaded a profile picture
                    if (!empty($_SESSION['photo'])) {
                        echo '<img class="smallimage" width="100" height="100" src="images/account/' . $_SESSION['photo'] . '" alt="">';
                    } else {
                        echo '<form method="post">
                        <input type="image"
                        <img class="smallimage" width="100" height="100" src="images/account/profile.png" alt="">';
                    }
                    ?>

                    <b style="padding-left:10; font-size:23;">
                        <?php
                        echo ucfirst($_SESSION['fname']);
                        echo "&nbsp;" . ucfirst($_SESSION['lname']);
                        ?>
                    </b>
                </div>
            </div>
        </div>
    </div>


    <div class="container-account" id="fade-container2">
        <div class="row">
            <div class="col-md-2"><b style="font-size:18;">My
                    Orders</b></div>
            <div class="col-md-2"><b style="font-size:18;">My
                    Addresses</b></div>
            <div class="col-md-2"><b style="font-size:18;">My
                    Wallet</b></div>
            <div class="col-md-2"><b style="font-size:18;">My
                    Wishlist</b></div>
            <div class="col-md-2"><b style="font-size:18;">My
                    Subscription</b></div>
            <div class="col-md-2"><b style="font-size:16;">My
                    Account</b></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#fade-container').hide().fadeIn(4000); // Change the duration (in milliseconds) as desired
        });

        $(document).ready(function() {
            $('#fade-container2').hide().fadeIn(4000); // Change the duration (in milliseconds) as desired
        });
    </script>


    <div class="container-account" style="padding-top:50;">
        <div class="row">
            <div class="col-md-6"><b style="font-size:20;">My Account</b></div>

        </div>
    </div>
    <div class="container-account" style="padding-top:30px; padding-bottom:100px;">
        <div class="row">
            <div class="col-md-12">View and edit your personal info below.</div>
            <div class="col-md-12">
                <hr>
            </div>
            <div style="padding-top:10px;" class="col-md-12">
            </div>
            <div style="padding-top:10px;" class="col-md-12">
                <div style="font-size:15px;"><b>Email:</b></div>
            </div>
            <div class="col-md-12">
                <div style="font-size:15px;"><?php echo $_SESSION['email'] ?></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;">First Name</div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;">Last Name</div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;"><input class="input" type="text" name="fname" placeholder="<?php echo $_SESSION['fname'] ?>"></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;"><input class="input" type="text" name="lname" placeholder="<?php echo $_SESSION['lname'] ?>"></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;">Email</div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;">Password</div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;"><input class="input" type="text" name="email" placeholder="<?php echo $_SESSION['email'] ?>"></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;"><input class="input" type="password" name="password" placeholder="********"></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;">Phone No.</div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;">Date Of Birth</div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;"><input class="input" type="text" name="phone" placeholder="<?php echo $_SESSION['phone'] ?>"></div>
            </div>
            <div style="padding-top:10px;" class="col-md-6">
                <div style="font-size:20px;"><input class="input" type="date" name="dob" placeholder="<?php echo $_SESSION['dob'] ?>"></div>
            </div>
            <div class="col-md-6"></div>
            <div style="padding-top:70px;" class="col-md-6">
                <input type="submit" class="update" value="UPDATE">
            </div>
        </div>
</form>
</div>
</div>
</div>

</body>

</html>

<?php
include("footer.php")
?>