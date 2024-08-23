<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

$id = "";

if (isset($_POST['submit'])) {


  $title = mysqli_real_escape_string($bis,$_POST['eventTitle']) ;

  $eventCat = $_POST['eventCat'];
  $eventDesc = $_POST['eventDesc'];
  $eventDate = $_POST['eventDate'];

  $eventDescc=mysqli_real_escape_string($bis,$eventDesc);
  $imagename = $_FILES['main_img']['name'];
  $imagetype = $_FILES['main_img']['type'];
  $imagetmp = $_FILES['main_img']['tmp_name'];
  $location = "mainPhoto/";
  move_uploaded_file($imagetmp, $location . $imagename);
  
  $insert = "INSERT into `p47_event`(`eventId`,`mainPhoto`,`eventTitle`,`eventDesc`,`eventCat`,`eventDate`,`eventDatee`) VALUES (NULL,'$imagename','$title','$eventDescc',$eventCat,null,'$eventDate')";


  $q = mysqli_query($bis, $insert);
  header('location:listevent.php');
 
}

//----------update event-------------
$title = $abroad_img = $eventDesc = $eventCat = $eventDatee = '';



if (isset($_GET['edit'])) {

  $id = $_GET['edit'];
  $select = "SELECT * FROM `p47_event` WHERE `eventId`=$id";
  $s = mysqli_query($bis, $select);
  $row = mysqli_fetch_assoc($s);

  $title = $row['eventTitle'];
  $abroad_img = $row['mainPhoto'];
  $eventDesc = $row['eventDesc'];
  $eventCat = $row['eventCat'];
  $eventDatee = $row['eventDatee'];
}
if (isset($_POST['update'])) {
  $title = mysqli_real_escape_string($bis,$_POST['eventTitle']) ;

  $eventCat = $_POST['eventCat'];
  $eventDesc = $_POST['eventDesc'];
  $eventDate = $_POST['eventDate'];
  $eventDescc=mysqli_real_escape_string($bis,$eventDesc);


  $imagename = $_FILES['main_img']['name'];
  $imagetype = $_FILES['main_img']['type'];
  $imagetmp = $_FILES['main_img']['tmp_name'];
  $location = "mainPhoto/";
  move_uploaded_file($imagetmp, $location . $imagename);


  $update = "UPDATE `p47_event` SET `eventTitle` = '$title' ,  `mainPhoto` = '$imagename',`eventDesc`='$eventDescc' ,`eventCat`= $eventCat,`eventDatee`='$eventDate' WHERE `eventId` = $id ";
  $q = mysqli_query($bis, $update);
  header("location:listevent.php");
}





?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../styles/nav.css">



	<link rel="stylesheet" href="../styles/form.css">

</head>

<body>

  <main>


	<section class="body">

    <h1>Add & Update EVENTS from here </h1>
    
    <form class="containers" method="post" enctype="multipart/form-data">

      <div class="container-small-unit">
        <label class="label" for="eventTitle">Event Title</label>
        <input class="input" type="text" name="eventTitle" value="<?php echo $title ?>" required placeholder="Enter event title">
      </div>

      <div class="container-small-unit">
        <label class="label" for="eventDesc">Event Description</label>
        <textarea name="eventDesc" id="eventDesc" style="resize: none;" cols="30" rows="10" placeholder="Enter event description"><?php echo $eventDesc ?></textarea>
      </div>

      <div class="container-small-unit">
        <label class="label" for="eventCat">Select Event Category</label>
        <select class="form-control" name="eventCat" required>
          <?php $select = "SELECT * FROM p47_eventcategory ";
          $q = mysqli_query($bis, $select);
          foreach ($q as $data) { ?>
            <option value="<?php echo $data['categoryId']; ?>"><?php echo $data['categoryName']; ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="container-small-unit">
        <label class="label" for="eventDate">Select Event Date</label>
        <input type="date" value="<?php echo $eventDatee ?>" name="eventDate" id="eventDate">
      </div>

      <div class="container-small-unit">
        <label class="label" for="main_img">Upload Event Main Image</label>
        <input type="file" name="main_img" class="input" id="main_img" required accept="image/*">
      </div>

      <?php if ($id == '') { ?>
        <button type="submit" name="submit" class="btn">Add event</button>


      <?php } else { ?> <button type="submit" name="update" class="btn">Update event</button>
      <?php } ?>
    </form></section>
  </main>

  <!-- Bootstrap JavaScript Libraries -->

</body>

</html>

<script src="../js/bootstrap.bundle.min.js"></script>