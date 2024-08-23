<?php include "../shared/usnav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles/FAQs.css">
  <link rel="stylesheet" href="styles/navbar.css">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>FAQs | BIS</title>
</head>

<body>
  <!--==================navigation=====================-->

  <!--==================FAQs==================-->

  <div class="faqs-cover">
    <p>FAQs</p>
  </div>

  <section class="faqs-sec">
    <div class="accordion">
      <h3 class="accordion__heading">Frequently Asked <span>Questions</span></h3>
      <?php $SQL = "SELECT * FROM p47_faqss";
        $result = mysqli_query($bis,$SQL);
        
        foreach ($result as $faqd) { ?>
      <div class="accordion__item">
        <button class="accordion__btn">
          <span class="accordion__caption"><i class="far fa-lightbulb"></i>        <?php echo $faqd['faqTitle']; ?></span>
          <span class="accordion__icon"><i class="fa fa-plus"></i></span>
        </button>
        <div class="accordion__content">
          <p><?php echo $faqd['faqResponse']  ; ?></p>
        </div>
      </div>
      <?php }  ?>




    

    </div>
  </section>

  <!--==============BACK-TO-TOP BUTTON=============-->
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