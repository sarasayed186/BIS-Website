<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `doctors_account` WHERE DoctorCode = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: doctorsList.php");
}
if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    $delete = "UPDATE `doctors_account` SET `is_enable`= 'yes' WHERE DoctorCode = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: doctorsList.php");
}
if (isset($_GET['disable'])) {
    $id = $_GET['disable'];
    $delete = "UPDATE `doctors_account` SET `is_enable`='no' WHERE DoctorCode = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: doctorsList.php");
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../styles/table.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Bootstrap CSS -->
    <title>Doctors | BIS</title>
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
	<link rel="stylesheet" href="../styles/nav.css">

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
</head>

<body>
    <div class="container">



        <p class="pra">BIS DOCTORS LIST</p>
        <table class=" bis table table-bordered ">
            <thead class="color">
                <tr>

                    <th scope="col">Doctor ID</th>
                    <th scope="col">Doctor Image </th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Doctor Academic Mail</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">University </th>
                    <th scope="col"> Doctor Type</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Department</th>

                    <th scope="col" colspan="2" style="text-align: center;">status</th>


                    <th scope="col">Modify</th>
                </tr>
            </thead>
            <tbody class="text-center align-middle">
                <?php
                $select = $bis->query("SELECT `DoctorCode`,`Doctor_eng_Name`,`Academic_Mail`,`DoctorJob`,`University`,`Faculty`,`Department`,`Type`,`Doctor_image`,`Faculty_eng_name`,`Doctor_type_name`,`Doctor_job_eng_name`,`Department_eng_name`,`uni_eng_name`,`is_enable` from `doctors_account` JOIN `doctor_jobs` on `DoctorJob`=`Doctor_job_id` JOIN `universities` on `University`=`uni_id` join `faculties` on `Faculty`=`Faculty_id` join `departments`  on `Department`=`Department_id` join `doctor_types` on `Type`=`Doctor_type_id` ORDER BY `is_enable` ASC  ");



                foreach ($select as $data) {
                ?>
                    <tr>

                        <th scope="col" class="col text-center align-middle"><?php echo $data['DoctorCode']; ?> </th>
                        <th scope="col"><img src="./mainPhoto/<?php echo $data['Doctor_image']; ?>" alt="" srcset="" class="img-table"> </th>
                        <th scope="col" class="td-pra"> <?php echo $data['Doctor_eng_Name']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['Academic_Mail']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['Doctor_job_eng_name']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['uni_eng_name']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['Doctor_type_name']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['Faculty_eng_name']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['Department_eng_name']; ?></th>

                        <th scope="col"><?php echo $data['is_enable'] ?></th>
                        <th scope="col"><a href="doctorsList.php?accept=<?php echo $data['DoctorCode']; ?>" class="btn btn-info btn-infoo"> approve</a>
                            <a href="doctorsList.php?disable=<?php echo $data['DoctorCode']; ?>" class="btn btn-info btn-infoo"> Disable</a>
                        </th>

                        <th scope="col"><a href="doctorsList.php?delete=<?php echo $data['DoctorCode']; ?>" class="btn btn-danger" onclick=""> Delete</a>
                            <a href="addDoctor.php?edit=<?php echo $data['DoctorCode']; ?>" class="btn btn-warning">Update</a>

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