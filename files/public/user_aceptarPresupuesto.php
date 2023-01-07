<?php
require_once("../src/class/PresupostClass.php");
if (isset($_GET['presupuesto'])) {
  $presupuesto = $_GET['presupuesto'];
  setcookie("Presupuesto", $presupuesto);
} else setcookie("Presupuesto", 0);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pymeshield Aceptar Presupuesto</title>
  <?php require_once("../src/includes/head.php"); ?>
  <script src="../js/aceptarPresupuesto.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <?php require_once("../src/includes/header.php"); ?>
  </header>
  <main>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Aceptar Presupuesto</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-warning" id="enviar_presupuesto" value="enviar_presupuesto"><i class="fa-solid fa-check"></i>Aceptar Presupuesto</button>
        </div>
        <button type="button" class="btn btn-secondary" id="editando" value="activar_edit"><i class="fa-solid fa-pen-to-square"></i>Modificar Presupuesto</button>
      </div>
    </div>
    <div class="container">
      <input type="hidden" id="scanCode" name="SCANCODE"></input>
      <table id="table" data-locale="es-ES" data-toggle="table" data-pagination="true" data-page-size="10" data-page-list="[5, 10, 20]" data-search="true" data-show-footer="true" data-footer-style="footerStyle" data-ajax="ajaxRequest">
        <thead>
          <tr>
            <th data-sortable="true" data-field="name_task" data-footer-formatter="idFormatter">Nombre</th>
            <th data-sortable="true" data-field="description_task">Descripción</th>
            <th data-sortable="true" data-field="accepted" data-formatter="statusFormatter">Estado</th>
            <th data-sortable="true" data-field="price" data-footer-formatter="priceFormatter">Precio</th>
          </tr>
        </thead>
      </table>
    </div>
  </main>
  <footer class="bg-black text-center text-lg-center mt-auto">
    <?php require_once("../src/includes/footer.php"); ?>
  </footer>
</body>

</html>