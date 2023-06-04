<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<html>


<style>
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
        }, 1000); // Delay in milliseconds before adding the fade-in class
    </script>



</body>

</html>