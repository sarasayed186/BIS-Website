<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `p47_studentachievement` WHERE achievementId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: show.php");
    // $sql = "INSERT into `p47_studentachievement` (`achievementId`, `stuName`, `achievementTitle`, `stuImage`, `achievementDesc`) values (NULL, '$name', '$title', '$image_random', '$desc')  ";
    // mysqli_query($bis, $sql); 
}
if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    $delete = "UPDATE `p47_studentachievement` SET `status`=1 WHERE achievementId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: show.php");
}
if (isset($_GET['disable'])) {
    $id = $_GET['disable'];
    $delete = "UPDATE `p47_studentachievement` SET `status`=0 WHERE achievementId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: show.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="../styles/table.css">
    <link rel="stylesheet" href="../styles/nav.css">





</head>

<body>

    <div class="container">



        <p class="pra">Student Achievement List</p>
        <table class=" bis table table-bordered ">
            <thead class="color">
                <tr>


                    <th>ID</th>
                    <th>Name</th>
                    <th>Achievement Title</th>
                    <th>Student Image</th>
                    <th>DESCRIPTION</th>
                    <th>Status</th>
                    <th colspan="1">Approving</th>
                    <th colspan="1">Modify</th>


                </tr>
            </thead>
            <?php
            $i = 1;
            $rows = mysqli_query($bis, "SELECT * FROM `p47_studentachievement` ORDER BY `achievementId` DESC")
            ?>

            <?php


            foreach ($rows as $row) {



            ?>
                <tbody>
                    <tr>
                        <th class="td-pra"><?= $row["achievementId"] ?></th>
                        <th class="td-pra"><?= $row["stuName"]; ?></th>
                        <th class="td-pra"><?= $row["achievementTitle"]; ?></th>
                        <th class="td-pra"> <img src="imgs/<?= $row["stuImage"]; ?>" width=180 title="<?php echo $row['stuImage']; ?>"> </th>
                        <th class="td-pra"><?= $row["achievementDesc"]; ?></th>
                        <th scope="col"><?php if ($row['status'] == 0) {
                                            echo "pendding";
                                        } else {
                                            echo "approved";
                                        }; ?></th>

                        <th scope="col"><a href="show.php?accept=<?php echo $row['achievementId']; ?>" class="btn btn-info btn-infoo"> approve</a> <a href="show.php?disable=<?php echo $row['achievementId']; ?>" class="btn btn-info btn-infoo"> Disable</a></th>

                        <th scope="col"><a href="show.php?delete=<?php echo $row['achievementId']; ?>" class="btn btn-danger" onclick=""> Delete</a>
                            <a href="insertAcheivement.php?edit=<?php echo $row['achievementId']; ?>" class="btn btn-warning">Update</a>
                        </th>

                    </tr>
                <?php }

                ?>
                </tbody>
        </table>
        <br>
        <script src="../js/bootstrap.bundle.min.js"></script>

        <script src="../js/jquery.js"></script>
</body>

</html>