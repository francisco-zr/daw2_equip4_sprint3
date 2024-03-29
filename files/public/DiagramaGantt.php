<?php
require_once("../src/class/TascaClass.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pymeshield Gantt</title>
  <?php require_once("../src/includes/head.php"); ?>
  <script src="../js/gantt.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <?php require_once("../src/includes/header_client.php"); ?>
  </header>
  <main>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-2 pb-2 mb-3 border-bottom">
      <h1 class="h2">Calendario de tareas</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="imprimirTascas.php" target="_blank" type="button" class="btn btn-warning"><i class="fa-solid fa-file-pdf"></i>Descargar PDF</a>
      </div>
    </div>
    <div class="table-responsive rounded-top" id="gantt"></div>
    <?php
    $ganntt1 = new Tasca($id_sesion);
    $ganntt1->modalGantt();
    ?>
  </main>
  <footer class="bg-black text-center text-lg-center mt-auto">
    <?php require_once("../src/includes/footer.php"); ?>
  </footer>
</body>

</html>