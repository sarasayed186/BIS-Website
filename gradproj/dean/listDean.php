<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `p47_dean` WHERE deanId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listDean.php");
}

if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    $delete = "UPDATE `p47_dean` SET `status`=1 WHERE deanId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listDean.php");
}
if (isset($_GET['disable'])) {
    $id = $_GET['disable'];
    $delete = "UPDATE `p47_dean` SET `status`=0 WHERE deanId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listDean.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../styles/nav.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/table.css">





</head>

<body>

    <div class="container">



        <p class="pra">Deans List</p>
        <table class=" bis table table-bordered ">
            <thead class="color">
                <tr>


                    <th>ID</th>
                    <th>Dean Name</th>
                    <th>Dean Role</th>
                    <th>Dean Word</th>

                    <th>Dean Image</th>
                    <th>Bio</th>
                    <th>Status</th>
                    <th colspan="1">Approving</th>
                    <th colspan="1">Modify</th>


                </tr>
            </thead>
            <?php
            $i = 1;
            $rows = mysqli_query($bis, "SELECT * FROM `p47_dean` ORDER BY `deanId` DESC")
            ?>

            <?php


            foreach ($rows as $row) {


// $sql = "INSERT into `p47_dean` (`deanId`, `deanName`, `deanJobtitle`, `deanImage`, `deanBio`,`deanWord`) values (NULL, '$name', '$member_Role', '$image', '$desc','$word')  ";

            ?>
                <tbody>
                    <tr>
                        <th class="td-pra"><?= $row["deanId"] ?></th>
                        <th class="td-pra"><?= $row["deanName"]; ?></th>
                        <th class="td-pra"><?= $row["deanJobtitle"]; ?></th>
                        <th class="td-pra"><?= $row["deanWord"]; ?></th>

                        <th class="td-pra"> <img src="imgs/<?= $row["deanImage"]; ?>" width=180 title="<?php echo $row['deanImage']; ?>"> </th>
                        <th class="td-pra"><?= $row["deanBio"]; ?></th>
                        <th scope="col"><?php if ($row['status'] == 0) {
                                            echo "pendding";
                                        } else {
                                            echo "approved";
                                        }; ?></th>

                        <th scope="col"><a href="listDean.php?accept=<?php echo $row['deanId']; ?>" class="btn btn-info btn-infoo"> approve</a>
                            <a href="listDean.php?disable=<?php echo $row['deanId']; ?>" class="btn btn-info btn-infoo"> Disable</a>
                        </th>

                        <th scope="col"><a href="listDean.php?delete=<?php echo $row['deanId']; ?>" class="btn btn-danger" onclick=""> Delete</a>
                            <a href="addDean.php?edit=<?php echo $row['deanId']; ?>" class="btn btn-warning">Update</a>
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