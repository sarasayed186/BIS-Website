<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

$id = "";

if (isset($_POST['submit'])) {


	$title = $_POST['newsTitle'];

	$newsDesc = $_POST['newsDesc'];
	$eventDate = $_POST['eventDate'];
	$titles = mysqli_real_escape_string($bis, $title);


	$newsDescc = mysqli_real_escape_string($bis, $newsDesc);


	$imagename = $_FILES['main_img']['name'];
	$imagetype = $_FILES['main_img']['type'];
	$imagetmp = $_FILES['main_img']['tmp_name'];
	$importance = $_POST['importance'];
	$location = "mainPhoto/";
	move_uploaded_file($imagetmp, $location . $imagename);
	$insert = "INSERT into `p47_news` (`newsId`,`mainPhoto`,`newsTitle`,`newsDesc`,`news_Importance`,`dayDate`,`currentDate`) VALUES (NULL,'$imagename','$titles','$newsDescc',$importance,'$eventDate',NULL)";


	$q = mysqli_query($bis, $insert);
	header("location:listNews.php");
}


$title = $imagename = $newsDesc = $importance = $eventDate = '';

if (isset($_GET['edit'])) {

	$id = $_GET['edit'];
	$select = "SELECT * FROM `p47_news` WHERE `newsId`=$id";
	$s = mysqli_query($bis, $select);
	$row = mysqli_fetch_assoc($s);

	$title = $row['newsTitle'];
	$imagename = $row['mainPhoto'];
	$newsDesc = $row['newsDesc'];
	$importance = $row['news_Importance'];
	$eventDate = $row['dayDate'];
}
if (isset($_POST['update'])) {
	$title = $_POST['newsTitle'];

	$importance = $_POST['importance'];
	$newsDesc = $_POST['newsDesc'];
	$eventDate = $_POST['eventDate'];
	$titles = mysqli_real_escape_string($bis, $title);


	$newsDescc = mysqli_real_escape_string($bis, $newsDesc);

	$imagename = $_FILES['main_img']['name'];
	$imagetype = $_FILES['main_img']['type'];
	$imagetmp = $_FILES['main_img']['tmp_name'];
	$location = "mainPhoto/";
	move_uploaded_file($imagetmp, $location . $imagename);


	$update = "UPDATE `p47_news` SET `newsTitle` = '$titles' ,  `mainPhoto` = '$imagename',`newsDesc`='$newsDescc' ,`news_Importance`= $importance,`dayDate`='$eventDate' WHERE `newsId` = $id ";
	$q = mysqli_query($bis, $update);
	header("location:listNews.php");
}







?>



<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<title>Add News</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../styles/nav.css">

	<!-- Additional CSS -->
	<link rel="stylesheet" href="../back-gallery/back-gallery.css">
	<link rel="stylesheet" href="../styles/form.css">
	<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
</head>

<body>
	<section class="body">
		<h1>Add & Update News</h1>
		<form class="containers" method="post" enctype="multipart/form-data">
			<div class="container-small-unit">
				<label class="label" for="newsTitle">News Title</label>
				<input class="input" type="text" name="newsTitle" value="<?php echo $title ?>" required placeholder="Enter news title">
			</div>
			<div class="container-small-unit">
				<label class="label" for="newsDesc">News Description</label>
				<textarea name="newsDesc" id="newsDesc" style="resize: none;" cols="30" rows="10" placeholder="Enter news description"><?php echo $newsDesc ?></textarea>
			</div>
			<div class="container-small-unit">
				<label class="label" for="importance">Select News Importance</label>
				<select class="form-control" name="importance" required>
					<option value="0">For Students</option>
					<option value="1">For Public</option>
				</select>
			</div>
			<div class="container-small-unit">
				<label class="label" for="eventDate">Select Event Date</label>
				<input type="date" value="<?php echo $eventDate ?>" name="eventDate" id="eventDate">
			</div>
			<div class="container-small-unit">
				<label class="label" for="main_img">Upload News Main Image</label>
				<input type="file" name="main_img" class="input" id="main_img" required accept="image/*">
			</div>
			<?php if ($id == '') { ?>
				<button type="submit" name="submit" class="btn">Add News</button>
			<?php } else { ?>
				<button type="submit" name="update" class="btn">Update News</button>
			<?php } ?>
		</form>
	</section>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="../js/jquery.js"></script>
</body>

</html>