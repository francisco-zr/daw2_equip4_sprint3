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
  <script src="../JavaScript/aceptarPresupuesto.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <?php require_once("header.php"); ?>
  </header>
  <main>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-2 pb-2 mb-3 border-bottom">
      <h1 class="h2">{Por hacer}</h1>
    </div>
    <table id="table" data-locale="es-ES" data-click-to-select="true" data-toggle="table" data-pagination="true" data-search="true" data-show-footer="true" data-footer-style="footerStyle" data-ajax-options="ajaxOptions" data-url="./getPresupuesto.php">
      <thead>
        <tr>
          <th data-field="state" data-checkbox="true"></th>
          <th data-sortable="true" data-field="id_task" data-footer-formatter="idFormatter">ID</th>
          <th data-sortable="true" data-field="name_task" data-footer-formatter="nameFormatter">Nombre</th>
          <th data-sortable="true" data-field="description_task">Descripción</th>
          <th data-sortable="true" data-field="accepted">Aceptado</th>
          <th data-sortable="true" data-field="price" data-footer-formatter="priceFormatter">Precio</th>
        </tr>
      </thead>
    </table>
    <div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center px-2 pb-2 mb-3 border-bottom">
      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="#" target="_blank" type="button" class="btn btn-dark"><i class="fa-solid fa-file-pdf"></i>Aceptar Presupuesto</a></div>
        <div class="btn-toolbar mb-2 mb-md-0">
        <a href="#" target="_blank" type="button" class="btn btn-light"><i class="fa-solid fa-file-pdf"></i>Modificar Presupuesto</a>
      </div>
    </div>
  </main>
  <footer class="bg-black text-center text-lg-center mt-auto">
    <?php require_once("footer.php"); ?>
  </footer>
</body>

</html>