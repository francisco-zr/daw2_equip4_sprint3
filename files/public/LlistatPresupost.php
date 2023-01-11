<?php
require_once("../src/class/TascaClass.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../css/animacio.css">
  <title>Pymeshield Llistat Presupostos</title>
  <?php require_once("../src/includes/head.php"); ?>
</head>

<body class="d-flex flex-column min-vh-100">


  <header class="sticky-top">
    <?php require_once("../src/includes/header_client.php"); ?>
  </header>
  <main>
  <div class="loading">
  <p class="loading-text">Loading...</p>
  </div>

</div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-2 pb-2 mb-3 border-bottom">
      <h1 class="h2">Listados Presupuestos</h1>
    </div>
    <table id="table" data-locale="es-ES" data-click-to-select="true" data-toggle="table" data-pagination="true" data-search="true" data-url="./getPresupuestos.php">
      <thead>
        <tr>
          <th data-sortable="true" data-field="id_budget">ID Presupuesto</th>
          <th data-sortable="true" data-field="name_questionary">Nombre</th>
          <th data-sortable="true" data-field="price">Precio</th>
          <th data-sortable="true" data-field="accepted">Aceptado</th>
          <th data-sortable="true" data-formatter="operateFormatter">Detalles</th>
        </tr>
      </thead>
    </table>
  </main>
  <footer class="bg-black text-center text-lg-center mt-auto">
    <?php require_once("../src/includes/footer.php"); ?>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function(){
      document.querySelector(".loading").classList.add("loading-visible");
    });

    window.onload = function(){
      document.querySelector(".loading").classList.remove("loading-visible");
    };
  </script>

</body>
<script>
function operateFormatter(value, row, index) {
    return [
      '<a class="like" href="javascript:void(0)" title="Like">',
      '<i class="fa fa-info"></i>',
      '</a>  '
    ].join('')
  }

  </script>


  </script>
</html>