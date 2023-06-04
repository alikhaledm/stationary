<?php
// delete_user.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userId"])) {
    $userId = $_POST["userId"];

    // Perform the deletion operation in your database
    // For example, using SQL and assuming you have a "users" table:
    $sql = "DELETE FROM users WHERE id = '$userId'";
    // Execute the query using your preferred database library

    if ($query) {
        echo "success"; // Notify the AJAX request of successful deletion
    } else {
        echo "error"; // Notify the AJAX request of any errors
    }
}
