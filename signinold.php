<?php
require_once("connect.php");


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
            }
            if ($row['email'] == "admin@gmail.com") {
                header("Location: admin-ViewUsers.php");
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


    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <style>
        .navbarcustomedits {
            background-color: white;
        }

        .navcontainer {
            width: 75%;
        }

        .brand2 {
            font-size: 25px;
            font-weight: bold;
        }

        .btncustom {
            border-color: black;
            border: 0.5px solid #000;
            background-color: white;
            height: 40px;
            width: 120px;
        }

        .btncustom:hover {
            border-color: gold;
        }

        .cartcount {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            border-radius: 50%;
            padding: 3px 6px;
            font-size: 12px;
        }

        .navfont {
            font-size: 15px;
        }

        .nav-link:hover {
            color: gold;
        }

        .activee {
            color: gold;
        }
    </style>

    <nav class="navbar navbar-expand-lg sticky-top navbarcustomedits">
        <div class="container-fluid navcontainer">
            <a class="navbar-brand" href="index.php"> <img src="images/logo/1d.png" alt="Logo" width="20%" height="80px" class="d-inline-block align-text-top me-2"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link brand2" href="index.php">SUPPLIES HUB</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 navfont">
                        <li class="nav-item">
                            <a class="nav-link activee" aria-current="page" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Shop</a>
                        </li>
                        <?php
                        if (isset($_SESSION['id'])) {
                            echo '
                    <li class="nav-item">
                        <a class="nav-link" href="excess.php">Excess Supplies</a>
                    </li>';
                        } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <?php
                        if (isset($_SESSION['id'])) {
                            echo '<li class="nav-item">
                    <a class="nav-link" href="cart.php">
                        <div class="position-relative">
                            <div class="cartcount">25</div>
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
                            </svg>
                        </div>
                    </a>
                </li>';
                        } ?>
                        <?php if (isset($_SESSION['id'])) {
                            echo '
                <li id="dropdown" class="nav-item">
                    <div class="dropdown">
                        <button class="btncustom dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            ' . $_SESSION['fname'] . '
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="account.php">My Account</a>
                            <a class="dropdown-item" href="page2.html">Page 2</a>
                            <a class="dropdown-item" href="page3.html">Page 3</a>
                            <hr style="width:75%">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>
                </li>';
                        } else {
                            echo '<li class="nav-item">
                    <a href="signin.php">
                        <button class="btncustom" type="button">
                            Sign In
                        </button>
                    </a>';
                        } ?>

                    </ul>
                </ul>
            </div>
        </div>
    </nav>













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
</body>

</html>

<?php
include("footer.php")
?>