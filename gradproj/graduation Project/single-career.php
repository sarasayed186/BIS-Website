<?php include "../shared/usnav.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/single-career.css">
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
    <?php
if (isset($_GET['list'])) {
  $id = $_GET['list'];
  $select = $bis->query("SELECT * from p47_careers WHERE `careerId`=$id ");
}

foreach ($select as $data) {


?>
    <section class="singe-career-sec">
        <div class="container">
            <div class="row vertical_content_manage">
                <div class="col-lg-6">
                    <div class="single-career-text mt-3">
                        <h4 class="job-title mt-3">
                        <?php echo $data['jobTitle']; ?></h4>
                        <div class="details">
                            <p class="company"><i class="fas fa-building"></i> <?php echo $data['companyName']; ?></p>
                            <p class="job-type"><i class="fas fa-briefcase"></i>  <?php echo $data['type']; ?></p>
                            <p class="time"><i class="far fa-clock"></i> <?php echo $data['beginDate']; ?></p>
                            <div class="read-more">
                                <a class="read-more-1" href="<?php echo $data['careerLink']; ?>">
                                    <i class="fa fa-tasks"></i>Apply Now
                                </a>
                            </div>
                        </div>
                        <p class="career-desc mt-4">
                        <?php echo $data['jobDesc']; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" style="display: flex; justify-content: center;align-items: center;">
                    <div class="career-img mt-3">
                        <img src="../otherPages/img/<?php echo $data['careerMainPhoto']; ?>" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }?>

    <div class="career-cards" style="background:#fff; padding-top: 40px;">
        <div class="page-title" style="font-size: 35px;">
            More <span>Careers</span>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g4">

              

                <?php
                $selects = $bis->query("SELECT * from p47_careers WHERE `status`=1  and `careerId`!= $id ORDER BY `beginDate` desc  ");

                foreach ($selects as $datas) {
                ?>
                <div class="col career-card hidden-card">
                    <div class="card h-100">
                        <div class="card-image">
                            <img src="../otherPages/img/<?php echo $datas['careerMainPhoto']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="job-title"><?php echo $datas['jobTitle']; ?></h5>
                            <div class="details">
                                <p class="company"><i class="fas fa-building"></i> <?php echo $datas['companyName']; ?></p>
                                <p class="job-type"><i class="fas fa-briefcase"></i> <?php echo $datas['type']; ?></p>
                                <p class="time"><i class="far fa-clock"></i><?php echo $datas['beginDate']; ?></p>
                                <div class="read-more">
                                    <a class="read-more-1" href="single-career.php?list=<?php echo $datas['careerId']?>">
                                        <i class="fa fa-book"></i>Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>

            

             
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