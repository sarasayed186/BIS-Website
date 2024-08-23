<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `p47_news` WHERE newsId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listNews.php");
}
if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    $delete = "UPDATE `p47_news` SET `status`=1 WHERE newsId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listNews.php");
}
if (isset($_GET['disable'])) {
    $id = $_GET['disable'];
    $delete = "UPDATE `p47_news` SET `status`=0 WHERE newsId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listNews.php");
}

?>


<!doctype html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">

        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../styles/table.css">
        <link rel="stylesheet" href="../styles/nav.css">

        <link rel="stylesheet" href="../css/bootstrap.min.css">

        <!-- Bootstrap CSS -->
        <title>gallery | BIS</title>
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap core CSS -->

        <!-- Custom styles for this template -->
    </head>

<body>
    <div class="container">



        <p class="pra">BIS News</p>
        <table class=" bis table table-bordered ">
            <thead class="color">
                <tr>

                    <th scope="col">newsId </th>
                    <th scope="col">mainPhoto </th>
                    <th scope="col">newsTitle</th>
                    <th scope="col">news Description</th>
                    <th scope="col">News Type</th>
                    <th scope="col">Created date</th>
                    <th scope="col">news Date</th>
                    <th scope="col" colspan="3" style="text-align: center;">status</th>


                    <th scope="col">delete</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="text-center align-middle">
                <?php
                $select = $bis->query("SELECT * from p47_news ORDER BY `status` ASC  ");

                foreach ($select as $data) {
                ?>
                    <tr>

                        <th scope="col" class="col text-center align-middle"><?php echo $data['newsId']; ?> </th>
                        <th scope="col"><img src="./mainPhoto/<?php echo $data['mainPhoto']; ?>" alt="" srcset="" class="img-table"> </th>
                        <th scope="col" class="td-pra"> <?php echo $data['newsTitle']; ?></th>
                        <th scope="col" class="td-pra description-col"><?php echo $data['newsDesc']; ?></th>
                        <th scope="col" class="td-pra"><?php if ($data['news_Importance'] == 0) {
                                                            echo 'For Student';
                                                        } else {
                                                            echo 'For Public';
                                                        } ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['currentDate']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['dayDate']; ?></th>
                        <th scope="col"><?php if ($data['status'] == 0) {
                                            echo "pendding";
                                        } else {
                                            echo "approved";
                                        }; ?></th>
                        <th scope="col"><a href="listnews.php?accept=<?php echo $data['newsId']; ?>" class="btn btn-info btn-infoo"> approve</a></th>
                        <th scope="col"><a href="listnews.php?disable=<?php echo $data['newsId']; ?>" class="btn btn-info btn-infoo"> Disable</a></th>

                        <th scope="col"><a href="listNews.php?delete=<?php echo $data['newsId']; ?>" class="btn btn-danger" onclick=""> Delete</a></th>
                        <th scope="col"> <a href="insertNews.php?edit=<?php echo $data['newsId']; ?>" class="btn btn-warning">Update</a>
                        <th scope="col"> <a href="addfiles.php?list=<?php echo $data['newsId']; ?>" class="btn btn-warning">album</a>

                        </th>

                    <?php } ?>


            </tbody>
        </table>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- <script src="../js/jquery.js"></script> -->
</body>

</html>