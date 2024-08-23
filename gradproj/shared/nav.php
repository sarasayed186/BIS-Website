<?php
session_start();
ob_start();
if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
}


?>

<html>

<head>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">


  </head>





<body>

  <nav class="navbar navbar-expand-md navbar-light ">
    <div class="container">
      <div class="logo">
        <a class="navbar-brand" target="_blank" href="../graduation Project/home.php"><img src="../graduation Project/images/nav-logo.png" alt=""></a>
      </div>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <?php
          if (isset($_SESSION['admin'])) {
          ?>
            <li class="nav-item">
              <a class="nav-link active" href="../admin-dash/dash.php" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events</a>

              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="../events/addEvent.php">Add event</a>
                <a class="dropdown-item" href="../events/listevent.php">List events</a>


              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">albums</a>

              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="../album/insertAlbum.php">Add Album</a>
                <a class="dropdown-item" href="../album/listalbums.php">List Album</a>


              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>

              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="../news/insertNews.php">Add News</a>
                <a class="dropdown-item" href="../news/listNews.php">List News</a>


              </div>
            </li>
          
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Student Activity</a>

        <div class="dropdown-menu" aria-labelledby="dropdownId">
          <a class="dropdown-item" href="../stuactivity/index.php">Add Student Activity</a>
          <a class="dropdown-item" href="../stuactivity/data.php">List Student Activity</a>


        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Doctor</a>

        <div class="dropdown-menu" aria-labelledby="dropdownId">
          <a class="dropdown-item" href="../doctors/addDoctor.php">Add Doctor</a>
          <a class="dropdown-item" href="../doctors/doctorsList.php">List Doctors</a>
          <a class="dropdown-item" href="../highboard/addMember.php">Add Highboard Member</a>
          <a class="dropdown-item" href="../highboard/listMember.php">List Highboard Members</a>
          <a class="dropdown-item" href="../dean/addDean.php">Add Dean</a>
          <a class="dropdown-item" href="../dean/listDean.php">List Dean</a>


        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Student Achievement</a>

        <div class="dropdown-menu" aria-labelledby="dropdownId">
          <a class="dropdown-item" href="../stuacheivement/insertAcheivement.php">Add Achievement</a>
          <a class="dropdown-item" href="../stuacheivement/show.php">List Achievement</a>


        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Schedules </a>

        <div class="dropdown-menu" aria-labelledby="dropdownId">
          <a class="dropdown-item" href="../Schedules/addSchedule.php">Add Schedule</a>
          <a class="dropdown-item" href="../Schedules/listSchedules.php">List Schedule</a>


        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Best Student </a>

        <div class="dropdown-menu" aria-labelledby="dropdownId">
          <a class="dropdown-item" href="../bestStudents/insertHboard.php">Add Student</a>
          <a class="dropdown-item" href="../bestStudents/listHboard.php">List Students</a>


        </div>
      </li>
      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Other Pages</a>

              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="../otherPages/careers.php">Add Career</a>

                <a class="dropdown-item" href="../otherPages/listCareers.php">List Careers</a>
              <hr class="dropdown-divider">

            <a class="dropdown-item" href="../otherPages/bisCounter.php">Add Counter</a>
            <hr class="dropdown-divider">
            <a class="dropdown-item" href="../faq/addFAQ.php">Add FAQS</a>
          <a class="dropdown-item" href="../faq/show.php">List FAQS</a>
          <hr class="dropdown-divider">

          <a class="dropdown-item" href="../contact/contact.php">List Questions</a>



      </div>
      </li>
    
      <form action="" method="post">
        <button type="submit" name="logout" class="btn btn-outline-primary">Log out</button>

      </form>
    <?php } ?>
    </ul>

    </div>
    </div>
  </nav>

















</body>

<!--==================navigation=====================-->