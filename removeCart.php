<?php
require_once "connect.php";
session_start();
$userID=$_SESSION['id'];
$var_name=$_GET['varname'];
$remQ="DELETE from cart WHERE userid=$userID AND productid=19 ; ";
$rem=mysqli_query($conn,$remQ);
if ($rem) {
    echo  "<script> alert('Item Succefully Removed!') ";
}
