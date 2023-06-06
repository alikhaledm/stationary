<!DOCTYPE html>
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

        a {
            font-size: 24px;
            color: #fbd334;
        }

        .main-content__checkmark {
            color: #fbd334;
            /* Updated checker color */
        }

        .main-content__body {
            font-size: 18px;
            /* Updated font size for product resale request line */
        }

        .body .div {
            text-decoration: #fbd334;
        }
    </style>
    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>

<body>
    <header class="site-header" style="margin-top: 100px;" id="header">
        <i class="fa fa-check main-content__checkmark" style="color: #fbd334;" id="checkmark"></i>
        <h1 class="site-header__title" data-lead-id="site-header-title">Resale Request Sent</h1>
    </header>
    <div class="main-content">
        <p class="main-content__body" data-lead-id="main-content-body">Thank you for submitting your product resale request! We appreciate your interest in selling your product. We will review your request and notify you accordingly. Thank you for choosing us as your platform for product resale.</p>
    </div>
    <br><br>
    <div class="row">
        <div class="col-6"><a href="index.php">Go To Homepage</a></div><br>
        <div class="col-6"><a href="excess.php">Back To Excess Supplies</a></div>
    </div>
    <footer class="site-footer" id="footer">
        <p class="site-footer__fineprint" id="fineprint">© <?php echo date("Y"); ?> All Rights Reserved</p>
    </footer>
</body>

</html>