<?php require_once("../PHP/PresupostClass.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pymeshield Presupuesto</title>
    <?php require_once("head.php"); ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="sticky-top">
        <?php require_once("header.php"); ?>
    </header>
    <main>
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
                <form action="enviarPressupost.php" method="post" name="formuario" class="row">
                    <?php
                    $presupuesto = new Presupost();
                    $resultat = $presupuesto->mostrarTasca();

                    foreach ($resultat as $row) {
                        echo '<div class="mb-3 col-md-6">',
                        '<label for="preg2" class="form-label mb-0"><p class="h5">' . $row['name_task'] . ' - ' . $row['description_task'] . '</p></label>',
                        '<div class="input-group has-validation mb-3">',
                        '<span class="input-group-text">€</span>',
                        '<input type="number" min="0" class="form-control form-control-lg" name="' . $row['id_task'] . ' " placeholder="Coste" required/>',
                        '</div></div>';
                    };
                    ?>
                    <hr class="my-4">
                    <button class="w-100 btn btn-dark btn-lg" type="submit" id="enviar"><i class="fa-solid fa-hand-holding-dollar"></i>Enviar Presupuesto</button>
                </form>
            </div>
            </div>
    </main>
    <footer class="bg-black text-center text-lg-center mt-auto">
        <?php require_once("footer.php"); ?>
    </footer>
</body>

</html>