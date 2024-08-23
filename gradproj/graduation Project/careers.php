<?php include "../shared/usnav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/careers.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Career opportunities | BIS</title>
</head>

<body>
   
    <!--=================CareerOpportunities===============-->
    <div class="apply-cover">
        <p>Career Opportunities</p>
    </div>

    <div class="career-cards">
        <div class="page-title">
            Discover <span>opportunities</span> that align with your skills.
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g4">
            <?php
                $select = $bis->query("SELECT * from p47_careers WHERE `status`=1 ORDER BY `beginDate` desc  ");

                foreach ($select as $data) {
                ?>
                <div class="col career-card hidden-card">
                    <div class="card h-100">
                        <div class="card-image">
                            <img src="../otherPages/img/<?php echo $data['careerMainPhoto']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="job-title"><?php echo $data['jobTitle']; ?></h5>
                            <div class="details">
                                <p class="company"><i class="fas fa-building"></i> <?php echo $data['companyName']; ?></p>
                                <p class="job-type"><i class="fas fa-briefcase"></i> <?php echo $data['type']; ?></p>
                                <p class="time"><i class="far fa-clock"></i><?php echo $data['beginDate']; ?></p>
                                <div class="read-more">
                                    <a class="read-more-1" href="single-career.php?list=<?php echo $data['careerId']?>">
                                        <i class="fa fa-book"></i>Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>

             

            </div>
            <div class="text-center">
                <button id="load-btn" class="load-more-btn btn">Load More</button>
            </div>
        </div>
    </div>

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