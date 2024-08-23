<?php
include "../Connections/syscon.php";
include "../shared/nav.php";

include "../shared/session.php";

// Get the form data
if (isset($_POST['submit'])) {
    $staff_members = $_POST['staff_members'];
$under_graduates = $_POST['under_graduates'];
$graduates = $_POST['graduates'];
$post_graduates = $_POST['post_graduates'];

// Insert the data into the table
$sql = "INSERT INTO p47_bisNumbers (staff_members, under_graduates, graduates, post_graduates) VALUES ('$staff_members', '$under_graduates', '$graduates', '$post_graduates')";
if ($bis->query($sql) === TRUE) {
  echo "Data inserted successfully";
} else {
  echo "Error inserting data: " . $bis->error;
} }

// Close the database connection
$bis->close();
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../styles/nav.css">

  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/form.css">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
  <form method="post" action="">
  <label for="staff_members">Staff Members:</label>
  <input type="number" name="staff_members" id="staff_members" required>
  <br>
  <label for="under_graduates">Under-graduates:</label>
  <input type="number" name="under_graduates" id="under_graduates" required>
  <br>
  <label for="graduates">Graduates:</label>
  <input type="number" name="graduates" id="graduates" required>
  <br>
  <label for="post_graduates">Post-graduates:</label>
  <input type="number" name="post_graduates" id="post_graduates" required>
  <br>
  <input type="submit" name="submit" value="Insert">
</form>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <script src="../js/bootstrap.bundle.min.js"></script>

<script src="../js/jquery.js"></script> 
</body>

</html>
