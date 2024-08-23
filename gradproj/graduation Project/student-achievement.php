<?php include "../shared/usnav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/student-achievement.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Students Achievements | BIS</title>
</head>

<body>
    <!--==================navigation=====================-->

    <!--===============STUDENT ACHIEVEMENT===========-->
    <section class="achievement-page">
        <div class="achievement-sec-cover">
            <div class="title">
                Students Achievements
            </div>
        </div>

        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g4">
                <?php
                $rows = mysqli_query($bis, "SELECT * FROM `p47_studentachievement` where `status`=1 ORDER BY `achievementId` DESC")
                ?>

                <?php


                foreach ($rows as $row) {



                ?> <div class="col achieve-card hidden-card">
                        <div class="card h-100">
                            <div class="card-image">
                                <img src="../stuacheivement/imgs/<?php echo $row['stuImage'] ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="bottom-right-tag">
                                    <i class="fa fa-trophy"></i>
                                </div>

                                <h3 class="card-name"><?php echo $row['stuName'] ?></h3>

                                <p class="card-subtitle"><?php echo $row['achievementTitle'] ?></p>
                                <p class="card-text py-2">

                                    <?php echo $row['achievementDesc'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
               

          

               

               

                <div class="col achieve-card hidden-card">
                    <div class="card h-100">
                        <div class="card-image">
                            <img src="images/cover2.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="bottom-right-tag">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <h3 class="card-name">sara sayed fahmy</h3>
                            <p class="card-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <p class="card-text py-2">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Nemo quo laborum, possimus mollitia consequuntur repudiandae saepe provident veritatis
                                sapiente assumenda est corporis esse alias vero in, vel rerum odit ratione.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col achieve-card hidden-card">
                    <div class="card h-100">
                        <div class="card-image">
                            <img src="images/cover2.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="bottom-right-tag">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <h3 class="card-name">sara sayed fahmy</h3>
                            <p class="card-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <p class="card-text py-2">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Nemo quo laborum, possimus mollitia consequuntur repudiandae saepe provident veritatis
                                sapiente assumenda est corporis esse alias vero in, vel rerum odit ratione.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col achieve-card hidden-card">
                    <div class="card h-100">
                        <div class="card-image">
                            <img src="images/cover2.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="bottom-right-tag">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <h3 class="card-name">sara sayed fahmy</h3>
                            <p class="card-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <p class="card-text py-2">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Nemo quo laborum, possimus mollitia consequuntur repudiandae saepe provident veritatis
                                sapiente assumenda est corporis esse alias vero in, vel rerum odit ratione.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button id="load-btn" class="load-more-btn btn">Load More</button>
            </div>
        </div>
    </section>
    <!--===============BACK-TO-TOP BUTTON===========-->
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