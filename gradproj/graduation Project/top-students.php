<?php include "../shared/usnav.php";


//   
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles/top-students.css">
  <link rel="stylesheet" href="styles/events.css">
  <link rel="stylesheet" href="styles/navbar.css">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Top Students | BIS</title>
</head>

<body>
  <!--==================navigation=====================-->

  <!--==================TOP_STUDENTS=====================-->
  <div class="top-students-cover">
    <p class="title">BIS TOP STUDENTS</p>
  </div>

  <section class="top-students-sec">
    <div class="container">
    <div class="tabs">
  <?php 
  $select = $bis->query("SELECT * from `p47_stuhonourboard` WHERE `status`=1 ORDER BY `year` desc ");
  foreach ($select as $data) {
  ?>
  <div class="year-sec">
    <div class="tab">
      <button class="tab-toggle year"><?php echo $data['honBoardTitle'] ?></button>
    </div>
    <div class="content">
      <h4 class="heading">BIS top student <span class="year"><?php echo $data['year'] ?></span></h4>
      <div class="description">
        <div class="row row-cols-2 row-cols-md-2 row-cols-lg-3 g4">
          <?php 
          $selects = $bis->query("SELECT * from p47_beststudents JOIN `p47_stuhonourboard` on `honBoardId`=`boardId` WHERE `status`=1 AND `honBoardId`=".$data['honBoardId']." ORDER BY `stuLevel` desc,`stuRank` asc ");
          foreach ($selects as $datas) { 
          ?>
          <div class="col student-card">
            <div class="card">
              <div class="student-image">
                <img src="../bestStudents/stuImage/<?php echo $datas['stuAvatar'] ?>" class="card-img-top" alt="">
                <div class="rank text-uppercase">#<span><?php echo $datas['stuRank'] ?></span></div>
                <div class="student-lvl">level <span><?php echo $datas['stulevel'] ?></span></div>
              </div>
              <div class="card-body">
                <h3 class="student-name"><?php echo $datas['stuName'] ?></h3>
                <div class="student-gpa">GPA <span><?php echo $datas['stuGPA'] ?></span></div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
    </div>
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



