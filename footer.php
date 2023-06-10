<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<head>
    <style>
    #hr-1 {
        border: 1px solid black;
        font-weight: bold;
    }

    .custombtnfooter {
        background-color: white;
        color: black;
        width: 100%;
        height: 35px;
        border-color: black;

    }

    .custombtnfooter:hover {
        background-color: #ebbf2f;
    }
    </style>
</head>

<body>
    <!--------------------------------------------- Footer --------------------------------------------------------->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>School Supplies</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">privacy policy</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Shop</h4>
                    <ul>
                        <li><a href="#">Shop Here</a></li>

                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <ul>
                        <li><a href="#">Supplieshub@gmail.com</a></li>
                        <li><a href="#">+201000086123</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <style>
    /* -------------------------------------------Footer-------------------------------------*/
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    .container {
        max-width: 1170px;
        margin: auto;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    ul {
        list-style: none;
    }

    .footer-col li {
        color: white;
        text-align: left;
        align-items: left;
    }

    .footer {
        background-color: #0c0129;
        padding: 40px 0;
    }

    .footer-col {
        width: 25%;
        text-align: left;
        align-items: left;

    }

    .footer-col ul {
        list-style-type: none;
        text-align: left;
        align-items: left;
    }

    .footer-col h4 {
        font-size: 21px;
        color: #ebbf2f;
        text-transform: capitalize;
        margin-bottom: 35px;
        font-weight: 500;
        position: relative;
    }

    .footer-col li a {
        color: white;
        text-align: left;
        align-items: left;


    }

    .footer-col h4::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        background-color: #ebbf2f;
        height: 2px;
        box-sizing: border-box;
        width: 50px;
    }

    .footer-col ul li:not(:last-child) {
        margin-bottom: 10px;
    }

    .footer-col ul li a {
        font-size: 18px;
        text-transform: capitalize;
        color: white;
        text-decoration: none;
        font-weight: 300;
        display: block;
        transition: all 0.3s ease;

    }

    .footer-col ul li a:hover {
        color: #ebbf2f;
        padding-left: 8px;
    }

    .footer-col .social-links a {
        display: inline-block;
        height: 40px;
        width: 40px;
        background-color: white;
        margin: 0 10px 10px 0;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        color: #493e66;
        transition: all 0.5s ease;
    }

    .footer-col .social-links a:hover {
        color: #493e66;
        background-color: #ebbf2f;
    }

    .fab {
        margin-top: 10px;
    }

    /*-------------------------------------------------------------------------------------- */


    /*------------------------------- responsive Footer -------------------------------------*/
    @media(max-width: 767px) {
        .footer-col {
            width: 50%;
            margin-bottom: 30px;
        }
    }

    @media(max-width: 574px) {
        .footer-col {
            width: 100%;
        }
    }

    /* -------------------------------------------------------------------------------------- */
    </style>
</body>