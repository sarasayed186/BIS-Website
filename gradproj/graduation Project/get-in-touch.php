<?php include "../shared/usnav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles/get-in-touch.css">
  <link rel="stylesheet" href="styles/navbar.css">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Get In Touch | BIS</title>
</head>

<body>
  <!--==================navigation=====================-->

<!--==================STUDENTS CONTENT==================-->
<?php if (isset($_POST['submit'])) {
  // Retrieve the form data using the $_POST superglobal array
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
 // Prepare the SQL statement with placeholders
// contactId	userName	userMail	phone	question	date	


 $stmt = $bis->prepare("INSERT INTO p47_contact (userName, userMail, phone, subject, question) VALUES (?, ?, ?, ?, ?)");

 // Bind the form data to the placeholders in the SQL statement
 $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

 // Execute the SQL statement
 if ($stmt->execute()) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Thank you, your message has been sent successfully!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'; } else {
   echo "Error: " . $stmt->error;
 }

 // Close the statement and the database connection
 $stmt->close();
 $bis->close();
}
?>
<section class="get-in-touch-sec">
<div class="container">
  <div class="section-contact">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
        <div class="header-section text-center">
          <h2 class="title">Get In Touch
            <span class="big-title">CONTACT</span>
          </h2>
          <p class="description">Feel Free to contact us any time.
            We will get back to you as soon as we can.</p>
        </div>
      </div>
    </div>
    <div class="form-contact">
      <form method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="single-input">
              <i class="fas fa-user"></i>
              <input type="text" name="name" placeholder="ENTER YOUR FULL NAME" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single-input">
              <i class="fas fa-envelope"></i>
              <input type="text" name="email" placeholder="ENTER YOUR EMAIL"required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single-input">
              <i class="fas fa-phone"></i>
              <input type="text" name="phone" pattern="^01[0-2]{1}[0-9]{8}$" required placeholder="ENTER YOUR PHONE NUMBER">
            </div>
          </div>
          <div class="col-md-6">
            <div class="single-input">
              <i class="fas fa-check"></i>
              <input type="text" name="subject" placeholder="ENTER YOUR SUBJECT" required>
            </div>
          </div>
          <div class="col-12">
            <div class="single-input">
              <i class="fas fa-comment-dots"></i>
              <textarea placeholder="ENTER YOUR MESSAGE" required name="message"></textarea>
            </div>
          </div>
          <div class="col-12">
            <div class="submit-input text-center">
              <input type="submit" name="submit" value="SUBMIT NOW">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</section>

<section class="map_sec">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="map_inner">
                  <h3>Find Us on Google Map</h3>
                  <div class="map_bind">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13811.138816595145!2d31.220952!3d30.0717052!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840fc5cf0dcfb%3A0x5c8b8a3b52b6bcbc!2z2YPZhNmK2Kkg2KfZhNiq2KzYp9ix2Kkg2YjYpdiv2KfYsdipINin2YTYo9i52YXYp9mEINis2KfZhdi52Kkg2K3ZhNmI2KfZhg!5e0!3m2!1sar!2seg!4v1686531439562!5m2!1sar!2seg" 
                      width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                  </div>
              </div>
          </div>
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
</body>

</html>