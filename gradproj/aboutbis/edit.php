<?php
include "../Connections/syscon.php" ;


if (isset($_POST["submit"])) {

  if (isset($_GET["editid"])) {
    $id = $_GET["editid"];
  $mission = $_POST['mission'];
  $vision = $_POST['vision'];
  $history = $_POST['history'];
  $reaforbis = $_POST['whyBis'];

  $sql = "UPDATE `p47_about` SET `mission`='$mission',`vision`='$vision',`history`='$history',`whyBis`='$reaforbis' WHERE aboutId = $id";

  $result = mysqli_query($bis, $sql);

  if ($result) {
    header("Location: show.php?msg=Data updated successfully");
    exit();
  } else {
    echo "Failed: " . mysqli_error($bis);
  }
}
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>ABOUT BIS PAGE</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
  ABOUT BIS PAGE
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>EDIT YOUR INPUT</h3>
      <p class="text-muted">Update Your Information</p>
    </div>

    <?php
    if (isset($_GET["editid"])) {
      $id = $_GET["editid"];
    
    
     
    $sql = "SELECT * FROM `p47_about` WHERE `aboutId` = $id ";
    
    $result = mysqli_query($bis, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $mission =	$row['mission'];
      $vision =	$row['vision'];
      $history =	$row['history'];
      $whybis =	$row['whyBis'];

    
    
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
     <div class="col mb-3">
      <input type="hidden" name="aboutId" value="<?=  $id ?>" required />
      
				<div class="form-group">
					<label>mission :</label>
					<textarea  name="mission" id="mission" class="form-control"required ><?php echo $mission ?> </textarea>
				</div>

				
				<div class="form-group">
					<label>vision :</label>
					<textarea name="vision" id="vision" class="form-control" required><?php echo $vision ?></textarea>
				</div>
				<div class="form-group">
					<label>history :</label>
					<textarea name="history" id="history" class="form-control" required><?php echo $history ?></textarea>
				</div>
				<div class="form-group">
					<label>Edit field'whybis' :</label>
					<textarea name="whyBis" id="history" class="form-control" required><?php echo $whybis ?></textarea>
				</div>

				<!-- submit button -->
    <div>
				<button type="submit" name="submit" class="btn btn-success">update</button>
        <a href="edit.php" class="btn btn-danger">Cancel</a>
    </div>
			</form>
		
		</div>
<?php } } ?>
	</div>
</div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>