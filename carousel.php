<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .carouselbtn {
            font-size: 20px;
            border: none;
            background-color: transparent;
            top: ;
        }

        .carouselfont {
            font-size: 30px;
            color: white;
            font-weight: bolder;
        }

        .carouselfont2 {
            font-size: 30px;
            color: black;
            font-weight: bold;
        }

        .carouselfont3 {
            font-size: 30px;
            color: black;
            font-weight: bold;
        }
    </style>
</head>

<body class="p-3 border-0 bd-example">

    <!-- Example Code -->

    <div id="carouselExampleDark" class="carousel carousel-dark slide" style="width:100%; height:100%;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <div class="carousel-background" style="background-color:black;">
                    <img width="100%" height="500px" src="images/solid.jpg" alt="">
                </div>
                <div class="carousel-caption d-md-block" style="top: 41%;">
                    <div class="carouselfont">Fullfill Your School Supplies Demand</div><br><br>
                    <button class="carouselbtn">Start Now</button>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="5000">
                <div class="carousel-background" style="background-color:black;">
                    <img width="100%" height="500px" src="images/test.jpg" alt="">
                </div>
                <div class="carousel-caption d-md-block" style="top: 41%;">
                    <div class="carouselfont2">Fullfill Your School Supplies Demand</div><br><br>
                    <button class="carouselbtn">Start Now</button>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="5000">
                <div class="carousel-background" style="background-color:black;">
                    <img width="100%" height="500px" src="images/colors.jpg" alt="">
                </div>
                <div class="carousel-caption d-md-block" style="top: 70%;">
                    <div class="carouselfont3">Fullfill Your School Supplies Demand</div>
                    <button class="carouselbtn">Start Now</button>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- End Example Code -->
</body>

</html>