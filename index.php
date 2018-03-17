<?php
require_once "vendor/autoload.php";
?>

<!doctype html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <!-- Main CSS -->
  <link rel="stylesheet" href="/assets/css/main.css">


  <title>Hello, world!</title>
</head>
<body>
  <?php
    include 'App/html/nav.html';
  ?>

  <div class="container box">
    

    <?php
       $rota = new \App\Route();
    ?>

  </div>

  
  <!-- Jquery JS -->
  <script src="/assets/js/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="/assets/js/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="/assets/js/bootstrap.min.js"></script>
  <!-- MASK JS -->
  <script src="/assets/js/jquery.mask.min.js"></script>
  <!-- Main JS -->
  <script src="/assets/js/main.js"></script>
</body>
</html>