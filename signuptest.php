<!DOCTYPE html>
<html lang="en">
<?php
require_once("connect.php");

if (isset($_POST['signup'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["pwd"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $phoneNum = $_POST["phone"];
        $acctype = $_POST["acctype"];

        // find current date and put it in variable register date
        $registerdate = date("Y-m-d");

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script>alert("Invalid Email Format, Please Try Again!");</script>';
        } else {
            $checkEmailQuery = "SELECT * FROM usersclass WHERE email = '$email'";
            $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

            if (mysqli_num_rows($checkEmailResult) > 0) {
                echo '<script>alert("Email is already in use!");</script>
                <script>window.location.href = "signup.php";</script>';
            } elseif ($acctype == 0) {
                $sql = "INSERT INTO usersclass (email, password, fname, lname, phone, acctype, registerdate)
                        VALUES ('$email', '$password', '$fname', '$lname', '$phoneNum', 'Parent','$registerdate')";

                // Start a transaction
                mysqli_begin_transaction($conn);

                try {
                    // Insert user information into usersclass table
                    if (mysqli_query($conn, $sql)) {
                        $parentid = mysqli_insert_id($conn);

                        // Retrieve the id from usersclass table based on the email
                        $selectIdQuery = "SELECT id FROM usersclass WHERE email = '$email' FOR UPDATE";
                        $selectIdResult = mysqli_query($conn, $selectIdQuery);

                        // Commit the transaction
                        mysqli_commit($conn);
                    } else {
                        // Rollback the transaction if there was an error
                        mysqli_rollback($conn);
                        echo "Error: " . mysqli_error($conn);
                    }
                } catch (Exception $e) {
                    // Rollback the transaction in case of exception
                    mysqli_rollback($conn);
                    echo "Error: " . $e->getMessage();
                }
            } elseif ($acctype == 1) {
                $sql = "INSERT INTO usersclass (email, password, fname, lname, phone, acctype, registerdate)
                        VALUES ('$email', '$password', '$fname', '$lname', '$phoneNum', 'Student', '$registerdate')";
                mysqli_begin_transaction($conn);

                try {
                    // Insert user information into usersclass table
                    if (mysqli_query($conn, $sql)) {
                        $studentid = mysqli_insert_id($conn);

                        // Retrieve the id from usersclass table based on the email
                        $selectIdQuery = "SELECT id FROM usersclass WHERE email = '$email' FOR UPDATE";
                        $selectIdResult = mysqli_query($conn, $selectIdQuery);

                        if (mysqli_num_rows($selectIdResult) > 0) {
                            $row = mysqli_fetch_assoc($selectIdResult);
                            $userid = $row['id'];

                            // Insert the user id into the ParentId column of the parent table
                            $sqlStudent = "INSERT INTO student (studentid, userid, studentname) VALUES ('$userid','$userid','$fname $lname')";
                            mysqli_query($conn, $sqlStudent);
                        }

                        // Commit the transaction
                        mysqli_commit($conn);
                    } else {
                        // Rollback the transaction if there was an error
                        mysqli_rollback($conn);
                        echo "Error: " . mysqli_error($conn);
                    }
                } catch (Exception $e) {
                    // Rollback the transaction in case of exception
                    mysqli_rollback($conn);
                    echo "Error: " . $e->getMessage();
                }
            } elseif ($acctype == 2) {
                $sql = "INSERT INTO usersclass (email, password, fname, lname, phone, acctype, registerdate)
                        VALUES ('$email', '$password', '$fname', '$lname', '$phoneNum', 'User', $registerdate)";
            }

            $sql2 = "SELECT * FROM usersclass WHERE email ='$email'";
            $result = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                $_SESSION['id'] = $row["id"];
                $_SESSION['fname'] = $row["fname"];
                $_SESSION['lname'] = $row["lname"];
                $_SESSION['email'] = $row["email"];
                $_SESSION['phone'] = $row["phone"];
                $_SESSION['acctype'] = $row["acctype"];
                if ($_SESSION['acctype'] == 'Student') {
                    $_SESSION['dob'] = $row["dob"];
                }

                echo '<script>window.location.href = "index.php";</script>';
                $conn->close();
            }
        }
    }
} elseif (isset($_POST['signin'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_SESSION['id'])) {
            header("location:logout.php");
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM usersclass WHERE email ='$email'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                if ($row["password"] == $password) {
                    $_SESSION['id'] = $row["id"];
                    $_SESSION['fname'] = $row["fname"];
                    $_SESSION['lname'] = $row["lname"];
                    $_SESSION['email'] = $row["email"];
                    $_SESSION['phone'] = $row["phone"];
                    $_SESSION['acctype'] = $row["acctype"];

                    if ($_SESSION['acctype'] == 'Student') {
                        $_SESSION['dob'] = $row["dob"];
                    } elseif ($_SESSION['acctype'] == "admin") {
                        header("Location: admin-panel.php");
                        exit(); // Terminate the script after redirection
                    } else {
                        // Redirect to index.php for other user types
                        header("Location: index.php");
                        exit(); // Terminate the script after redirection
                    }
                } else {
                    error_reporting(0);
                    echo "<script>alert('Invalid email or password')</script>";
                }
            } else {
                error_reporting(0);
                echo "<script>alert('Invalid email or password')</script>";
            }
        } else {
            // Query error occurred
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

?>

<body>
    <?php
    include("spinner.php");
    ?>

    <?php
    include("navbar.php");
    ?>

    <div class="bodysign">

        <div class="containersign" id="containersign">
            <div class="form-container sign-up-container">
                <form method="POST">
                    <h1>Create Account</h1>
                    <div class="social-container">
                        <input class="inputsign" type="radio" name="acctype" autocomplete="off" value="0" required
                            style="margin-left:20;">Parent
                        <input class="inputsign" type="radio" name="acctype" autocomplete="off" value="1" required>
                        Student
                        <input class="inputsign" type="radio" name="acctype" autocomplete="off" value="2" required>
                        Neither
                    </div>

                    <input class="inputsign" name="fname" placeholder="First Name" required />
                    <input class="inputsign" name="lname" placeholder="Last Name" required />
                    <input class="inputsign" name="email" placeholder="Email" required />
                    <input class="inputsign" id="passwordInput" name="pwd" minlength="8" maxlength="30"
                        placeholder="Password" type="password" required />
                    <input class="inputsign" name="phone" placeholder="Phone Number" required />
                    <button class="buttonsign" name="signup" type="submit" value="Sign Up">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form method="POST">
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a class="asign" href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a class="asign" href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a class="asign" href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your account</span>
                    <input class="inputsign" name="email" placeholder="Email" required />
                    <input class="inputsign" id="passwordInput" type="password" name="password" placeholder="Password"
                        required />
                    <a class="asign" href="#">Already a user?</a>
                    <button class="buttonsign" name="signin" type="submit" value="Sign In">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost buttonsign" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost buttonsign" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
        box-sizing: border-box;
    }

    .bodysign {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        height: 80vh;

    }

    h1 {
        font-weight: bold;
        margin: 0;
    }

    h2 {
        text-align: center;
    }

    p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    span {
        font-size: 12px;
    }

    .asign {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    .buttonsign {
        border-radius: 20px;
        border: 1px solid #FF4B2B;
        background-color: #FF4B2B;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    .buttonsign:active {
        transform: scale(0.95);
    }

    .buttonsign:focus {
        outline: none;
    }

    .buttonsign.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
    }

    form {
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    .inputsign {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .containersign {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: 70%;
        height: 700px;
        max-width: 100%;
        min-height: 480px;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .sign-in-container {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .containersign.right-panel-active .sign-in-container {
        transform: translateX(100%);
    }

    .sign-up-container {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }

    .containersign.right-panel-active .sign-up-container {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
    }

    @keyframes show {

        0%,
        49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%,
        100% {
            opacity: 1;
            z-index: 5;
        }
    }

    .overlay-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
    }

    .containersign.right-panel-active .overlay-container {
        transform: translateX(-100%);
    }

    .overlay {
        background: #FF416C;
        background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
        background: linear-gradient(to right, gold, purple);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 0 0;
        color: #FFFFFF;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .containersign.right-panel-active .overlay {
        transform: translateX(50%);
    }

    .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }



    .overlay-right {
        right: 0;
        transform: translateX(0);
    }
</style>

<script>const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const containersign = document.getElementById('containersign');

    signUpButton.addEventListener('click', () => {
        containersign.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        containersign.classList.remove("right-panel-active");
    });</script>
<?php
include("footer.php")
    ?>