<?php
error_reporting(E_ALL ^ E_NOTICE);

include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

$select = $statusMsg = $id = '';

if (isset($_GET['list'])) {
  $id = $_GET['list'];
  $select = $bis->query("SELECT * from p47_eventfile WHERE `eventId`=$id ");
}
if (isset($_GET['delete'])) {
  $ids = $_GET['delete'];
  $delete = "DELETE FROM `p47_eventfile` WHERE id = $ids ";
  $q = mysqli_query($bis, $delete);
  header("location: listalbum.php?list=$id");

}


if (isset($_POST['submit'])) {
  // File upload configuration 
  $targetDir = "filelocation/";
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4', 'pdf','MP4');

  $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
  $fileNames = array_filter($_FILES['files']['name']);
  if (!empty($fileNames)) {
    foreach ($_FILES['files']['name'] as $key => $val) {
      // File upload path 
      $fileName = basename($_FILES['files']['name'][$key]);
      $targetFilePath = $targetDir . $fileName;
      $filestype = basename($_FILES['files']['type'][$key]);
      // Check whether file type is valid 
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
      if (in_array($fileType, $allowTypes)) {
        // Upload file to server 
        if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
          // Image db insert sql 
          $evid = "SELECT * from p47_event where  `eventId`=$id";
          $qq = mysqli_query($bis, $evid);
          $ew = mysqli_num_rows($qq);
          $ss = mysqli_fetch_row($qq);
          $eventId = $ss['0'];
          $insertValuesSQL .= "('" . $fileName . "', NOW(),$eventId,'$filestype'),";
        } else {
          $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
        }
      } else {
        $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
      }
    }

    // Error message 
    $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
    $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
    $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;


    if (!empty($insertValuesSQL)) {

      $insertValuesSQL = trim($insertValuesSQL, ',');
      // Insert image file name into database 
      $insert = $bis->query("INSERT INTO p47_eventFile (file_name, uploade_on,eventId,filetype) VALUES $insertValuesSQL");


      if ($insert) {
        $statusMsg = "Files are uploaded successfully." . $errorMsg;
      } else {
        $statusMsg = "Sorry, there was an error uploading your file.";
      }
    } else {
      $statusMsg = "Upload failed! " . $errorMsg;
    }
  } else {
    $statusMsg = 'Please select a file to upload.';
  }
  header("location:red.php");
}
$_SESSION['statusMsg'] = $statusMsg;
$_SESSION['list'] = $id;

$selectname = $bis->query("select eventTitle from p47_event where eventId=$id");
$i = mysqli_fetch_assoc($selectname);

?>










<!doctype html>
<html lang="en">

<head>
<head>
  <meta charset="UTF-8">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../back-gallery/back-gallery.css">
  <title>Events gallery | BIS</title>
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
  <link rel="stylesheet" href="../styles/nav.css">

  
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
          <div class="n-title"><?php echo $i['eventTitle'] ?></div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g4" style="margin-top: -20px;">

          <?php
          if (isset($select) && $select != '') {

            foreach ($select as $data) {
              if ($data['filetype'] == 'pdf') {
          ?>
                <div class="col">
                  <div class="card gallery-card">
                    <div class="card-image">
                      <a href="./filelocation/<?php echo $data['file_name']; ?>" target="_blank"> <img src="./filelocation/PDF_file_icon.svg.png" class="card-img" alt="..."></a>
                      <p><?php echo $data['file_name'] ?></p>

                    </div>
                    <form action="" method="get">
                    <a class="delete-btn btn" onclick="alert('the photo has been deleted')" href="listalbum.php?list=<?php echo $id ?>&delete=<?php echo $data['id']; ?>">Delete </a>

                    </form>
                  </div>
                </div>
              <?php } else {
              ?>
                <div class="col">
                  <div class="card gallery-card">
                    <div class="card-image">


                      <img src="./filelocation/<?php echo $data['file_name'] ?>" class="card-img" alt="...">

                    </div>
                    <form action="" method="get">
                    <a class="delete-btn btn" onclick="alert('the photo has been deleted')" href="listalbum.php?list=<?php echo $id ?>&delete=<?php echo $data['id']; ?>">Delete </a>

                    </form>
                  </div>
                </div>

          <?php }
            }
          } ?>
        </div>


      </div>
    </section>

          <hr>
   
    <section class="file-form">
<div class="import-sec jumbotron">
  <h1 class="display-4">Import From Gallery</h1>
  <p class="lead">You Can Simply Grap Items From Gallery By Clicking "Choose File" Button, then You Can Show It By Clicking "Add To List" Button.</p>
  <hr class="my-4">
  <div class="lead-1 text-center">
  <?php
      echo '<h3 style="color:red;">' . @$statusMsg;
      '</h3>'  ?>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple class="btn btn-info-box-one" >
    <button type="submit" name="submit" class="btn btn-info-box-two mt-2" value="ADD">Add To List</button>
  </form>
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