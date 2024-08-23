<?php include "../shared/usnav.php";
if (isset($_POST['sort_by'])) {
  $sort_by = $_POST['sort_by'];
} else {
  $sort_by = 'new';
}

// Construct the SQL query based on the selected sorting option
if ($sort_by == 'new') {
  $news = $bis->query("SELECT * from p47_news where `status`=1 ORDER BY `currentDate` DESC ");
} else if ($sort_by == 'old') {
  $news = $bis->query("SELECT * from p47_news where `status`=1 ORDER BY `currentDate` ASC ");
} else if ($sort_by == 'students') {
  $news = $bis->query("SELECT * from p47_news where `status`=1 AND `news_Importance`=0 ORDER BY `currentDate` DESC ");
} else if ($sort_by == 'all') {
  $news = $bis->query("SELECT * from p47_news where `status`=1 AND `news_Importance`=1 ORDER BY `currentDate` DESC ");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles/news.css">
  <link rel="stylesheet" href="styles/navbar.css">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title> News | BIS</title>
</head>

<body>
  <!--==================navigation=====================-->

  <!--==================NEWS=====================-->
  <div class="news-cover">
    <p>BIS NEWS</p>
  </div>
  <section class="news-page-cover">
    <div class="news-page container">
      <div class="section-title">
        <div class="n-title">News</div>

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
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <h6 class="dropdown-header">Type</h6>
                </li>
                <li>
                  <label class="dropdown-item">
                    <input type="radio" name="sort_by" value="students" <?php if ($sort_by == 'students') echo 'checked'; ?>>For Students
                  </label>
                </li>
                <li>
                  <label class="dropdown-item">
                    <input type="radio" name="sort_by" value="all" <?php if ($sort_by == 'all') echo 'checked'; ?>>For All
                  </label>
                </li>
              </ul>
            </div>
            <button type="button" class="reset-btn btn btn btn-default  filter-btn" onclick="resetSort()">Reset</button>

            <button type="submit" class="showall-btn btn">Show Results</button>
          </form>
        </div>
      </div>

      <div class="row">
        <?php foreach ($news as $data) { ?>
          <div class="news-card hidden-card col-lg-4 col-md-6 border-bottom">
            <a href="/gradproj/graduation%20Project/new-page.php?list=<?php echo $data['newsId']; ?>" class="card-title"><?php echo $data['newsTitle']; ?></a>
            <div class="card-content">
              <div>
                <small class="card-desc"><?php echo $data['newsDesc']; ?>.</small>
                <div class="card-time">
                  <i class="far fa-clock"></i>
                  <small><?php echo $data['dayDate']; ?></small>
                </div>
              </div>
              <img class="img-fluid" src="../news/mainPhoto/<?php echo $data['mainPhoto']; ?>" alt="">
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="text-center">

      <button id="load-btn" class="load-more-btn btn">Load More</button>
    </div>
    </div>
  </section>

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