<?php
include "../Connections/syscon.php";
include "../shared/nav.php";

include "../shared/session.php";


//--------------add event--------------
if (isset($_POST['submit'])) {



	// careerId	
	// jobTitle	
	// companyName	
	// jobDesc	
	// careerMainPhoto	
	// careerLink
	$title = $_POST['title'];
	$url = $_POST['elink'];

	$careerDesc = $_POST['careerDesc'];

	$companyName = $_POST['companyName'];
	$careerDescc = mysqli_real_escape_string($bis, $careerDesc);
	$companyNames = mysqli_real_escape_string($bis, $companyName);
	$titles = mysqli_real_escape_string($bis, $title);
	$type = $_POST['type'];
	$beginDate= $_POST['beginDate'];

	$imagename = $_FILES['abroad_img']['name'];
	$imagetype = $_FILES['abroad_img']['type'];
	$imagetmp = $_FILES['abroad_img']['tmp_name'];
	$location = "img/";
	move_uploaded_file($imagetmp, $location . $imagename);
	$safe_url = mysqli_real_escape_string($bis, $url);
	$insert = "INSERT into `p47_careers`(`careerId`,`jobTitle`,`companyName`,`jobDesc`,`careerMainPhoto`,`careerLink`,`beginDate`,`type`) VALUES (NULL,'$titles','$companyNames','$careerDescc','$imagename','$safe_url','$beginDate','$type')";


	$q = mysqli_query($bis, $insert);
	header('location:listCareers.php');
}

//----------update event-------------
$id = NULL;
$title = $careerDesc = $companyName = "";
$elink = "";
$url = "";
$safe_url = "";

$update = false;

if (isset($_GET['edit'])) {
	$update = true;
	$id = $_GET['edit'];
	$select = "SELECT * FROM `p47_careers` WHERE `careerId`=$id";
	$s = mysqli_query($bis, $select);
	$row = mysqli_fetch_assoc($s);
	$type = $row['type'];
	$beginDate= $row['beginDate'];
	$title = $row['jobTitle'];
	$careerDesc = $row['jobDesc'];
	$companyName = $row['companyName'];
	$title = $row['jobTitle'];
	$safe_url = $row['careerLink'];
	$imagename = $row['careerMainPhoto'];
}
if (isset($_POST['update'])) {



	$title = $_POST['title'];
	$url = $_POST['elink'];

	$url = $_POST['elink'];
	$careerDesc = $_POST['careerDesc'];
	
	$companyName = $_POST['companyName'];
	$beginDate = $_POST['beginDate'];
	$type = $_POST['type'];

	$imagename = $_FILES['abroad_img']['name'];
	$imagetype = $_FILES['abroad_img']['type'];
	$imagetmp = $_FILES['abroad_img']['tmp_name'];

	$careerDescc = mysqli_real_escape_string($bis, $careerDesc);
	$companyNames = mysqli_real_escape_string($bis, $companyName);
	$titles = mysqli_real_escape_string($bis, $title);
	$location = "img/";
	move_uploaded_file($imagetmp, $location . $imagename);
	$safe_url = mysqli_real_escape_string($bis, $url);

	$update = "UPDATE `p47_careers` SET `jobTitle` = '$titles' , `companyName`='$companyNames',`jobDesc`= '$careerDescc',`careerMainPhoto`='$imagename' ,`careerLink` = '$safe_url',`beginDate`='$beginDate',`type`='$type' WHERE `careerId` = $id ";
	$q = mysqli_query($bis, $update);
	header("location:listCareers.php");
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/form.css">

	<link rel="stylesheet" href="../styles/nav.css">




</head>


<!--  -->
<section class="body">

<h1>Add & Update Careers from here </h1>
<form class="containers" method="post" enctype="multipart/form-data">
	<div class="container-small-unit">
		<label class="label" for="">Job Title </label>
		<input class="input" type="text" name="title" value="<?php echo $title ?>" required placeholder="Job title">

	</div>
	<div class="container-small-unit">
		<label class="label" for="">Company Name </label>
		<input class="input" type="text" name="companyName" value="<?php echo $companyName ?>" required placeholder="Company Name">

	</div>
	<div class="container-small-unit">
		<label class="label" for="">Career Link </label>
		<input class="input" type="url" name="elink" value="<?php echo $safe_url ?>" required placeholder="career link">

	</div>

	<div class="container-small-unit">
		<label class="label">Job Description </label>
		<textarea name="careerDesc" id="" style="resize: none;" cols="30" rows="10" placeholder="Enter Text here"> <?php echo $careerDesc ?></textarea>
	</div>
	<div class="container-small-unit">
        <label for="" class="label"> SELECT Event Date</label>
        <input type="date" value="<?php echo $beginDate ?>" name="beginDate" id="">
      </div>

	<div class="container-small-unit">
                            <label class="label" for="">Selcet type.
                            </label>
                            <select class="form-control" name="type" required>
                           
                                    <option value="part">Part time</option>
									<option value="full">Full time</option>
									<option value="intern">Internship</option>



                            </select>
                        </div>

	<div class="container-small-unit">
		<label class="label">Event Main image</label>
		<input type="file" name="abroad_img" class="input" id="field-upload" required accept="image/*">

	</div>
	<?php if ($id == '') { ?>
		<button type="submit" name="submit" class="btn">Add event</button>


	<?php } else { ?> <button type="submit" name="update" class="btn">Update event</button>
	<?php } ?>
</form></section>
</main>

<script src="../js/bootstrap.bundle.min.js"></script>

<script src="../js/jquery.js"></script>