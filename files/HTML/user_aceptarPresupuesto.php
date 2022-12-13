<?php
require_once("../PHP/PresupostClass.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pymeshield Aceptar Presupuesto</title>
  <?php require_once("head.php"); ?>
</head>

<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <?php require_once("header.php"); ?>
  </header>
  <main>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-2 pb-2 mb-3 border-bottom">
      <h1 class="h2">{Por hacer}</h1>
    </div>
    <table id="table" data-locale="es-ES" data-click-to-select="true" data-toggle="table" data-pagination="true" data-search="true" data-url="./getPresupuesto.php">
      <thead>
        <tr>
          <th data-field="state" data-checkbox="true"></th>
          <th data-sortable="true" data-field="id_task">ID</th>
          <th data-sortable="true" data-field="name_task">Nombre</th>
          <th data-sortable="true" data-field="description_task">Descripción</th>
          <th data-sortable="true" data-field="accepted">Aceptado</th>
          <th data-sortable="true" data-field="price">Precio</th>
        </tr>
      </thead>
    </table>
  </main>
  <footer class="bg-black text-center text-lg-center mt-auto">
    <?php require_once("footer.php"); ?>
  </footer>
</body>

</html>