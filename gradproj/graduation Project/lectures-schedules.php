<?php include "../shared/usnav.php";
if (isset($_GET['lvl'])) {
    $id = $_GET['lvl'];
    $select = $bis->query("SELECT * from p47_schedules JOIN p47_scheduletype on p47_schedules.scheduleTypeId=p47_scheduletype.scheduleTypeId where `status` =1 and p47_scheduletype.scheduleTypeId=1 and `level`=$id ORDER BY `uploadDate` DESC  ");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/Academics.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title> Lectures Schedules | BIS</title>
</head>

<body>

    <!--==================page content===============-->
    <div class="academicspages">

        <div class="schedule-cover lectures-sechedule">
            <p>Lectures Schedule</p>
        </div>


        <?php
            foreach ($select as $data) {
            ?>
        <section class="iframe-section">
        
                <p class="schedule-title"><?php echo $data['ScheduleTitle']; ?></p>
                <div class="schedule-iframe-master">
                    <div class="responsive-iframe-wrapper">
                        <iframe src="../Schedules/files/<?php echo $data['ScheduleFile']; ?>">
                        </iframe>
                    </div>
                </div>
        </section>
        <?PHP } ?>

        <div class="text-center">
            <button id="more" class="load-more-btn btn">Load More</button>
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