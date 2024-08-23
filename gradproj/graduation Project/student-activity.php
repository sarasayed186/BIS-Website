<?php include "../shared/usnav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/student-activity.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Student Activities | BIS</title>
</head>

<body>
    <!--==================navigation=====================-->

    <!--=============STUDENT-ACTIVITY=============-->
    <div class="student-activity-cover">
        <p>Student Activities</p>
    </div>

    <section class="activity-sec">

        <div class="container">
            <div class="right">
                <div class="content">
                    <h1>About</h1>
                    <p>Clubs, Activities, and events are excellent opportunities
                        to enjoy university time, make new friends, and maintain
                        a healthy balance between social and academic life,
                        all which will help students become more competitive candidates for graduate roles.
                        Students gain practical experience through student extra-curricular activities, which they can
                        utilise to demonstrate their abilities and expertise in employment applications.
                        Students at BIS can participate in a variety of clubs that will help them learn about themselves
                        and
                        enhance their abilities in new contexts.
                    </p>
                </div>
            </div>
            <div class="left student-activity-img"></div>
        </div>
    </section>

    <section class="student-activity-sec">
        <div class="container">
            <div class="txt">
                BIS <span>Clubs</span>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g4">
                <?php
                $rows = mysqli_query($bis, "SELECT * FROM `p47_studentacts` where `status`=1 ORDER BY `activityCode` DESC");
                foreach ($rows as $row) {

                ?>
                    <div class="col activity-card">
                        <a href="single-activity.php?list=<?php echo $row['activityCode']; ?>" class="tile">
                            <div class="overlay"></div>

                            <img src="../stuactivity/img/<?= $row["activityLogo"]; ?>" alt="" class="activity-logo">
                            <span class="activity-title"><?php echo $row["activityName"]; ?></span>
                        </a>
                    </div>
                <?php } ?>





            </div>
        </div>
    </section>

    <!--=============BACK-TO-TOP BUTTON=============-->
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