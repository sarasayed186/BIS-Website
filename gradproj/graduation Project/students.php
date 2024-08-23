<?php include "../shared/usnav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/students.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Students | BIS</title>
</head>

<body>

    <!--==================STUDENTS==================-->
    <div class="top-students-sec">
        <div class="sec-title">
            <h2>BIS Students' Honor Board</h2>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g4">
                <?php   $select = $bis->query("SELECT * from p47_beststudents JOIN `p47_stuhonourboard` on `honBoardId`=`boardId` WHERE `boardId`= (
    SELECT MAX(boardId) FROM `p47_beststudents`) and `status`=1 ORDER BY `stulevel` DESC,`stuRank` ASC ");
                foreach ($select as $data) {

 ?>
                <div class="col student-card">
                    <div class="card">
                        <div class="student-image">
                            <img src="../bestStudents/stuImage/<?php echo $data['stuAvatar'] ?>" class="card-img-top" alt="">
                            <div class="rank text-uppercase">#<span><?php echo $data['stuRank'] ?></span></div>
                            <div class="student-lvl">level <span><?php echo $data['stulevel'] ?></span></div>
                        </div>
                        <div class="card-body">
                            <h3 class="student-name"><?php echo $data['stuName'] ?></h3>
                            <div class="student-gpa">GPA <?php echo $data['stuGPA'] ?></div>
                        </div>
                    </div>
                </div>
                <?php }?>

             
          
                
           
             
                
            </div>
        </div>
        <div class="text-center">
            <a href="top-students.php" class="know-more-btn btn">Show More</a>
        </div>
    </div>

    <div class="students-all-sec">
        <section class="activity-sec">
            <div class="container py-5">
                <div class="left student-activity-img"></div>
                <div class="right">
                    <div class="content">
                        <h1>Student Activities</h1>
                        <p>Clubs, Activities, and events are excellent opportunities
                            to enjoy university time, make new friends, and maintain
                            a healthy balance between social and academic life,
                            all which will help students become more competitive candidates for graduate roles.</p>
                        <a href="student-activity.php" class="know-more-btn btn">Know More</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="achieve-sec">
            <div class="container py-5">
                <div class="right">
                    <div class="content">
                        <h1>Student Achievements</h1>
                        <p>At BIS, students can succeed in a variety of ways,
                            including academically, artistically, physically, and socially.
                            Their academic and social lives are directly impacted by the successes they achieve as
                            students.
                            Since we want our students to succeed in life, our focus has shifted to include
                            a variety of extracurricular activities that go beyond the academic basics used to gauge
                            student achievement.</p>
                        <a href="student-achievement.php" class="know-more-btn btn">Know More</a>
                    </div>
                </div>
                <div class="left student-achieve-img"></div>
            </div>
        </section>

        <section class="portal-sec">
            <div class="container py-5">
                <div class="left bis-portal-img"></div>
                <div class="right">
                    <div class="content">
                        <h1>BIS Student Portal</h1>
                        <p>BIS portal was developed to make it simple for current and prospective BIS students
                            to register for an account or log in and conduct certain academic tasks.</p>
                        <a href="https://fcba-hu.net/BIS-FMI-Portal/login.php?fbclid=IwAR0dRe7VNNglSEmW6-VA9YiGtr5oRrvqDdXqVlsQsl0b6sHjlc4RuirRdlU"
                            class="know-more-btn btn" target="_blank">Visit BIS Portal
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--==============BACK-TO-TOP BUTTON==============-->
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