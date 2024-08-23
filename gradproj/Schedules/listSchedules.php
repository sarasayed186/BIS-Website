<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `p47_schedules` WHERE ScheduleId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listSchedules.php");
}
if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    $delete = "UPDATE `p47_schedules` SET `status`=1 WHERE ScheduleId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listSchedules.php");
}
if (isset($_GET['disable'])) {
    $id = $_GET['disable'];
    $delete = "UPDATE `p47_schedules` SET `status`=0 WHERE ScheduleId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listSchedules.php");
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

        <link rel="stylesheet" href="../css/bootstrap.min.css">

        <!-- Bootstrap CSS -->
        <title>gallery | BIS</title>
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <link rel="stylesheet" href="../styles/nav.css">

        <!-- Bootstrap core CSS -->

        <!-- Custom styles for this template -->
    </head>

<body>
    <div class="container">



        <p class="pra">BIS Schedules</p>
        <table class=" bis table table-bordered ">
            <thead class="color">
                <tr>

                    <th scope="col">ScheduleId </th>
                    <th scope="col">Schedule File </th>
                    <th scope="col">Schedule Title</th>
                    <th scope="col">Schedule Semster</th>
                    <th scope="col">Schedule Year</th>
                    <th scope="col">Schedule level</th>

                    <th scope="col">Schedule Type</th>
                    <th scope="col">insert date</th>
                    <th scope="col" colspan="3" style="text-align: center;">status</th>


                    <th scope="col">delete</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody class="text-center align-middle">
                <?php

                $select = $bis->query("SELECT * from p47_schedules JOIN p47_scheduletype on p47_schedules.scheduleTypeId=p47_scheduletype.scheduleTypeId  ORDER BY `status` ASC  ");

                foreach ($select as $data) {
                ?>
                    <tr>

                        <th scope="col" class="col text-center align-middle"><?php echo $data['ScheduleId']; ?> </th>
                        <th scope="col"><a href="files/<?php echo $data['ScheduleFile']; ?>" target="_blank" rel="noopener noreferrer"><img src="./files/PDF_file_icon.svg.png" alt="" srcset="" class="img-table"></a> </th>
                        <th scope="col" class="td-pra"> <?php echo $data['ScheduleTitle']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['ScheduleSemester']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['ScheduleYear']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['level']; ?></th>

                        <th scope="col" class="td-pra"><?php echo $data['TypeName']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['uploadDate']; ?></th>
                        <th scope="col"><?php if ($data['status'] == 0) {
                                            echo "pendding";
                                        } else {
                                            echo "approved";
                                        }; ?></th>
                        <th scope="col"><a href="listSchedules.php?accept=<?php echo $data['ScheduleId']; ?>" class="btn btn-info btn-infoo"> approve</a></th>
                        <th scope="col"><a href="listSchedules.php?disable=<?php echo $data['ScheduleId']; ?>" class="btn btn-info btn-infoo"> Disable</a></th>

                        <th scope="col"><a href="listSchedules.php?delete=<?php echo $data['ScheduleId']; ?>" class="btn btn-danger" onclick=""> Delete</a></th>
                        <th scope="col"> <a href="addSchedule.php?edit=<?php echo $data['ScheduleId']; ?>" class="btn btn-warning">Update</a>

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