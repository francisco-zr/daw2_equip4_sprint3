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
  <script src="../JavaScript/kanban.js"></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.13.1/bootstrap-table.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.13.1/bootstrap-table.min.js"></script>

<!-- Latest compiled and minified Locales -->
 
<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>

</head>

<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <?php require_once("../src/includes/header.php"); ?>
  </header>
  <table
    data-toggle="table"
    data-search="true"
    data-show-columns="true"
    data-pagination="true"
    data-page-size="10">
    <thead>
      <tr class="tr-class-1">
        <th class="text-center" colspan="5">Presupuestos de cada cliente</th>
      </tr>
      <tr>
        <th class="text-center" data-field="Estado">Estado</th>
        <th class="text-center" data-field="Nombre Cliente">Nombre Cliente</th>
        <th class="text-center" data-field="Apellido Cliente">Apellido Cliente</th>
        <th class="text-center" data-field="Nombre Empresa">Nombre Empresa</th>
        <th class="text-center" data-field="Nombre Cuestionario">Presupuesto</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $result = Presupost::showPresupost();// Pressupost es el nom de la clase . showFormularis()es un metode
        while($mostrar = mysqli_fetch_array($result)){ //crear bucle
      ?>
        <tr class="table-warning">
          <!-- Per mostrar els camps fem lo seguent i fiquem lo nom de les columnes que volem mostrar -->
          <td><center><?php echo $mostrar['status'] ?></center> </td>
          <td><center><?php echo $mostrar['name_user'] ?></center> </td>
          <td><center><?php echo $mostrar['last_name'] ?></center> </td>
          <td><center><?php echo $mostrar['name_company'] ?></center></td>
          <td><center><?php echo $mostrar['price']?></center></td>
        </tr> 
  <?php
        } //Tanquem bucle
      ?>
    </tbody>
    <style>
      .bootstrap-table .fixed-table-pagination {
        justify-content: center;
          }
    </style>
  </table>
  <footer class="bg-black text-center text-lg-center mt-auto">  
    <?php require_once("../src/includes/footer.php"); ?>
  </footer>
</body>
</html>