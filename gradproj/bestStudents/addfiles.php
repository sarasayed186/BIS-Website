<?php
error_reporting(E_ALL ^ E_NOTICE);

include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

$select = $statusMsg = $id = '';

if (isset($_GET['list'])) {
  $id = $_GET['list'];

  $select = $bis->query("SELECT * from p47_beststudents JOIN `p47_stuhonourboard` on `honBoardId`=`boardId` WHERE `boardId`=$id ");
}

if (isset($_GET['delete'])) {
  $ids = $_GET['delete'];
  $delete = "DELETE FROM `p47_beststudents` WHERE stuId = $ids ";
  $q = mysqli_query($bis, $delete);
  header("location: addfiles.php?list=$id");
}


if (isset($_POST['submit'])) {
  // File upload configuration 
  $stuName = $_POST['stuName'];
  $stulevel = $_POST['stulevel'];
  $stuRank = $_POST['stuRank'];
  $stuGPA = $_POST['stuGPA'];
  $Filename = $_FILES['stuAvatar']['name'];
  $avatartype = $_FILES['stuAvatar']['type'];
  $avatartmp = $_FILES['stuAvatar']['tmp_name'];
  $avatar_extension = pathinfo($Filename, PATHINFO_EXTENSION);
  $allowTypes = array('jpg', 'png', 'jpeg');

  if (!in_array($avatar_extension, $allowTypes)) {
    // The avatar type is not valid.
    echo 'The avatar type is not valid.';
    exit;
  }

  $location = "stuImage/";
  move_uploaded_file($avatartmp, $location . $Filename);

  $insert = $bis->query("INSERT INTO `p47_beststudents`(`stuId`,`stuName`,`stuAvatar`,`stulevel`,`stuRank`,`stuGPA`,`boardId`) VALUES (null,'$stuName','$Filename','$stulevel','$stuRank',$stuGPA,$id)");
  header("location: addfiles.php?list=$id");
}

$selectname = $bis->query("SELECT `honBoardTitle` FROM `p47_stuhonourboard` WHERE `honBoardId`=$id");
$i = mysqli_fetch_assoc($selectname);

$levelData = array(
  array('id' => 1, 'name' => 'One'),
  array('id' => 2, 'name' => 'Two'),
  array('id' => 3, 'name' => 'Three'),
  array('id' => 4, 'name' => 'Four')

);

// Sample rank data
$rankData = array(
  array('id' => 1, 'name' => 'The First'),
  array('id' => 2, 'name' => 'The Second'),
  array('id' => 3, 'name' => 'The Third'),
  array('id' => 4, 'name' => 'The Fourth'),
  array('id' => 5, 'name' => 'The Fifth'),
  array('id' => 6, 'name' => 'The Sixth'),
  array('id' => 7, 'name' => 'The Seventh'),
  array('id' => 8, 'name' => 'The Eighth'),
  array('id' => 9, 'name' => 'The Ninth'),
  array('id' => 10, 'name' => 'The Tenth')


);
$level = array();
$rank = array();
foreach ($levelData as $l) {
  $level[$l['id']] = $l['name'];
}

// Loop through the rank data and add each rank to the $rank array
foreach ($rankData as $r) {
  $rank[$r['id']] = $r['name'];
}

?>










<!doctype html>
<html lang="en">

<head>

  <head>
    <meta charset="UTF-8">


    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/nav.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../back-gallery/back-gallery.css">
    <title>gallery | BIS</title>
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  </head>
  <!-- Bootstrap core CSS -->

  <!-- Custom styles for this template -->
  <link href="album.css" rel="stylesheet">
</head>

<body>



  <div class="container">
    <section class="gallerys-page back">
      <div class="container-lg">

        <div class="section-title">
          <div class="n-title"><?php echo $i['honBoardTitle'] ?></div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g4" style="margin-top: -20px;">

          <?php
          if (isset($select) && $select != '') {

            foreach ($select as $data) {
          ?>
              <div class="col">
                <div class="col event-card  hidden-card">
                  <div class="card shadow-sm h-100">
                    <div class="card-image">
                      <img src="./stuImage/<?php echo $data['stuAvatar'] ?>" class="card-img-top" alt="...">
                      <div class="category bottom-right-tag text-uppercase"><a><?php echo $data['year'] ?> </a></div>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title"><?php echo $data['stuName'] ?></h3>
                      <p class="card-text">
                        RANK: <?php echo $data['stuRank'] ?>
                      </p>
                      <p class="card-text">
                        GPA: <?php echo $data['stuGPA'] ?>
                      </p>
                      <p class="card-text">
                        LEVEL: <?php echo $data['stulevel'] ?>
                      </p>
                    </div>
                    <div class="card-footer py-3 mt-2" style="height: 50px;">
                      <div class="card-footer__info">
                        <span class="read-more">
                          <a class="text-uppercase read-more-1" onclick="alert('the photo has been deleted')" href="addfiles.php?list=<?php echo $id ?>&delete=<?php echo $data['stuId']; ?>">Delete </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          <?php
            }
          }
          ?>
        </div>


      </div>
    </section>

    <hr>

    <section class="file-form">
      <div class="container-fluid">
        <div class="import-sec jumbotron">
          <h1 class="display-4">Import From Gallery</h1>
          <p class="lead">You Can Simply Grap Items From Gallery By Clicking "Choose File" Button, then You Can Show It By Clicking "Add To List" Button.</p>
          <hr class="my-4">
          <div class="lead-1 text-center">
            <?php
            echo '<h3 style="color:red;">' . @$statusMsg;
            '</h3>'  ?>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="mb-3 col">
                  <label for="" class="form-label">Student Name</label>
                  <input type="text" class="form-control" name="stuName" id="" aria-describedby="helpId" placeholder="Add Student Name">
                </div>
                <div class="mb-3 col">
                  <label for="" class="form-label">Student GPA</label>
                  <input type="number" class="form-control" step="0.01" name="stuGPA" id="" aria-describedby="helpId" placeholder="Add Student GPA">
                </div>
              </div>
              <div class="row justify-content-center align-items-center mb-3">
                <div class="col">
                  <label for=""> Select Student level</label>
                  <select name="stulevel" class="form-select form-select-sm  select" aria-label="Default select example">
                    <?php foreach ($level as $id => $name) { ?>
                      <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col">
                  <label for=""> Select Student Rank</label>
                  <select name="stuRank" class="form-select form-select-sm  select" aria-label="Default select example">
                    <?php foreach ($rank as $id => $name) { ?>
                      <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="row justify-content-center align-items-center g-2">
                <input type="file" name="stuAvatar" multiple class="btn btn-info-box-one col-5">

              </div>
              <button type="submit" name="submit" onclick="alert('studnt has been added succesfully')" class="btn btn-info-box-two mt-2" value="ADD">Add To List</button>

          </div>



          </form>
        </div>
      </div>
  </div>

  </section>
  </div>

  </main>


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

  <script src="../js/jquery.js"></script>
</body>

</html>