<?php
echo '
<label for="name">
    <h5>Enter Student`s Name:</h5>
</label>
<input type="text" id="name" name="childname" required>
<label for="email">
    <h5>Enter Student`s Email Provided By Their School:</h5>
</label>
<input type="email" id="email" name="email">
<label>
    <h5>Enter Student`s Date Of Birth:</h5>
</label>
<input type="date" name="dob">
<label for="schools">
    <h5>Choose Their School:</h5>
</label>
<select id="Schools" name="schools" required>';

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
    <h5>Their Grade year:</h5>
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
