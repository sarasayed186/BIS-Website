<?php include "../shared/usnav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles/meet-the-dean.css">
  <link rel="stylesheet" href="styles/navbar.css">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>BIS Dean | BIS</title>
</head>

<body>
  <!--==================navigation=====================-->
 
  <!--==================DEAN CONTENT=================-->
  <?php
            $i = 1;
            $rows = mysqli_query($bis, "SELECT * FROM `p47_dean` where status = 1 ORDER BY `deanId` DESC ;")
            ?>

            <?php


            foreach ($rows as $row) {?>


  <section class="dean-sec">
    <div class="container py-5">
      <div class="section-title">
        <h1 class="name"><?= $row["deanName"]; ?></h1>
        <h2 class="title"><?= $row["deanJobtitle"]; ?>
        </h2>
      </div>
      <div class="row mt-3">
        <div class="col-md-6 d-flex justify-content-center">
          <div class="img-container">
            <img src="../dean/imgs/<?= $row["deanImage"]; ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="info">
            <h3>meet the dean</h3>
            <p><?= $row["deanBio"]; ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="word-sec">
    <div>
      <h3>BIS dean word</h3>
      <div class="quote container">
        <div class="txt"><?= $row["deanWord"]; ?></div>
      </div>
    </div>
    <?php }?>
  </section>
  <!--================BACK-TO-TOP BUTTON=================-->
  <a id="backToTop" class="back-to-top-btn" style="display:none;">
    <i class="fas fa-arrow-up arrow-up-icon"></i>
  </a>
  <!--==================FOOTER====================-->

  
  <?php include "../shared/footer.php";
?> 

  <!--==================JAVASCRIPT====================-->
  <script src="js/jquery-3.6.4.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/mainjs.js"></script>
</body>

</html>