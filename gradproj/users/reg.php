<?php
include_once "../Connections/syscon.php";


if (isset($_POST['reg'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];



    $insert = "INSERT INTO `p47_admin` VALUES (NULL , '$name' , '$email' , '$pass')";
    mysqli_query($bis, $insert);
    header("location:" . $_SERVER["REQUEST_URI"]);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/login.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../styles/form.css">

</head>

<body>

    <div class="container col-6 mt-5">
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">
                    <h5>Name</h5>
                </label>
                <input type="text" name="name" class="form-control" placeholder="User Name" required oninvalid="this.setCustomValidity('Enter User Name Here')" oninput="this.setCustomValidity('')" />
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">
                    <h5>E-Mail</h5>
                </label>
                <input type="text" name="email" class="form-control" placeholder="E-Mail" required oninvalid="this.setCustomValidity('Enter User Name Here')" oninput="this.setCustomValidity('')" />
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">
                    <h5>Password</h5>
                </label>
                <input type="password" name="pass" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Enter User Name Here')" oninput="this.setCustomValidity('')" />
                <br>

 

                <button type="input" name="reg" class="btn btn-primary btn-lg">Sign Up</button>


</body>

</html>