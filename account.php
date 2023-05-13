<html>
<head>
    <title>Sign Up</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</head>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

</head>

<body class="myhome">


    <?php
    require_once("connect.php");
    include("navbar.php");

    $var_value = $_SESSION['id'];

    $query = "SELECT name, email, phone, photo FROM users WHERE id = $var_value";
    $result2 = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result2);

    if (isset($_POST['submit'])) {

        $name = $_POST["name"];
        if (empty($_POST["name"])) {

            echo '<script>alert ("name is required")</script>';
            return false;
        }
        if (!preg_match("/[a-zA-Z- ]*$/", $name)) {
            //$nameErr = "Only letters and white space allowed";
            echo '<script> alert("Only letters and numbers are allowed") </script> ';
            return false;
        }

        $email =  $_POST['email'];
        if (empty($_POST["email"])) {

            echo '<script>alert ("email is required")</script>';
            return false;
        }

        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            echo '<script>alert ("invalid email format")</script>';
            return false;
        }

        $phone = $_POST["phone"];
        if (empty($_POST["phone"])) {

            echo '<script>alert ("phone is required")</script>';
            return false;
        }

        $photo = $_FILES['photo']['name'];
        $target = "images/" . $photo;
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);

        $sql = "UPDATE users set name = '$name', email = '$email', phone='$phone', photo = '$photo' where id=$var_value";
        $result = mysqli_query($conn, $sql);
        try {
            if (!$result)
                throw new Exception("Error occured!!");
        } catch (Exception $e) {
            echo "Message:", $e->getMessage();
        }

        echo '<script> alert("Done :) ")</script>';
        mysqli_close($conn);
    }

    ?>


    <div class="container">
        <center>
            <h1 class="ml2">Edit Profile</h1>
        </center>
        <div class="jumbotron">
            <form action='' method='POST' enctype='multipart/form-data'>
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control" value="<?php echo $row[0] ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" class="form-control" value="<?php echo $row[1] ?>">
                </div>
                <div class="form-group">
                    <label>phone</label>
                    <input name="phone" type="text" class="form-control" required value="<?php echo $row[2] ?>">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input name="photo" type="file" class="form-control">
                </div>
                <center>
                    <button name="submit" type="submit" value="upload" class="btn btn-primary mybtn">Edit</button>
                </center>
            </form>
        </div>
    </div>
    <script>
        var textWrapper = document.querySelector('.ml2');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({
                loop: true
            })
            .add({
                targets: '.ml2 .letter',
                scale: [4, 1],
                opacity: [0, 1],
                translateZ: 0,
                easing: "easeOutExpo",
                duration: 950,
                delay: (el, i) => 70 * i
            }).add({
                targets: '.ml2',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });
    </script>
</body>

</html>

</body>
<?php
include("footer.php");
?>

</html>