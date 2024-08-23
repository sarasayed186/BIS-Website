<?php include "../shared/usnav.php";
if (isset($_GET['list'])) {
    $id = $_GET['list'];
    $selectt = $bis->query("SELECT `id`,p47_event.eventId,`file_name`,`filetype` from p47_event JOIN p47_eventfile on p47_event.eventId=p47_eventfile.eventId where p47_eventfile.eventId=$id ");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/event-page.css">
    <link rel="stylesheet" href="styles/events.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Events | BIS</title>
</head>

<body>
    <!--==================navigation=====================-->

    <!--==================MAIN CONTENT=====================-->

    <div class="events-cover">
        <p>BIS EVENTS</p>
    </div>
    <?php
    $select = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId where p47_event.eventId=$id ");

    foreach ($select as $data) {
        $cate = $data['categoryName'];
    ?>
        <section class="singe-event-sec">
            <div class="container">
                <div class="row vertical_content_manage">
                    <div class="col-lg-6">
                        <div class="single-event-text mt-3">
                            <div class="event-date">
                                <i class="far fa-calendar"></i>
                                <small><?php echo $data['eventDatee']; ?></small>
                            </div>
                            <h3 class="event_heading mt-3">
                                <?php echo $data['eventTitle']; ?></h3>
                            <p class="event-desc mt-4">
                                <?php echo $data['eventDesc']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="event-img mt-3">
                            <img src="../events/mainPhoto/<?php echo $data['mainPhoto']; ?>" alt="" class="img-fluid mx-auto d-block">
                            <div class="category bottom-right-tag text-uppercase"><a><?php echo $data['categoryName']; ?></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!----------------GALLERY-------------->
        <section id="gallery">
            <div class="container">
                <div id="image-gallery">
                    <div class="row">
                        <?php foreach ($selectt as $dataa) {

                            if ($dataa['filetype'] == 'pdf') {



                        ?>


                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 thumb image">
                                    <div class="img-wrapper">
                                        <a href="../events/filelocation/<?php echo $dataa['file_name']; ?>">
                                            <img src="../events/filelocation/PDF_file_icon.svg.png ?>" class="img-thumbnail img-responsive">
                                        </a>

                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 thumb image">
                                    <div class="img-wrapper">
                                        <a href="../events/filelocation/<?php echo $dataa['file_name']; ?>">
                                            <img src="../events/filelocation/<?php echo $dataa['file_name']; ?>" class="img-thumbnail img-responsive">
                                        </a>
                                        <div class="img-overlay">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>

                </div>

            </div>
        <?php } ?>

        </section>

        <!----------------RELATED EVENTS-------------->
        <section class="events-page" style="background-color: #fff;">
            <div class="container-lg">

                <div class="section-title">
                    <div class="n-title" style="font-size: 30px;">Related Events</div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g4 align-stretch">
                    <?php
                    $selects = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId where `status`=1 and categoryName='$cate' and eventId !=$id ORDER BY `eventDatee` DESC limit 3  ");
                    foreach ($selects as $datas) {
                    ?>
                        <div class="col event-card  hidden-card">
                            <div class="card shadow-sm h-100">
                                <div class="card-image">
                                    <img src="../events/mainPhoto/<?php echo $datas['mainPhoto']; ?>" class="card-img-top" alt="...">
                                    <div class="category bottom-right-tag text-uppercase"><a><?php echo $datas['categoryName']; ?></a></div>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $datas['eventTitle']; ?></h3>
                                    <p class="card-text">
                                        <?php echo $datas['eventDesc']; ?>
                                    </p>
                                </div>
                                <div class="card-footer py-3">
                                    <div class="card-footer__info">
                                        <span><i class="far fa-calendar-alt"></i> <?php echo $datas['eventDatee']; ?></span>
                                        <span class="read-more">
                                            <a class="text-uppercase read-more-1" href="event-Page.php?list=<?php echo $datas['eventId']; ?>">Read more </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    

                  
                </div>
            </div>
        </section>

        <!--===============BACK-TO-TOP BUTTON==============-->
        <a id="backToTop" class="back-to-top-btn" style="display:none;">
            <i class="fas fa-arrow-up arrow-up-icon"></i>
        </a>
        <!--==================FOOTER==================-->

         
  <?php include "../shared/footer.php";
?> 

        <!--==================JAVASCRIPT====================-->
        <script src="js/jquery-3.6.4.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/mainjs.js"></script>
</body>

</html>