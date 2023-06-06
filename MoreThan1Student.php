<?php
$sql = "SELECT * FROM student WHERE ParentId=$ParentId";
$result = mysqli_query($conn, $sql);

echo '
<h5>Select Student</h5>
<select name="Student">';
while ($row = mysqli_fetch_array($result)) {
    echo '<option value="' . $row['StudentId'] . '">' . $row['StudentName'] . '</option>';
}
echo '</select>
<span class="pointer" onclick="toggleDropdown()">&bull;&nbsp;Or add a new student</span>
<div id="dropdownContainer" class="dropdown-container">';
include("packagesform.php");
echo '</div>';
?>
<style>
    .dropdown-container {
        display: none;
    }

    .pointer {
        cursor: pointer;
    }
</style>
<script>
    function toggleDropdown() {
        var dropdownContainer = document.getElementById("dropdownContainer");
        if (dropdownContainer.style.display === "none") {
            dropdownContainer.style.display = "block";
        } else {
            dropdownContainer.style.display = "none";
        }
    }
</script>