<?php
echo '
<br><div class="col-lg-12">
<label for="name">
    <h5>Enter Student`s Name:</h5>
</label>
</div>
<div class="col-lg-12">
<input type="text" class="form-control" id="name" name="childname" required>
<label for="email">
    <h5>Enter Student`s Email Provided By Their School:</h5>
</label>
</div>
<div class="col-lg-12">
<input type="email" class="form-control" id="email" name="email">
<label>
    <h5>Enter Student`s Date Of Birth:</h5>
</label>
</div>
<div class="col-lg-12">
<input type="date" class="form-control" name="dob">
</div>
<div class="col-lg-12">
<label for="schools">
    <h5>Choose Their School:</h5>
</label>
</div>
<div class="col-lg-12">
<select id="Schools" class="form-select" name="schools" required>';

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
<br><br></div>
<div class="col-lg-12">
<label for="grade">
    <h5>Their Grade year:</h5>
</label>
</div>
<div class="col-lg-12">
<select id="grade" name="grades" class="form-select" required>
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
</div>
<div class="col-lg-12"><br>
<input type="submit" value="Save Details" class="form-control" onclick="scrollToBottom()"></div>
';