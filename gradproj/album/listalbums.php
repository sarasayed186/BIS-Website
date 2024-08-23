<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";



if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = "DELETE FROM `p47_album` WHERE albumId = $id ";
  $q = mysqli_query($bis, $delete);
  header("location: listalbums.php");
}
if (isset($_GET['accept'])) {
  $id = $_GET['accept'];
  $delete = "UPDATE `p47_album` SET `status`=1 WHERE albumId = $id ";
  $q = mysqli_query($bis, $delete);
  header("location: listalbums.php");
}
if (isset($_GET['disable'])) {
  $id = $_GET['disable'];
  $delete = "UPDATE `p47_album` SET `status`=0 WHERE albumId = $id ";
  $q = mysqli_query($bis, $delete);
  header("location: listalbums.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/nav.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../back-gallery/back-gallery.css">
  <title>gallery | BIS</title>
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
  <style>
    .bis tbody th {
      color: black;
    }

    .bis thead th {
      color: white;
    }

    .bis .img-table {
      max-height: 100px;
      max-width: 100%;
      opacity: 1.0;
    }

    .bis .img-table:hover {
      opacity: 0.5;
    }

    .bis .row {
      color: #294861;
      margin-left: 1px;
    }

    .bis .color {
      background-color: #294861;
    }

    .bis .btn-info {
      background-color: #294861;
      border-color: white;
      font-weight: 600;
    }

    .bis .btn-info:hover {
      background-color: #e9f8fc;
      color: #294861;
      border-color: #e9f8fc;
      font-weight: 600;
    }

    .bis .btn-info-box-one {
      background-color: #294861;
      border-color: #294861;
      border-color: white;
      font-weight: 600;
    }

    .bis .btn-info-box-two {
      background-color: #294861;
      border-color: #294861;
      border-color: white;
      font-weight: 600;
      margin-left: 30px;
    }

    .bis .btn-info-Gallery {
      background-color: #fea002;
      color: whitesmoke;
      font-weight: 600;
    }

    .bis .btn-info-Gallery:hover {
      background-color: #faeeda;
      font-weight: 600;
      color: #fea002;
    }

    .bis .btn-danger {
      font-weight: 600;
    }

    .bis .btn-danger:hover {
      background-color: rgb(255, 210, 210);
      font-weight: 600;
      color: #a60000;
      border-color: rgb(255, 210, 210);
    }

    .bis .pra {
      text-align: center;
      font-size: xx-large;
      letter-spacing: 12.5px;
      font-family: 'Nabla', cursive;
      margin: 30px;
    }

    .bis .td-pra {
      font-weight: 600;
      font-size: 18px;
    }

    .bis .td-pra:hover {
      color: #fea002;
    }

    .bis .import-sec {
      background-color: #d6edff;
      margin-top: 70px;
    }

    .bis .display-4 {
      color: #fea002;
      font-size: 45px;
    }

    .bis .btn-infoo {
      color: whitesmoke;
    }
  </style>

</head>

<body>
  <div class="container">

    <!-- new -->

    <div class="bis container">



      <p class="pra">BIS ALBUM LIST</p>
      <table class=" bis table table-bordered ">
        <thead class="color">
          <tr>

            <th scope="col">eventId </th>
            <th scope="col">mainPhoto </th>
            <th scope="col">eventTitle</th>
            <th scope="col">album description</th>
            <th scope="col">insert date</th>
            <th scope="col" colspan="" style="text-align: center;">status</th>
            <th scope="col" colspan="" style="text-align: center;">APPROVE</th>



            <th scope="col">delete</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody class="text-center align-middle">
          <?php
          $select = $bis->query("SELECT * from p47_album ORDER BY `status` ASC  ");

          foreach ($select as $data) {
          ?>
            <tr>

              <th scope="col" class="col text-center align-middle"><?php echo $data['albumId']; ?> </th>
              <th scope="col"><img src="./albumcover/<?php echo $data['mainPhoto']; ?>" alt="" srcset="" class="img-table"> </th>
              <th scope="col" class="td-pra"><?php echo $data['albumTitle']; ?></th>
              <th scope="col" class="td-pra"><?php echo $data['albumDesc']; ?></th>
              <th scope="col" class="td-pra"><?php echo $data['uploadDate']; ?></th>
              <th scope="col"><?php if ($data['status'] == 0) {
                                echo "pendding";
                              } else {
                                echo "approved";
                              }; ?></th>
              <th scope="col"><a href="listalbums.php?accept=<?php echo $data['albumId']; ?>" class="btn btn-info btn-infoo"> approve</a>
                <a href="listalbums.php?disable=<?php echo $data['albumId']; ?>" class="btn btn-info btn-infoo"> Disable</a>
              </th>
              <th scope="col">
                <a href="listalbums.php?delete=<?php echo $data['albumId']; ?>" class="btn btn-danger" onclick=""> Delete</a>
              </th>

              <th scope="col"> <a href="insertAlbum.php?edit=<?php echo $data['albumId']; ?>" class="btn btn-warning">Update</a>
              <th scope="col"> <a href="albumFiles.php?list=<?php echo $data['albumId']; ?>" class="btn btn-warning">album</a>

              </th>

            <?php } ?>


        </tbody>
      </table>
    </div>
    <!--  -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="../js/jquery.js"></script>
</body>

</html>