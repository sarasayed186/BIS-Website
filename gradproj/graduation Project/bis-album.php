<?php include "../shared/usnav.php";
if (isset($_POST['sort_by'])) {
    $sort_by = $_POST['sort_by'];
} else {
    $sort_by = 'new';
}

// Construct the SQL query based on the selected sorting option
if ($sort_by == 'new') {
    $news = $bis->query("SELECT * from p47_album where `status`=1 ORDER BY `uploadDate` DESC ");
} else if ($sort_by == 'old') {
    $news = $bis->query("SELECT * from p47_album where `status`=1 ORDER BY `uploadDate` ASC ");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/bis-album.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>ALBUMS | BIS</title>
</head>

<body>
    <!--==================navigation=====================-->

    <!--================BIS ALBUM==============-->
    <div class="albums-cover">
        <p>BIS ALBUMS</p>
    </div>

    <section class="albums-page">
        <div class="container-lg">

            <div class="section-title">
                <div class="n-title">ALBUMS</div>
                <div>
                    <form method="post">
                        <div class="btn-group dropdown">
                            <button type="button" class="btn btn-default dropdown-toggle filter-btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <h6 class="dropdown-header">Date</h6>
                                </li>
                                <li>
                                    <label class="dropdown-item">
                                        <input type="radio" name="sort_by" value="new" <?php if ($sort_by == 'new') echo 'checked'; ?>>New → Old
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item">
                                        <input type="radio" name="sort_by" value="old" <?php if ($sort_by == 'old') echo 'checked'; ?>>Old → New
                                    </label>
                                </li>



                            </ul>
                        </div>
                        <button type="button" class="reset-btn btn btn btn-default  filter-btn" onclick="resetSort()">Reset</button>

                        <button type="submit" class="showall-btn btn">Show Results</button>
                    </form>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g4" style="margin-top: -20px;">
                <?php
                $select = $bis->query("SELECT * from p47_album where `status`=1 ORDER BY `uploadDate` desc  ");

                foreach ($news as $data) {
                ?>
                    <div class="col hidden-card">
                        <a href="album-page.php?list=<?php echo $data['albumId']; ?>" class="card album-card">
                            <div class="card-image">

                                <img src="../album/albumcover/<?php echo $data['mainPhoto']; ?>" class="card-img" alt="...">
                            </div>
                            <b href="#" class="card-title">
                                <?php echo $data['albumTitle']; ?>
                            </b>
                        </a>
                    </div>
                <?php } ?>








            </div>

            <div class="text-center">
                <button id="load-btn" class="load-more-btn btn">Load More</button>
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
    <script>
        function resetSort() {
            document.getElementsByName('sort_by').forEach((el) => {
                el.checked = false;
            });
            document.querySelector('form').submit();
        }
    </script>
</body>

</html>