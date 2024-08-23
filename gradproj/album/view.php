<?php 
include "../Connections/syscon.php";
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.6.4.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <title> News | BIS</title>
  <style>
/* CSS for responsive iframe */
/* ========================= */

/* outer wrapper: set max-width & max-height; max-height greater than padding-bottom % will be ineffective and height will = padding-bottom % of max-width */
#Iframe-Master-CC-and-Rs {
  max-width: 512px;
  max-height: 100%; 
  overflow: hidden;
}

/* inner wrapper: make responsive */
.responsive-wrapper {
  position: relative;
  height: 0;    /* gets height from padding-bottom */
  
  /* put following styles (necessary for overflow and scrolling handling on mobile devices) inline in .responsive-wrapper around iframe because not stable in CSS:
    -webkit-overflow-scrolling: touch; overflow: auto; */
  
}
 
.responsive-wrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  
  margin: 0;
  padding: 0;
  border: none;
}

/* padding-bottom = h/w as % -- sets aspect ratio */
/* YouTube video aspect ratio */
.responsive-wrapper-wxh-572x612 {
  padding-bottom: 107%;
}

/* general styles */
/* ============== */
.set-border {
  border: 5px inset #4f4f4f;
}
.set-box-shadow { 
  -webkit-box-shadow: 4px 4px 14px #4f4f4f;
  -moz-box-shadow: 4px 4px 14px #4f4f4f;
  box-shadow: 4px 4px 14px #4f4f4f;
}
.set-padding {
  padding: 40px;
}
.set-margin {
  margin: 30px;
}
.center-block-horiz {
  margin-left: auto !important;
  margin-right: auto !important;
}

  </style>
</head>

<body>
    <!-- embed responsive iframe --> 
<!-- ======================= -->
 <?php 
    $select="SELECT * from p47_albumfile where `id`=10";
    $q=mysqli_query($bis,$select);
    foreach($q as $data ){ ?>
<div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
    <div class="responsive-wrapper 
       responsive-wrapper-wxh-572x612"
       style="-webkit-overflow-scrolling: touch; overflow: auto;">
   
          <iframe src="albumFiles/<?php echo $data['file_name'];  ?>" width="50px" height="50px"> 

        <p style="font-size: 110%;"><em><strong>ERROR: </strong>  
  An &#105;frame should be displayed here but your browser version does not support &#105;frames. </em>Please update your browser to its most recent version and try again.</p>
      </iframe>
      
    </div>
  </div>      <?php }?>

  


    <script src="mainjs.js"></script>

</body>

</html>