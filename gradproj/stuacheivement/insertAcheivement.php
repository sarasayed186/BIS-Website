<?php


include "../Connections/syscon.php";
include "../shared/nav.php";

include "../shared/session.php";

$id = '';
if (isset($_POST['upload'])) {

	$name = $_POST['stuName'];

	$title = $_POST['achievementTitle'];
	$desc = $_POST['achievementDesc'];
	$image = $_FILES['img']['name'];

	$img_type = $_FILES['img']['type'];

	$tmp_name = $_FILES['img']['tmp_name'];

	$image_size = $_FILES['img']['size'];

	$image_error = $_FILES['img']['error'];



	$types = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');

	if ($image_error == 4) {
		echo '<script>alert("Please upload an image.")</script>';
		echo ("<script>location.href = 'insertAcheivement.php';</script>");
	}


	if ($image_size > 200000)  if (!in_array($img_type, $types)) { {
			die(header("Refresh: url=insertAcheivement.php") . '<script>alert("Too Large File and invalid extension")</script>' . "<script>location.href = 'insertAcheivement.php';</script>");
		}
	}


	if ($image_size > 20000000) {
		die(header("Refresh: url=insertAcheivement.php") . '<script>alert("Too Large File")</script>' . "<script>location.href = 'insertAcheivement.php';</script>");
	}
	if (!in_array($img_type, $types)) {
		die(header("Refresh: url=insertAcheivement.php") . '<script>alert("Invalid Extension !!")</script>' . "<script>location.href = 'insertAcheivement.php';</script>");
	}
	if (!empty($image)) {

		if (in_array($img_type, $types)) {
			// random name inserted in database


			$image_random  = rand(0, 100000000000000) . $image;




			// inserting when there is no error or failure.


			$sql = "INSERT into `p47_studentachievement` (`achievementId`, `stuName`, `achievementTitle`, `stuImage`, `achievementDesc`) values (NULL, '$name', '$title', '$image_random', '$desc')  ";
			mysqli_query($bis, $sql);

			echo '<script>alert("Your Files Added Successfully!!")</script>';
			move_uploaded_file($tmp_name, "imgs/"  .  $image_random);
			echo ("<script>location.href = 'show.php';</script>");
		}
	}
}
$name = $title = $desc = "";

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$select = "SELECT * FROM `p47_studentachievement` WHERE `achievementId`=$id";
	$s = mysqli_query($bis, $select);
	$row = mysqli_fetch_assoc($s);
	$id = $row['achievementId'];
	$title = $row['achievementTitle'];
	$desc = $row['achievementDesc'];
	$name = $row['stuName'];




	if (isset($_POST['update'])) {


		//

		$title = $_POST['achievementTitle'];

		$desc = $_POST['achievementDesc'];

		$name = $_POST['stuName'];
		$image = $_FILES['img']['name'];

		$img_type = $_FILES['img']['type'];

		$tmp_name = $_FILES['img']['tmp_name'];

		$image_size = $_FILES['img']['size'];

		$image_error = $_FILES['img']['error'];
		$location = "imgs/";
		move_uploaded_file($tmp_name, $location . $image);

		$update = " UPDATE p47_studentachievement SET stuName = '$name', achievementTitle = '$title' , achievementDesc = '$desc' , stuImage = '$image' WHERE achievementId = $id";


		$q = mysqli_query($bis, $update);
		header("location: show.php");
	}
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>STUDENT ACHIEVEMENT PAGE</title>
	<!-- CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../styles/nav.css">
</head>

<body>
	<nav class="navbar navbar-light bg-primary">
		<div class="container-fluid">
			<span class="navbar-brand mb-0 h1" style="color:white;">STUDENT ACHIEVEMENTS</span>
		</div>
	</nav>
	<section style="padding-top: 20px;">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<!-- Placeholder for future content -->
				</div>
				<div class="col-md-10">
					<form method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="name" class="form-label">Student Name:</label>
							<input type="text" class="form-control" name="stuName" id="name" placeholder="Name" value="<?php echo $name ?>" autocomplete="off" required>
						</div>
						<div class="mb-3">
							<label for="title" class="form-label">Achievement Title:</label>
							<input type="text" class="form-control" name="achievementTitle" id="title" placeholder="Achievement Title" value="<?php echo $title ?>" autocomplete="off" required>
						</div>
						<div class="mb-3">
							<label for="desc" class="form-label">Achievement Description:</label>
							<textarea class="form-control" name="achievementDesc" id="desc" placeholder="Add description" autocomplete="off" required><?php echo $desc ?></textarea>
						</div>
						<div class="mb-3">
							<label for="image" class="form-label">Student Image:</label>
							<input type="file" name="img" id="image" class="form-control">
						</div>
						<?php if ($id == '') { ?>
							<div class="mb-3">
								<button type="submit" name="upload" class="btn btn-success">Upload</button>
							</div>
						<?php } ?>
						<?php if ($id != '') { ?>
							<div class="mb-3">
								<button type="submit" name="update" class="btn btn-success">Update</button>
							</div>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
	</section>
	<footer class="container" style="padding-top:20px;">
	</footer>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/jquery.js"></script>
</body>
</html>

</html>