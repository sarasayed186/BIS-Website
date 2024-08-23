<?php
include "../Connections/syscon.php";
include "../shared/nav.php";
include "../shared/session.php";

?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../styles/nav.css">

  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
  <h1> <?php echo $_SESSION['statusMsg']?> </h1>

<th scope="col"> <a href="addfiles.php?list=<?php echo $_SESSION['list'] ;?>" class="btn btn-warning">album</a>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="../js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

<script src="../js/jquery.js"></script>
</body>

</html>