<?php
require_once("../src/class/PresupostClass.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pymeshield Kanban</title>

  <?php require_once("../src/includes/head.php"); ?>
  <link rel="stylesheet" href="../css/formularisAPD.css">
</head>

<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <?php require_once("../src/includes/header.php"); ?>

  </header>

  <th class="mix-btn">
    <div class="button-container">
      <button id="ascendente" class="btn draw-border">Ascendente</button>
      <button id="descendente" class="btn draw-border2">Descendente</button>
    </div>
  </th>

  <!-- Taula amb bootstrap-tables-->
  <div class="row">
    <div class="col">
      <table class="table" data-locale="es-ES" style="width: 1200px; margin-left: 3%; text-align: center" data-toggle="table" data-search="true" data-pagination="true" data-page-size="10">

        <thead>
          <tr class="tr-class-1">
            <th class="text-center table-active" colspan="7">Presupuestos de cada cliente</th>
          </tr>

          <tr class="mix-btn">
            <th class="text-center">Nombre cliente</th>
            <th class="text-center">Apellido</th>
            <th class="text-center">Nombre empresa</th>
            <th class="text-center">Fecha de inicio</th>
            <th class="text-center">Fecha final</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Assignar precio</th>
          </tr>
        </thead>
        <tbody id="miTabla">
          <?php
          $result = Presupost::showPresupost(); //nom de la classe i el nom del metode
          while ($mostrar = mysqli_fetch_array($result)) { //crem el bucle, per mostra els elements de la conslta
          ?>
            <tr>
              <td class="table-warning"><a style="color: black;">
                  <center><?php echo $mostrar['name_user'] ?></center>
                </a></td>
              <td class="table-warning"><a style="color: black;">
                  <center><?php echo $mostrar['last_name'] ?></center>
                </a></td>
              <td class="table-warning"><a style="color: black;">
                  <center><?php echo $mostrar['name_company'] ?></center>
                </a></td>
              <td class="table-warning"><a style="color: black;">
                  <center><?php echo $mostrar['start_date'] ?></center>
                </a></td>
              <td class="table-warning"><a style="color: black;">
                  <center><?php echo $mostrar['final_date'] ?></center>
                </a></td>
              <td class="table-warning"><a style="color: black;">
                  <center><?php echo $mostrar['status'] ?></center>
              <td class="table-warning"><a href="FormulariPresupost.php?id_presupuesto=<?php echo $mostrar['id_budget']?>" style="color: black;">
                  <center><?php echo $mostrar['id_budget'] ?></center>

                </a></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>

  </tbody>
  </table>

  </div>
  </div>
  <footer class="bg-black text-center text-lg-center mt-auto">
    <?php require_once("../src/includes/footer.php"); ?>
  </footer>
  <script src="../js/formularisAPD.js"></script>
</body>

</html>
