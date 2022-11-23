<?php
require_once("../PHP/TascaClass.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pymeshield Gantt</title>
  <?php require_once("head.php"); ?>
  <script src="../JavaScript/gantt.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <?php require_once("header.php"); ?>
  </header>
  <main>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-2 pb-2 mb-3 border-bottom">
      <h1 class="h2">{Nombre del informe}</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="imprimirTascas.php" target="_blank" type="button" class="btn btn-dark"><i class="fa-solid fa-file-pdf"></i>Descargar PDF</a>
      </div>
    </div>
    <div class="table-responsive rounded-top" id="gantt"></div>
    <?php
    $ganntt1 = new Tasca;
    $ganntt1->modalGantt();
    ?>
  </main>
  <footer class="bg-black text-center text-lg-center mt-auto">
    <?php require_once("footer.php"); ?>
  </footer>
</body>

</html>