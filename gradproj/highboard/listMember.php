<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `p47_highboard` WHERE member_Id = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listMember.php");
}

if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    $delete = "UPDATE `p47_highboard` SET `status`=1 WHERE member_Id = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listMember.php");
}
if (isset($_GET['disable'])) {
    $id = $_GET['disable'];
    $delete = "UPDATE `p47_highboard` SET `status`=0 WHERE member_Id = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listMember.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/nav.css">

    <link rel="stylesheet" href="../styles/table.css">





</head>

<body>

    <div class="container">



        <p class="pra">Highboard Members List</p>
        <table class=" bis table table-bordered ">
            <thead class="color">
                <tr>


                    <th>ID</th>
                    <th>Member Name</th>
                    <th>Member Role</th>
                    <th>Member Image</th>
                    <th>Bio</th>
                    <th>Status</th>
                    <th colspan="1">Approving</th>
                    <th colspan="1">Modify</th>


                </tr>
            </thead>
            <?php
            $i = 1;
            $rows = mysqli_query($bis, "SELECT * FROM `p47_highboard` JOIN p47_highboardrole ON member_Role=Role_Id  ORDER BY `member_Id` DESC")
            ?>

            <?php


            foreach ($rows as $row) {



            ?>
                <tbody>
                    <tr>
                        <th class="td-pra"><?= $row["member_Id"] ?></th>
                        <th class="td-pra"><?= $row["member_Name"]; ?></th>
                        <th class="td-pra"><?= $row["role_Title"]; ?></th>
                        <th class="td-pra"> <img src="imgs/<?= $row["member_Image"]; ?>" width=180 title="<?php echo $row['member_Image']; ?>"> </th>
                        <th class="td-pra"><?= $row["member_Bio"]; ?></th>
                        <th scope="col"><?php if ($row['status'] == 0) {
                                            echo "pendding";
                                        } else {
                                            echo "approved";
                                        }; ?></th>

                        <th scope="col"><a href="listMember.php?accept=<?php echo $row['member_Id']; ?>" class="btn btn-info btn-infoo"> approve</a>
                            <a href="listMember.php?disable=<?php echo $row['member_Id']; ?>" class="btn btn-info btn-infoo"> Disable</a>
                        </th>

                        <th scope="col"><a href="listMember.php?delete=<?php echo $row['member_Id']; ?>" class="btn btn-danger" onclick=""> Delete</a>
                            <a href="addMember.php?edit=<?php echo $row['member_Id']; ?>" class="btn btn-warning">Update</a>
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