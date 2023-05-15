<?php
require_once("connect.php");
session_start();
$var_value = $_GET['varname'];
$userid = $_SESSION['id'];

$query = "INSERT into cart (userid, productid) values ('$userid','$var_value')";
$result =  mysqli_query($conn, $query);
if ($result) {
    header('location:cart.php');
} else {
    echo "Product not added to cart";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to cart</title>
</head>

<body>

</body>

</html>