<?php
/** Importamos las clases */
require_once("../src/class/TascaClass.php");
require_once("../src/class/PresupostClass.php");

/** AQUI RECUPERAMOS EL JSON QUE ENVIAMOS DESPUES DE ACEPTAR LAS TAREAS */
// Recupera el array enviado por la solicitud POST y la guardamos en una variable
$data = json_decode($_POST["datosArray"], true);

if($data != null){
    //Creamos un presupuesto con valores vacios
    $crearPresupuesto = new Presupost();
    $crearPresupuesto->crearPressupost();

    /** BUCLE PARA QUE ITERE TODO EL ARRAY RECIBIDO */ /** FALTA RECOGER DATOS EN EL MÉTODO PARA QUE SE AUTOCOMPLETEN, DEL CAMPO DANGER */
    foreach ($data as $arrayTasques){
        $insertarTareas = new Tasca($arrayTasques['questionary'], $arrayTasques['id'], $id_sesion);
        $insertarTareas->crearTasca();
    }
}
?>