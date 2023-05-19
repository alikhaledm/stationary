<?php
require_once("connect.php");
include("navbar.php");

//check is user is signed in and if not redirect to signin.php
if (!isset($_SESSION['id'])) {
    header("Location: signin.php");
}

$sql = "SELECT * FROM usersclass WHERE email ='$_SESSION[email]'";
$result = mysqli_query($conn, $sql);

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
    if (!empty($fname)) {
        $sql .= " fname = '$fname',";
    }
    if (!empty($lname)) {
        $sql .= " lname = '$lname',";
    }
    if (!empty($email)) {
        $sql .= " email = '$email',";
    }
    if (!empty($password)) {
        $sql .= " password = '$password',";
    }
    if (!empty($phone)) {
        $sql .= " phone = '$phone',";
    }
    if (!empty($dob)) {
        $sql .= " dob = '$dob',";
    }

    // Remove the trailing comma
    $sql = rtrim($sql, ",");

    // Add the WHERE clause to update the specific user based on the email
    $sql .= " WHERE email = '$_SESSION[email]'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Update successful

        // Fetch the updated user data from the database
        $selectQuery = "SELECT * FROM usersclass WHERE email ='$_SESSION[email]'";
        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        // Update the session variables with the new values
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['lname'] = $user['lname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['dob'] = $user['dob'];
    } else {
        // Error occurred during update
        echo "Error updating user information: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<html>
<title>School Supplies List</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<style>
    .container-account {
        padding-left: 50;
        padding-right: 50;
        width: 60%;
        margin-right: auto;
        margin-left: auto;
    }

    .smallimage {
        align-items: center;
        justify-content: center;
    }

    .discard {
        width: 100;
        height: 35;
        background-color: white;
        color: black;
        border: none;
    }

    .discard:hover {
        background-color: black;
        color: white;
        border: none;

    }

    .update {
        width: 115;
        height: 35;
        background-color: black;
        color: white;
        opacity: 0.6;
        border: none;
    }

    .update:hover {
        background-color: black;
        color: white;
        border: none;
        opacity: 1;

    }

    .input {
        width: 70%;
        height: 35;

    }

    /* For WebKit browsers (Chrome, Safari) */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background-color: white;
    }

    ::-webkit-scrollbar-thumb {
        background-color: gray;
    }

    /* For Firefox */
    ::-moz-scrollbar {
        width: 10px;
    }

    ::-moz-scrollbar-track {
        background-color: #f1f1f1;
    }

    ::-moz-scrollbar-thumb {
        background-color: #888;
    }

    /* For Internet Explorer and Microsoft Edge */
    /* Note: Microsoft Edge supports the -ms-overflow-style property */
    /* to customize the scroll bar, but it's not widely supported */
    /* in other versions of IE. */
    /* Therefore, this code may not work in all IE versions. */
    /* It's recommended to test it in your target browsers. */
    .scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #888 #f1f1f1;
    }
</style>

<body>
    <div class="container-account" id="fade-container">
        <div class="row">
            <div class="col-md-12">
                <img width="100%" height="300" src="images/account/background.jpg" alt="">
                <div class="small-image" style="position: absolute; top: 60%; left: 5%;">

                    <img class="smallimage" width="100" height="100" src="images/account/profile.png" alt="">
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