<?php
require_once("connect.php");
include("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usersclass WHERE email ='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row["password"] == $password) {
            $_SESSION['id'] = $row["id"];
            $_SESSION['fname'] = $row["fname"];

            if (isset($_SESSION['id'])) {
                header('location: index.php');
            } else {
                echo "<script>alert('Invalid email or password')</script>";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />

    <link rel="stylesheet" href="styles.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</head>
<style>
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
    <div class="container mb-20 mt-20">
        <div class=" max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div>
                    <img src="images/logo.jpg" class="w-18 mx-auto" />
                </div>
                <div class="mt-6 flex flex-col items-center">
                    <h1 class="text-1xl xl:text-5xl font-extrabold text-black text-center">
                        Sign In
                    </h1>
                    <form method="POST">
                        <div class="w-full flex-1 mt-8">
                            <div class="flex flex-col items-center">
                                <button
                                    class="w-full max-w-xs font-bold shadow-sm rounded-lg py-3 bg-light text-gray-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline">
                                    <div class="bg-white p-2 rounded-full">
                                        <svg class="w-4" viewBox="0 0 533.5 544.3">
                                            <path
                                                d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z"
                                                fill="#4285f4" />
                                            <path
                                                d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z"
                                                fill="#34a853" />
                                            <path
                                                d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z"
                                                fill="#fbbc04" />
                                            <path
                                                d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z"
                                                fill="#ea4335" />
                                        </svg>
                                    </div>
                                    <span class="ml-4">
                                        Continue with Google
                                    </span>
                                </button>
                            </div>
                            <div class="my-12 border-b text-center">
                                <div
                                    class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                    Or sign in with E-mail
                                </div>
                            </div>
                            <div class="mx-auto max-w-xs">
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    name="email" placeholder="Email" required />
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-4"
                                    name="password" placeholder="Password" required />
                                <input type="submit" value="Sign In"
                                    class="mt-4 tracking-wide font-semibold bg-warning text-white w-full py-4 rounded-lg hover:bg-warning transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                    </form>
                    <p class="mt-6 text-xs text-gray-600 text-center">
                        Don't have an account?
                        <a href="Signup.php" class="border-b border-gray-500 border-dotted">
                            Signup
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-1 bg-light text-center lg:flex">
        <div class="w-full bg-center bg-light bg-no-repeat" style="background-image: url('images/signin.png');"></div>
    </div>
    </div>
    </div>

    <?php
    include 'footer.php';
    ?>



</body>

</html>