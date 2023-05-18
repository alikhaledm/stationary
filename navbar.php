<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white opacity-100 sticky-top">
    <div class="container-fluid" style="padding-bottom: 30px; padding-top: 30px;">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.jpg" alt="Logo" width="50" height="50" class="d-inline-block align-text-top me-2">
        </a>
        <a class="navbar-brand" href="#">
            <h1 class="d-inline-block align-text-top me-2">SUPPLIES HUB</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav" style="font-size:20px;">
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
                </li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <?php
                if (isset($_SESSION['id'])) {
                    echo '
                    <li class="nav-item">
                    <a class="nav-link" href="cart.php">My Cart</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="logout.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown">'
                        . $_SESSION["fname"];
                    echo '
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Option 1</a></li>
                        <li><a class="dropdown-item" href="#">Option 2</a></li>
                        <li><a class="dropdown-item" href="#">Option 3</a></li>
                        <li><a class="dropdown-item" href="#">Option 4</a></li>
                        <li><a class="dropdown-item" href="#">Option 5</a></li>
                    </ul>
                </li>';
                } else
                    echo '<li class="nav-item">
                <a class="nav-link" href="signin.php">Sign In</a>
            </li>';
                ?>
            </ul>
        </div>
    </div>
</nav>