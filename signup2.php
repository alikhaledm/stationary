<!DOCTYPE html>
<html lang="en">
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

<?php
require_once("connect.php");
include("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phoneNum = $_POST["phone"];
    $acctype = $_POST["acctype"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert ("Invalid Email Format, Please Try Again!")</script>';
    } elseif ($acctype == 0) {
        $sql = "INSERT INTO usersclass (email, password, fname, lname, phone, acctype)
                VALUES ('$email', '$password', '$fname', '$lname', '$phoneNum', 'Parent')";
    } elseif ($acctype == 1) {
        $sql = "INSERT INTO usersclass (email, password, fname, lname, phone, acctype)
                VALUES ('$email', '$password', '$fname', '$lname', '$phoneNum', 'Student')";
    } elseif ($acctype == 2) {
        $sql = "INSERT INTO usersclass (email, password, fname, lname, phone, acctype)
                VALUES ('$email', '$password', '$fname', '$lname', '$phoneNum', 'User')";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: signin2.php');
    }

    $conn->close();
}
?>

<head>
    <title>Sign Up</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</head>

<body>
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
                    <div class="w-full flex-1 mt-8">
                        <div class="mb-10 border-b text-center">
                            <div
                                class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                Are You A?
                            </div>
                        </div>
                        <form method="POST">
                            <div class="container mx-auto">
                                <div class="mx-auto max-w-xs">
                                    <div class="row">
                                        <div class="col centered">
                                            <div class="btn-group btn-group-toggle mb-4" data-toggle="buttons">
                                                <label
                                                    class="btn btn-warning px-8 py-2 border border-gray-200 bg-gray-200 font-semibold hover:bg-warning transition-all duration-300 ease-in-out">
                                                    <input type="radio" name="acctype" autocomplete="off" value="0"
                                                        required style="margin-left:20;">
                                                    Parent
                                                </label>
                                                <label
                                                    class="btn btn-warning px-8 py-2 border border-gray-200 bg-gray-200 font-semibold hover:bg-warning transition-all duration-300 ease-in-out">
                                                    <input type="radio" name="acctype" autocomplete="off" value="1"
                                                        required> Student
                                                </label>
                                                <label
                                                    class="btn btn-warning px-8 py-2 border border-gray-200 bg-gray-200 font-semibold hover:bg-warning transition-all duration-300 ease-in-out">
                                                    <input type="radio" name="acctype" autocomplete="off" value="2"
                                                        required> Neither
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input
                                                class="w-full mb-4 px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                                name="fname" placeholder="First Name" required />
                                        </div>
                                        <div class="col-6">
                                            <input
                                                class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                                name="lname" placeholder="Last Name" required />
                                        </div>
                                        <div class="col-12">
                                            <input
                                                class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                                name="email" placeholder="Email" required />
                                        </div>
                                        <div class="col-12">
                                            <input
                                                class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-4"
                                                name="pwd" minlength="8" maxlength="30" placeholder="Password"
                                                required />
                                        </div>

                                        <div class="col-12">
                                            <input
                                                class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-4"
                                                name="phone" placeholder="Phone Number" required />
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" value="Sign Up"
                                                class="mt-4 tracking-wide font-semibold bg-warning text-white w-full py-4 rounded-lg hover:bg-warning transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                        </form>
                    </div>
                </div>
            </div>
            <p class="mt-6 text-xs text-gray-600 text-center">
                Already a user?
                <a href="signin2.php" class="border-b border-gray-500 border-dotted">
                    Sign in
                </a>

            </p>

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

    <?php
    include 'footer.php';
    ?>

</body>
<script>
    window.addEventListener('DOMContentLoaded', function () {
        var body = document.querySelector('body');
        body.classList.add('fade-in');
    });
</script>

</html>