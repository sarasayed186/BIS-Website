<?php
include "../Connections/syscon.php" ;
include "../shared/nav.php";
include "../shared/session.php";

?>
<!DOCTYPE html>
<html lang="en">
  <title>FAQ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../styles/table.css">
  <link rel="stylesheet" href="../styles/nav.css">

  <link rel="stylesheet" href="../css/bootstrap.min.css">   


<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1> FAQS</h1>
  <p> HERE IS THE MOST COMMON QUESTION ABOUT BIS</p>
   
</div>
  
<div class="container mt-5">
<div class="accordion" id="accordionExample">
    <?php $SQL = "SELECT * FROM p47_faqss";
        $result = mysqli_query($bis,$SQL);
        $i = 0;
      while ($faqd = mysqli_fetch_assoc($result))
      {  if($i==0){

        



?>
      <div class="accordion-item">
    <h2 class="accordion-header" id="heading<?php echo $faqd['faqId']; ?>">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $faqd['faqId']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $faqd['faqId']; ?>">
        <?php echo $faqd['faqTitle']; ?>
      </button>
    </h2>
    <div id="collapse<?php echo $faqd['faqId']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $faqd['faqId']; ?>" data-bs-parent="#accordionExample">

      <div class="accordion-body"   >

      <p> <?php    echo "<b>" . $faqd['faqDesc'] ."</b>"   . ":"   .    $faqd['faqResponse']  ; ?> </p>    <h6> <p><?php echo $faqd['text'] . $faqd['created_at']; ?>    </p> </h6> <h6> <p><?php echo $faqd['textt'] . $faqd['edited_at']; ?>     </p> </h6>
      </div>
    </div>
  </div>
  <?php } else{ ?>
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading<?php echo $faqd['faqId']; ?>">
      <button class = "accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $faqd['faqId']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $faqd['faqId']; ?>">
      <?php echo $faqd['faqTitle']; ?>
      </button>
    </h2>
    <div id="collapse<?php echo $faqd['faqId']; ?>" class="accordion-collapse collapse " aria-labelledby="heading<?php echo $faqd['faqId']; ?>" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <p> <?php    echo "<b>" . $faqd['faqDesc'] ."</b>"   . ":"   .    $faqd['faqResponse']  ; ?> </p>    <h6> <p><?php echo $faqd['text'] . $faqd['created_at']; ?>    </p> </h6> <h6> <p><?php echo $faqd['textt'] . $faqd['edited_at']; ?>     </p> </h6> 
      </div>
    </div>
  </div>
  <?php } $i++ ; } ?>
  
  
</div>
</div>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!-- closing connection -->
<?php
mysqli_close($bis);
?>
