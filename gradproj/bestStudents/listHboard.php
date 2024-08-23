<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `p47_stuhonourboard` WHERE honBoardId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listHboard.php");
}
if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    $delete = "UPDATE `p47_stuhonourboard` SET `status`=1 WHERE honBoardId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listHboard.php");
}
if (isset($_GET['disable'])) {
    $id = $_GET['disable'];
    $delete = "UPDATE `p47_stuhonourboard` SET `status`=0 WHERE honBoardId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listHboard.php");
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

        <!-- Bootstrap core CSS -->
   
        <!-- Custom styles for this template -->
    </head>

<body>
    <div class="container">



        <p class="pra">BIS Honourboard</p>
        <table class=" bis table table-bordered ">
            <thead class="color">
                <tr>

                    <th scope="col">honBoardId </th>
                    <th scope="col">mainPhoto </th>
                    <th scope="col">Title</th>
                    <th scope="col"> Description</th>
                    <th scope="col">Year</th>
                    
                    <th scope="col" colspan="3" style="text-align: center;">status</th>


                    <th scope="col">delete</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="text-center align-middle">
                <?php
                $select = $bis->query("SELECT * from p47_stuhonourboard ORDER BY `status` ASC  ");

                foreach ($select as $data) {
                ?>
                    <tr>
                    <!-- // p47_stuhonourboard honBoardId	honBoardTitle	description	mainPhoto	year	status	 -->

                        <th scope="col" class="col text-center align-middle"><?php echo $data['honBoardId']; ?> </th>
                        <th scope="col"><img src="./mainPhoto/<?php echo $data['mainPhoto']; ?>" alt="" srcset="" class="img-table"> </th>
                        <th scope="col" class="td-pra"> <?php echo $data['honBoardTitle']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['description']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['year']; ?></th>

                       
                    
                        <th scope="col"><?php if ($data['status'] == 0) {
                                            echo "pendding";
                                        } else {
                                            echo "approved";
                                        }; ?></th>
                        <th scope="col"><a href="listHboard.php?accept=<?php echo $data['honBoardId']; ?>" class="btn btn-info btn-infoo"> approve</a></th>
                        <th scope="col"><a href="listHboard.php?disable=<?php echo $data['honBoardId']; ?>" class="btn btn-info btn-infoo"> Disable</a></th>

                        <th scope="col"><a href="listHboard.php?delete=<?php echo $data['honBoardId']; ?>" class="btn btn-danger" onclick=""> Delete</a></th>
                        <th scope="col"> <a href="insertHboard.php?edit=<?php echo $data['honBoardId']; ?>" class="btn btn-warning">Update</a>
                        <th scope="col"> <a href="addfiles.php?list=<?php echo $data['honBoardId']; ?>" class="btn btn-warning">album</a>

                        </th>

                    <?php } ?>


            </tbody>
        </table>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="../js/jquery.js"></script>
</body>

</html>