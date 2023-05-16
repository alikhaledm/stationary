<?php
include("navbar.php")
    ?>
<title>School Supplies List</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="path/to/bradley-hand-itc.ttf" rel="stylesheet">


<style>
    p {

        font-size: 150px;
        color: black;
    }

    .card {
        perspective: 800px;
        width: 550px;
        height: 600px;
        position: relative;
        border: none;
    }

    .front,
    .back {
        width: 100%;
        height: 100%;
        position: absolute;
        backface-visibility: hidden;
        transition: transform 0.6s;
    }

    .front {
        background-color: #f2f2f2;
        display: flex;
        justify-content: center;

        cursor: pointer;
    }

    .back {
        background-color: #faf0e6;
        transform: rotateY(180deg);
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .card:hover .front {
        transform: rotateY(180deg);
    }

    .card:hover .back {
        transform: rotateY(0deg);
    }

    .container-excess {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
    }

    h2 {
        font-size: 20px;
        font-weight: bold;
        color: #000000;
    }

    p {
        font-size: 16px;
        line-height: 1.5;
        color: #000000;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    ul li {
        margin-bottom: 10px;
        font-size: 16px;
        line-height: 1.5;
        color: #000000;
    }

    .custombutton {

        background-color: black;
        border: 1;
        opacity: 0.6;

    }

    .custombutton:hover {
        color: white;
        background-color: black;
        opacity: 1;
    }

    .cardbutton {
        border: none;
    }
</style>

<body>


    <div class="container-excess">
        <div class="row">
            <div class="col-md-6" style="padding-right:200;">
                <div class="card">
                    <div class="front">
                        <img width="550px" height="600px" src="images/excess/sell.jpg" alt="">

                    </div>
                    <div class="back">
                        <b>

                            <p style="font-size:40;">SELL YOUR SUPPLIES</p>

                        </b>
                    </div>
                </div>
            </div>

            <div class="col-md-6" style="padding-left:200;">

                <div class="card">


                    <div class="front">
                        <img width="550px" height="600px" src="images/excess/donate.jpg" alt="">

                    </div>


                    <div class="back cardbutton">

                        <a href="donate.php">
                            <button class="custombutton">
                        </a>

                        <p style="font-size:40; padding-top: 10; color: white;"><b>DONATE YOUR SUPPLIES</b></p>
                        </button>







                    </div>
                </div>

            </div>
        </div>
    </div>


</body>

<?php
include("footer.php")
    ?>