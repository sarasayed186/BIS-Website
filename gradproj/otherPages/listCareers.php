<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `p47_careers` WHERE careerId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listCareers.php");
}
if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    $delete = "UPDATE `p47_careers` SET `status`=1 WHERE careerId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listCareers.php");
}
if (isset($_GET['disable'])) {
    $id = $_GET['disable'];
    $delete = "UPDATE `p47_careers` SET `status`=0 WHERE careerId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listCareers.php");
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



        <p class="pra">CAREERS LIST</p>
        <table class=" bis table table-bordered ">
            <thead class="color">
                <tr>

                    <th scope="col">careerId </th>
                    <th scope="col">mainPhoto </th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Job Description</th>
                    <th scope="col"> Company Name</th>
                    <th scope="col text-center align-middle" style="text-align: center;">Career Link</th>

                    <th scope="col">status</th>

                    <th scope="col" colspan="2" style="text-align: center;">Approving</th>


                    <th scope="col" colspan="2" style="text-align: center;">Edit</th>

                </tr>
            </thead>
            <tbody class="text-center align-middle">
                <?php
                $select = $bis->query("SELECT * from p47_careers ORDER BY `status` ASC  ");

                foreach ($select as $data) {
                ?>
                    <tr>


                        <th scope="col" class="col text-center align-middle"><?php echo $data['careerId']; ?> </th>
                        <th scope="col"><img src="./img/<?php echo $data['careerMainPhoto']; ?>" alt="" srcset="" class="img-table"> </th>
                        <th scope="col" class="td-pra"> <?php echo $data['jobTitle']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['jobDesc']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['companyName']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['careerLink']; ?></th>
                        <th scope="col"><?php if ($data['status'] == 0) {
                                            echo "pendding";
                                        } else {
                                            echo "approved";
                                        }; ?></th>
                        <th scope="col"><a href="listCareers.php?accept=<?php echo $data['careerId']; ?>" class="btn btn-info btn-infoo"> approve</a></th>
                        <th scope="col"><a href="listCareers.php?disable=<?php echo $data['careerId']; ?>" class="btn btn-info btn-infoo"> Disable</a></th>

                        <th scope="col"><a href="listCareers.php?delete=<?php echo $data['careerId']; ?>" class="btn btn-danger" onclick=""> Delete</a></th>
                        <th scope="col"> <a href="careers.php?edit=<?php echo $data['careerId']; ?>" class="btn btn-warning">Update</a>

                        </th>

                    <?php } ?>


            </tbody>
        </table>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <script src="../js/jquery.js"></script>
</body>

</html>