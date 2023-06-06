<?php
echo '
<label for="name">
<h5>
    Welcome, ' . $_SESSION['fname'] . ' ' . $_SESSION['lname'] . '!
    </h5>
</label>
<label for="email">
    <h5>Enter email provided by your school:</h5>
</label>
<input type="email" id="email" name="email">
<label>
    <h5>Enter your date of birth:</h5>
</label>
<input type="date" name="dob">
<label for="schools">
    <h5>Choose your school:</h5>
</label>
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
<label for="grade">
    <h5>Your grade year:</h5>
</label>
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
<input type="submit" value="Save Details" onclick="scrollToBottom()">
';
