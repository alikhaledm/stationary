<!DOCTYPE html>
<html lang="en">

<?php
include("navbar.php");
require_once("connect.php");
session_start();

if (isset($_POST['submit'])) {
    $acc = $_POST["acctype"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $phone = $_POST["phone"];

    // check if e-mail address is well-formed

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert ("invalid email format")</script>';
    } else {

        $resultset = mysqli_query($conn, "select * from users where email='" . $email . "'  ");
        $count = mysqli_num_rows($resultset);

        $resultset1 = mysqli_query($conn, "select * from parents where email='" . $email . "'  ");
        $count1 = mysqli_num_rows($resultset1);

        $resultset2 = mysqli_query($conn, "select * from students where email='" . $email . "'  ");
        $count2 = mysqli_num_rows($resultset2);

        if ($count > 0 || $count1 > 0 || $coun2 > 0) {
            echo '<script> alert("this user is already used ")</script>';
        } elseif ($acc == 0) {
            $sql = "INSERT INTO parent(FName,LName,Password,Email,Phone) values ('$fname','$lname','$pwd','$email','$phone')";
            $result = mysqli_query($conn, $sql);

        } elseif ($acc == 1) {
            $sql = "INSERT INTO student(FName,LName,Password,Email,Phone) values ('$fname','$lname','$pwd','$email','$phone')";
            $result = mysqli_query($conn, $sql);

        } elseif ($acc == 2) {
            $sql = "INSERT INTO user(FName,LName,Password,Email,Phone) values ('$fname','$lname','$pwd','$email','$phone')";
            $result = mysqli_query($conn, $sql);

        }

        if ($row = mysqli_fetch_array($result)) {
            echo "Success";
            if ($row[4] == 1) {
              $_SESSION["id"] = $row[0];
              $_SESSION["name"] = $row[1];
              header('Location: admin-panel.php');
            } else {
              $_SESSION["id"] = $row[0];
              $_SESSION["name"] = $row[1];
              header('Location: index.php');
            }

    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
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
                            <div class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                Are You Shopping As
                            </div>
                        </div>
                        <form action="signup.php" method="POST">
                            <div class="container mx-auto ">
                                <div class="mx-auto max-w-xs">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="btn-group btn-group-toggle mb-4 px-5" data-toggle="buttons">
                                                <label class="btn btn-warning border border-gray-200 bg-gray-200 font-semibold hover:bg-warning transition-all duration-300 ease-in-out">
                                                    <input type="radio" name="acctype" autocomplete="off" value="0" required> Parent
                                                </label>
                                                <label class="btn btn-warning border border-gray-200 bg-gray-200 font-semibold hover:bg-warning transition-all duration-300 ease-in-out">
                                                    <input type="radio" name="acctype" autocomplete="off" value="1" required> Student
                                                </label>
                                                <label class="btn btn-warning border border-gray-200 bg-gray-200 font-semibold hover:bg-warning transition-all duration-300 ease-in-out">
                                                    <input type="radio" name="acctype" autocomplete="off" value="2" required> Neither
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input class="w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" name="fname" placeholder="First Name" required />
                                        </div>
                                        <div class="col-6" id="name">
                                            <input class="w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" name="lname" placeholder="Last Name" />
                                        </div>
                                        <div class="col-12">
                                            <input class="w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" name="email" placeholder="Email" />
                                        </div>
                                        <div class="col-12">
                                            <input class="w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-4" name="pwd" minlength="8" placeholder="Password" />
                                        </div>

                                        <div class="col-12">
                                            <input class="w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-4" name="phone" minlength="11" maxlength="11" placeholder="Phone Number" />
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="mt-4 tracking-wide font-semibold bg-warning text-gray-100 w-full py-4 rounded-lg hover:bg-warning transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
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
        <div class="w-full bg-center bg-no-repeat" style="background-image: url('images/undraw_back_to_school_inwc.png');"></div>
    </div>
    </div>
    </div>

    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

</body>

</html>