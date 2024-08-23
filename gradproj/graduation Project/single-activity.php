<?php include "../shared/usnav.php";
if (isset($_GET['list'])) {
    $id = $_GET['list'];
    $select = $bis->query("SELECT * from `p47_stuactsimgs`  WHERE `activityCode`=$id ");
  }$selectname = $bis->query("SELECT * FROM `p47_studentacts` WHERE `activityCode` =$id");
  $i = mysqli_fetch_assoc($selectname);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/single-activity.css">
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
                    <h1> <?php echo $i['activityName'] ?></h1>
                    <p class="activity-desc"><?php echo $i['activityBio'] ?>
                    </p>
                    <div class="read-more">
                                <a class="read-more-1" target="_blank" href="<?php echo $i['activityLink']?>">
                                    <i class="fa fa-eye"></i>More Info
                                </a>
                            </div>
                </div>
            </div>
            <div class="left student-activity-img"> <img src="../stuactivity/img/<?php echo $i['mainPhoto']?>" width="100%" height="100%" alt=""></div>
        </div>
    </section>
    <!----------------GALLERY---------------------->
    <section id="gallery">
        <div class="container">
            <div id="image-gallery">
                <p class="text-left">Gallery</p>
                <div class="row">
                    <?php
                foreach ($select as $data) {



?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 thumb image hidden-card">
                        <div class="img-wrapper">
                            <a href="../stuactivity/otherphotos/<?php echo $data['file_name']?>">
                                <img src="../stuactivity/otherphotos/<?php echo $data['file_name']?>"
                                    class="img-thumbnail img-responsive">
                            </a>
                            <div class="img-overlay">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
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