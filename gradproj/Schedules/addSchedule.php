<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
$id = "";
include "../shared/session.php";


if (isset($_POST['submit'])) {

    $title = $_POST['title'];

    $ScheduleSemester = $_POST['semster'];
    $ScheduleYear = $_POST['year'];
    $scheduleType = $_POST['scheduleType'];
    $Schedulelevel = $_POST['level'];


    $Filename = $_FILES['scheduleFile']['name'];
    $Filetype = $_FILES['scheduleFile']['type'];
    $Filetmp = $_FILES['scheduleFile']['tmp_name'];
    $file_extension = pathinfo($Filename, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'PDF', 'XLSX', 'xlsx', 'pdf', 'txt', 'docx', 'pptx');

    if (!in_array($file_extension, $allowTypes)) {
        // The file type is not valid.
        echo 'The file type is not valid.';
        exit;
    }

    $location = "files/";
    move_uploaded_file($Filetmp, $location . $Filename);
    $insert = "INSERT into `p47_schedules`(`ScheduleId`,`ScheduleFile`,`ScheduleTitle`,`ScheduleSemester`,`ScheduleYear`,`level`,`scheduleTypeId`,`uploadDate`) VALUES (NULL,'$Filename','$title','$ScheduleSemester',$ScheduleYear,$Schedulelevel,$scheduleType,null)";


    $q = mysqli_query($bis, $insert);
    header("location: listSchedules.php");

}

//----------update event-------------
$title = $abroad_img = $eventDesc = $eventCat = $eventDatee = '';



if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $select = "SELECT * FROM `p47_schedules` WHERE `ScheduleId`=$id";
    $s = mysqli_query($bis, $select);
    $row = mysqli_fetch_assoc($s);


    $title = $row['ScheduleTitle'];
    $ScheduleSemester = $row['ScheduleSemester'];
    $ScheduleYear = $row['ScheduleYear'];
    $scheduleType = $row['scheduleTypeId'];
}
if (isset($_POST['update'])) {
    $title = $_POST['title'];

       $ScheduleSemester = $_POST['semster'];
    $ScheduleYear = $_POST['year'];
    $scheduleType = $_POST['scheduleType'];
    $Schedulelevel = $_POST['level'];

    $Filename = $_FILES['scheduleFile']['name'];
    $Filetype = $_FILES['scheduleFile']['type'];
    $Filetmp = $_FILES['scheduleFile']['tmp_name'];
    
    
    $location = "files/";
    move_uploaded_file($Filetmp, $location . $Filename);

    $update = "UPDATE `p47_schedules` SET `ScheduleTitle` = '$title' ,  `ScheduleFile` = '$Filename',`ScheduleSemester`='$ScheduleSemester',`scheduleTypeId`= $scheduleType,`ScheduleYear`=$ScheduleYear ,`level` =$Schedulelevel WHERE `ScheduleId` = $id ";
    $q = mysqli_query($bis, $update);
    header("location:listSchedules.php");



}


$years = array(
    2022,
    2023,
    2024,
    2025,
    2026,
    2027,
    2028,
    2029,
    2030,
    2031,
    2032,
    2033,
    2034
);
$semsters = array(
    "First",
    "Second",
    "Both"
);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add and Update Schedules</title>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/nav.css">
    <link rel="stylesheet" href="../styles/form.css">
</head>

<body>
    <main>
        <section class="body">
            <h1>Add and Update Schedules</h1>
            <form class="containers" method="post" enctype="multipart/form-data">
                <div class="container-small-unit">
                    <label class="label" for="title">Schedule Title:</label>
                    <input class="input" type="text" name="title" id="title" value="<?php echo $title ?>" required placeholder="Enter event title">
                </div>
                <div class="container-small-unit">
                    <label class="label" for="year">Select Schedule Year:</label>
                    <select name="year" id="year" class="form-control" required>
                        <?php foreach ($years as $year) { ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="container-small-unit">
                    <label class="label" for="semster">Select Schedule Semester:</label>
                    <select name="semster" id="semster" class="form-control" required>
                        <?php foreach ($semsters as $semster) { ?>
                            <option value="<?php echo $semster; ?>"><?php echo $semster; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="container-small-unit">
                    <label class="label" for="level">Select Schedule Level:</label>
                    <select name="level" id="level" class="form-control" required>
                        <option value="1">First</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">All</option>
                    </select>
                </div>
                <div class="container-small-unit">
                    <label class="label" for="scheduleType">Select Schedule Type:</label>
                    <select name="scheduleType" id="scheduleType" class="form-control" required>
                        <?php $select = "SELECT * FROM p47_scheduletype ";
                        $q = mysqli_query($bis, $select);
                        foreach ($q as $data) { ?>
                            <option value=<?php echo $data['scheduleTypeId']; ?>><?php echo $data['TypeName']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="container-small-unit">
                    <label class="label" for="scheduleFile">Add Schedule File:</label>
                    <input class="input" type="file" name="scheduleFile" id="scheduleFile" required accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                </div>
                <?php if ($id == '') { ?>
                    <button type="submit" name="submit" class="btn">Add Event</button>
                <?php } else { ?>
                    <button type="submit" name="update" class="btn">Update Event</button>
                <?php } ?>
            </form>
        </section>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>

