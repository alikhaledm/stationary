<?php
require_once("connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Session Variables</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1>Session Variables</h1>

    <?php
    echo "<table>";
    echo "<tr>
        <th>Key</th>
        <th>Value</th>
    </tr>";

    // Iterate through all session variables
    foreach ($_SESSION as $key => $value) {
        if ($key == 'childid') {
            continue;
        } else {
            echo "<tr>
        <td>$key</td>
        <td>$value</td>
    </tr>";
        }
    }
    echo "</table>";

    echo "<table>";
    echo "<tr>";
    echo "<th>Child Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Email</th>";
    echo "<th>School</th>";
    echo "<th>Grade</th>";
    echo "<th>List ID</th>";
    echo "<th>List Name</th>";
    echo "<th>Price</th>";
    echo "<th>PDF</th>";
    echo "</tr>";

    // Get the total number of rows (assuming all arrays have the same length)
    $rowCount = count($_SESSION['childname']);

    // Iterate through each row
    for ($i = 0; $i < $rowCount; $i++) {
        echo "<tr>";
        echo "<td>" . $_SESSION['childname'][$i] . "</td>";
        echo "<td>" . $_SESSION['childdob'][$i] . "</td>";
        echo "<td>" . $_SESSION['childemail'][$i] . "</td>";
        echo "<td>" . $_SESSION['childschool'][$i] . "</td>";
        echo "<td>" . $_SESSION['childgrade'][$i] . "</td>";
        echo "<td>" . $_SESSION['childlistid'][$i] . "</td>";
        echo "<td>" . $_SESSION['listname'][$i] . "</td>";
        echo "<td>" . $_SESSION['listprice'][$i] . "</td>";
        echo "<td>" . $_SESSION['listpdf'][$i] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>

</body>

</html>