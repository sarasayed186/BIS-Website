<?php
include "../Connections/syscon.php";
include_once "../shared/nav.php";
if (isset($_SESSION['admin'])) {
  header("location: /gradproj/admin-dash/dash.php");
}
if (isset($_POST['login'])) {
  $pass = $_POST['pass'];
  $email = $_POST['email'];
  $select = "SELECT * from `p47_admin` where adminPass = '$pass' and adminMail='$email'";
  $q = mysqli_query($bis, $select);
  $rows = mysqli_num_rows($q);
  $ss = mysqli_fetch_array($q);
  if ($rows > 0) {
    $AID = $ss['adminId'];
    $_SESSION['adminName'] = $ss['adminName'];

    $_SESSION['admin'] = $AID;
    header("location: /gradproj/admin-dash/dash.php");

    //echo $_SESSION['UID'];



  } else {
    echo '<script>alert("Invalid email or password. Please try again.")</script>';  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../css/bootstrap.min.css">



  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <style>
    :root {
      --maincol: #294861;
    }

    ::placeholder {
      color: #999;
    }
    
.header {
  position: relative;
  background: #e9f8fc;
  padding: 0 4%;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08), 
              0 0 6px rgba(0, 0, 0, 0.05);
}

.logo {
  margin-left: -15px;
}

.logo img {
  width: 200px;
  height: 100px;
  margin-top: 5px;
  margin-bottom: 5px;
}

    body{
      background-image: url(/gradproj/styles/back.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    font-size: 20px;
    font-family: "Poppins", sans-serif;
    padding: 0;
    margin: 0;



    }


    form {
      width: 400px;
      margin: auto;
      margin-top: 100px;
      background-color: rgba(255, 255, 255, 0.5);
      color: var(--maincol);
      border: none;
      border-radius: 10px !important;
    }

    label {
      display: block;
      font-size: 22px;
      font-weight: 600;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"],
    input[type="password"] {
      width: 100%;
      font-size: 1rem;
      padding: 0.6rem 0.8rem;
      margin: 0.5rem 0 2rem 0;
      border: none;
      border-radius: 10px;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
      outline: 2px solid var(--maincol);
      box-shadow: 0 0 10px var(--maincol);
    }


    .btn-submit {
      width: 100%;
      color: white;
      font-size: 20px;
      font-weight: 600;
      cursor: pointer;
      padding: 0.6rem 0.8rem;
      border: none;
      border-radius: 10px;
      background-color: var(--maincol);
    }
    .btn-submit:hover{
      background-color: #fff;
	color: #294861;
  border: 3px solid #294861;


    }

    .signup {
      text-align: center;
      font-size: 20px;
      color: white;
      margin: 15px 0 -20px 0;
    }

    .signup a {
      color: var(--maincol);
      font-weight: 600;
    }


    /* Media queries */
    @media screen and (min-width: 450px) {
      form {
        padding: 3rem;
      }
    }

    @media screen and (min-width: 600px) {
      form {
        border-radius: 6px 6px 0 0;
      }
    }

    @media screen and (min-width: 800px) {

      .form-header,
      form {
        max-width: 750px;
      }
    }
  </style>
</head>

<body>
  <section class="body">
    <form action="#" id="signup-form" method="POST">


      <label for="email" id="email-label">E-mail</label>
      <input type="email" name="email" id="email" placeholder="Enter your Email" required>

      <label for="password" id="password-label">Password</label>
      <input type="password" name="pass" id="password" placeholder="Enter your password" required>

      <button id="submit" class="btn-submit" name="login" type="submit">Login</button>

  

    </form>
  </section>
  </form>
  </div>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>