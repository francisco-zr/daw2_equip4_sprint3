<?php
require_once("../src/class/TascaClass.php");

//CONDICIÓN DE RECEPCION DE PARAMETROS POR GET PARA VER 
if (isset($_GET["id_questionnary_user"])) {
    $cuestionarioGet = $_GET["id_questionnary_user"];
} else {
    $cuestionarioGet = 1;
}


$guardarResultado = new Tasca($id_sesion, $cuestionarioGet);
$variableNueva = $guardarResultado->comprovacionUserQuestionnaries();


/** CREACIÓN COOKIES DE SESIÓN, REPORT Y DE CUESTIONARIO*/
$expire = time() + (7 * 24 * 60 * 60); // 7 dias para que expire la cookie
setcookie('cookieIdQuestionari', $cuestionarioGet, $expire);
setcookie('cookieSesion', $id_sesion, $expire);


/** COMPROVACIÓN PARA QUE EL USUARIO NO PUEDA SALTAR A OTROS CUESTIONARIOS QUE NO LES CORRESPONDA */
$fila = mysqli_fetch_array($variableNueva, MYSQLI_ASSOC);

if ($fila["id_questionnary_user"] == $cuestionarioGet && $fila["id_user"] == $id_sesion) {
} else {
    //header("Location: https://www.udemy.com/");
    //arreglo cutre de redirección de página...ARREGLAR!
    echo '<meta http-equiv="refresh" content="0; URL=http://www.google.com">';
};
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/animaciones-tasques.css">
    <title>Pymeshield Aceptar Tareas</title>
    <?php require_once("../src/includes/head.php"); ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <!--header-->
    <header class="sticky-top">
        <?php require_once("../src/includes/header_client.php"); ?>
    </header>

    <!--main-->
    <main>
        <div id="contenedorGeneral">
            <div id="contenedorContenidoTabla">
                <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center px-2 pb-2 mb-3">
                    <h1 class="h2" id="titulo-tareas">Aceptar Tareas Cuestionario <?php echo $cuestionarioGet ?></h1>
                </div>

                <div id="mensajeErrorAjax" hidden>
                    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center px-2 pb-2 mb-3">
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fa-solid fa-triangle-exclamation" id="iconoAlertaErrorAjax"></i>
                            <div>
                                <h1>Error de petición Ajax...</h1>
                            </div>
                        </div>
                    </div>
                </div><!--id="mensajeErrorAjax"-->


                <div class="container table-responsive">
                    <table id="table" data-locale="es-ES" data-toggle="table" data-pagination="true" data-search="true" data-ajax="ajaxRequestTasques" data-page-list="[1, 5, 15, 100, all]" data-page-size="100">
                        <thead>
                            <tr>
                                <th data-sortable="true" data-field="id_questionary" data-visible="false">Id Cuestionario</th>
                                <th data-sortable="true" data-field="id_impact" data-visible="false">Id Impacto</th>
                                <th data-sortable="true" data-field="description_recommendation">Descripción</th>
                                <th data-sortable="true" data-field="name_recommendation">Recomendación</th>
                                <th data-sortable="true" data-field="name_type_impact">Nivel de Peligro</th>
                                <th data-sortable="true" data-events="operateEvents" data-formatter="operateFormatter">Aceptación de tareas</th>
                            </tr>
                        </thead>
                    </table>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" id="enviar-tareas" type="button" value="cualquier">Enviar Tareas</button>
                    </div>
                </div>
            </div><!--id="contenedorContenidoTabla"-->


            <div id="contendorContenidoCargando" hidden>
                <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center px-2 pb-2 mb-3">
                    <div class="lds-ring">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <h2 id="textoEnviando" style="text-align: center;">Enviando...</h2>
            </div><!--id="contendorContenidoCargando"-->


        </div><!--id="contenedorGeneral"-->
    </main>

    <!--footer-->
    <footer class="bg-black text-center text-lg-center mt-auto">
        <?php require_once("../src/includes/footer.php"); ?>
    </footer>
    <script src="../js/gestioAcceptacioTasques.js"></script>
</body>

</html>