<?php include "../shared/usnav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/council-and-staff.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Council Members | BIS</title>
</head>

<body>
    <!--==================navigation=====================-->


    <!--===============Staff-Content=================-->
    <section class="staff-members">
        <div class="staff-head-sec">
            <h2>BIS Council Members</h2>
        </div>
        <div class="container p-3">
            <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-2 g-3">
                
                <?php
                $i = 1;
                $rows = mysqli_query($bis, "SELECT * FROM `p47_highboard` JOIN p47_highboardrole ON member_Role=Role_Id where status =1 ORDER BY `member_Role` asc")
                ?>

                <?php


                foreach ($rows as $row) {



                ?>
                    <div class="col council-hidden-card">
                        <div class="card h-100 shadow-sm">
                            <div class="text-center">
                                <div class="img-hover-zoom img-hover-zoom--colorize">
                                    <img class="shadow" src="../highboard/imgs/<?= $row["member_Image"]; ?>" alt="">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3">
                                </div>
                                <div>
                                    <h4 class="name"><?= $row["member_Name"]; ?></h4>
                                    <p class="role">
                                        <?= $row["role_Title"]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
               

            </div>
            <div class="text-center">
                <button id="load-council-btn" class="load-more-btn btn">Load More</button>
            </div>
        </div>
        </div>
    </section>
    <!--===============BACK-TO-TOP BUTTON==============-->
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