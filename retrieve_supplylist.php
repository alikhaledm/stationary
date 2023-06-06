<?php
// retrieve_supply_list.php

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get selected student ID
  $studentId = $_POST['studentId'];

  // Retrieve student's school and grade from the database
  $sql = "SELECT school_id, grade FROM student WHERE studentid=$studentId";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $schoolId = $row['school_id'];
  $grade = $row['grade'];

  // Retrieve supply list based on school and grade
  $sql = "SELECT * FROM supply_list WHERE school_id=$schoolId AND grade=$grade";
  $result = mysqli_query($conn, $sql);

  // Display the supply list
  echo '<h2>Supply List</h2>';
  while ($row = mysqli_fetch_array($result)) {
    echo '<p>' . $row['item'] . '</p>';
  }
}
