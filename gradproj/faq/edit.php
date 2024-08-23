<?php
	// connect with database
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

if (isset($_POST["edit"])) {

	
    $id = $_POST['faqId'];
    
    $title = $_POST['faqTitle'];
    
    $desc = $_POST['faqDesc'];
   
    $response = $_POST['faqResponse'];
    
  // update the FAQ in database
   
   $SQL = "UPDATE `p47_faqss` SET `faqTitle` = '$title' , `faqDesc` = '$desc'  , `faqResponse` = '$response' WHERE `faqId` = $id ";
   $result= mysqli_query($bis,$SQL);
     
   if (!$result) { 
	echo "Failed: " . mysqli_error($bis) . header("Location: " . $_SERVER["HTTP_REFERER"]); // error reason + return to previous page 
   }
	else {
      
        header("Location: show.php");
        exit();
    }
   }

?>

<head> 
<title>FAQ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/nav.css">
</head>

<!-- layout for form to edit FAQ -->
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
	<div class="row">
    
        
<?php
// getting result from adding page
if (isset($_GET["editid"])) {
  $id = $_GET['editid'];
}
	$SQL = "SELECT * FROM p47_faqss where `faqId` =  $id";
$result = mysqli_query($bis,$SQL);


  while($faqdd =  mysqli_fetch_assoc($result)){
$id =	$faqdd['faqId'];
$title =	$faqdd['faqTitle'];
$desc =	$faqdd['faqDesc'];
$response =	$faqdd['faqResponse'];
	
  

   
?>
	
  
		<div class="offset-md-3 col-md-6">
	
		<h1 class="text-center">Edit FAQ</h1>
  
			<!-- form to edit FAQ -->
			<form method="POST" action="edit.php" >
 
				<!-- ID   -->
				<input type="hidden" name="faqId" value="<?php  echo $id ?>" required />
               
				<!-- question-->
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="faqTitle" class="form-control" value="<?php echo $title ?>" required />
				</div>

				<!-- answer -->
				<div class="form-group">
					<label>description</label>
					<textarea name="faqDesc" id="answer" class="form-control" required><?php echo $desc ?></textarea>
				</div>
				<div class="form-group">
					<label>Answer</label>
					<textarea name="faqResponse" id="answer" class="form-control" required><?php echo $response ?></textarea>
				</div>

				<!-- submit button -->
				<input type="submit" name="edit" class="btn btn-warning" value="Edit FAQ" />
			</form>
		
		</div>
<?php } ?>
	</div>
</div>

<script>
	// initialize rich text library
	window.addEventListener("load", function () {
		$("#answer").richText();
	});
</script>

<!-- closing connection -->
<?php
 echo $_SESSION['script'];

mysqli_close($bis);
?>

