<?php
require_once("connect.php");

// Retrieve the user ID from the session
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
} else {
    // Redirect the user to the login page or display an error message
    // if the user is not logged in or authenticated.
    // Replace "login.php" with the actual login page URL.
    header("Location: signin.php");
    exit();
}

$cartId = $_SESSION['id'];

$total = $_SESSION['id'];

$addressid = $_SESSION['id'];
// Prepare and execute the SQL query to insert the order into the database
$query = "INSERT INTO orders (`userid`, `cartid`, `total`, `address`, `date`) VALUES ('$userId', '$cartId', '$total', '$addressid', NOW())";
$result = $conn->query($query);


if ($result) {
    // Order inserted successfully
    echo "Order placed successfully.";
} else {
    // An error occurred
    echo "Error: " . $conn->error;
}


?>


<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
    <style>
        @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
    </style>
    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>

<body>
    <header class="site-header" id="header">
        <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
    </header>
    <div class="main-content">
        <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
        <p class="main-content__body" data-lead-id="main-content-body">Thanks a bunch for filling that out. It means a
            lot to us, just like you do! We really appreciate you giving us a moment of your time today. Thanks for
            being you.</p>
    </div>
    <footer class="site-footer" id="footer">
        <p class="site-footer__fineprint" id="fineprint">Copyright ©2014 | All Rights Reserved</p>
    </footer>
</body>

</html>