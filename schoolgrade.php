<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<html>


<style>
    .centered {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .centered2 {
        display: flex;
        justify-content: center;
    }

    input {
        background-color: white;
        height: 50%;
        width: 50%;
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

    .centeredtop {
        justify-content: center;
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

    .j {}
</style>

<body>

    <script>
        // Add the fade-in class to the video container after a delay
        setTimeout(function() {
            var videoContainer = document.querySelector('.video-container');
            videoContainer.classList.add('fade-in');
        }, 6000); // Delay in milliseconds before adding the fade-in class
    </script>
    <center>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="padding-top:50;">Step 1: Enter Student's information</h1>
                    <img src="images/account/profile.png" alt="">
                </div>

                <div class="col-md-12" style="padding-top:100;">
                    Enter Student's name
                </div>

                <div class="col-md-12 content">
                    <input type="text"><br><br>
    </center>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>




    </div>
</body>

</html>