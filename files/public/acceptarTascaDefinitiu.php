<?php
require_once("../src/class/TascaClass.php");
//* Importamos la sesión de un usuario imaginario para hacer pruebas
//session_start();
//$idUsuari = $_SESSION['id'] = 1;

/** CREACIÓN COOKIE DE INICIO */
$expire = time() + (7 * 24 * 60 * 60); // 7 days
setcookie('cookieSesion', $id_sesion, $expire);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/animacion-boton-tasca.css">
    <title>Pymeshield Aceptar Tareas</title>
    <?php require_once("../src/includes/head.php"); ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <!--header-->
    <header class="sticky-top">
        <?php require_once("../src/includes/header.php"); ?>
    </header>

    <!--main-->
    <main>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center px-2 pb-2 mb-3">
            <h1 class="h2">Aceptar Tareas Cuestionario X</h1>
        </div>

        <div class="container table-responsive">
            <!--<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre Cuestionario (Provisional)</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Recomendación</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>-->

            <!--php 
                //Instanciamos el objeto
                $tascaUsuari = new Tasca($_SESSION['id']);
                //Mediante el objeto llamamos al método
                $tascaUsuari->mostrarRecomendacionTarea();
                ?>


            </table>-->
            <!-- data-url="./getTasques.php" -->
            <table id="table" data-locale="es-ES" data-toggle="table" data-pagination="true" data-search="true" data-ajax="ajaxRequest" data-page-list="[3, 6, 9, 15, 100, all]" data-page-size="100">
                <thead>
                    <tr>
                        <th data-sortable="true" data-field="id_questionary" data-visible="false">Id Cuestionario</th>
                        <th data-sortable="true" data-field="name_questionary" data-events="operateEvents">Nombre Cuestionario</th>
                        <th data-sortable="true" data-field="description_recommendation">Descripción</th>
                        <th data-sortable="true" data-field="name_recommendation">Recomendación</th>
                        <th data-sortable="true" data-events="operateEvents" data-formatter="operateFormatter">Aceptar</th>
                    </tr>
                </thead>
            </table>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" id="enviar-tareas" type="button" value="cualquier">Enviar Tareas</button>
            </div>
        </div>
    </main>

    <!--footer-->
    <footer class="bg-black text-center text-lg-center mt-auto">
        <?php require_once("../src/includes/footer.php"); ?>
    </footer>
    <script src="../js/enviarTasquesAcceptades.js"></script>
    <script src="../js/ajaxRequestAcceptarTasca.js"></script>
    <script src="../js/gestioAcceptacioTasques.js"></script>
</body>

</html>