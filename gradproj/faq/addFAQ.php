<!--  this page is for adding and showing the inserted id,title ,desc.,response -->
<?php
 	// connect with database
 include "../Connections/syscon.php";
 include "../shared/nav.php";
 include "../shared/session.php";

	// check if insert form is submitted
 if (isset($_POST["submit"])) {

	
    $id = $_POST['faqId'];
    
    $title = $_POST['faqTitle'];
    
    $desc = $_POST['faqDesc'];
   
    $response = $_POST['faqResponse'];
    
        // insertion
   
    $SQL = "INSERT INTO p47_faqss (faqId, faqTitle, faqDesc, faqResponse) VALUES (null, '$title', '$desc', '$response') ";
    $result= mysqli_query($bis,$SQL);
      
    if (!$result) { 
     echo "Failed: " . mysqli_error($bis).  header("Location: " . $_SERVER["HTTP_REFERER"]) ; // error reason + return to previous page. 
    }
     else {
       
         header("Location: show.php");
         exit();
     }
    }
 
    
   
 $_SESSION['head'] =  '<head>
 <title>FAQ</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <style>  
  .accordion-body, p  { 
       direction: rtl;
   }
</style>

    ';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>FAQ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/nav.css">

  <style>  
   .accordion-body, p  { 
        direction: rtl;
    }
</style>
</head>
<!-- layout for form to add FAQ -->
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <h1 class="text-center">Add FAQ</h1>
 
            <!-- form to add FAQ -->
            <form method="POST" action="addFAQ.php">
 
                <!-- question -->
                <div class="form-group">
                    <label>Faq Title</label>
                    <input type="text" name="faqTitle" class="form-control" required />
                </div>
             
                <!-- answer -->
                <div class="form-group">
                    <label>Add Desc</label>
                    <textarea name="faqDesc" id="answer" class="form-control" required></textarea>
                </div>
 
                <div class="form-group">
                    <label>Answer</label>
                    <textarea name="faqResponse" id="answer" class="form-control" required></textarea>
                </div>
 
                <!-- submit button -->
                <input type="submit" name="submit" class="btn btn-info" value="Add FAQ" />
            </form>
        </div>
    </div>
 
    

<!-- show all FAQs added -->

<div class="row">
    <div class="offset-md-2 col-md-8">
        <table class="table table-bordered">
            <!-- table heading -->
            <thead style="color: black;" >
                <tr>
                    <th style="color: black;">ID</th>
                    <th style="color: black;">Title</th>
                    <th style="color: black;">Desc.</th>
                    <th style="color: black;">response</th>
                    <th style="color: black;">Actions</th>
                </tr>
            </thead>
 
            <!-- table body -->
            <tbody>
                <?php 
                 // select to display results
                $SQL = "SELECT * FROM `p47_faqss` ORDER BY `faqId` DESC";
              
                $result = mysqli_query($bis,$SQL);
                
                
                  while($faqdd =  mysqli_fetch_assoc($result)){
                   
            
                
                  
                        foreach ($faqdd as $faq){
       
          ?>
          
       
                    <tr>
                        <?php } ?>
                        <td><?php echo $faqdd["faqId"]; ?></td>
                        <td><?php echo $faqdd["faqTitle"]; ?></td>
                        <td><?php echo $faqdd["faqDesc"]; ?></td>
                        <td><?php echo $faqdd["faqResponse"]; ?></td>
                        <td>
                            <!-- edit  -->
                        <a href="edit.php?editid=<?php echo $faqdd['faqId']; ?>" class="btn btn-warning btn-sm">
									Edit
								</a>
 
								<!-- delete form -->
								<form method="POST" action="delete.php" onsubmit="return confirm('Are you sure you want to delete this FAQ ?');">
									<input type="hidden" name="faqId" value="<?php echo $faqdd['faqId']; ?>" required />
									<input type="submit" name= "delete" value="Delete" class="btn btn-danger btn-sm" />
								</form>
                        </td>
                    </tr>
          <?php }  ?>
            </tbody>
        </table>
    </div>
</div>
     </div>
<script>
	// initialize rich text library
	window.addEventListener("load", function () {
		$("#answer").richText();
	});
</script>
<script src="../js/bootstrap.bundle.min.js"></script>

<script src="../js/jquery.js"></script>
<?PHP $_SESSION['script']='<script src="../js/bootstrap.bundle.min.js"></script>

<script src="../js/jquery.js"></script>';?>

<!-- closing connection -->
<?php
mysqli_close($bis);
?>



