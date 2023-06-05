<?php
require_once("connect.php");
// Iterate through all session variables
foreach ($_SESSION as $key => $value) {
    if ($key == 'childid') {
        error_reporting(0);
        echo '';
        continue;
    } else {
        echo $key . ": " . $value . "<br>";
    }
}

echo "<br>Child Names:<br>";
if (!empty($_SESSION['childname'])) {
    foreach ($_SESSION['childname'] as $childName) {
        echo $childName . "<br>";
    }
} else {
    echo "No child names in the array.";
}
