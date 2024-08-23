<?php include "../shared/usnav.php";
// Include the database connection file

// Retrieve the data from the table
$sql = "SELECT * FROM p47_bisNumbers ORDER BY id DESC LIMIT 1";
$result = $bis->query($sql);

if ($result->num_rows > 0) {
  $rown = $result->fetch_assoc();
  $staff_members = $rown['staff_members'];
  $under_graduates = $rown['under_graduates'];
  $graduates = $rown['graduates'];
  $post_graduates = $rown['post_graduates'];
} else {
  $staff_members = 0;
  $under_graduates = 0;
  $graduates = 0;
  $post_graduates = 0;
}

// Close the database connection
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles/home.css">
  <link rel="stylesheet" href="styles/navbar.css">
  <link rel="stylesheet" href="styles/footer.css">

  <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Home Page | BIS</title>
</head>

<body>
  <!--==================navigation=====================-->

  <!--==================SLIDESHOW=====================-->


  <section id="slideshow">
    <div class="slider">
      <div class="slide current">
        <div class="content">
          <h1>BIS Program</h1>
          <p>
            Preparing students for success in a changing world.
          </p>
        </div>
      </div>

      <div class="slide">
        <div class="content">
          <h1>BIS Program</h1>
          <p>
            A community of scholars, learners, and mentors. </p>
        </div>
      </div>

      <div class="slide">
        <div class="content">
          <h1>BIS Program</h1>
          <p>
            An intellectual community of diverse perspectives. </p>
        </div>
      </div>

      <div class="slide">
        <div class="content">
          <h1>BIS Program</h1>
          <p>
            A culture of academic excellence.
          </p>
        </div>
      </div>

      <div class="slide">
        <div class="content">
          <h1>BIS Program</h1>
          <p>
            Unlocking potential through education </p>
        </div>
      </div>
    </div>

    <div class="onoffswitch">
      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
      <label class="onoffswitch-label" for="myonoffswitch">Auto</label>
    </div>

    <div class="buttons">
      <button id="prev"><i class="fas fa-arrow-left"></i></button>
      <button id="next"><i class="fas fa-arrow-right"></i></button>
    </div>
  </section>

  <!--==================WHYBIS?=====================-->

  <section class="whysec">
    <div class="whycontainer row">
      <div class="whytxt col-lg-6">
        <h1>why bis ?</h1>
        <p>BIS program is a program that links the fields of information systems,
          administrative and financial sciences,
          and it is the first BIS program in Egypt. <br><br>
          This program is working to achieve excellence
          in the field of business information systems,
          keep pace with the continuous and rapid technological development in the labor market,
          and participate in achieving the Egyptian state's vision 2030 towards digital transformation.<br><br>
          Studying in this program is a unique combination of the most important
          and most important courses in keeping with the needs of the labor market locally,
          regionally and globally in the field of business and business technology. <br></p>
        <a href="#" class="btn btn-outline-light">Read More</a>
      </div>
      <div class="col-lg-6">
        <video class="shadow" controls loop poster="">
          <source src="videos/whybis.mp4" type="video/mp4">
        </video>
      </div>
    </div>
  </section>
  <!--==================BIS IN NUMBERS==================-->

  <section id="BisCounter" class="Countersec">
    <h1>BIS in Numbers</h1>
    <div class="align">
      <div class="fullWidth eight columns">
        <div class="BisCounterWrap ">
          <div class="item wow fadeInUpBig animated animated" style="visibility: visible;">
            <i class="fa fa-users"></i>
            <p id="staff-members" class="number">0</p>
            <p>staff members</p>
          </div>
          <div class="item wow fadeInUpBig animated animated" style="visibility: visible;">
            <i class="fa fa-book-reader"></i>
            <p id="under-graduates" class="number">0</p>
            <p>under-graduates</p>
          </div>
          <div class="item wow fadeInUpBig animated animated" style="visibility: visible;">
            <i class="fa fa-graduation-cap"></i>
            <p id="graduates" class="number">0</p>
            <p>graduates</p>
          </div>
          <div class="item wow fadeInUpBig animated animated" style="visibility: visible;">
            <i class="fa fa-user-graduate"></i>
            <p id="post-graduates" class="number">0</p>
            <p>post-graduates</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--==================PART OF NEWS===================-->
  <section class="news-section-cover">
    <div class="news-section container">
      <div class="section-title">
        <div class="n-title">latest news</div>
        <a href="news.php" class="viewall-btn btn">View All</a>
      </div>

      <div class="row">
        <?php
        $news = $bis->query("SELECT * from p47_news where `status`=1 ORDER BY `currentDate` DESC limit 6 ");

        foreach ($news as $data) {
        ?>
          <div class="news-card col-lg-4 col-md-6 border-bottom">
            <a href="/gradproj/graduation%20Project/new-page.php?list=<?php echo $data['newsId']; ?>" class="card-title"><?php echo $data['newsTitle']; ?></a>
            <div class="card-content">
              <div>
                <small class="card-desc"><?php echo $data['newsDesc']; ?></small>
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
  </section>

  <!--==================PART OF EVENTS===================-->

  <section class="events-section">
    <div class="container-lg">

      <div class="container px-0">
        <div class="row">
          <div class="col">
            <p class="title-section">EVENTS</p>
          </div>
          <div class="col">
            <span class="title-section d-flex justify-content-end">
              <a class="btn viewall-btn btn-sm" href="events.php" role="button">View All</a>
            </span>
          </div>
        </div>
      </div>


      <div class="row row-cols-1 row-cols-md-3 g4">
        <?php
        $select = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId where `status`=1 ORDER BY `eventDatee` DESC limit 3  ");
        foreach ($select as $data) {
        ?>
          <div class="col event-card">
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
        <?php }
        ?>





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
  <script type="text/javascript">
    $.fn.jQuerySimpleCounter = function(options) {
      var settings = $.extend({
        start: 0,
        end: 100,
        easing: 'swing',
        duration: 400,
        complete: ''
      }, options);

      var thisElement = $(this);

      $({
        count: settings.start
      }).animate({
        count: settings.end
      }, {
        duration: settings.duration,
        easing: settings.easing,
        step: function() {
          var mathCount = Math.ceil(this.count);
          thisElement.text(mathCount);
        },
        complete: settings.complete
      });
    };

    $('#staff-members').jQuerySimpleCounter({
      end: <?php echo $staff_members ?>,
      duration: 2000
    });
    $('#under-graduates').jQuerySimpleCounter({
      end: 5000,
      duration: 3000
    });
    $('#graduates').jQuerySimpleCounter({
      end: <?php echo $graduates ?>,
      duration: 3000
    });
    $('#post-graduates').jQuerySimpleCounter({
      end: <?php echo $post_graduates ?>,
      duration: 2500
    });
  </script>
</body>

</html>