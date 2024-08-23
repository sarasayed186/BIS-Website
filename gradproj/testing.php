<?php
// Create a connection to the database
$conn = mysqli_connect('localhost', 'root', '', 'my_database');

// Check if the connection was successful
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Get the file name from the $_FILES array
$file_name = $_FILES['file']['name'];

// Get the file extension
$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

// Check if the file extension is jpg
if ($file_extension != 'jpg') {
  echo "Only JPG files are allowed.";
  exit;
}

// Move the file to the uploads directory
$target_path = 'uploads/' . $file_name;
move_uploaded_file($_FILES['file']['tmp_name'], $target_path);

// Insert the file name into the database
$sql = "INSERT INTO files (file_name) VALUES ('$file_name')";
mysqli_query($conn, $sql);

// Close the connection to the database
mysqli_close($conn);

// Display a success message
echo "The file was successfully uploaded.";
// Check if the file is smaller than 1MB
if ($file['size'] > 1048576) {
    die('The file must be smaller than 1MB.');
  }
?>
