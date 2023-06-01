<?php
require_once("connect.php");
$var_name = $_GET['varname'];
$userid = $_SESSION['id'];
$query = "DELETE FROM cart WHERE userid= $userid AND productid= $var_name;";
$result = mysqli_query($conn, $query);
if ($result) {
    header("location: cart.php");
} else {
    echo "<script> alert('Item not removed') </script>";
}
