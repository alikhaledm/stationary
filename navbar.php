<!-- CSS file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">


<style>
    .customnav {
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 165px;
        padding-right: 165px;
        height: 15%;
        width: 100%;
        background-color: white;
    }

    .nav-item {
        display: flex;
        padding: 4px;
        text-decoration: none;
        color: #000;
        font-size: 18;
    }

        .nav-link {
            color: black;
        }

        .navbar-brand {
            color: black;
        }

        .navbar-brand:hover {
            color: gold;
        }

        .nav-link:hover {
            color: gold;
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
    </style>
</head>

<nav class="customnav navbar navbar-expand-lg opacity-100 sticky-top">

    <div class="my-container d-flex" style="padding-bottom: 30px; padding-top: 30px;">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.jpg" alt="Logo" width="75" height="75" class="d-inline-block align-text-top me-2">
            <h1 class="d-inline-block align-text-top align-items-center" style="padding-left:20px; padding-top:10;">
                SUPPLIES HUB
            </h1>
        </a>

        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-3"><span
                class="navbar-toggler-icon text-left"></span><span class="sr-only"></span></button>




        <div class="collapse navbar-collapse justify-content-end" id="navcol-3">
            <ul class="navbar-nav" style="font-size: 20px;">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <?php
                if (isset($_SESSION['id'])) {
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="excess.php">Excess Supplies</a>
                    </li>
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
                    <a href="signup.php">
                        <button class="btncustom" type="button">
                            Sign Up
                        </button>
                    </a>';
                    } ?>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>