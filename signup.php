<!DOCTYPE html>
<html lang="en">
<?php
require_once("connect.php");

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
?>

<head>
    <title>Sign Up</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        body {
            opacity: 0;
            transition: opacity 3s ease-in;
        }

        .fade-in {
            opacity: 1;
        }

        .centered {
            display: flex;
            align-items: center;
            justify-content: center;
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

        .scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
        }

        .password-input-container {
            position: relative;
            display: inline-block;
        }

        .password-input-container .show-password-icon {
            position: absolute;
            left: 280px;
            transform: translateY(-280%);
            cursor: pointer;
            user-select: none;

        }

        .password-input-container .show-password-icon.visible {
            color: #fbd334;
            /* Change the color to your preferred icon state */
        }
    </style>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <div class="container mb-20 mt-20">
        <div class=" max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div>
                    <img src="images/logo.jpg" class="w-18 mx-auto" />
                </div>
                <div class="mt-6 flex flex-col items-center">
                    <h1 class="text-1xl xl:text-5xl font-extrabold text-black text-center">
                        Sign up
                    </h1>
                    <p class="mt-6 pb-0 mb-0 text-s text-gray-700 text-center">
                        Already Have An Account?
                        <a href="signin.php" class="border-b border-gray-500 border-dotted">
                            Login Here!
                        </a>
                    </p>
                    <div class="w-full flex-1 mt-8">
                        <div class="mb-10 border-b text-center">
                            <div class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                Are You A?
                            </div>
                        </div>
                        <form method="POST">
                            <div class="container mx-auto">
                                <div class="mx-auto max-w-xs">
                                    <div class="row">
                                        <div class="col centered">
                                            <div class="btn-group btn-group-toggle mb-4" data-toggle="buttons">
                                                <label class="btn btn-warning px-8 py-2 border border-gray-200 bg-gray-200 font-semibold hover:bg-warning transition-all duration-300 ease-in-out">
                                                    <input type="radio" name="acctype" autocomplete="off" value="0" required style="margin-left:20;">
                                                    Parent
                                                </label>
                                                <label class="btn btn-warning px-8 py-2 border border-gray-200 bg-gray-200 font-semibold hover:bg-warning transition-all duration-300 ease-in-out">
                                                    <input type="radio" name="acctype" autocomplete="off" value="1" required> Student
                                                </label>
                                                <label class="btn btn-warning px-8 py-2 border border-gray-200 bg-gray-200 font-semibold hover:bg-warning transition-all duration-300 ease-in-out">
                                                    <input type="radio" name="acctype" autocomplete="off" value="2" required> Neither
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input class="w-full mb-4 px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" name="fname" placeholder="First Name" required />
                                        </div>
                                        <div class="col-6">
                                            <input class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" name="lname" placeholder="Last Name" required />
                                        </div>
                                        <div class="col-12">
                                            <input class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" name="email" placeholder="Email" required />
                                        </div>
                                        <div class="col-12">
                                            <input class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-4" id="passwordInput" name="pwd" minlength="8" maxlength="30" placeholder="Password" type="password" required />
                                            <div class="password-input-container">
                                                <div class="show-password-icon" onclick="togglePasswordVisibility()">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                                                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <input class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-0" name="phone" placeholder="Phone Number" required />
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" value="Sign Up" class="mt-4 tracking-wide font-semibold bg-warning text-white w-full py-4 rounded-lg hover:bg-warning transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                        </form>
                    </div>
                </div>
            </div>
            <p class="mt-6 text-xs text-gray-600 text-center">
                I agree to abide by Supply Room's
                <a href="#" class="border-b border-gray-500 border-dotted">
                    Terms of Service
                </a>
                and its<br>
                <a href="#" class="border-b border-gray-500 border-dotted">
                    Privacy Policy
                </a>
            </p>
        </div>
    </div>
    </div>
    </div>
    <div class="flex-1 text-center lg:flex">
        <div class="w-full bg-center bg-no-repeat" style="background-image: url('images/signup.png');"></div>
    </div>
    </div>
    </div>



    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var body = document.querySelector('body');
            body.classList.add('fade-in');
        });

        var passwordInput = document.getElementById("passwordInput");
        var showPasswordIcon = document.querySelector(".show-password-icon");

        function togglePasswordVisibility() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordIcon.classList.add("visible");
            } else {
                passwordInput.type = "password";
                showPasswordIcon.classList.remove("visible");
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

    <?php
    include 'footer.php';
    ?>
</body>

</html>