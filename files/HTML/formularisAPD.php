<?php
require_once("../PHP/TascaClass.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pymeshield Kanban</title>
  <?php require_once("head.php"); ?>
  <script src="../JavaScript/kanban.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <?php require_once("header.php"); ?>
  </header>



<table class="table table-bordered">
  <H3> <center> </center> </H3>
  <H3> <center> Aceptados </center> </H3>
  <thead>
    <tr>
      <th scope="col"> <center>Nombre Cliente </center></th>
      <th scope="col"> <center>Nombre Empresa </center></th>
      <th scope="col"> <center>Nombre del cuestionario </center></th>
      <th scope="col"> <center>Fecha </center></th>
    </tr>
  </thead>
  <tbody>
  <tr class="table-warning">
    <th> <center>Nombre C </center></th>
      <td><center>Nombre E </center></td>
      <td><center>Nombre C </center></td>
      <td><center>Fecha </center></td>
    </tr>
    <tr class="table-secondary">
      <th><center>Nombre C </center></th>
      <td><center>Nombre E </center></td>
      <td><center>Nombre C </center></td>
      <td><center>Fecha </center></td>
    </tr>
   
  </tbody>
</table>
<H3> <center> </center> </H3>
<H3> <center> </center> </H3>
<H3> <center> </center> </H3>
<H3> <center> </center> </H3>
<H3> <center> </center> </H3>


<table class="table table-bordered">
<H3> <center> </center> </H3>
  <H3> <center> Pendientes </center> </H3>
  <thead>
    <tr class="table caption-top">
      <th scope="col"> <center>Nombre Cliente </center></th>
      <th scope="col"> <center>Nombre Empresa </center></th>
      <th scope="col"> <center>Nombre del cuestionario </center></th>
      <th scope="col"> <center>Fecha </center></th>
    </tr>
  </thead>
  <tbody>
  <tr class="table-warning">
  <th> <center>Nombre C </center></th>
      <td><center>Nombre E </center></td>
      <td><center>Nombre C </center></td>
      <td><center>Fecha </center></td>
    </tr>
    <tr class="table-secondary">
      <th><center>Nombre C </center></th>
      <td><center>Nombre E </center></td>
      <td><center>Nombre C </center></td>
      <td><center>Fecha </center></td>
    </tr>
   
  </tbody>
</table>

<H3> <center> </center> </H3>
<H3> <center> </center> </H3>
<H3> <center> </center> </H3>
<H3> <center> </center> </H3>
<H3> <center> </center> </H3>

<table class="table table-bordered">
<H3> <center> </center> </H3>
  <H3> <center> Denegados </center> </H3>
  <thead>
    <tr>
      <th scope="col"> <center>Nombre Cliente </center></th>
      <th scope="col"> <center>Nombre Empresa </center></th>
      <th scope="col"> <center>Nombre del cuestionario </center></th>
      <th scope="col"> <center>Fecha </center></th>
    </tr>
  </thead>
  <tbody>
  <tr class="table-warning">
      <th> <center>Nombre C </center></th>
      <td><center>Nombre E </center></td>
      <td><center>Nombre C </center></td>
      <td><center>Fecha </center></td>
    </tr>
    <tr class="table-secondary">
      <th><center>Nombre C </center></th>
      <td><center>Nombre E </center></td>
      <td><center>Nombre C </center></td>
      <td><center>Fecha </center></td>
    </tr>
   
  </tbody>
</table>
<footer class="bg-black text-center text-lg-center mt-auto">
    <?php require_once("footer.php"); ?>
  </footer>
</body>

</html>