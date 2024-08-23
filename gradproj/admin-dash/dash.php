<?php

include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";


?>


<html>

<head>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../styles/nav.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
   <title>Our Dash Board</title>

   <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
</head>

<body>

   <h1 class="header-table">Hey <?php echo $_SESSION['adminName'] ?></h1>
   <div class="container mt-4 main">
      <div class="row">


         <!-- highboard card -->
         <?php $highboard_approve = $bis->query("SELECT COUNT(`member_Id`) as num FROM `p47_highboard` Where `status`=1 ");
         $highapprove = mysqli_fetch_assoc($highboard_approve);
         $highboard_disable = $bis->query("SELECT COUNT(`member_Id`) as num FROM `p47_highboard` Where `status`=0 ");
         $highdisable = mysqli_fetch_assoc($highboard_disable);
         $highboard_all = $bis->query("SELECT COUNT(`member_Id`) as num FROM `p47_highboard`");
         $highall = mysqli_fetch_assoc($highboard_all);

         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons tw margin_bottom_30">
               <div class="social_icon">
                  <img src="images/highboard.svg" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">HighBoard</p>
                  <ul>
                     <li>
                        <span><strong><?php echo $highdisable['num'] ?></strong></span>
                        <span>Disabled</span>
                     </li>
                     <li>
                        <span><strong><?php echo $highapprove['num'] ?></strong></span>
                        <span>Approved</span>
                     </li>
                     <li>
                        <span><strong><?php echo $highall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/highboard/listMember.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="/gradproj/highboard/addMember.php" role="button">Add</a>
               </div>
            </div>
         </div>

         <!-- doctors -->
         <?php $admin_approve = $bis->query("SELECT COUNT(`DoctorCode`) as num FROM `doctors_account` Where `is_enable`='yes' ");
         $adminapprove = mysqli_fetch_assoc($admin_approve);
         $admin_disable = $bis->query("SELECT COUNT(`DoctorCode`) as num FROM `doctors_account` Where `is_enable`='no' ");
         $admindisable = mysqli_fetch_assoc($admin_disable);
         $adminboard_all = $bis->query("SELECT COUNT(`DoctorCode`) as num FROM `doctors_account`");
         $adminall = mysqli_fetch_assoc($adminboard_all);

         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons google_p margin_bottom_30">
               <div class="social_icon">
                  <img src="images/doctor.svg" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">Doctors</p>
                  <ul>
                     <li>
                        <span><strong><?php echo $admindisable['num'] ?></strong></span>
                        <span>Disabled</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminapprove['num'] ?></strong></span>
                        <span>Approved</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="http://localhost/gradproj/doctors/doctorsList.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="http://localhost/gradproj/doctors/addDoctor.php" role="button">Add</a>
               </div>
            </div>
         </div>
         <!-- Events card -->
         <?php $admin_approve = $bis->query("SELECT COUNT(`eventId`) as num FROM `p47_event` Where `status`=1 ");
         $adminapprove = mysqli_fetch_assoc($admin_approve);
         $admin_disable = $bis->query("SELECT COUNT(`eventId`) as num FROM `p47_event` Where `status`=0 ");
         $admindisable = mysqli_fetch_assoc($admin_disable);
         $adminboard_all = $bis->query("SELECT COUNT(`eventId`) as num FROM `p47_event`");
         $adminall = mysqli_fetch_assoc($adminboard_all);

         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons fb margin_bottom_30">
               <div class="social_icon">
                  <img src="images/event.svg" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">Events</p>
                  <ul>
                     <li>
                        <span><strong><?php echo $admindisable['num'] ?></strong></span>
                        <span>Disabled</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminapprove['num'] ?></strong></span>
                        <span>Approved</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/events/listevent.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="/gradproj/events/addEvent.php" role="button">Add</a>
               </div>
            </div>
         </div>
         <!-- careers card -->
         <?php $admin_approve = $bis->query("SELECT COUNT(`careerId`) as num FROM `p47_careers` Where `status`=1 ");
         $adminapprove = mysqli_fetch_assoc($admin_approve);
         $admin_disable = $bis->query("SELECT COUNT(`careerId`) as num FROM `p47_careers` Where `status`=0 ");
         $admindisable = mysqli_fetch_assoc($admin_disable);
         $adminboard_all = $bis->query("SELECT COUNT(`careerId`) as num FROM `p47_careers`");
         $adminall = mysqli_fetch_assoc($adminboard_all);

         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons tw margin_bottom_30">
               <div class="social_icon">
                  <img src="images/subjects.svg" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">Careers</p>
                  <ul>
                     <li>
                        <span><strong><?php echo $admindisable['num'] ?></strong></span>
                        <span>Disabled</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminapprove['num'] ?></strong></span>
                        <span>Approved</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/otherPages/listCareers.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="/gradproj/otherPages/careers.php" role="button">Add</a>
               </div>
            </div>
         </div>
         <!-- Albums -->
         <?php $admin_approve = $bis->query("SELECT COUNT(`albumId`) as num FROM `p47_album` Where `status`=1 ");
         $adminapprove = mysqli_fetch_assoc($admin_approve);
         $admin_disable = $bis->query("SELECT COUNT(`albumId`) as num FROM `p47_album` Where `status`=0 ");
         $admindisable = mysqli_fetch_assoc($admin_disable);
         $adminboard_all = $bis->query("SELECT COUNT(`albumId`) as num FROM `p47_album`");
         $adminall = mysqli_fetch_assoc($adminboard_all);

         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons linked margin_bottom_30">
               <div class="social_icon">
                  <img src="images/album.svg" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">Albums</p>
                  <ul>
                     <li>
                        <span><strong><?php echo $admindisable['num'] ?></strong></span>
                        <span>Disabled</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminapprove['num'] ?></strong></span>
                        <span>Approved</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/album/listalbums.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="/gradproj/album/insertAlbum.php" role="button">Add</a>
               </div>
            </div>
         </div>

         <!-- schedules -->
         <?php $admin_approve = $bis->query("SELECT COUNT(`ScheduleId`) as num FROM `p47_schedules` Where `status`=1 ");
         $adminapprove = mysqli_fetch_assoc($admin_approve);
         $admin_disable = $bis->query("SELECT COUNT(`ScheduleId`) as num FROM `p47_schedules` Where `status`=0 ");
         $admindisable = mysqli_fetch_assoc($admin_disable);
         $adminboard_all = $bis->query("SELECT COUNT(`ScheduleId`) as num FROM `p47_schedules`");
         $adminall = mysqli_fetch_assoc($adminboard_all);

         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons google_p margin_bottom_30">
               <div class="social_icon">
                  <img src="images/schedule.svg" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">Schedules</p>
                  <ul>
                     <li>
                        <span><strong><?php echo $admindisable['num'] ?></strong></span>
                        <span>Disabled</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminapprove['num'] ?></strong></span>
                        <span>Approved</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/Schedules/listSchedules.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="/gradproj/Schedules/addSchedule.php" role="button">Add</a>
               </div>
            </div>
         </div>
         <!-- News -->
         <?php $admin_approve = $bis->query("SELECT COUNT(`newsId`) as num FROM `p47_news` Where `status`=1 ");
         $adminapprove = mysqli_fetch_assoc($admin_approve);
         $admin_disable = $bis->query("SELECT COUNT(`newsId`) as num FROM `p47_news` Where `status`=0 ");
         $admindisable = mysqli_fetch_assoc($admin_disable);
         $adminboard_all = $bis->query("SELECT COUNT(`newsId`) as num FROM `p47_news`");
         $adminall = mysqli_fetch_assoc($adminboard_all);

         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons linked margin_bottom_30">
               <div class="social_icon">
                  <img src="images/studying-student-svgrepo-com.svg" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">News</p>
                  <ul>
                     <li>
                        <span><strong><?php echo $admindisable['num'] ?></strong></span>
                        <span>Disabled</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminapprove['num'] ?></strong></span>
                        <span>Approved</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/news/listNews.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="/gradproj/news/insertNews.php" role="button">Add</a>
               </div>
            </div>
         </div>
         <!-- FAQs -->
         <?php
         $adminboard_all = $bis->query("SELECT COUNT(`faqId`) as num FROM `p47_faqss`");
         $adminall = mysqli_fetch_assoc($adminboard_all);

         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons tw margin_bottom_30">
               <div class="social_icon">
                  <img src="images/check-svgrepo-com.svg" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">FAQs</p>
                  <ul>
                     <li>
                        <span><strong></strong></span>
                        <span>َ</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/faq/show.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="/gradproj/faq/addFAQ.php" role="button">Add</a>
               </div>
            </div>
         </div>
         <!-- Contact -->
         <?php
         $adminboard_all = $bis->query("SELECT COUNT(`contactId`) as num FROM `p47_contact`");
         $adminall = mysqli_fetch_assoc($adminboard_all);

         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons tw margin_bottom_30">
               <div class="social_icon">
                  <img src="images/contact.png" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">Contact Us</p>
                  <ul>
                     <li>
                        <span><strong></strong></span>
                        <span>َ</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/contact/contact.php" role="button">View</a>
               </div>
            </div>
         </div>

         <!-- student activity -->
         <?php
         $admin_approve = $bis->query("SELECT COUNT(`activityCode`) as num FROM `p47_studentacts` Where `status`=1 ");
         $adminapprove = mysqli_fetch_assoc($admin_approve);
         $admin_disable = $bis->query("SELECT COUNT(`activityCode`) as num FROM `p47_studentacts` Where `status`=0 ");
         $admindisable = mysqli_fetch_assoc($admin_disable);
         $adminboard_all = $bis->query("SELECT COUNT(`activityCode`) as num FROM `p47_studentacts`");
         $adminall = mysqli_fetch_assoc($adminboard_all);




         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons tw margin_bottom_30">
               <div class="social_icon">
                  <img src="images/student-activity.png" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">Student activities</p>
                  <ul>
                     <li>
                        <span><strong><?php echo $admindisable['num'] ?></strong></span>
                        <span>Disabled</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminapprove['num'] ?></strong></span>
                        <span>Approved</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/stuactivity/data.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="/gradproj/stuactivity/index.php" role="button">Add</a>
               </div>
            </div>
         </div>
         <!-- student Achievement -->
         <?php
         $admin_approve = $bis->query("SELECT COUNT(`achievementId`) as num FROM `p47_studentachievement` Where `status`=1 ");
         $adminapprove = mysqli_fetch_assoc($admin_approve);
         $admin_disable = $bis->query("SELECT COUNT(`achievementId`) as num FROM `p47_studentachievement` Where `status`=0 ");
         $admindisable = mysqli_fetch_assoc($admin_disable);
         $adminboard_all = $bis->query("SELECT COUNT(`achievementId`) as num FROM `p47_studentachievement`");
         $adminall = mysqli_fetch_assoc($adminboard_all);




         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons tw margin_bottom_30">
               <div class="social_icon">
                  <img src="images/achievemnt.png" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">Student achievement</p>
                  <ul>
                     <li>
                        <span><strong><?php echo $admindisable['num'] ?></strong></span>
                        <span>Disabled</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminapprove['num'] ?></strong></span>
                        <span>Approved</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/stuacheivement/show.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="/gradproj/stuacheivement/insertAcheivement.php" role="button">Add</a>
               </div>
            </div>
         </div>
  <!-- student honourboard -->
  <?php
        
         $adminboard_all = $bis->query("SELECT COUNT(`stuId`) as num FROM `p47_beststudents`");
         $adminall = mysqli_fetch_assoc($adminboard_all);




         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons tw margin_bottom_30">
               <div class="social_icon">
                  <img src="images/top-student.png" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">Best Students</p>
                  <ul>
                  <li>
                        <span><strong></strong></span>
                        <span>َ</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/bestStudents/listHboard.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="/gradproj/bestStudents/insertHboard.php" role="button">Add</a>
               </div>
            </div>
         </div>


           <!-- Dean -->
           
         <?php
         $admin_approve = $bis->query("SELECT COUNT(`deanId`) as num FROM `p47_dean` Where `status`=1 ");
         $adminapprove = mysqli_fetch_assoc($admin_approve);
         $admin_disable = $bis->query("SELECT COUNT(`deanId`) as num FROM `p47_dean` Where `status`=0 ");
         $admindisable = mysqli_fetch_assoc($admin_disable);
         $adminboard_all = $bis->query("SELECT COUNT(`deanId`) as num FROM `p47_dean`");
         $adminall = mysqli_fetch_assoc($adminboard_all);




         ?>
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="full socile_icons tw margin_bottom_30">
               <div class="social_icon">
                  <img src="images/dean.png" class="icon">
                  <i class="fa fa-facebook"></i>
               </div>
               <div class="social_cont">
                  <p class="header-prag">Dean</p>
                  <ul>
                     <li>
                        <span><strong><?php echo $admindisable['num'] ?></strong></span>
                        <span>Disabled</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminapprove['num'] ?></strong></span>
                        <span>Approved</span>
                     </li>
                     <li>
                        <span><strong><?php echo $adminall['num'] ?></strong></span>
                        <span>All</span>
                     </li>
                  </ul>
               </div>
               <div class="dash-btn">
                  <a name="" id="" class="btn btn-primary btn-1" href="/gradproj/dean/listDean.php" role="button">View</a>
                  <a name="" id="" class="btn btn-danger btn-2" href="/gradproj/dean/addDean.php" role="button">Add</a>
               </div>
            </div>
         </div>

      </div>
   </div>



   <script src="../js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

   <script src="../js/jquery.js"></script>
</body>

</html>