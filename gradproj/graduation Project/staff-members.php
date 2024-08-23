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
    <title>Staff Members | BIS</title>
</head>

<body>
    <!--==================navigation=====================-->
    

    <!--===============Staff-Content=================-->
    <section class="staff-members">
        <div class="staff-head-sec">
            <h2>BIS Staff Members</h2>
        </div>
        <div class="container p-3">
            <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-3 g-3">
             
                <?php
    $select= $bis->query( "SELECT `DoctorCode`,`Doctor_eng_Name`,`Academic_Mail`,`DoctorJob`,`University`,`Faculty`,`Department`,`Type`,`Doctor_image`,`Faculty_eng_name`,`Doctor_type_name`,`Doctor_job_eng_name`,`Department_eng_name`,`uni_eng_name`,`is_enable` from `doctors_account` JOIN `doctor_jobs` on `DoctorJob`=`Doctor_job_id` JOIN `universities` on `University`=`uni_id` join `faculties` on `Faculty`=`Faculty_id` join `departments`  on `Department`=`Department_id` join `doctor_types` on `Type`=`Doctor_type_id` where is_enable='yes' ORDER BY `Doctor_eng_Name` ASC  ");
 


    foreach($select as $data){
    ?>
                <div class="col hidden-card">
                    <div class="card h-100 shadow-sm">
                        <div class="text-center">
                            <div class="img-hover-zoom img-hover-zoom--colorize">
                                <img class="shadow" src="../doctors/mainPhoto/<?php  echo $data['Doctor_image']; ?>" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="clearfix mb-3">
                            </div>
                            <div>
                                <h4 class="name"><?php  echo $data['Doctor_eng_Name']; ?></h4>
                                <p class="role">
                                <?php   echo $data['Doctor_job_eng_name']; ?>
                                </p>
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