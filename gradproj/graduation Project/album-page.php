<?php include "../shared/usnav.php";

if (isset($_GET['list'])) {
    $id = $_GET['list'];
    $select = $bis->query("SELECT * from p47_albumfile WHERE albumId=$id ");
  }
   $selectq = $bis->query("SELECT * from `p47_album` WHERE `albumId`=$id ");
  $i = mysqli_fetch_assoc($selectq); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/album-page.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>ALBUMS | BIS</title>
</head>

<body>
    <!--==================navigation=====================-->

    <!--================ALBUM PAGE CONTENT==============-->
    <div class="albums-cover">
        <p>BIS ALBUMS</p>
    </div>
    <section class="album-head-sec">
        <div class="container">
            <div class="text">
                <h2><?php echo $i['albumTitle'] ?>
                    <p>
                    <?php echo $i['albumDesc'] ?>
                    </p>
                </h2>
            </div>
        </div>
    </section>
    <!----------------GALLERY---------------------->
    <section id="gallery">
        <div class="container">
            <div id="image-gallery">
                <p class="text-left">Gallery</p>
                <div class="row">
                <?php foreach ($select as $data) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 thumb image hidden-card">
                        <div class="img-wrapper">
                            <a href="../album/albumFiles/<?php echo $data['file_name']; ?>">
                                <img src="../album/albumFiles/<?php echo $data['file_name']; ?>"
                                    class="img-thumbnail img-responsive">
                            </a>
                            <div class="img-overlay">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <div class="img-date">
                                    <i class="far fa-clock"></i>
                                    <small><?php echo $data['uploade_on']; ?></small>
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

    <!--==============BACK-TO-TOP BUTTON============-->
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