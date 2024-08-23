<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = "DELETE FROM `p47_studentacts` WHERE activityCode = $id ";
  $q = mysqli_query($bis, $delete);
  header("location: data.php");

}
if(isset($_GET['accept'])){
  $id = $_GET['accept'];
  $delete = "UPDATE `p47_studentacts` SET `status`=1 WHERE activityCode = $id ";
  $q = mysqli_query($bis, $delete);
  header("location: data.php");

}if(isset($_GET['disable'])){
  $id = $_GET['disable'];
  $delete = "UPDATE `p47_studentacts` SET `status`=0 WHERE activityCode = $id ";
  $q = mysqli_query($bis, $delete);
  header("location: data.php");

}

?>
<!DOCTYPE html>

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../styles/table.css">
  <link rel="stylesheet" href="../styles/nav.css">

  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- Bootstrap CSS -->
  <title>gallery | BIS</title>
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <!-- Bootstrap core CSS -->

  <!-- Custom styles for this template -->
</head>

<body>
  <div class="container">

    <p class="pra">STUDENT ACTIVITES LIST</p>
    <table class=" bis table table-bordered ">
      <thead class="color">
        <tr>
          <th scope="col">ID</td>
          <th scope="col">Name</td>
          <th scope="col">LOGO</td>
          <th scope="col">Main Photo</td>
          <th scope="col">BIO</td>

          <th scope="col">LINKS</td>

          <th scope="col" colspan="2" style="text-align: center;">status</th>


          <th scope="col">Modify</th>
          <th scope="col"></th>

        </tr>
      </thead>
      <?php
      $i = 1;
      $rows = mysqli_query($bis, "SELECT * FROM `p47_studentacts` ORDER BY `activityCode` DESC")
      ?>

      <?php


      foreach ($rows as $row) {



      ?>
        <tr>
          <th scope="col" class="td-pra"><?php echo $row["activityCode"] ?></td>
          <th scope="col" class="td-pra"><?php echo $row["activityName"]; ?></td>
          <th scope="col" class="td-pra"> <img src="img/<?= $row["activityLogo"]; ?>" class="img-table" title="<?php echo $row['activityLogo']; ?>"> </td>
          <th scope="col" class="td-pra"><?php echo $row["activityBio"]; ?></td>
          <th scope="col" class="td-pra"> <img src="img/<?= $row["mainPhoto"]; ?>" class="img-table" title="<?php echo $row['mainPhoto']; ?>"> </td>
          <th scope="col" class="td-pra"><a href="<?php echo $row["activityLink"]; ?>" target="_blank" rel="noopener noreferrer"><?php echo $row["activityLink"]; ?></a></td>
          <th scope="col"><?php if ( $row['status']==0){echo "pendding";} else {echo"approved";}; ?></th>
          <th scope="col"><a href="data.php?accept=<?php echo $row['activityCode']; ?>" class="btn btn-info btn-infoo"> approve</a>
            <a href="data.php?disable=<?php echo $row['activityCode']; ?>" class="btn btn-info btn-infoo"> Disable</a>
          </th>

          <th scope="col"><a href="data.php?delete=<?php echo $row['activityCode']; ?>" class="btn btn-danger" onclick=""> Delete</a>
            <a href="index.php?edit=<?php echo $row['activityCode']; ?>" class="btn btn-warning">Update</a>
          <th scope="col"> <a href="addfiles.php?list=<?php echo $row['activityCode']; ?>" class="btn btn-warning">album</a>

          </th>

        </tr>
      <?php }

      ?>
    </table>
    <br>
    <script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>