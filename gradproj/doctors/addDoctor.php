<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

$id = "";

if (isset($_POST['submit'])) {


  $Dname = $_POST['Dname'];

  $Dmail = $_POST['Dmail'];
  $DoctorJob = $_POST['DoctorJob'];
  $University = $_POST['University'];
  $Faculty = $_POST['Faculty'];
  $Department = $_POST['Department'];
  $Type = $_POST['Type'];


  $imagename = $_FILES['main_img']['name'];
  $imagetype = $_FILES['main_img']['type'];
  $imagetmp = $_FILES['main_img']['tmp_name'];
  $location = "mainPhoto/";
  move_uploaded_file($imagetmp, $location . $imagename);
  $insert = "INSERT into `doctors_account`(`DoctorCode`,`Doctor_eng_Name`,`Academic_Mail`,`DoctorJob`,`University`,`Faculty`,`Department`,`Type`,`Doctor_image`) VALUES (NULL,'$Dname','$Dmail',$DoctorJob,$University,$Faculty,$Department,$Type,'$imagename')";

  $q = mysqli_query($bis, $insert);
  header('location:doctorsList.php');
}

//----------update event-------------
$Dmail = $DoctorJob = $University = $Faculty = $Department = $Dname = $Type = '';



if (isset($_GET['edit'])) {




  $id = $_GET['edit'];
  $select = "SELECT * FROM `doctors_account` WHERE `DoctorCode`=$id";
  $s = mysqli_query($bis, $select);
  $row = mysqli_fetch_assoc($s);
  $Dname = $row['Doctor_eng_Name'];

  $Dmail = $row['Academic_Mail'];
  $DoctorJob = $row['DoctorJob'];
  $University = $row['University'];
  $Faculty = $row['Faculty'];
  $Department = $row['Department'];
  $Type = $row['Type'];
}
if (isset($_POST['update'])) {
  $Dname = $_POST['Dname'];

  $Dmail = $_POST['Dmail'];
  $DoctorJob = $_POST['DoctorJob'];
  $University = $_POST['University'];
  $Faculty = $_POST['Faculty'];
  $Department = $_POST['Department'];
  $Type = $_POST['Type'];
  $imagename = $_FILES['main_img']['name'];
  $imagetype = $_FILES['main_img']['type'];
  $imagetmp = $_FILES['main_img']['tmp_name'];
  $location = "mainPhoto/";
  move_uploaded_file($imagetmp, $location . $imagename);
  // // $insert = "INSERT into `doctors_account`(`DoctorCode`,`Doctor_eng_Name`,`Academic_Mail`,`DoctorJob`,
  // `University`,`Faculty`,`Department`,`Type`,`Doctor_image`) VALUES (NULL,'$Dname','$Dmail','$DoctorJob',
  // '$University','$Faculty','$Department','$Type','$imagename')";


  $update = "UPDATE `doctors_account` SET `Doctor_eng_Name` = '$Dname' , `Academic_Mail` = '$Dmail', `DoctorJob`=$DoctorJob ,`University`= $University,`Faculty`=$Faculty, `Department`=$Department,`Type`=$Type,`Doctor_image`='$imagename' WHERE `DoctorCode` = $id ";
  $q = mysqli_query($bis, $update);
  header("location:doctorsList.php");
}





?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Add & Update Doctors</title>
	<!-- Required meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../styles/form.css">
	<link rel="stylesheet" href="../styles/nav.css">
</head>

<body>
	<main>
		<section class="body">
			<h1>Add & Update Doctors from here</h1>
			<form class="containers" method="post" enctype="multipart/form-data">
				<div class="container-small-unit">
					<label for="doctorName" class="label">Doctor Name</label>
					<input type="text" name="Dname" id="doctorName" class="input" value="<?php echo $Dname ?>" placeholder="Enter doctor name" required>
				</div>
				<div class="container-small-unit">
					<label for="doctorMail" class="label">Doctor Academic Mail</label>
					<input type="email" name="Dmail" id="doctorMail" class="input" value="<?php echo $Dmail ?>" placeholder="Enter doctor academic mail" required>
				</div>
				<div class="container-small-unit">
					<label for="doctorJob" class="label">Doctor's Job</label>
					<select name="DoctorJob" id="doctorJob" class="form-control" required>
						<?php $select = "SELECT * FROM `doctor_jobs`";
						$q = mysqli_query($bis, $select);
						foreach ($q as $data) { ?>
							<option value="<?php echo $data['Doctor_job_id']; ?>"><?php echo $data['Doctor_job_eng_name']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="container-small-unit">
					<label for="university" class="label">University</label>
					<select name="University" id="university" class="form-control" required>
						<?php $select = "SELECT * FROM `universities`";
						$q = mysqli_query($bis, $select);
						foreach ($q as $data) { ?>
							<option value="<?php echo $data['uni_id']; ?>"><?php echo $data['uni_eng_name']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="container-small-unit">
					<label for="faculty" class="label">Faculty</label>
					<select name="Faculty" id="faculty" class="form-control" required>
						<?php $select = "SELECT * FROM `faculties`";
						$q = mysqli_query($bis, $select);
						foreach ($q as $data) { ?>
							<option value="<?php echo $data['Faculty_id']; ?>"><?php echo $data['Faculty_eng_name']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="container-small-unit">
					<label for="department" class="label">Department</label>
					<select name="Department" id="department" class="form-control" required>
						<?php $select = "SELECT * FROM `departments`";
						$q = mysqli_query($bis, $select);
						foreach ($q as $data) { ?>
							<option value="<?php echo $data['Department_id']; ?>"><?php echo $data['Department_eng_name']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="container-small-unit">
					<label for="doctorType" class="label">Doctor's Type</label>
					<select name="Type" id="doctorType" class="form-control" required>
						<?php $select = "SELECT * FROM `doctor_types`";
						$q = mysqli_query($bis, $select);
						foreach ($q as $data) { ?>
							<option value="<?php echo $data['Doctor_type_id']; ?>"><?php echo $data['Doctor_type_name']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="container-small-unit">
					<label for="doctorImage" class="label">Doctor Image</label>
					<input type="file" name="main_img" id="doctorImage" class="input" accept="image/*">
				</div>
				<?php if ($id == '') { ?>
				<button type="submit" name="submit" class="btn">Add Doctor</button>
				<?php } else { ?>
				<button type="submit" name="update" class="btn">Update Doctor</button>
				<?php } ?>
			</form>
		</section>
	</main>
	<!-- Bootstrap JavaScript Libraries -->
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>```




