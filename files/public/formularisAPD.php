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
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js?v=2.1.9'></script>
  
  <?php require_once("../src/includes/head.php"); ?>
</head>
<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <?php require_once("../src/includes/header.php"); ?>
    
  </header>
 
  <th class="mix-btn">
    <div class="button-container">
      <button class="btn btn-outline-secondary sort" id="sort-asc" data-sort="status:asc" onclick="sortAsc()">Ascendente</button>
      <button class="btn btn-outline-secondary sort" id="sort-desc" data-sort="status:desc" onclick="sortDesc()">Descendente</button>
    </div>
  </th>

       
              <!-- Height es la altura del boto que li donarem i width la anuchra-->
  <style>
  .button-container {
   text-align: center;
   margin: 0 auto;
}
.sort {
  /* Estilos existentes */
  transition: background-color 0.3s, transform 0.3s;
  /* Agrega la transición a la transformación */
}

.sort:hover {
  background-color: #C8C8C8;
  transform: translateY(2px); /* movemos hacia abajo 2px */
}

  </style>

  <!-- Taula amb bootstrap-tables-->
 <div class="row">
  <div class="col">
  <table class="table" data-locale="es-ES" style="width: 1200px; margin-left: 3%; text-align: center"
      data-toggle="table"
      data-search="true" 
      data-pagination="true"
      data-page-size="10">
      
          <thead>
            <tr class="tr-class-1">
              <th class="text-center table-active" colspan="5">Presupuestos de cada cliente</th>
            </tr>
            
            <tr class="mix-btn">
              
              <th class="text-center">Estado</th>   
              <th class="text-center">Nombre cliente</th>
              <th class="text-center">Apellido</th>
              <th class="text-center">Nombre empresa</th>
              <th class="text-center">Fecha</th>
            </tr>
          </thead>
          <tbody id="mix-wrapper">
          <?php
              $result = Presupost::showPresupost();
              while($mostrar = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td class="table-warning" data-sort="<?php echo $mostrar['status'] ?>"><a href="https://www.google.es/" style="color: black;"><center><?php echo $mostrar['status'] ?></center></a></td>
              <td class="table-warning"><a href="https://www.google.es/" style="color: black;"><center><?php echo $mostrar['name_user'] ?></center></a></td>
              <td class="table-warning"><a href="https://www.google.es/"style="color: black;"><center><?php echo $mostrar['last_name'] ?></center></a></td>
              <td class="table-warning"><a href="https://www.google.es/"style="color: black;"><center><?php echo $mostrar['name_company'] ?></center></a></td>
              <td class="table-warning"><a href=" https://www.google.es/"style="color: black;"><center><?php echo $mostrar['price']?></center></a></td>
            </tr>
            <?php
              }
            ?>
  <script>
    function sortAsc() {
      var mixer = mixitup('#mix-wrapper');
        mixer.sort('status:asc');
    }
    function sortDesc() {
      var mixer = mixitup('#mix-wrapper');
        mixer.sort('status:desc');
  }
</script>

          </tbody>
        </table>

      </div>
    </div>
  <footer class="bg-black text-center text-lg-center mt-auto">  
    <?php require_once("../src/includes/footer.php"); ?>
  </footer>
</body>
</html>