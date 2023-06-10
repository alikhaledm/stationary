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
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<style>
    .navbarcustomedits {
        background-color: #0c0129;
        color: white;
    }

    .navbarcustomedits {
        background-color: #0c0129;
        color: white;
    }

    .navcontainer {
        width: 75%;
    }

    .brand2 {
        font-size: 40px;
        font-weight: bold;
    }

    .btncustom {
        border-color: black;
        border: 0.5px solid #000;
        background-color: white;
        height: 40px;
        width: 120px;
        margin-left: 80px;
    }

    .nav-link {
        color: white;
        font-size: 18px;
    }

    .btncustom {
        border-color: black;
        border: 0.5px solid #000;
        background-color: white;
        height: 40px;
        width: 120px;
        margin-left: 80px;
    }

    .nav-link {
        color: white;
        font-size: 18px;
    }

    .btncustom:hover {
        border-color: gold;
        background-color: #ebbf2f;
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
        padding-right: 40px;
    }

    .activee {
        color: gold;
    }
</style>

<nav class="navbar navbar-expand-lg sticky-top navbarcustomedits">
    <div class="container-fluid navcontainer">
        <a class="navbar-brand" href="index.php"> <img src="images/logo/1d.png" alt="Logo" width="100%" height="80px" class="d-inline-block align-text-top me-2"></a>
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
                            <div class="cartcount">0</div>
                            <div class="cartcount">0</div>
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
                            </svg>
                        </div>
                    </a>
                </li>';
                    } ?>
                    <style>
                        .cartcount {
                            color: WHITE;
                            font-size: 0;
                        }
                    </style>

                    <?php if (isset($_SESSION['id'])) {
                        echo '
                <li id="dropdown" class="nav-item">
                    <div class="dropdown">
                        <button class="btncustom dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            ' . $_SESSION['fname'] . '
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="account.php">My Account</a>
                            <a class="dropdown-item" href="address.php">My Addresses</a>
                            <a class="dropdown-item" href="wallet.php">My Wallet</a>
                            <hr>
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