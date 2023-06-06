<?php
require_once("connect.php");

// Check if the childname array exists in the session
if (!isset($_SESSION['childname']) || !is_array($_SESSION['childname'])) {
    // If it doesn't exist or is not an array, initialize it as an empty array
    $_SESSION['childname'] = array();
}

// Check if a child name is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["childname"])) {
    $newChildName = $_POST["childname"];
    $parentId = $_SESSION['id'];

    // Insert the new child name into the student table
    $sql = "INSERT INTO student (studentname, ParentId) VALUES ('$newChildName', '$parentId')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Add the child name to the childname array in the session
        $_SESSION['childname'][] = $newChildName;
    }
}

// Print the child names in the session array
echo "Child Names:<br>";
if (!empty($_SESSION['childname'])) {
    foreach ($_SESSION['childname'] as $childName) {
        echo $childName . "<br>";
    }
} else {
    echo "No child names in the array.";
}
unset($_SESSION['childname'])
?>
<form method="POST" action="">
    <label for="childname">Enter Child Name:</label>
    <input type="text" id="childname" name="childname" required>
    <button type="submit">Add Child</button>
</form>