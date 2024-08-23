<?php include "../shared/usnav.php";


// // Check if the form has been submitted
// if (isset($_GET['search'])) {
//     // Get the search term from the form
//     $searchTerm = mysqli_real_escape_string($bis, $_GET['searchs']);

//     // Build the SQL query
//     $sql = "SELECT * FROM (
  
     
    
//       SELECT 'p47_dean' AS table_name, deanName AS col1, deanBio AS col2 FROM p47_dean
//       UNION
//       SELECT 'p47_event' AS table_name, eventTitle AS col1, eventDesc AS col2 FROM p47_event
//       UNION
    
//       SELECT 'p47_news' AS table_name, newsTitle AS col1, newsDesc AS col2 FROM p47_news
     
//       UNION
//       SELECT 'p47_studentachievement' AS table_name, achievementTitle AS col1, achievementDesc AS col2 FROM p47_studentachievement
//   ) AS all_tables
//   WHERE CONCAT_WS(col1, col2) LIKE '%$searchTerm%'";

//     // Execute the query
//     $result = mysqli_query($bis, $sql);

//     // Check for errors
//     if (!$result) {
//         die("Error executing query: " . mysqli_error($bis));
//     }

//     // Check if any rows were returned
//     if (mysqli_num_rows($result) > 0) {
//         // Redirect the user to the search results page with the search term as a URL parameter
//         header("Location: /gradproj/graduation Project/test.php?searchTerm=$searchTerm");
//         exit();
//     } else {
//         echo "No results found.";
//     }
// }

// Close the database connection
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/pbis.css">
    <link rel="stylesheet" href="styles/home.css">

    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>About PBIS</title>
</head>

<body>
    <br> <br>
    <br>
    <br>
    <br>
    <br>

    <section class="news-section-cover">
        <div class="news-section container">


            <div class="row">
                <?php
                if (isset($_GET['searchTerm'])) {
                    $searchTerm = mysqli_real_escape_string($bis, $_GET['searchTerm']);

                    $sql = "SELECT * FROM (
  
     
    
        SELECT 'p47_dean' AS table_name, deanName AS col1, deanBio AS col2 FROM p47_dean
        UNION
        SELECT 'p47_event' AS table_name, eventTitle AS col1, eventDesc AS col2 FROM p47_event
        UNION
      
        SELECT 'p47_news' AS table_name, newsTitle AS col1, newsDesc AS col2 FROM p47_news
       
        UNION
        SELECT 'p47_studentachievement' AS table_name, achievementTitle AS col1, achievementDesc AS col2 FROM p47_studentachievement
    ) AS all_tables
    WHERE CONCAT_WS(col1, col2) LIKE '%$searchTerm%'";

                    $result = mysqli_query($bis, $sql);

                    if (!$result) {
                        die("Error executing query: " . mysqli_error($bis));
                    }

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $table_name = $row['table_name'];
                            $col1 = $row['col1'];
                            $col2 = $row['col2'];
                            $news = $bis->query("SELECT * from p47_news where newsTitle like '%$col1%' or newsDesc like '%$col2%'");

                            foreach ($news as $data) {
                ?>
                                <div class="news-card col-lg-4 col-md-6 border-bottom mt-5">
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
                <?php }
                        }
                    }
                } ?>
            </div>
        </div>
    </section>






    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/mainjs.js"></script>
</body>