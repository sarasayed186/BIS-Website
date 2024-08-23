<?php
include "../Connections/syscon.php" ;
if (isset($_GET["delete"])) {
  $id = $_GET['delete'];
$sql = "DELETE FROM `p47_about` WHERE aboutId = $id";
$result = mysqli_query($bis, $sql);

if ($result) {
  header("Location: show.php?msg=Data deleted successfully");
  exit();
} else {
  echo "Failed: " . mysqli_error($bis);
}
}