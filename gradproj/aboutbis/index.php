<?php
include "../Connections/syscon.php" ;

if (isset($_POST["submit"])) {
   $id = 
   $mission = $_POST['mission'];
   $vision = $_POST['vision'];
   $history = $_POST['history'];
   $reaforbis = $_POST['whyBis'];

   $sql = "INSERT INTO `p47_about`(`aboutId`, `mission`, `vision`, `history`, `whyBis`) VALUES (NULL,'$mission','$vision','$history','$reaforbis')";

   $result = mysqli_query($bis, $sql);

   
   echo '<script>alert("Your Data Added Successfully.")</script>' . "<script>location.href = 'show.php';</script>";

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

   <title>ABOUT BIS</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      INSERT YOUR VALUES
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add Your Information</h3>
        
         
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="col mb-3">
               <div class="col">
               
					<label for="mision">mission :</label>
					<textarea type="text" name="mission" id= "mision" placeholder="" autocomplete="off" required ></textarea>
                     </div>

               <div class="col">
               
					<label for="vision">VISION :</label>
					<textarea type="text" name="vision" id= "vision" placeholder="" autocomplete="off" required ></textarea>
                     </div>
            

                     <div class="col">
					<label for="historyofbis">insert HISTORY :</label>
					<textarea type="text" name="history" id= "historyofbis" placeholder="" autocomplete="off" required ></textarea>
                     </div>

                     <div class="col">
					<label for="reaforbis">insert field'whybis' :</label>
					<textarea type="text" name="whyBis" id= "reaforbis" placeholder="" autocomplete="off" required ></textarea>
                     </div>
            </div>
            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>