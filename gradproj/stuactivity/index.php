<?php


include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

$id = $link = $url = $name = $bio = $ache = "";



if (isset($_POST['upload'])) {

	$link = $_POST['activityLink'];
	$url = filter_var($link, FILTER_SANITIZE_URL);
	$name = $_POST['activityName'];

	$bio = $_POST['activityBio'];

	$bioo = mysqli_real_escape_string($bis, $bio);



	$imagee = $_FILES['img']['name'];
	$img_typee = $_FILES['img']['type'];
	$image_sizee = $_FILES['img']['size'];
	$image_errorr = $_FILES['img']['error'];

	$image_tmp = $_FILES['img']['tmp_name'];
	$location = "img/";

	$images = $_FILES['main']['name'];
	$imgs_typee = $_FILES['main']['type'];
	$images_sizee = $_FILES['main']['size'];
	$images_errorr = $_FILES['main']['error'];

	$images_tmp = $_FILES['main']['tmp_name'];
	$location = "img/";

	move_uploaded_file($image_tmp, $location . $imagee);
	move_uploaded_file($images_tmp, $location . $images);


	$sql = "INSERT into `p47_studentacts` (`activityCode`,  `activityName`, `activityLogo`,`mainPhoto`, `activityBio`, `activityLink`) values (NULL, '$name', '$imagee','$images', '$bioo', '$url')  ";
	mysqli_query($bis, $sql);
}

if (isset($_GET['edit'])) {




	$id = $_GET['edit'];
	$select = "SELECT * FROM `p47_studentacts` WHERE `activityCode`=$id";
	$s = mysqli_query($bis, $select);
	$row = mysqli_fetch_assoc($s);
	$name = $row['activityName'];

	$bio = $row['activityBio'];
	$ache = $row['activityAcheivement'];
	$url = $row['activityLink'];
	if (isset($_POST['update'])) {



		$name = $_POST['activityName'];

		$bio = $_POST['activityBio'];
		$ache = $_POST['activityAcheivement'];
		$link = $_POST['activityLink'];
		$url = filter_var($link, FILTER_SANITIZE_URL);
		$imagee = $_FILES['img']['name'];
		$img_typee = $_FILES['img']['type'];
		$image_sizee = $_FILES['img']['size'];
		$image_errorr = $_FILES['img']['error'];

		$image_tmp = $_FILES['img']['tmp_name'];
		$location = "img/";
		move_uploaded_file($image_tmp, $location . $imagee);




		$update = "UPDATE `p47_studentacts` SET `activityName` = '$name' , `activityLogo` = '$imagee',`activityBio`='$bio' ,`activityAcheivement`= '$ache',`activityLink`='$url' WHERE `activityCode` = $id ";
		$q = mysqli_query($bis, $update);
		header("location:data.php");
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Add Student Activities</title>
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
	<!-- As a heading -->
	<section class="body">
		<h1>Add & Update Student Activities</h1>
		<form class="containers" method="post" enctype="multipart/form-data">
			<div class="container-small-unit">
				<label class="label" for="name">Name:</label>
				<input type="text" class="input" name="activityName" id="name" placeholder="Enter activity name" value="<?php echo $name ?>" autocomplete="off" required>
			</div>
			<div class="container-small-unit">
				<label class="label" for="link">Activity Link:</label>
				<input type="url" class="input" name="activityLink" id="link" placeholder="Enter activity link" value="<?php echo $url ?>" autocomplete="off" required>
			</div>
			<div class="container-small-unit">
				<label class="label" for="bio">Bio:</label>
				<textarea name="activityBio" id="bio" placeholder="Enter activity bio" autocomplete="off" required><?php echo $bio ?></textarea>
			</div>
			<div class="container-small-unit">
				<label class="label" for="logo">Insert Activity Logo:</label>
				<input type="file" name="img" id="logo" class="form-control">
			</div>
			<div class="container-small-unit">
				<label class="label" for="main">Insert Main Photo:</label>
				<input type="file" name="main" id="main" class="form-control">
			</div>
			<?php if ($id == '') { ?>
				<button type="submit" name="upload" class="btn">Upload Activity</button>
			<?php } else { ?>
				<button type="submit" name="update" class="btn">Update Activity</button>
			<?php } ?>
		</form>
	</section>
	<!-- FOOTER -->
	<footer class="container" style="padding-top:20px;">
	</footer>
	<script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>