<?php require_once("../src/class/PresupostClass.php"); 
if (isset($_GET['id_presupuesto'])) {
    $id = $_GET['id_presupuesto'];
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pymeshield Presupuesto</title>
    <?php require_once("../src/includes/head.php"); ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="sticky-top">
        <?php require_once("../src/includes/header.php"); ?>
    </header>
    <main>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item"><a href="formularisAPD.php">Presupuestos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Presupuestar Tareas <?php echo $id; ?></li>
      </ol>
    </nav>
        <div class="container p-1">
            <div class="row justify-content-between">
                <div class="col-4">
                    <h3 class="p-2 mb-3">Presupuesto</h3>
                </div>
                <div class="col-4">
                    <div class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                ¡Presupuesto guardado!
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <?php if (isset($_GET['saved'])) {
                    echo '<script type="text/javascript">';
                    echo '$(document).ready(function(){ $(".toast").toast("show") });';
                    echo '</script>';
                } ?>
                <form action="enviarPressupost.php?id_presupuesto=<?php echo"$id"; ?>" method="post" name="formuario" class="row">
                    <?php
                    $presupuesto = new Presupost($id);
                    $resultat = $presupuesto->mostrarTasca();

                    foreach ($resultat as $row) {
                        echo '<div class="mb-3 col-md-9">',
                        '<label for="preg2" class="form-label mb-0"><p class="h5">' . $row['name_recommendation'] . '</p></label>',
                        '<div class="input-group has-validation mb-3">',
                        '<span class="input-group-text">€</span>',
                        '<input type="hidden" min="0" class="form-control form-control-lg" name="id_task_' . $row['id_task'] . ' "  placeholder="Coste" value="'. $row['id_task'] .'" type="hidden"/>',
                        '<input type="number" min="0" class="form-control form-control-lg" name="price_' . $row['id_task'] . ' " placeholder="Coste" value="'. $row['price'] .'" required/>',
                        '<input type="datetime-local" min="0" class="form-control form-control-lg" name="data_i'. $row['id_task'] . '" placeholder="Coste" value="'. $row['start_date'] .'" required/>',
                        '<input type="datetime-local" min="0" class="form-control form-control-lg" name="data_f'. $row['id_task'] . '" placeholder="Coste" value="'. $row['final_date'] .'" required/>',
                        '</div></div>';
                    };
                    ?>
                    <hr class="my-4">
                    <button class="w-100 btn btn-warning btn-lg" type="submit" id="enviar"><i class="fa-solid fa-hand-holding-dollar"></i>Enviar Presupuesto</button>
                </form>
            </div>
            </div>
    </main>
    <footer class="bg-black text-center text-lg-center mt-auto">
        <?php require_once("../src/includes/footer.php"); ?>
    </footer>
</body>

</html>