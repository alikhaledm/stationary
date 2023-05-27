<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<html>


<style>
    .bg {
        background-color: #faf0e6;
    }

    .centered {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .centered2 {
        font-size: 23;

        display: flex;
        justify-content: center;
    }

    .centeredheader {
        bottom: 50;
        font-size: 50;
        display: flex;
        justify-content: center;
    }




    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .video-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .video-container video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }



    .introbutton {
        border: none;
        width: 250;
        opacity: 0.7;
        background-color: #FBD334;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        transition-duration: 0.5s;
        cursor: pointer;
        border-radius: 10px;
        outline: none;
        /* Remove outline on button click */
    }

    .introbutton:hover {
        outline: none;
        /* Remove outline on button click */
        opacity: 1;
        background-color: orange;
        border: none;
    }

    @keyframes flipIn {
        0% {
            opacity: 0;
            transform: translateX(-100%);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }



    @keyframes flipButton {
        0% {
            opacity: 0;
            transform: translateX(-100%);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animated-button {
        animation: flipButton 1.5s;
    }

    #firstContent {
        /* Styles for the first content */
        color: #333;
        /* Add any other styles you desire */
    }

    #secondContent {
        /* Styles for the second content */
        color: #555;
        /* Add any other styles you desire */
    }

    .video-container {
        opacity: 0;
        transition: opacity 4s ease-in;
    }

    .fade-in {
        opacity: 1;
    }


    select {
        width: 20%;
    }

    option:hover {
        background-color: orange;
    }

    body {
        overflow-y: hidden;
    }

    .btncustom3 {
        background: #FBD334;
        height: 50;
        width: 200;
        border-radius: 10px;
        border: none;
        color: white;
        opacity: 0.7;
    }

    .btncustom3:hover {
        opacity: 1;
        transition: 2s;
        background: orange;
        border-radius: 10px;
        color: black;
    }
</style>

<body>
    <div class="video-container fade-in">
        <video autoplay loop muted preload="auto" controlsList="nodownload">
            <source src="images/intro/intro3.mp4" type="video/mp4">
            <!-- Add more <source> elements for different video formats -->
        </video>
    </div>

    <script>
        // Add the fade-in class to the video container after a delay
        setTimeout(function() {
            var videoContainer = document.querySelector('.video-container');
            videoContainer.classList.add('fade-in');
        }, 6000); // Delay in milliseconds before adding the fade-in class
    </script>

<<<<<<< Updated upstream
    <div class="centered content">
        <div class="spinner"></div>

        <div class="container centered">
=======

    <body class="centered">
        <div class="container">
>>>>>>> Stashed changes
            <div class="row">
                <div class="col-md-12 centeredheader">


                </div>

                <div class="col-md-12 centered2">

                    <div id="content1" class="content">
                        <center style="padding-bottom:50;">
                            <h1>Welcome to Supplies Station!</h1>
                        </center>
                        <center>
                            Say goodbye to School Supplies shopping headaches with our hassle-free solution!<br>
                            Experience the convenience of Supply Hub: Choose your student's School, Grade,<br> and let
                            the
                            School
                            Supplies List come knocking at your door!
                        </center>
                    </div>
                    <div id="content2" class="content"></div>
                    <div id="content3" class="content"></div>
                    <div id="content4" class="content"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3 centered2">
                    <button id="nextBtn" class="btncustom3">Next Step</button>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
<<<<<<< Updated upstream
            // Wait for 4 seconds before showing the container
            setTimeout(function() {
                // Hide the spinner
                document.querySelector('.spinner').style.display = 'none';
=======
            $(document).ready(function () {
                var currentPage = 1;
>>>>>>> Stashed changes

                function showCurrentPage() {
                    $('.content').hide(); // Hide all content

                    if (currentPage === 1) {
                        $('#content1').fadeIn();
                    } else {
                        var contentId = "#content" + currentPage;
                        $(contentId).load(getPageURL(currentPage), function () {
                            $(contentId).fadeIn();
                        });
                    }
                }

<<<<<<< Updated upstream
                fade(); // Start the fade-in effect
            }, 1000);
        </script>
        <script>
            document.getElementById("nextButton").addEventListener("click", function(event) {
                event.preventDefault();
=======
                function getPageURL(page) {
                    // Return the appropriate URL for each page
                    if (page === 2) {
                        return "schoolgrade.php";
                    } else if (page === 3) {
                        return "schoolgrade1.php";
                    } else if (page === 4) {
                        return "schoolgrade2.php";
                    }
                }
>>>>>>> Stashed changes

                function showNextPage() {
                    if (currentPage < 4) {
                        currentPage++;
                        showCurrentPage();
                    }
                }

<<<<<<< Updated upstream
                firstContent.style.display = "none";
                secondContent.style.display = "block";
                secondContent.classList.add("centered-content");
                nextButton.classList.add("animated-button");
                nextButton.textContent = "Fulfilled Supplies List";
                nextButton.removeAttribute("href");
                nextButton.removeAttribute("target");
                nextButton.addEventListener("click", function() {
                    window.location.href = "packages.php";
=======
                $('#nextBtn').click(function () {
                    showNextPage();
>>>>>>> Stashed changes
                });

                // Show the first page initially
                showCurrentPage();
            });
        </script>



        </div>
    </body>

</html>