<?php


include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";


$id = '';
if (isset($_POST['upload'])) {

    $name = $_POST['member_Name'];

    $member_Role = $_POST['member_Role'];
    $desc = $_POST['member_Bio'];
    $image = $_FILES['img']['name'];

    $img_type = $_FILES['img']['type'];

    $tmp_name = $_FILES['img']['tmp_name'];

    $image_size = $_FILES['img']['size'];

    $image_error = $_FILES['img']['error'];



    $types = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');

    if ($image_error == 4) {
        echo '<script>alert("Please upload an image.")</script>';
        echo ("<script>location.href = 'addMember.php';</script>");
    }


    if ($image_size > 200000)  if (!in_array($img_type, $types)) { {
            die(header("Refresh: url=insertAcheivement.php") . '<script>alert("Too Large File and invalid extension")</script>' . "<script>location.href = 'insertAcheivement.php';</script>");
        }
    }


    if ($image_size > 20000000) {
        die(header("Refresh: url=insertAcheivement.php") . '<script>alert("Too Large File")</script>' . "<script>location.href = 'insertAcheivement.php';</script>");
    }
    if (!in_array($img_type, $types)) {
        die(header("Refresh: url=insertAcheivement.php") . '<script>alert("Invalid Extension !!")</script>' . "<script>location.href = 'insertAcheivement.php';</script>");
    }
    if (!empty($image)) {

        if (in_array($img_type, $types)) {
            // random name inserted in database


            $image_random  = rand(0, 100000000000000) . $image;




            // inserting when there is no error or failure.


            $sql = "INSERT into `p47_highboard` (`member_Id`, `member_Name`, `member_Role`, `member_Image`, `member_Bio`) values (NULL, '$name', '$member_Role', '$image_random', '$desc')  ";
            mysqli_query($bis, $sql);

            echo '<script>alert("Your Files Added Successfully!!")</script>';
            move_uploaded_file($tmp_name, "imgs/"  .  $image_random);
            echo ("<script>location.href = 'listMember.php';</script>");
        }
    }
}
$name = $member_Role = $desc = "";

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `p47_highboard` WHERE `member_Id`=$id";
    $s = mysqli_query($bis, $select);
    $row = mysqli_fetch_assoc($s);
    $id = $row['member_Id'];
    $member_Role = $row['member_Role'];
    $desc = $row['member_Bio'];
    $name = $row['member_Name'];




    if (isset($_POST['update'])) {


        //

        $member_Role = $_POST['member_Role'];

        $desc = $_POST['member_Bio'];

        $name = $_POST['member_Name'];
        $image = $_FILES['img']['name'];

        $img_type = $_FILES['img']['type'];

        $tmp_name = $_FILES['img']['tmp_name'];

        $image_size = $_FILES['img']['size'];

        $image_error = $_FILES['img']['error'];
        $location = "imgs/";
        move_uploaded_file($tmp_name, $location . $image);

        $update = " UPDATE p47_highboard SET member_Name = '$name', member_Role = '$member_Role' , member_Bio = '$desc' , member_Image = '$image' WHERE member_Id = $id";


        $q = mysqli_query($bis, $update);
        header("location: listMember.php");
    }
}





?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Highboard Page</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/nav.css">
    <link rel="stylesheet" href="../styles/form.css">

    <!-- JavaScript Bundle with Popper -->
    <style type="text/css">

    </style>
</head>

<body>
    <!-- As a heading -->

    <section style="padding-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="col-md-10">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Highboard Member Name:</label>
                            <input type="text" class="form-control" name="member_Name" id="name" placeholder="Name" value="<?php echo $name ?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Bio:</label>
                            <textarea class="form-control" name="member_Bio" id="desc" placeholder="Add description" autocomplete="off" required><?php echo $desc ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="role">Select Role:</label>
                            <select class="form-control" name="member_Role" id="role" required>
                                <?php 
                                    $select = "SELECT * FROM p47_highboardrole";
                                    $q = mysqli_query($bis, $select);
                                    foreach ($q as $data) { 
                                ?>
                                    <option value="<?php echo $data['Role_Id']; ?>"><?php echo $data['role_Title']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Highboard Member Image:</label>
                            <input type="file" name="img" id="image" class="form-control">
                        </div>
                        <?php if ($id == '') { ?>
                            <div class="mb-3">
                                <button type="submit" name="upload" class="btn btn-success">Upload</button>
                            </div>
                        <?php } ?>
                        <?php if ($id != '') { ?>
                            <div class="mb-3">
                                <button type="submit" name="update" class="btn btn-success">Update</button>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- FOOTER -->
    <footer class="container" style="padding-top:20px;">

    </footer>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <script src="../js/jquery.js"></script>
</body>

</html>