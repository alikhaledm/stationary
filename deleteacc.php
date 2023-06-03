<?php
require_once('connect.php');

$sql = "DELETE FROM usersclass WHERE email = '{$_SESSION['email']}'";
$result = mysqli_query($conn, $sql);

header("location:logout.php");
exit();
