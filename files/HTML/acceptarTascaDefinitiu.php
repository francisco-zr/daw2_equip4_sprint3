<?php
require_once("../PHP/TascaClass.php");
//* Importamos la sesión de un usuario imaginario para hacer pruebas
//session_start();
//$idUsuari = $_SESSION['id'] = 1;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pymeshield Aceptar Tareas</title>
  <?php require_once("head.php"); ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <!--header--> 
    <header class="sticky-top">
        <?php require_once("header.php"); ?>
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

            <table id="table" data-locale="es-ES" data-click-to-select="true" data-toggle="table" data-pagination="true" data-search="true" data-url="./getTasques.php">
                <thead>
                    <tr>
                        <th data-field="state" data-checkbox="true"></th>
                        <th data-sortable="true" data-field="name_questionary">Nombre Cuestionario</th>
                        <th data-sortable="true" data-field="description_question">Descripción</th>
                        <th data-sortable="true" data-field="name_recommendation">Recomendación</th>
                    </tr>
                </thead>
            </table>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="button" onclick="">Enviar Tareas</button>
            </div>
        </div>  
    </main>

    <!--footer-->    
    <footer class="bg-black text-center text-lg-center mt-auto">
        <?php require_once("footer.php"); ?>
    </footer>
    <script src="../JavaScript/enviarTasquesAcceptades.js"></script>
</body>

</html>