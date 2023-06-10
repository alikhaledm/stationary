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
                header("Location: admin-dashboard.php");
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

                    </div>
                    <span>Login to Supplies Hub</span>
                    <input class="inputsignin" name="email" placeholder="Email" required />
                    <input class="inputsignin" id="passwordInput" type="password" name="password" placeholder="Password"
                        required />
                    <a class="asignin" href="#">Already a user? Sign Up</a>
                    <button class="buttonsignin" type="submit" value="Sign In">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>Welcome To Supplies Hub</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost buttonsignin" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<style>
    .bodysignin {
        background: white;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        height: 80vh;
        margin: -20px 0 50px;
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

    .asignin {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    .buttonsignin {
        border-radius: 20px;
        border: 1px solid #FFFFFF;
        background-color: #EBBF2F;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    .buttonsignin:active {
        transform: scale(0.95);
    }

    .buttonsignin:focus {
        outline: none;
    }

    .buttonsignin.ghost {
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
        color: #0c0129;
    }

    .inputsignin {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .containersignin {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: 70%;
        height: 70%;
        max-width: 100%;
        min-height: 480px;

    }



    .sign-in-container {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
        transform: translateX(100%);
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



    .overlay {
        background: #FF416C;
        background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
        background: linear-gradient(to right, gold, #EBBF2F);
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

    .overlay-left {
        transform: translateX(-20%);
    }

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

    .overlay-right {
        right: 0;
        transform: translateX(0);
    }













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