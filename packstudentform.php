<?php
echo '
<h4 class="text-center">
    Welcome, <b style="color:#EBBF2F; font-size:130%;">' . $_SESSION['fname'] . ' ' . $_SESSION['lname'] . '</b>!
    </h4>
    <br>
    <h6 class="mt-2">Email provided by your school:</h6>
    <input type="email" name="email" placeholder="student@example.edu">
    <h6 class="mt-2">Enter your date of birth:</h6>
    <input type="date" name="dob">
    <h6 class="mt-2">Choose your school:</h6>
<select id="Schools" name="schools" required>
<option value="grade">Choose your school</option>';

$query = "SELECT * FROM school";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        echo '<option value="' . $id . '">' . $name . '</option>';
    }
}
echo '</select>
<br>
    <h6>Your grade year:</h6>
<select id="grade" name="grades" required>
    <option value="grade">Choose Your Grade level</option>';
$sqlgrade = "SELECT * FROM grade";
$resultgrade = mysqli_query($conn, $sqlgrade);

if (mysqli_num_rows($resultgrade) > 0) {
    while ($row = mysqli_fetch_assoc($resultgrade)) {
        $gradeid = $row['id'];
        $gradename = $row['name'];
        echo '<option value="' . $gradeid . '">' . $gradename . '</option>';
    }
}
echo '
</select>
<input type="submit" class="savedetails" value="Save Details" onclick="scrollToBottom()">
';
?>
<style>
    .savedetails {
        margin-top: 3%;
        background-color: 0c0129;
        color: white;
    }

    .savedetails:hover {
        background-color: #EBBF2F;
        color: black;
    }
</style>