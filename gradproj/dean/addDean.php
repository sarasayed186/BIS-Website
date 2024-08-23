<?php


include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";


$id = '';
if (isset($_POST['upload'])) {

    $name = $_POST['member_Name'];

    $member_Role = $_POST['member_Role'];
    $desc = $_POST['member_Bio'];
    $word = $_POST['member_Word'];

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


    if ($image_size > 500000)  if (!in_array($img_type, $types)) { {
            die(header("Refresh: url=addDean.php") . '<script>alert("Too Large File and invalid extension")</script>' . "<script>location.href = 'insertAcheivement.php';</script>");
        }
    }


    // p47_dean deanId	deanName	deanJobtitle	deanBio	deanWord	deanImage	status	

            $sql = "INSERT into `p47_dean` (`deanId`, `deanName`, `deanJobtitle`, `deanImage`, `deanBio`,`deanWord`) values (NULL, '$name', '$member_Role', '$image', '$desc','$word')  ";
            mysqli_query($bis, $sql);

            echo '<script>alert("Your Files Added Successfully!!")</script>';
            move_uploaded_file($tmp_name, "imgs/"  .  $image);
            echo ("<script>location.href = 'listDean.php';</script>");
        }
    

$name = $member_Role = $desc =$word= "";

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `p47_dean` WHERE `deanId`=$id";
    $s = mysqli_query($bis, $select);
    $row = mysqli_fetch_assoc($s);
    $id = $row['deanId'];
    $member_Role = $row['deanJobtitle'];
    $desc = $row['deanBio'];
    $name = $row['deanName'];
    $word = $row['deanWord'];





    if (isset($_POST['update'])) {


        //

        $member_Role = $_POST['member_Role'];

        $desc = $_POST['member_Bio'];
        $word = $_POST['member_Word'];

        $name = $_POST['member_Name'];
        $image = $_FILES['img']['name'];

        $img_type = $_FILES['img']['type'];

        $tmp_name = $_FILES['img']['tmp_name'];

        $image_size = $_FILES['img']['size'];

        $image_error = $_FILES['img']['error'];
        $location = "imgs/";
        move_uploaded_file($tmp_name, $location . $image);

        $update = " UPDATE p47_dean SET deanName = '$name', deanJobtitle = '$member_Role' , deanBio = '$desc' , deanImage = '$image', deanWord = '$word'  WHERE deanId = $id";


        $q = mysqli_query($bis, $update);
        header("location: listDean.php");
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>STUDENT ACHIEVEMENT PAGE</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../styles/nav.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/form.css">
    <style type="text/css">
    </style>
</head>

<body>
    <section class="body">
        <h1>Add & Update Deans from here</h1>
        <form class="containers" method="post" enctype="multipart/form-data">
            <div class="container-small-unit">
                <label for="name" class="form-label">Dean Name:</label>
                <input type="text" class="form-control" name="member_Name" id="name" placeholder="Name" value="<?php echo $name ?>" autocomplete="off" required>
            </div>
            <div class="container-small-unit">
                <label for="desc" class="form-label">Bio:</label>
                <textarea class="form-control" name="member_Bio" id="desc" placeholder="Add description" autocomplete="off" required><?php echo $desc ?></textarea>
            </div>
            <div class="container-small-unit">
                <label for="role" class="form-label">Dean Job Title:</label>
                <input type="text" class="form-control" name="member_Role" id="role" placeholder="Job Title" value="<?php echo $member_Role ?>" autocomplete="off" required>
            </div>
            <div class="container-small-unit">
                <label for="word" class="form-label">Dean Word:</label>
                <textarea class="form-control" name="member_Word" id="word" placeholder="Add Dean Word" autocomplete="off" required><?php echo $word ?></textarea>
            </div>
            <div class="container-small-unit">
                <label for="image" class="form-label">Dean Image:</label>
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
    </section>
    <footer class="container" style="padding-top:20px;">
    </footer>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.js"></script>
</body>
</html>