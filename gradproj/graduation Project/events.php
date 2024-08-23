<?php include "../shared/usnav.php";
if (isset($_POST['sort_by'])) {
  $sort_by = $_POST['sort_by'];
} else {
  $sort_by = 'new';
}

// Construct the SQL query with the corresponding ORDER BY clause
if ($sort_by == 'new') {
  $query = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId where `status`=1 ORDER BY `eventDatee` DESC");
} else if ($sort_by == 'old') {
  $query = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId where `status`=1 ORDER BY `eventDatee` ASC");
} else if ($sort_by == 'entertainment') {
  $query = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId where `status`=1 AND categoryName='entertainment'");
} else if ($sort_by == 'sports') {
  $query = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId where `status`=1 AND categoryName='sports'");
} else if ($sort_by == 'comptetions') {
  $query = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId where `status`=1 AND categoryName='comptetions'");
} else if ($sort_by == 'Student Acts') {
  $query = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId where `status`=1 AND categoryName='Student Acts'");
} else if ($sort_by == 'oriants') {
  $query = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId where `status`=1 AND categoryName='oriants'");
} else if ($sort_by == 'Eftaar') {
  $query = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId where `status`=1 AND categoryName='Eftaar'");
}

// Execute the query and retrieve the sorted events

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles/events.css">
  <link rel="stylesheet" href="styles/navbar.css">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title> Events | BIS</title>
</head>

<body>
  <!--==================navigation=====================-->

  <!--==================EVENTS=====================-->
  <div class="events-cover">
    <p>BIS EVENTS</p>
  </div>

  <section class="events-page">
    <div class="container-lg">

      <div class="section-title">
        <div class="n-title">Events</div>
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
                  <h6 class="dropdown-header">Category</h6>
                </li>
                <li>
                  <label class="dropdown-item">
                    <input type="radio" name="sort_by" value="entertainment" <?php if ($sort_by == 'entertainment') echo 'checked'; ?>>entertainment
                  </label>
                </li>
                <li>
                  <!-- entertainment sports comptetions Student Acts oriants Eftaar -->

                  <label class="dropdown-item">
                    <input type="radio" name="sort_by" value="sports" <?php if ($sort_by == 'sports') echo 'checked'; ?>>sports
                  </label>
                </li>
                <li>
                  <label class="dropdown-item">
                    <input type="radio" name="sort_by" value="comptetions" <?php if ($sort_by == 'comptetions') echo 'checked'; ?>>comptetions
                  </label>
                </li>
                <li>
                  <label class="dropdown-item">
                    <input type="radio" name="sort_by" value="Student Acts" <?php if ($sort_by == 'Student Acts') echo 'checked'; ?>>Student Acts
                  </label>
                </li>
                <li>
                  <label class="dropdown-item">
                    <input type="radio" name="sort_by" value="oriants" <?php if ($sort_by == 'oriants') echo 'checked'; ?>>oriants
                  </label>
                </li>
                <li>
                  <label class="dropdown-item">
                    <input type="radio" name="sort_by" value="Eftaar" <?php if ($sort_by == 'Eftaar') echo 'checked'; ?>>Eftaar
                  </label>
                </li>

              </ul>
            </div>
            <button type="button" class="reset-btn btn btn btn-default  filter-btn" onclick="resetSort()">Reset</button>

            <button type="submit" class="showall-btn btn">Show Results</button>
          </form>
        </div>
      </div>

      <!-- hh -->

      <div class="row row-cols-1 row-cols-md-3 g4">
        <?php
        foreach ($query as $data) {
        ?>
          <div class="col event-card  hidden-card">
            <div class="card shadow-sm h-100">
              <div class="card-image">
                <img src="../events/mainPhoto/<?php echo $data['mainPhoto']; ?>" class="card-img-top" alt="...">
                <div class="category bottom-right-tag text-uppercase"><a><?php echo $data['categoryName']; ?></a></div>
              </div>
              <div class="card-body">
                <h3 class="card-title"><?php echo $data['eventTitle']; ?></h3>
                <p class="card-text">
                  <?php echo $data['eventDesc']; ?>
                </p>
              </div>
              <div class="card-footer py-3">
                <div class="card-footer__info">
                  <span><i class="far fa-calendar-alt"></i> <?php echo $data['eventDatee']; ?></span>
                  <span class="read-more">
                    <a class="text-uppercase read-more-1" href="event-Page.php?list=<?php echo $data['eventId']; ?>">Read more </a>
                  </span>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>




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