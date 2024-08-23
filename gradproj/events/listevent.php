<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `p47_event` WHERE eventId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listevent.php");
}
if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    $delete = "UPDATE `p47_event` SET `status`=1 WHERE eventId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listevent.php");
}
if (isset($_GET['disable'])) {
    $id = $_GET['disable'];
    $delete = "UPDATE `p47_event` SET `status`=0 WHERE eventId = $id ";
    $q = mysqli_query($bis, $delete);
    header("location: listevent.php");
}

?>


<!doctype html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../styles/table.css">

        <link rel="stylesheet" href="../css/bootstrap.min.css">

        <!-- Bootstrap CSS -->
        <title>Events | BIS</title>
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <link rel="stylesheet" href="../styles/nav.css">

        <!-- Bootstrap core CSS -->

        <!-- Custom styles for this template -->
    </head>

<body>
    <div class="container">



        <p class="pra">BIS Events</p>
        <table class=" bis table table-bordered ">
            <thead class="color">
                <tr>

                    <th scope="col">eventId </th>
                    <th scope="col">mainPhoto </th>
                    <th scope="col">eventTitle</th>
                    <th scope="col">eventTitle</th>
                    <th scope="col">eventCat</th>
                    <th scope="col">insert date</th>
                    <th scope="col">eventDate</th>
                    <th scope="col" style="text-align: center;">status</th>


                    <th scope="col">modify</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="text-center align-middle">
                <?php
                $select = $bis->query("SELECT * from p47_event JOIN p47_eventcategory on eventCat=categoryId  ORDER BY `status` ASC  ");

                foreach ($select as $data) {
                ?>
                    <tr>

                        <th scope="col" class="col text-center align-middle"><?php echo $data['eventId']; ?> </th>
                        <th scope="col"><img src="./mainPhoto/<?php echo $data['mainPhoto']; ?>" alt="" srcset="" class="img-table"> </th>
                        <th scope="col" class="td-pra"> <?php echo $data['eventTitle']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['eventDesc']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['categoryName']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['eventDate']; ?></th>
                        <th scope="col" class="td-pra"><?php echo $data['eventDatee']; ?></th>
                        <th scope="col"><?php if ($data['status'] == 0) {
                                            echo "pendding";
                                        } else {
                                            echo "approved";
                                        }; ?>
                        <a href="listevent.php?accept=<?php echo $data['eventId']; ?>" class="btn btn-info btn-infoo"> approve</a>
                        <a href="listevent.php?disable=<?php echo $data['eventId']; ?>" class="btn btn-info btn-infoo"> Disable</a></th>

                        <th scope="col"><a href="listevent.php?delete=<?php echo $data['eventId']; ?>" class="btn btn-danger" onclick=""> Delete</a>
                         <a href="addevent.php?edit=<?php echo $data['eventId']; ?>" class="btn btn-warning">Update</a>
                        <th scope="col"> <a href="listalbum.php?list=<?php echo $data['eventId']; ?>" class="btn btn-warning">album</a>

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