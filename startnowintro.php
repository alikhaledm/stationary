<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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

    .container.centered {
        display: none;
        justify-content: center;
        text-align: center;
        font-size: 30px;
    }

    .spinner {
        display: flex;
        width: 50px;
        height: 50px;
        border: 3px solid #ccc;
        border-radius: 50%;
        border-top-color: #66a2fe;
        animation: spin 2s ease-in-out infinite;


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

    .content {
        position: relative;
        z-index: 1;
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

    .centered-content {
        animation: flipIn 1s;
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
        setTimeout(function () {
            var videoContainer = document.querySelector('.video-container');
            videoContainer.classList.add('fade-in');
        }, 6000); // Delay in milliseconds before adding the fade-in class
    </script>


    <div class="centered content">
        <div class="spinner"></div>

        <div class="container centered">
            <div class="row">
                <div id="firstContent" class="col-md-12 content">
                    <b>Say goodbye to School Supplies shopping headaches with our hassle-free solution!</b>
                </div>
                <div id="secondContent" class="col-md-12 content" style="display: none;">
                    <b>Experience the convenience of Supply Hub: Choose your student's School, Grade, and let the School
                        Supplies List come knocking at your door!</b>
                </div>
                <div class="col-md-12" style="padding-top:50;">
                    <button id="nextButton" class="introbutton">Next Step</button>
                </div>
            </div>
        </div>


        <script>
            // Wait for 4 seconds before showing the container
            setTimeout(function () {
                // Hide the spinner
                document.querySelector('.spinner').style.display = 'none';

                // Show the centered container with fade-in effect
                var container = document.querySelector('.container.centered');
                container.style.opacity = '0'; // Set initial opacity to 0
                container.style.display = 'flex'; // Make the container visible

                // Gradually increase the opacity over 5 seconds
                var startTime = Date.now(); // Get the current time
                var duration = 5000; // 5 seconds duration for the fade-in effect

                function fade() {
                    var currentTime = Date.now(); // Get the current time
                    var elapsed = currentTime - startTime; // Calculate the elapsed time

                    // Calculate the opacity based on the elapsed time
                    var opacity = Math.min(1, elapsed / duration);

                    container.style.opacity = opacity; // Set the opacity

                    // Check if the fade-in effect is complete
                    if (opacity < 1) {
                        requestAnimationFrame(fade); // Continue fading recursively
                    }
                }

                fade(); // Start the fade-in effect
            }, 3000);
        </script>
        <script>
            document.getElementById("nextButton").addEventListener("click", function (event) {
                event.preventDefault();

                var firstContent = document.getElementById("firstContent");
                var secondContent = document.getElementById("secondContent");
                var nextButton = document.getElementById("nextButton");

                firstContent.style.display = "none";
                secondContent.style.display = "block";
                secondContent.classList.add("centered-content");
                nextButton.classList.add("animated-button");
                nextButton.textContent = "Start Now!";
                nextButton.removeAttribute("href");
                nextButton.removeAttribute("target");
                nextButton.addEventListener("click", function () {
                    window.location.href = "signup.php";
                });

                nextButton.blur();
            });
        </script>

    </div>
</body>

</html>