<style>
    .navbarcustomedits {
        background-color: white;
    }

    .navcontainer {
        width: 75%;
    }

    .brand {
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
        <a class="navbar-brand" href="index.php"> <img src="images/logo.jpg" alt="Logo" width="75" height="75" class="d-inline-block align-text-top me-2"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link brand" href="index.php">SUPPLIES HUB</a>
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