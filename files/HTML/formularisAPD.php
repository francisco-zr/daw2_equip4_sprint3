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
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.13.1/bootstrap-table.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.13.1/bootstrap-table.min.js"></script>

<!-- Latest compiled and minified Locales -->
 
<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>

</head>

<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <?php require_once("header.php"); ?>
  </header>
  <table
  data-toggle="table"
  data-search="true"
  data-show-columns="true">
  <thead>
    <tr class="tr-class-1">
      
      <th class="text-center" colspan="5">Formularios</th>
    </tr>
    <tr>
      <th class="text-center" data-field="Estado">Estado</th>
      <th class="text-center" data-field="Nombre Cliente">Nombre Cliente</th>
      <th class="text-center" data-field="Nombre Cliente">Apellido Cliente</th>
      <th class="text-center" data-field="Nombre Empresa">Nombre Empresa</th>
      <th class="text-center" data-field="Nombre Cuestionario">Nombre del cuestionario </th>
      <th class="text-center" data-filed="Fecha">Fecha</th>
    </tr>
  </thead>
  <tbody>
    <?php
	$result = Tasca::showFormularis();// tasca es el nom de la classe . showFormularis()es un metode

	while($mostrar = mysqli_fetch_array($result)){ //crear bucle

	?>
		<tr class="table-warning"> <!-- Per mostrar els camps fem lo seguent i fiquem lo nom de les columnes que volem mostrar -->
			<th ><center><?php echo $mostrar['state'] ?></center> </th>
     		<th ><center><?php echo $mostrar['name_user'] ?></center> </th>
         <th ><center><?php echo $mostrar['last_name'] ?></center> </th>
			<td><center><?php echo $mostrar['name_company'] ?></center></td>
			<td><center><?php echo $mostrar['name_questionary']?></center></td>
			<td><center><?php echo $mostrar['date_questionary']?></center></td>
		</tr> 
    
		
		<?php
		} //Tanquem bucle
		?>

</tbody>
    
</table>




<footer class="bg-black text-center text-lg-center mt-auto">
    <?php require_once("footer.php"); ?>
  </footer>
</body>

</html>
