<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

$id = "";

if (isset($_POST['submit'])) {


	$title = $_POST['title'];
	$titles = mysqli_real_escape_string($bis, $title);

	$Desc = $_POST['desc'];
	$Descc = mysqli_real_escape_string($bis, $Desc);



	$imagename = $_FILES['main_img']['name'];
	$imagetype = $_FILES['main_img']['type'];
	$imagetmp = $_FILES['main_img']['tmp_name'];
	$year = $_POST['year'];
	$location = "mainPhoto/";
	move_uploaded_file($imagetmp, $location . $imagename);
	$insert = "INSERT into `p47_stuhonourboard` (`honBoardId`,`mainPhoto`,`honBoardTitle`,`description`,`year`) VALUES (NULL,'$imagename','$titles','$Descc','$year')";


	$q = mysqli_query($bis, $insert);
	header("location:listHboard.php");
}
$years = array(
	"2022-2023",
	"2023-2024",
	"2024-2025",
	"2025-2026",
	"2026-2027",
	"2027-2028",
	"2028-2029"
);


$title = $imagename = $Desc = $year  = '';

if (isset($_GET['edit'])) {

	$id = $_GET['edit'];
	$select = "SELECT * FROM `p47_stuhonourboard` WHERE `honBoardId`=$id";
	$s = mysqli_query($bis, $select);
	$row = mysqli_fetch_assoc($s);

	$title = $row['honBoardTitle'];
	$imagename = $row['mainPhoto'];
	$Desc = $row['description'];
	$year = $row['year'];
}
if (isset($_POST['update'])) {

	$title = $_POST['title'];
	$titles = mysqli_real_escape_string($bis, $title);

	$Desc = $_POST['desc'];
	$Descc = mysqli_real_escape_string($bis, $Desc);


	// p47_stuhonourboard honBoardId	honBoardTitle	description	mainPhoto	year	status	

	$imagename = $_FILES['main_img']['name'];
	$imagetype = $_FILES['main_img']['type'];
	$imagetmp = $_FILES['main_img']['tmp_name'];
	$year = $_POST['year'];
	$location = "mainPhoto/";
	move_uploaded_file($imagetmp, $location . $imagename);


	$update = "UPDATE `p47_stuhonourboard` SET `honBoardTitle` = '$titles' ,  `mainPhoto` = '$imagename',`description`='$Descc' ,`year`= '$year' WHERE `honBoardId` = $id ";
	$q = mysqli_query($bis, $update);
	header("location:listNews.php");
}







?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Add and Update Honour Board</title>

	<!-- Required meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../styles/nav.css">
	<link rel="stylesheet" href="../back-gallery/back-gallery.css">
	<link rel="stylesheet" href="../styles/form.css">
	<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
</head>

<body>
	<main>
		<section class="body">
			<h1>Add and Update Honour Board</h1>
			<form class="containers" method="post" enctype="multipart/form-data">
				<div class="container-small-unit">
					<label class="label" for="title">Title:</label>
					<input class="input" type="text" name="title" id="title" value="<?php echo $title ?>" required placeholder="Enter event title">
				</div>
				<div class="container-small-unit">
					<label class="label" for="desc">Description:</label>
					<textarea name="desc" id="desc" style="resize: none;" cols="30" rows="10" placeholder="Enter text here"><?php echo $Desc ?></textarea>
				</div>
				<div class="container-small-unit">
					<label class="label" for="year">Select Honour Board Year:</label>
					<select name="year" id="year" class="form-control" required>
						<?php if ($id != '') { ?>
							<option value="<?php echo $year; ?>" selected><?php echo $year; ?></option>
						<?php } ?>
						<?php foreach ($years as $yeart) { ?>
							<option value="<?php echo $yeart; ?>"><?php echo $yeart; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="container-small-unit">
					<label class="label" for="main_img">Event Main Image:</label>
					<input class="input" type="file" name="main_img" id="main_img" required accept="image/*">
				</div>
				<?php if ($id == '') { ?>
					<button type="submit" name="submit" class="btn">Add Event</button>
				<?php } else { ?>
					<button type="submit" name="update" class="btn">Update Event</button>
				<?php } ?>
			</form>
		</section>
	</main>

	<!-- Bootstrap JavaScript Libraries -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>

</html>