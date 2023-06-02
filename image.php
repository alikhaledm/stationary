<link rel="stylesheet" href="styles.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<style>
    .container {
        position: relative;
        width: 100%;

        /* Adjust the maximum width as desired */
    }

    .image-wrapper {
        position: relative;
        display: inline-block;
    }

    .image-wrapper img {
        max-width: 100%;
        height: auto;
    }

    .content-overlay {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translate(0, -50%);
        padding: 20px;
        /* Adjust the padding as desired */
        /* Adjust the background color and opacity as desired */
    }

    .content-overlay h2 {
        font-size: 30px;
        margin-bottom: 10px;
    }

    .content-overlay p {
        font-size: 25px;
    }

    .custombtn {
        color: rgb(200, 65, 249);
        font-weight: bold;
        background-color: transparent;
        font-size: 20px;
        width: 50%;
        border: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12">

            <div class="image-wrapper">
                <img width="100%" src="images/card1.png" alt="Image">
                <div class="content-overlay">

                    <h2>Your Title</h2>
                    <p>Your content goes here</p>
                    <button class="custombtn"> Start Now</button>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12">

            <div class="image-wrapper">
                <img width="100%" src="images/card3.png" alt="Image">
                <div class="content-overlay">
                    <h2>Your Title</h2>
                    <p>Your content goes here With Few Clicks,<br> We Deliver Your<br> Required Supplies
                        List<br> To Your Doors!</p>
                    <button class="custombtn"> Start Now</button>
                </div>
            </div>
        </div>




    </div>

</div>