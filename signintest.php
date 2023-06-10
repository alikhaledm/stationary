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

<?php
include("spinner.php");
?>

<?php
include("navbar.php");
?>

<body>
    <div class="bodysignin">


        <div class="containersignin" id="container">

            <div class="form-container sign-up-container">
                <form method="POST">
                    <h1>Create Account</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" placeholder="Name" />
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Password" />
                    <button>Sign Up</button>
                </form>
            </div>

            <div class="form-container sign-in-container">
                <form method="POST">
                    <h1>Sign in</h1>
                    <div class="social-container">

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
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost buttonsignin" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
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

    .containersignin.right-panel-active .sign-in-container {
        transform: translateX(100%);
    }

    .containersignin.right-panel-active .overlay {
        transform: translateX(50%);
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

    .sign-up-container {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }

    .containersignin.right-panel-active .sign-up-container {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
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

    .containersignin.right-panel-active .overlay-left {
        transform: translateX(0);
    }

    .overlay-right {
        right: 0;
        transform: translateX(0);
    }



    .social-container {
        margin: 20px 0;
    }
</style>
<script>const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });</script>
<?php
include("footer.php")
    ?>