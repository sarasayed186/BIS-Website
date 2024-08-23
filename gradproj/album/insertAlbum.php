<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

$id = "";
if (isset($_POST['submit'])) {


	$title = $_POST['albumTitle'];

	$albumDesc = $_POST['albumDesc'];


	$imagename = $_FILES['main_img']['name'];
	$imagetype = $_FILES['main_img']['type'];
	$imagetmp = $_FILES['main_img']['tmp_name'];
	$location = "albumcover/";
	move_uploaded_file($imagetmp, $location . $imagename);
	$insert = "INSERT into `p47_album`(`albumId`,`mainPhoto`,`albumTitle`,`albumDesc`,`uploadDate`) VALUES (NULL,'$imagename','$title','$albumDesc',null)";


	$q = mysqli_query($bis, $insert);
	header('location:listalbums.php');
}

//----------update event-------------
$title = $abroad_img = $albumDesc = $eventCat = $uploadDate = '';
// albumId	albumTitle	albumDesc	uploadDate	 mainPhoto


if (isset($_GET['edit'])) {

	$id = $_GET['edit'];
	$select = "SELECT * FROM `p47_album` WHERE `albumId`=$id";
	$s = mysqli_query($bis, $select);
	$row = mysqli_fetch_assoc($s);

	$title = $row['albumTitle'];
	$abroad_img = $row['mainPhoto'];
	$albumDesc = $row['albumDesc'];
}
if (isset($_POST['update'])) {
	$title = $_POST['albumTitle'];

	$albumDesc = $_POST['albumDesc'];


	$imagename = $_FILES['main_img']['name'];
	$imagetype = $_FILES['main_img']['type'];
	$imagetmp = $_FILES['main_img']['tmp_name'];
	$location = "albumcover/";
	move_uploaded_file($imagetmp, $location . $imagename);
	$update = "UPDATE `p47_album` SET `albumTitle`='$title',`albumDesc`='$albumDesc',`mainPhoto`='$imagename' WHERE `albumId`=$id";

	// $update = "UPDATE `p47_album` SET `albumTitle` = '$title',`mainPhoto` = '$imagename',`albumDesc`='$albumDesc'  WHERE `albumId` = $id ";
	$q = mysqli_query($bis, $update);
	header("location:listalbums.php");
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

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../back-gallery/back-gallery.css">
	<title>gallery | BIS</title>
	<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
	<link rel="stylesheet" href="../styles/form.css">
	<link rel="stylesheet" href="../styles/nav.css">


</head>

<body>
	<section class="body">
		<h1>Add & Update Albums</h1>
		<form class="containers" method="post" enctype="multipart/form-data">
			<div class="container-small-unit">
				<label class="label" for="albumTitle">Album Title</label>
				<input class="input" type="text" name="albumTitle" value="<?php echo $title ?>" required placeholder="Enter album title">

			</div>
			<div class="container-small-unit">
				<label class="label" for="albumDesc">Album Description</label>
				<textarea name="albumDesc" id="albumDesc" style="resize: none;" cols="30" rows="10" placeholder="Enter album description"></textarea>
			</div>
			<div class="container-small-unit">
				<label class="label" for="main_img">Upload Album Main Image</label>
				<input type="file" name="main_img" class="input" id="main_img" required accept="image/*">
			</div>
			<?php if ($id == '') { ?>
				<button type="submit" name="submit" class="btn">Add Album</button>
			<?php } else { ?>
				<button type="submit" name="update" class="btn">Update Album</button>
			<?php } ?>
		</form>
	</section>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
		integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
		crossorigin="anonymous"></script>

	<script src="../js/jquery.js"></script>
</body>

</html>