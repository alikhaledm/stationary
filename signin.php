<?php
require_once("connect.php");
include("navbar.php");

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />

</head>
<style>
    .password-input-container {
        position: relative;
        display: inline-block;
    }

    .password-input-container .show-password-icon {
        position: absolute;
        left: 280px;
        transform: translateY(-270%);
        cursor: pointer;
        user-select: none;

    }

    .password-input-container .show-password-icon.visible {
        color: #fbd334;
        /* Change the color to your preferred icon state */
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
                                <button class="w-full max-w-xs font-bold shadow-sm rounded-lg py-3 bg-light text-gray-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline">
                                    <div class="bg-white p-2 rounded-full">
                                        <svg class="w-4" viewBox="0 0 533.5 544.3">
                                            <path d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z" fill="#4285f4" />
                                            <path d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z" fill="#34a853" />
                                            <path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z" fill="#fbbc04" />
                                            <path d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z" fill="#ea4335" />
                                        </svg>
                                    </div>
                                    <span class="ml-4">
                                        Continue with Google
                                    </span>
                                </button>
                            </div>
                            <div class="my-12 border-b text-center">
                                <div class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                    Or sign in with E-mail
                                </div>
                            </div>
                            <div class="mx-auto max-w-xs">
                                <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" name="email" placeholder="Email" required />
                                <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-4" id="passwordInput" type="password" name="password" placeholder="Password" required />
                                <div class="password-input-container">
                                    <div class="show-password-icon" onclick="togglePasswordVisibility()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                            <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                                            <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                                            <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                                        </svg>
                                    </div>
                                </div>
                                <input type="submit" value="Sign In" class="mt-4 tracking-wide font-semibold bg-warning text-white w-full py-4 rounded-lg hover:bg-warning transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
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

    <script>
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
    <?php
    include 'footer.php';
    ?>



</body>

</html>