<?php 
include "../Connections/syscon.php";

?>
<div class="navigation-wrapper">
    <div class="navigation-container">

      <div id="top-search">
        <form action="" method="get">
          <div class="input-box">
            <button class="topser-btn" name="search" type="search"><span class="topser-icon">⚲</span></button>
            <input type="text" class="search" name="searchs" placeholder="Search...">
            <span id="topsercross-icon"></span>
          </div>
        </form>
      </div>

      <div class="header">

        <div class="logo">
          <a href="home.php"><img src="images/nav-logo.png"></a>
        </div>

        <div class="navigation">
          <ul id="menu">
            <li>
              <a href="#" class="droptoggle">
                about bis <span class="down-arrow">🢓</span>
              </a>
              <ul class="submanu">
                <li><a href="about-us.php">bis profile</a></li>
                <li><a href="program-overview.php">PROGRAM OVERVIEW</a></li>
            
                <li><a href="bis-album.php">bis albums</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="droptoggle">
                faculty <span class="down-arrow">🢓</span>
              </a>
              <ul class="submanu">
                <li><a href="meet-the-dean.php">meet the dean</a></li>
                <li><a href="council-members.php">council members</a></li>
                <li><a href="staff-members.php">staff members</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="droptoggle">
                admission <span class="down-arrow">🢓</span>
              </a>
              <ul class="submanu">
                <li><a href="how-to-apply.php">how to apply</a></li>
                <li><a href="admission.php">admission requirements</a></li>
          
                <li><a href="FAQs.php">faqs</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="droptoggle">
                academics <span class="down-arrow">🢓</span>
              </a>
              <ul class="submanu">
                <li><a href="academic-calendar.php">academic calendar</a></li>
                <li>
                  <a href="#" class="sub-sub-drop">
                    lectures schedules<span class="arrow-right">❯</span>
                  </a>
                  <ul class="sub-sub-menu">
                    <li><a href="lectures-schedules.php?lvl=1">level 1</a></li>
                    <li><a href="lectures-schedules.php?lvl=2">level 2</a></li>
                    <li><a href="lectures-schedules.php?lvl=3">level 3</a></li>
                    <li><a href="lectures-schedules.php?lvl=4">level 4</a></li>
                    <li><a href="halls-schedule.php">halls schedule</a></li>
                  </ul>
                </li>
                <li><a href="exams-schedules.php">exams schedules</a></li>
                <li><a href="lvl1-guideline.php">LVL1 guideline</a></li>
              </ul>
            </li>
            <li><a href="students.php">students</a></li>
            <li>
              <a href="#" class="droptoggle">
                alumni <span class="down-arrow">🢓</span>
              </a>
              <ul class="submanu">
                <li><a href="pbis.php">post-graduate programs</a></li>
                <li><a href="careers.php">careers opportunities</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="ser-btn">
          <ul>
            <li><a href="#0"><span id="ser-btn-icon"></span></a></li>
            <li class="touch-btn"><a href="get-in-touch.php">get in touch</a></li>
            <li id="bar-icon"><a href="#0">☰</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>