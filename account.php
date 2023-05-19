<?php
require_once("connect.php");
include("navbar.php");

// Check if user is signed in and if not redirect to signin.php
if (!isset($_SESSION['id'])) {
    header("Location: signin.php");
    exit;
}

// Fetch user data from the database
$sql = "SELECT * FROM usersclass WHERE email = '{$_SESSION['email']}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Update user data in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input fields
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

    // Check if the email field is empty or unchanged
    if (!empty($email) && $email != $row['email']) {
        // Validate the email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            exit;
        }

        // Check if the email address already exists in the database
        $emailCheckSql = "SELECT * FROM usersclass WHERE email = '$email' LIMIT 1";
        $emailCheckResult = mysqli_query($conn, $emailCheckSql);
        if (mysqli_num_rows($emailCheckResult) > 0) {
            echo "This email address is already associated with an account.";
            exit;
        }

        // Update the email field in the database
        $sql .= " email = '$email'";
        $_SESSION['email'] = $email; // Update the email in the session
    }

    // Check if other fields are not empty and update the corresponding columns in the database
    if (!empty($fname)) {
        $sql .= " fname = '$fname',";
        $_SESSION['fname'] = $fname; // Update the first name in the session
    }
    if (!empty($lname)) {
        $sql .= " lname = '$lname',";
        $_SESSION['lname'] = $lname; // Update the last name in the session
    }
    if (!empty($password)) {
        // You should hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql .= " password = '$hashedPassword',";
    }
    if (!empty($phone)) {
        $sql .= " phone = '$phone',";
        $_SESSION['phone'] = $phone; // Update the phone number in the session
    }
    if (!empty($dob)) {
        $sql .= " dob = '$dob',";
        $_SESSION['dob'] = $dob; // Update the date of birth in the session
    }

    // Handle the uploaded small image
    $smallImage = $_FILES['smallimage'];

    // Handle the uploaded small image
    if (isset($_FILES['smallimage']) && $_FILES['smallimage']['size'] > 0) {
        $smallImage = $_FILES['smallimage'];

        // Generate a unique filename for the image
        $filename = uniqid() . '_' . $smallImage['name'];

        // Specify the directory to save the uploaded image
        $uploadDir = 'images/account/';

        // Move the uploaded image to the specified directory
        $uploadPath = $uploadDir . $filename;
        if (move_uploaded_file($smallImage['tmp_name'], $uploadPath)) {
            $sql .= " small_image = '$uploadPath',";
            $_SESSION['small_image'] = $uploadPath; // Update the small image path in the session
        } else {
            echo "Failed to upload the small image.";
            exit;
        }
    }


    // Remove the trailing comma from the SQL update query
    $sql = rtrim($sql, ", ");

    // Update the user data in the database
    $updateSql = "UPDATE usersclass SET " . substr($sql, 1) . " WHERE id = '{$_SESSION['id']}'";
    if (mysqli_query($conn, $updateSql)) {
        echo "Account information updated successfully.";
    } else {
        echo "Error updating account information: " . mysqli_error($conn);
    }
}
?>

<html>
<title>School Supplies List</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="stylesacc.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<body>
    <div class="container-account" id="fade-container">
        <div class="row">
            <div class="col-md-12">
                <img width="100%" height="300" src="images/account/background.jpg" alt="">
                <div class="small-image" style="position: absolute; top: 60%; left: 5%;">

                    <!-- add the ability for user to insert image -->
                    <div class="image-container">
                        <img id="image-preview" class="smallimage" src="images/account/profile.png" width="200" height="200" alt="Preview Image" />
                        <div class="image-upload">
                            <label for="smallimage" id="smallimage">Upload Image</label>
                            <input type="file" name="smallimage" accept="image/*" />
                        </div>
                    </div>


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
        <form method="post">
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
                    <input type="submit" class="update" value="update info">
                </div>
            </div>
        </form>
    </div>


    </div>
    </div>

    </form>


</body>

</html>

<?php
include("footer.php")
?>