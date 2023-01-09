<?php
/** AQUI RECUPERAMOS EL JSON QUE ENVIAMOS DESPUES DE ACEPTAR LAS TAREAS */

// Recupera el array enviado por la solicitud POST
$data = file_get_contents('php://input');

var_dump($data);
json_decode($data);


// Ahora puedes trabajar con el array de PHP como lo necesites


    /*
    if (isset($_POST["gestion"])) {
        echo "He llegado";
    }else {
        echo "No he llegado";
    }*/
?>