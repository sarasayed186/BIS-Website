
<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";
if (isset($_POST['delete'])) {
    // Delete the selected rows from the "p47_contact" table
    $ids = implode(',', $_POST['delete']);
    $sql = "DELETE FROM p47_contact WHERE contactId  IN ($ids)";
    if ($bis->query($sql) === TRUE) {
      echo "<p>Selected messages deleted successfully.</p>";
    } else {
      echo "Error deleting messages: " . $bis->error;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Messages | BIS</title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/table.css">
    <link rel="stylesheet" href="../styles/nav.css">


</head>
<body>

<div class="container">



<p class="pra">Contact Messages</p>
<table class=" bis table table-bordered ">
    <thead class="color">
        <tr>

  
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Date</th>
        <th>Select</th>

      </tr>
    </thead>
    <tbody>
    <form method="post">

    <?php
// Select all rows from the "p47_contact" table
        $sql = "SELECT * FROM p47_contact";
        $result = $bis->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<th class='td-pra'>" . $row["userName"] . "</th>";
            echo "<th class='td-pra'>" . $row["userMail"] . "</th>";
            echo "<th class='td-pra'>" . $row["phone"] . "</th>";
            echo "<th class='td-pra'>" . $row["subject"] . "</th>";
            echo "<th class='td-pra'>" . $row["question"] . "</th>";
            echo "<th class='td-pra'>" . $row["date"] . "</th>";
            echo "<td><input type='checkbox' name='delete[]' value='" . $row["contactId"] . "'></td>";
            echo "</tr>";
          }
        } else {
          echo "No contact messages found.";
        }
        

        // Close the database connection
        $bis->close();
        ?>
            </tbody>
  </table>
    <button type="submit" class="btn btn-outline-danger">Delete selected messages</button>

  </form>
             <script src="../js/bootstrap.bundle.min.js"></script>

<script src="../js/jquery.js"></script>