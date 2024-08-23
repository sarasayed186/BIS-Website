<?php include "../shared/usnav.php";

if (isset($_GET['list'])) {
    $id = $_GET['list'];
    $select = $bis->query("SELECT * from p47_newsfile WHERE `newsId`=$id ");
}
$selectname = $bis->query("select * from p47_news where newsId=$id");
$i = mysqli_fetch_assoc($selectname);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/new-page.css">
    <link rel="stylesheet" href="styles/news.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>News | BIS</title>
</head>

<body>

    <!--==================MAIN CONTENT=====================-->

    <div class="news-cover">
        <p>BIS NEWS</p>
    </div>

    <section class="singe-new-sec">
        <div class="container">
            <div class="row vertical_content_manage">
                <div class="col-lg-6">
                    <div class="single-new-text mt-3">
                        <div class="new-date">
                            <i class="far fa-clock"></i>
                            <small><?php echo $i['dayDate'] ?></small>
                        </div>
                        <h3 class="new_heading mt-3">
                            <?php echo $i['newsTitle'] ?></h3>
                        <p class="new-desc mt-4">

                            <?php echo $i['newsDesc'] ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="new-img mt-3">
                        <img src="../news/mainPhoto/<?php echo $i['mainPhoto'] ?>" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!----------------GALLERY---------------------->
    <section id="gallery">
        <div class="container">
            <div id="image-gallery">
                <div class="row">
                    <?php
                    if (isset($select) && $select != '') {

                        foreach ($select as $data) {
                            if ($data['filetype'] == 'pdf') {
                    ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 thumb image">
                                    <div class="img-wrapper">
                                        <a target="_blank" href="../news/otherphotos/<?php echo $data['file_name']; ?>">
                                            <img title="<?php echo $data['file_name']; ?>" src="../news/otherphotos/PDF_file_icon.svg.png" class="img-thumbnail img-responsive">
                                        </a>

                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 thumb image">
                                    <div class="img-wrapper">
                                        <a href="../news/otherphotos/<?php echo $data['file_name']; ?>">
                                            <img src="../news/otherphotos/<?php echo $data['file_name']; ?>" class="img-thumbnail img-responsive">
                                        </a>
                                        <div class="img-overlay">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                    <?php }
                        }
                    } ?>





                </div>
            </div>
        </div>
    </section>

    <!----------------MORE NEWS---------------->
    <section class="news-page-cover" style="background-color: #fff;">
        <div class="news-page container">
            <div class="section-title">
                <div class="n-title" style="font-size: 30px;">More News</div>
            </div>

            <div class="row">
                <?php $selectRelate = $bis->query("SELECT * from p47_news WHERE `status`=1 and newsId!=$id order by dayDate desc limit 3");
                foreach ($selectRelate as $rel) { ?>

                    <div class="news-card hidden-card col-lg-4 col-md-12 border-bottom">
                        <a href="/gradproj/graduation%20Project/new-page.php?list=<?php echo $rel['newsId']; ?>" class="card-title"><?php echo $rel['newsTitle']; ?></a>
                        <div class="card-content">
                            <div>
                                <small class="card-desc"><?php echo $rel['newsDesc']; ?></small>
                                <div class="card-time">
                                    <i class="far fa-clock"></i>
                                    <small><?php echo $rel['dayDate']; ?></small>
                                </div>
                            </div>
                            <img class="img-fluid" src="../news/mainPhoto/<?php echo $rel['mainPhoto']; ?>" alt="">
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