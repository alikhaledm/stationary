<?php
require_once("connect.php");
include("navbar.php");

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    if (empty($_POST["name"])) {

        echo '<script>alert ("name is required")</script>';
    }
    if (!preg_match("/[a-zA-Z- ]*$/", $name)) {
        echo '<script> alert("Only letters and numbers are allowed") </script> ';
    }

    $password = $_POST["password"];
    if (empty($_POST["password"])) {

        echo '<script>alert ("password is required")</script>';
    }

    $email = $_POST["email"];
    if (empty($_POST["email"])) {

        echo '<script>alert ("email is required")</script>';
    }

    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        echo '<script>alert ("invalid email format")</script>';
    }


    $phone = $_POST["phone"];
    if (empty($_POST["phone"])) {

        echo '<script>alert ("phone is required")</script>';
    }
    if (!preg_match("/[a-zA-Z- ]*$/", $name)) {
        echo '<script> alert("Only numbers are allowed") </script> ';
    }

    $resultset_1 = mysqli_query($conn, "select * from users where name='" . $name . "' ");
    $count = mysqli_num_rows($resultset_1);

    $resultset_2 = mysqli_query($conn, "select * from users where email='" . $email . "'  ");
    $count2 = mysqli_num_rows($resultset_2);



    if ($count > 0 || $count2 > 0) {
        echo '<script> alert("this user is already used ")</script>';
    } else {

        $sql = "INSERT INTO users(name,password,email,claim,phone) values('$name','$password','$email','$phone')";
        $result = mysqli_query($conn, $sql);
        try {
            if (!$result)
                throw new Exception("Error occured!!");
        } catch (Exception $e) {
            echo "Message:", $e->getMessage();
        }

        echo '<script> alert("Done :) ")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</head>
<style>
    label.radio {
        overflow: visible;
        display: inline-block;
        position: relative;
        margin-bottom: 30px;
    }

    label.radio:before {
        background: grey;
        content: '';
        position: absolute;
        border-radius: 100%;
        border: 3px solid #ffffff;

    }

    label.radio:after {
        position: absolute;
        border-top: none;
        border-right: none;
    }
</style>

<body>
    <div class="container mb-20 mt-20">
        <div class=" max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div>
                    <img src="assets/img/logo.jpg" class="w-18 mx-auto" />
                </div>
                <div class="mt-6 flex flex-col items-center">
                    <h1 class="text-1xl xl:text-5xl font-extrabold text-black text-center">
                        Sign up
                    </h1>
                    <div class="w-full flex-1 mt-8">
                        <div class="mb-10 border-b text-center">
                            <div class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                Are You Shopping As
                            </div>
                        </div>
                        <div class="container mx-auto ">
                            <div class="input-group mb-3" id="radio">
                                <div class="input-group-text">
                                    <input type="radio" name="acc"> Parent
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input type="radio" name="acc">Student
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input type="radio" name="acc"> Neither
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto max-w-xs">
                            <div class="row">
                                <div class="col-6" id="name">
                                    <input class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="fname" placeholder="First Name" />
                                </div>
                                <div class="col-6" id="name">
                                    <input class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="lname" placeholder="Last Name" />
                                </div>
                                <div class="col-12">
                                    <input class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="email" placeholder="Email" />
                                </div>
                                <div class="col-12">
                                    <input class="w-full px-8 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-4" type="password" placeholder="Password" />
                                </div>
                                <div class="col-12">
                                    <button class="mt-4 tracking-wide font-semibold bg-warning text-gray-100 w-full py-4 rounded-lg hover:bg-warning transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                        <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                            <circle cx="8.5" cy="7" r="4" />
                                            <path d="M20 8v6M23 11h-6" />
                                        </svg>
                                        <span class="ml-3">
                                            Sign Up
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <p class="mt-6 text-xs text-gray-600 text-center">
                                I agree to abide by Supply Room's
                                <a href="#" class="border-b border-gray-500 border-dotted">
                                    Terms of Service
                                </a>
                                and its
                                <a href="#" class="border-b border-gray-500 border-dotted">
                                    Privacy Policy
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-light text-center lg:flex">
                <div class="m-12 xl:m-16 w-full bg-contain bg-light bg-center bg-no-repeat" style="background-image: url('assets/img/undraw_quality_time_wiyl.svg');"></div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>

</body>

</html>