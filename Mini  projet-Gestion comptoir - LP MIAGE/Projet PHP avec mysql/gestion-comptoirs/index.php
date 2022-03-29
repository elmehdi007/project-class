<?php session_start();
 require_once './model/Class_DBConnexion.php';
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
    <title>Gestion Comptoirs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="img/les_comptoirs_logo.png" />
  <!-- Required meta tags -->

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style_canvas.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="css/app.css" rel="stylesheet">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/chart.min.js"></script>
</head>
<body>

  <?php
   include('controller/forwarder.php');
  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>

</html>